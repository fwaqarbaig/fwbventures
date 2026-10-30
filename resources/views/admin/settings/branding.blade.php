@extends('layouts.admin')

@section('title', 'Logo & Favicon Branding')

@section('content')
<div class="space-y-8" 
     x-data="{
        desktopHeight: {{ $settings['logo_height_desktop'] }},
        mobileHeight: {{ $settings['logo_height_mobile'] }},
        footerHeight: {{ $settings['logo_height_footer'] }},
        mainLogoPreview: '{{ asset(ltrim($settings['site_logo'], '/')) }}',
        footerLogoPreview: '{{ asset(ltrim($settings['site_logo_white'], '/')) }}',
        faviconPreview: '{{ asset(ltrim($settings['site_favicon'], '/')) }}',
        siteTitle: '{{ addslashes($settings['site_title']) }}',
        previewMainLogo(event) {
            const file = event.target.files[0];
            if (file) {
                this.mainLogoPreview = URL.createObjectURL(file);
            }
        },
        previewFooterLogo(event) {
            const file = event.target.files[0];
            if (file) {
                this.footerLogoPreview = URL.createObjectURL(file);
            }
        },
        previewFavicon(event) {
            const file = event.target.files[0];
            if (file) {
                this.faviconPreview = URL.createObjectURL(file);
            }
        }
     }">

    <!-- Page Header & Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-200 pb-6">
        <div>
            <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-2">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-brand-600 transition">Dashboard</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
                <span>Settings</span>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400"></i>
                <span class="text-brand-600 font-bold">Logo &amp; Favicon</span>
            </nav>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-sky-500 text-slate-950 flex items-center justify-center font-bold shadow-md shadow-sky-500/20">
                    <i data-lucide="image" class="w-5 h-5"></i>
                </div>
                <span>Website Logo &amp; Favicon Branding</span>
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Upload your company logos, set browser tab favicon, and dynamically adjust display dimensions with instant real-time live preview.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-xs font-bold transition shadow-xs">
                <i data-lucide="external-link" class="w-4 h-4 text-sky-500"></i>
                <span>View Live Site</span>
            </a>
            <form action="{{ route('admin.settings.branding.reset') }}" method="POST" onsubmit="return confirm('Reset all logo and favicon branding back to default official FWB Ventures assets?');">
                @csrf
                <button type="submit" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                    <i data-lucide="rotate-ccw" class="w-4 h-4 text-slate-500"></i>
                    <span>Reset Defaults</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Live Preview Card (Real-Time Reactive) -->
    <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-slate-950 text-white rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-xl space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-800 pb-4">
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-400">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Interactive Live Preview &bull; Updates Instantly as You Adjust Controls</span>
            </div>
            <div class="flex items-center gap-3 text-xs text-slate-400">
                <span>Desktop: <strong class="text-sky-300 font-mono" x-text="desktopHeight + 'px'"></strong></span>
                <span>&bull;</span>
                <span>Mobile: <strong class="text-sky-300 font-mono" x-text="mobileHeight + 'px'"></strong></span>
                <span>&bull;</span>
                <span>Footer: <strong class="text-sky-300 font-mono" x-text="footerHeight + 'px'"></strong></span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- Left 8 Cols: Simulated Header Preview -->
            <div class="lg:col-span-8 space-y-4">
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">1. Desktop Header Navigation Preview:</span>
                </div>
                <div class="rounded-2xl bg-white p-4 sm:px-6 border border-slate-200 shadow-md flex items-center justify-between">
                    <div class="flex items-center gap-6">
                        <img :src="mainLogoPreview" 
                             :alt="siteTitle" 
                             :style="'height: ' + desktopHeight + 'px; width: auto;'" 
                             class="max-w-[260px] object-contain transition-all">
                        <div class="hidden md:flex items-center gap-4 text-xs font-semibold text-slate-700">
                            <span class="text-sky-600 font-bold">Home</span>
                            <span>Services</span>
                            <span>Products</span>
                            <span>Articles</span>
                            <span>Contact Us</span>
                        </div>
                    </div>
                    <div class="hidden sm:flex items-center gap-2">
                        <span class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-sky-500 text-slate-950 shadow-xs">Get Quote</span>
                    </div>
                </div>

                <!-- Simulated Mobile Header Preview -->
                <div class="pt-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">2. Mobile Header Preview:</span>
                </div>
                <div class="max-w-md rounded-2xl bg-white p-3 px-4 border border-slate-200 shadow-md flex items-center justify-between">
                    <img :src="mainLogoPreview" 
                         :alt="siteTitle" 
                         :style="'height: ' + mobileHeight + 'px; width: auto;'" 
                         class="max-w-[180px] object-contain transition-all">
                    <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-700">
                        <i data-lucide="menu" class="w-4 h-4"></i>
                    </div>
                </div>

                <!-- Simulated Footer Dark Background Preview -->
                <div class="pt-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">3. Footer Dark Background Preview:</span>
                </div>
                <div class="rounded-2xl bg-slate-950 p-5 border border-slate-800 shadow-inner flex items-center justify-between">
                    <img :src="footerLogoPreview" 
                         :alt="siteTitle" 
                         :style="'height: ' + footerHeight + 'px; width: auto;'" 
                         class="max-w-[240px] object-contain transition-all">
                    <span class="text-xs text-slate-500">&copy; {{ date('Y') }} {{ $settings['site_title'] }}</span>
                </div>
            </div>

            <!-- Right 4 Cols: Simulated Browser Tab Preview -->
            <div class="lg:col-span-4 space-y-4">
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">4. Browser Tab Favicon Preview:</span>
                </div>
                <div class="rounded-2xl bg-slate-800/90 p-4 border border-slate-700/80 space-y-3">
                    <div class="rounded-xl bg-slate-900 p-2.5 flex items-center gap-2.5 border border-slate-700/50 shadow-inner">
                        <img :src="faviconPreview" 
                             alt="Favicon" 
                             class="w-4 h-4 shrink-0 rounded-xs object-contain">
                        <span class="text-xs font-medium text-slate-200 truncate" x-text="siteTitle + ' - Solar, Structure & CCTV'"></span>
                        <div class="ml-auto w-3 h-3 text-slate-500 hover:text-white flex items-center justify-center">
                            &times;
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        This is how your favicon and page title appear on Chrome, Edge, Safari, and Firefox browser tabs.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Main Branding Upload & Dimensions Form -->
    <form action="{{ route('admin.settings.branding.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Card 1: Main Header Logo -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-600">
                        <i data-lucide="sun" class="w-4 h-4"></i>
                        <span>Primary Website Logo</span>
                    </div>
                    <span class="text-[10px] uppercase font-extrabold px-2 py-0.5 rounded bg-sky-100 text-sky-700">Header</span>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-center min-h-[120px]">
                    <img :src="mainLogoPreview" 
                         alt="Current Main Logo" 
                         :style="'height: ' + desktopHeight + 'px; width: auto;'" 
                         class="max-w-full object-contain">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Upload New Main Logo
                    </label>
                    <input type="file" 
                           name="logo_file" 
                           accept=".svg,.png,.webp,.jpg,.jpeg" 
                           @change="previewMainLogo"
                           class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 file:cursor-pointer cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50/50">
                    <p class="text-[11px] text-slate-400">
                        Supported: <strong>SVG, PNG, WebP</strong> (transparent background recommended, max 5MB).
                    </p>
                </div>
            </div>

            <!-- Card 2: White / Footer Logo -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-600">
                        <i data-lucide="moon" class="w-4 h-4"></i>
                        <span>White / Dark-Mode Logo</span>
                    </div>
                    <span class="text-[10px] uppercase font-extrabold px-2 py-0.5 rounded bg-slate-900 text-slate-200">Footer</span>
                </div>

                <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800 flex items-center justify-center min-h-[120px]">
                    <img :src="footerLogoPreview" 
                         alt="Current Footer Logo" 
                         :style="'height: ' + footerHeight + 'px; width: auto;'" 
                         class="max-w-full object-contain">
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Upload White / Footer Logo
                    </label>
                    <input type="file" 
                           name="logo_white_file" 
                           accept=".svg,.png,.webp,.jpg,.jpeg" 
                           @change="previewFooterLogo"
                           class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-100 file:text-slate-800 hover:file:bg-slate-200 file:cursor-pointer cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50/50">
                    <p class="text-[11px] text-slate-400">
                        Used on dark footer backgrounds. White or bright SVG/PNG recommended.
                    </p>
                </div>
            </div>

            <!-- Card 3: Browser Favicon -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-indigo-600">
                        <i data-lucide="bookmark" class="w-4 h-4"></i>
                        <span>Browser Favicon</span>
                    </div>
                    <span class="text-[10px] uppercase font-extrabold px-2 py-0.5 rounded bg-indigo-100 text-indigo-700">Tab Icon</span>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col items-center justify-center min-h-[120px] gap-2">
                    <div class="w-14 h-14 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-center p-2.5">
                        <img :src="faviconPreview" 
                             alt="Favicon Thumbnail" 
                             class="w-full h-full object-contain">
                    </div>
                    <span class="text-[11px] text-slate-500 font-mono">16x16, 32x32, 48x48</span>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Upload Favicon Icon
                    </label>
                    <input type="file" 
                           name="favicon_file" 
                           accept=".ico,.png,.svg,.webp" 
                           @change="previewFavicon"
                           class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 file:cursor-pointer cursor-pointer border border-slate-200 rounded-xl p-1 bg-slate-50/50">
                    <p class="text-[11px] text-slate-400">
                        Square 1:1 ratio. Supported formats: <strong>.ico, .png, .svg</strong> (max 2MB).
                    </p>
                </div>
            </div>

        </div>

        <!-- Section 2: Logo Size Sliders & Exact Dimensions -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
            <div class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 flex items-center gap-2">
                        <i data-lucide="sliders" class="w-5 h-5 text-sky-600"></i>
                        <span>Logo Dimensions &amp; Display Sizes</span>
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">
                        Drag the sliders to adjust logo heights in pixels. Live preview at top will reflect changes instantaneously.
                    </p>
                </div>
                <div class="px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-bold font-mono">
                    Aspect Ratio: Auto Preserved
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Desktop Header Logo Height Slider -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-700">
                            Desktop Header Height
                        </label>
                        <div class="flex items-center gap-1 bg-white px-2.5 py-1 rounded-lg border border-slate-200 shadow-xs">
                            <input type="number" 
                                   name="logo_height_desktop" 
                                   x-model="desktopHeight" 
                                   min="20" 
                                   max="160" 
                                   class="w-12 text-center text-xs font-mono font-bold text-sky-600 border-none p-0 focus:ring-0">
                            <span class="text-xs text-slate-400">px</span>
                        </div>
                    </div>
                    <input type="range" 
                           x-model="desktopHeight" 
                           min="20" 
                           max="140" 
                           step="1" 
                           class="w-full accent-sky-600 cursor-pointer">
                    <div class="flex items-center justify-between text-[11px] text-slate-400 font-mono">
                        <span>Min: 20px</span>
                        <span class="text-sky-600 font-bold">Standard: 44px</span>
                        <span>Max: 140px</span>
                    </div>
                </div>

                <!-- Mobile Header Logo Height Slider -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-700">
                            Mobile Header Height
                        </label>
                        <div class="flex items-center gap-1 bg-white px-2.5 py-1 rounded-lg border border-slate-200 shadow-xs">
                            <input type="number" 
                                   name="logo_height_mobile" 
                                   x-model="mobileHeight" 
                                   min="16" 
                                   max="120" 
                                   class="w-12 text-center text-xs font-mono font-bold text-sky-600 border-none p-0 focus:ring-0">
                            <span class="text-xs text-slate-400">px</span>
                        </div>
                    </div>
                    <input type="range" 
                           x-model="mobileHeight" 
                           min="16" 
                           max="100" 
                           step="1" 
                           class="w-full accent-sky-600 cursor-pointer">
                    <div class="flex items-center justify-between text-[11px] text-slate-400 font-mono">
                        <span>Min: 16px</span>
                        <span class="text-sky-600 font-bold">Standard: 36px</span>
                        <span>Max: 100px</span>
                    </div>
                </div>

                <!-- Footer Logo Height Slider -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold uppercase tracking-wider text-slate-700">
                            Footer Logo Height
                        </label>
                        <div class="flex items-center gap-1 bg-white px-2.5 py-1 rounded-lg border border-slate-200 shadow-xs">
                            <input type="number" 
                                   name="logo_height_footer" 
                                   x-model="footerHeight" 
                                   min="20" 
                                   max="160" 
                                   class="w-12 text-center text-xs font-mono font-bold text-sky-600 border-none p-0 focus:ring-0">
                            <span class="text-xs text-slate-400">px</span>
                        </div>
                    </div>
                    <input type="range" 
                           x-model="footerHeight" 
                           min="20" 
                           max="140" 
                           step="1" 
                           class="w-full accent-sky-600 cursor-pointer">
                    <div class="flex items-center justify-between text-[11px] text-slate-400 font-mono">
                        <span>Min: 20px</span>
                        <span class="text-sky-600 font-bold">Standard: 40px</span>
                        <span>Max: 140px</span>
                    </div>
                </div>

            </div>

            <!-- Site Name / Alt Tag -->
            <div class="pt-4 border-t border-slate-100 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                        Company Brand Title (Logo Alt Text)
                    </label>
                    <input type="text" 
                           name="site_title" 
                           x-model="siteTitle" 
                           value="{{ $settings['site_title'] }}" 
                           placeholder="e.g. FWB Ventures" 
                           class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 bg-slate-50/50">
                    <p class="text-[11px] text-slate-400 mt-1">Used for logo accessibility, Schema.org Organization, and title metadata.</p>
                </div>
            </div>
        </div>

        <!-- Sticky Bottom Save Bar -->
        <div class="flex items-center justify-between bg-white rounded-2xl p-4 sm:p-5 border border-slate-200 shadow-lg sticky bottom-6 z-30">
            <div class="flex items-center gap-2 text-xs text-slate-500">
                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-500"></i>
                <span>Changes apply globally across desktop, tablet, and mobile views.</span>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-50 text-xs font-bold transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-slate-950 font-bold text-xs shadow-lg shadow-sky-500/25 transition flex items-center gap-2 transform hover:-translate-y-0.5">
                    <i data-lucide="save" class="w-4 h-4"></i>
                    <span>Save Logo &amp; Favicon Settings</span>
                </button>
            </div>
        </div>

    </form>
</div>
@endsection
