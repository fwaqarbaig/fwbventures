<?php

namespace App\Providers;

use App\Models\MenuItem;
use App\Models\Setting;
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
            $siteLogo = asset('images/fwb-logo.svg');
            $siteLogoWhite = asset('images/fwb-logo-white.svg');
            $siteFavicon = asset('favicon.svg');
            $logoHeightDesktop = 44;
            $logoHeightMobile = 36;
            $logoHeightFooter = 40;
            $siteTitle = config('app.name', 'FWB Ventures');

            if (Schema::hasTable('settings')) {
                $siteLogo = Setting::get('site_logo', $siteLogo);
                $siteLogoWhite = Setting::get('site_logo_white', $siteLogoWhite);
                $siteFavicon = Setting::get('site_favicon', $siteFavicon);
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
