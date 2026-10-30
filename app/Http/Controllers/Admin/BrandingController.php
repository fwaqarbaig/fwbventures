<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\HtmlSanitizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BrandingController extends Controller
{
    /**
     * Display the logo, favicon, and branding customization view.
     */
    public function index(): View
    {
        $settings = [
            'site_logo' => Setting::get('site_logo', '/images/fwb-logo.svg'),
            'site_logo_white' => Setting::get('site_logo_white', '/images/fwb-logo-white.svg'),
            'site_favicon' => Setting::get('site_favicon', '/favicon.svg'),
            'logo_height_desktop' => (int) Setting::get('logo_height_desktop', 44),
            'logo_height_mobile' => (int) Setting::get('logo_height_mobile', 36),
            'logo_height_footer' => (int) Setting::get('logo_height_footer', 40),
            'site_title' => Setting::get('site_title', config('app.name', 'FWB Ventures')),
        ];

        return view('admin.settings.branding', compact('settings'));
    }

    /**
     * Update the logo, favicon, and size parameters.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'logo_file' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp,svg', 'max:5120'],
            'logo_white_file' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp,svg', 'max:5120'],
            'favicon_file' => ['nullable', 'file', 'mimes:ico,png,svg,webp', 'max:2048'],
            'logo_height_desktop' => ['required', 'integer', 'min:20', 'max:160'],
            'logo_height_mobile' => ['required', 'integer', 'min:16', 'max:120'],
            'logo_height_footer' => ['required', 'integer', 'min:20', 'max:160'],
            'site_title' => ['nullable', 'string', 'max:100'],
        ]);

        // Validate SVG security on all uploaded files
        foreach (['logo_file', 'logo_white_file', 'favicon_file'] as $field) {
            if ($request->hasFile($field)) {
                $uploaded = $request->file($field);
                $ext = strtolower($uploaded->getClientOriginalExtension());
                if ($ext === 'svg') {
                    $content = file_get_contents($uploaded->getRealPath());
                    if (! HtmlSanitizer::isSafeSvg($content)) {
                        return back()->with('error', "Security Error: Malicious or invalid SVG file detected in {$field}.");
                    }
                }
            }
        }

        $uploadDir = public_path('storage/uploads/branding');
        if (! file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $appStorageDir = storage_path('app/public/uploads/branding');
        if (! file_exists($appStorageDir)) {
            mkdir($appStorageDir, 0755, true);
        }

        // 1. Process Main Logo
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $filename = 'logo-'.time().'-'.Str::random(6).'.'.$extension;

            $file->move($uploadDir, $filename);
            // Sync to app storage
            copy($uploadDir.'/'.$filename, $appStorageDir.'/'.$filename);

            Setting::set('site_logo', '/storage/uploads/branding/'.$filename, 'branding');
        }

        // 2. Process White / Footer Logo
        if ($request->hasFile('logo_white_file')) {
            $file = $request->file('logo_white_file');
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $filename = 'logo-white-'.time().'-'.Str::random(6).'.'.$extension;

            $file->move($uploadDir, $filename);
            copy($uploadDir.'/'.$filename, $appStorageDir.'/'.$filename);

            Setting::set('site_logo_white', '/storage/uploads/branding/'.$filename, 'branding');
        }

        // 3. Process Favicon
        if ($request->hasFile('favicon_file')) {
            $file = $request->file('favicon_file');
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $filename = 'favicon-'.time().'-'.Str::random(6).'.'.$extension;

            $file->move($uploadDir, $filename);
            copy($uploadDir.'/'.$filename, $appStorageDir.'/'.$filename);

            $faviconPath = '/storage/uploads/branding/'.$filename;
            Setting::set('site_favicon', $faviconPath, 'branding');

            // If .ico was uploaded, also copy to public/favicon.ico
            if (strtolower($extension) === 'ico') {
                @copy($uploadDir.'/'.$filename, public_path('favicon.ico'));
            }
        }

        // 4. Update Dimensions & Site Title
        Setting::set('logo_height_desktop', (string) $request->input('logo_height_desktop'), 'branding');
        Setting::set('logo_height_mobile', (string) $request->input('logo_height_mobile'), 'branding');
        Setting::set('logo_height_footer', (string) $request->input('logo_height_footer'), 'branding');

        if ($request->filled('site_title')) {
            Setting::set('site_title', $request->input('site_title'), 'branding');
        }

        Setting::clearCache();

        return redirect()->route('admin.settings.branding')
            ->with('success', 'Website logo, favicon, and display sizes updated successfully!');
    }

    /**
     * Reset to default official FWB Ventures branding assets.
     */
    public function reset(): RedirectResponse
    {
        Setting::set('site_logo', '/images/fwb-logo.svg', 'branding');
        Setting::set('site_logo_white', '/images/fwb-logo-white.svg', 'branding');
        Setting::set('site_favicon', '/favicon.svg', 'branding');
        Setting::set('logo_height_desktop', '44', 'branding');
        Setting::set('logo_height_mobile', '36', 'branding');
        Setting::set('logo_height_footer', '40', 'branding');
        Setting::set('site_title', 'FWB Ventures', 'branding');

        Setting::clearCache();

        return redirect()->route('admin.settings.branding')
            ->with('success', 'Branding reset to default FWB Ventures logos and dimensions.');
    }
}
