<?php

namespace App\Providers;

use App\Models\MenuItem;
use App\Models\Setting;
use App\Services\LegacyDataCleaner;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // One-time self-healing cleanup of legacy UAE generator template data
        if (Schema::hasTable('settings') && Setting::get('legacy_data_cleaned_v1') !== '1') {
            try {
                app(LegacyDataCleaner::class)->run();
                Setting::set('legacy_data_cleaned_v1', '1');
            } catch (\Throwable) {
                // Ignore during early bootstrap or before migrations
            }
        }

        // Enforce strong password defaults
        Password::defaults(function () {
            $rule = Password::min(8);

            return app()->isProduction()
                ? $rule->mixedCase()->numbers()->symbols()->uncompromised()
                : $rule;
        });

        // 1. Login Rate Limiting (Progressive, by email + IP)
        RateLimiter::for('login', function (Request $request) {
            $key = Str::transliterate(Str::lower($request->string('email')).'|'.$request->ip());

            return Limit::perMinute(5)->by($key);
        });

        // 2. Two-Factor Authentication Rate Limiting
        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        // 3. Contact Form Submission Rate Limiting
        RateLimiter::for('contact', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        // 4. Search Query Rate Limiting (Protects from scraping & DoS)
        RateLimiter::for('search', function (Request $request) {
            return Limit::perMinute(30)->by($request->ip());
        });

        // 5. Admin Uploads & Actions
        RateLimiter::for('uploads', function (Request $request) {
            return Limit::perMinute(30)->by(auth()->id() ?: $request->ip());
        });

        View::composer('*', function ($view) {
            $defaultLogo = asset('images/fwb-logo.svg');
            $defaultLogoWhite = asset('images/fwb-logo-white.svg');
            $siteFavicon = asset('favicon.svg');
            $logoHeightDesktop = 44;
            $logoHeightMobile = 36;
            $logoHeightFooter = 40;
            $siteTitle = config('app.name', 'FWB Ventures');

            $resolveLogoAsset = function (?string $rawPath, string $fallbackUrl): string {
                if (empty($rawPath)) {
                    return $fallbackUrl;
                }

                $clean = (string) preg_replace('#^https?://[^/]+/#', '/', $rawPath);
                $clean = ltrim($clean, '/');

                if ($clean === '') {
                    return $fallbackUrl;
                }

                // 1. Direct match in public directory
                if (file_exists(public_path($clean))) {
                    return asset($clean);
                }

                // 2. Storage asset match (public/storage or storage/app/public)
                if (str_starts_with($clean, 'storage/')) {
                    $subPath = substr($clean, 8);
                    if (file_exists(public_path('storage/'.$subPath)) || file_exists(storage_path('app/public/'.$subPath))) {
                        return asset($clean);
                    }
                }

                return $fallbackUrl;
            };

            $siteLogo = $defaultLogo;
            $siteLogoWhite = $defaultLogoWhite;

            if (Schema::hasTable('settings')) {
                $siteLogo = $resolveLogoAsset(Setting::get('site_logo'), $defaultLogo);
                $siteLogoWhite = $resolveLogoAsset(Setting::get('site_logo_white'), $defaultLogoWhite);
                $siteFavicon = $resolveLogoAsset(Setting::get('site_favicon'), $siteFavicon);
                $logoHeightDesktop = (int) Setting::get('logo_height_desktop', $logoHeightDesktop);
                $logoHeightMobile = (int) Setting::get('logo_height_mobile', $logoHeightMobile);
                $logoHeightFooter = (int) Setting::get('logo_height_footer', $logoHeightFooter);
                $siteTitle = Setting::get('site_title', $siteTitle);
            }

            $view->with(compact(
                'siteLogo',
                'siteLogoWhite',
                'siteFavicon',
                'logoHeightDesktop',
                'logoHeightMobile',
                'logoHeightFooter',
                'siteTitle'
            ));
        });

        View::composer('layouts.app', function ($view) {
            $headerMenuItems = collect();

            if (Schema::hasTable('menu_items')) {
                $headerMenuItems = MenuItem::with(['activeChildren.activeChildren.activeChildren'])
                    ->header()
                    ->root()
                    ->active()
                    ->ordered()
                    ->get();
            }

            $view->with('headerMenuItems', $headerMenuItems);
        });
    }
}
