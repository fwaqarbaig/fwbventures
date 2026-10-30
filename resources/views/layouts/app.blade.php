<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50 text-slate-900 antialiased scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(config('services.google.search_console_verification'))
        <meta name="google-site-verification" content="{{ config('services.google.search_console_verification') }}">
    @endif

    @if(config('services.google.tag_id'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.tag_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('services.google.tag_id') }}');
        </script>
    @endif

    @hasSection('seo_meta')
        @yield('seo_meta')
    @else
        <title>Solar Installation, CCTV & Lithium Batteries Karachi | FWB Ventures</title>
        <meta name="description" content="FWB Ventures is Karachi's trusted provider of Solar Panel Installation, Heavy-Duty Solar Frame Structures, CCTV Security Surveillance, and LiFePO4 Lithium Batteries. Call today for a free site assessment.">
        <meta name="keywords" content="fwb ventures, solar installation karachi, solar frame structure karachi, cctv services karachi, lithium battery karachi, lifepo4 battery karachi, net metering karachi">
        <link rel="canonical" href="{{ url()->current() }}">
        <meta property="og:title" content="FWB Ventures | Advanced Solar Energy, Structural Frames, CCTV & Lithium Storage">
        <meta property="og:description" content="Turnkey Solar EPC, Custom Galvanized Mounting Frames, Hikvision/Dahua CCTV Security & LiFePO4 Energy Storage across Karachi, Pakistan.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="twitter:card" content="summary_large_image">
    @endif

    <!-- Global LocalBusiness & Organization Schema.org JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'Organization',
      '@id' => url('/#organization'),
      'name' => config('app.name', 'FWB Ventures'),
      'alternateName' => ['FWB Ventures Karachi', 'FWB Solar & Security Solutions', 'FWB Ventures Pakistan'],
      'url' => url('/'),
      'logo' => [
        '@@type' => 'ImageObject',
        'url' => asset(ltrim($siteLogo ?? '/images/fwb-logo.svg', '/')),
      ],
      'telephone' => '+923012118111',
      'email' => 'info@fwbventures.com',
      'contactPoint' => [
        '@@type' => 'ContactPoint',
        'telephone' => '+923012118111',
        'contactType' => 'customer service',
        'areaServed' => 'PK',
        'availableLanguage' => ['English', 'Urdu'],
      ],
      'address' => [
        '@@type' => 'PostalAddress',
        'streetAddress' => 'Shahrah-e-Faisal, Karachi',
        'addressLocality' => 'Karachi',
        'addressRegion' => 'Sindh',
        'addressCountry' => 'PK',
      ],
      'priceRange' => 'PKR',
      'currenciesAccepted' => 'PKR',
      'areaServed' => [
        'Karachi', 'DHA Karachi', 'Clifton', 'Gulshan-e-Iqbal', 'Gulistan-e-Johar', 
        'North Nazimabad', 'PECHS', 'SITE Industrial Area', 'Korangi', 'Port Qasim', 'Landhi'
      ],
      'sameAs' => [
        'https://www.facebook.com/fwbventures',
        'https://www.linkedin.com/company/fwbventures',
        'https://www.instagram.com/fwbventures',
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Favicon & Device Icons -->
    <link rel="icon" href="{{ asset(ltrim($siteFavicon ?? '/favicon.svg', '/')) }}">
    <link rel="shortcut icon" href="{{ asset(ltrim($siteFavicon ?? '/favicon.ico', '/')) }}">
    <link rel="apple-touch-icon" href="{{ asset(ltrim($siteFavicon ?? '/apple-touch-icon.png', '/')) }}">
    <meta name="theme-color" content="#0f172a">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Red+Hat+Display:wght@600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite Pipeline (Compiled Tailwind CSS v4 & Bundled Lucide Icons) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .prose pre { background-color: #090d16; color: #f8fafc; border-radius: 0.75rem; padding: 1.25rem; overflow-x: auto; }
        .prose img { border-radius: 0.75rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); margin: 2rem auto; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
    @stack('styles')
</head>
<body class="min-h-full flex flex-col font-sans selection:bg-orange-500 selection:text-white bg-slate-50" x-data="{ mobileMenuOpen: false }">

    <!-- Top Hello Bar / Announcement -->
    <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 text-white text-xs py-2 px-4 border-b border-orange-500/25 relative z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
            <div class="flex items-center gap-2 overflow-hidden truncate">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-gradient-to-r from-orange-500/20 to-sky-500/20 text-orange-300 border border-orange-400/30 shrink-0">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse mr-1.5"></span> KARACHI EPC HUB
                </span>
                <span class="text-slate-300 truncate">
                    <strong>FWB Ventures</strong> • Solar Installation, Hot-Dip Galvanized Frames, CCTV Security &amp; LiFePO4 Lithium Batteries • <strong>Free Site Survey in Karachi</strong>
                </span>
            </div>
            <div class="hidden sm:flex items-center gap-4 shrink-0 text-slate-300 font-medium text-xs">
                <a href="tel:+923012118111" class="flex items-center gap-1.5 hover:text-white transition font-bold text-orange-400">
                    <i data-lucide="phone-call" class="w-3.5 h-3.5"></i>
                    <span>+92 301 2118111</span>
                </a>
                <span class="text-slate-700">|</span>
                <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to inquire about Solar, Frames, CCTV or Lithium Batteries.') }}" target="_blank" class="text-emerald-400 hover:text-emerald-300 font-semibold transition flex items-center gap-1">
                    <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                    <span>WhatsApp</span>
                </a>
                <span class="text-slate-700">|</span>
                <a href="{{ route('contact') }}" class="text-sky-300 hover:text-white font-semibold transition flex items-center gap-1">
                    <span>Quick Quote</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-all shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Brand Logo (FWB Ventures) -->
                <div class="flex items-center gap-6 xl:gap-8">
                    <a href="{{ route('home') }}" class="flex items-center shrink-0 py-1 group">
                        <img src="{{ str_starts_with($siteLogo ?? '', 'http') ? $siteLogo : asset(ltrim($siteLogo ?? '/images/fwb-logo.svg', '/')) }}" 
                             alt="{{ $siteTitle ?? config('app.name', 'FWB Ventures') }}" 
                             style="height: {{ $logoHeightDesktop ?? 44 }}px; width: auto;"
                             class="max-w-[280px] object-contain transition-all">
                    </a>

                    <!-- Desktop Nav Links with Dynamic Mega-Menu -->
                    @php
                        $hasHeaderContactLink = isset($headerMenuItems) && $headerMenuItems->contains(function ($menuItem) {
                            $menuPath = trim(parse_url((string) $menuItem->url, PHP_URL_PATH) ?: '', '/');

                            return $menuItem->route_name === 'contact'
                                || in_array(strtolower(trim($menuItem->title)), ['contact', 'contact us'], true)
                                || $menuPath === 'contact-us';
                        });
                    @endphp
                    <nav class="hidden lg:flex items-center gap-3 xl:gap-5 text-sm font-semibold text-slate-800">
                        @if(isset($headerMenuItems) && $headerMenuItems->isNotEmpty())
                            @foreach($headerMenuItems as $item)
                                @php
                                    $itemPath = trim(parse_url((string) $item->url, PHP_URL_PATH) ?: '', '/');
                                    $isContactMenuItem = $item->route_name === 'contact'
                                        || in_array(strtolower(trim($item->title)), ['contact', 'contact us'], true)
                                        || $itemPath === 'contact-us';
                                    $hasRichChildren = $item->activeChildren->isNotEmpty();
                                    $isMegaMenu = $hasRichChildren && $item->activeChildren->contains(fn($c) => $c->activeChildren->isNotEmpty());
                                @endphp

                                @if($isMegaMenu)
                                    <!-- Mega Menu Dropdown -->
                                    <div class="relative group" 
                                         x-data="{ open: false }" 
                                         @mouseenter="open = true" 
                                         @mouseleave="open = false">
                                        <a href="{{ $item->getUrl() }}" 
                                           class="inline-flex items-center gap-1 transition py-2 text-xs xl:text-sm font-bold tracking-tight {{ $item->isActive() ? 'text-orange-600' : 'text-slate-800 hover:text-orange-600' }}">
                                            <span>{{ $item->title }}</span>
                                            <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180 text-orange-500' : 'text-slate-400'"></i>
                                        </a>

                                        <!-- Mega Menu Panel (Wide Multi-Column Grid with Full Complete Words) -->
                                        <div x-show="open" x-cloak 
                                             x-transition:enter="transition ease-out duration-150"
                                             x-transition:enter-start="opacity-0 translate-y-2"
                                             x-transition:enter-end="opacity-100 translate-y-0"
                                             x-transition:leave="transition ease-in duration-100"
                                             x-transition:leave-start="opacity-100 translate-y-0"
                                             x-transition:leave-end="opacity-0 translate-y-2"
                                             class="absolute left-1/2 -translate-x-1/2 top-full w-[95vw] max-w-6xl xl:max-w-7xl bg-white border border-slate-200/90 shadow-2xl rounded-2xl p-6 sm:p-7 z-50 overflow-hidden text-slate-800">
                                            
                                            <!-- Top Category Header Strip -->
                                            <div class="flex items-center justify-between pb-3.5 mb-5 border-b border-slate-100">
                                                <div class="flex items-center gap-2.5">
                                                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
                                                    <h3 class="text-sm font-black uppercase tracking-wider text-slate-900">{{ $item->title }} in Karachi</h3>
                                                    <span class="text-[10px] px-2.5 py-0.5 rounded-full bg-sky-50 text-sky-700 font-bold border border-sky-200">Karachi Turnkey EPC</span>
                                                </div>
                                                <a href="{{ $item->getUrl() }}" class="text-xs font-bold text-orange-600 hover:text-orange-700 hover:underline flex items-center gap-1">
                                                    <span>View Complete Overview &amp; Specifications</span>
                                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                                </a>
                                            </div>

                                            <!-- Multi-Column Grid of Subcategories & Child Links (No Truncation) -->
                                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-6 max-h-[480px] overflow-y-auto pr-3 custom-scrollbar">
                                                @foreach($item->activeChildren as $cat)
                                                    <div class="space-y-2.5">
                                                        <a href="{{ $cat->getUrl() }}" class="font-bold text-xs text-slate-900 hover:text-orange-600 flex items-start gap-2 pb-1.5 border-b border-slate-100 group/title">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-orange-500 mt-1 shrink-0 group-hover/title:scale-125 transition-transform"></span>
                                                            <span class="whitespace-normal break-words leading-snug">{{ $cat->title }}</span>
                                                        </a>
                                                        <ul class="space-y-1.5 text-xs text-slate-600">
                                                            @foreach($cat->activeChildren as $subChild)
                                                                <li>
                                                                    <a href="{{ $subChild->getUrl() }}" class="hover:text-sky-600 hover:translate-x-0.5 transition-all block py-0.5 whitespace-normal break-words leading-snug text-slate-600" title="{{ $subChild->title }}">
                                                                        {{ $subChild->title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Mega Menu Bottom Quick Bar -->
                                            <div class="mt-5 pt-3.5 border-t border-slate-100 bg-slate-50/80 -mx-6 sm:-mx-7 -mb-6 sm:-mb-7 px-6 sm:px-7 py-3.5 flex items-center justify-between text-xs">
                                                <div class="flex items-center gap-5 text-slate-600">
                                                    <span class="flex items-center gap-1 font-semibold"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-500"></i> Free Karachi Site Sizing</span>
                                                    <span class="flex items-center gap-1 font-semibold"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-500"></i> K-Electric Net Metering Turnkey</span>
                                                    <span class="flex items-center gap-1 font-semibold"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-500"></i> Official Manufacturer Warranty</span>
                                                </div>
                                                <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to inquire about '.$item->title) }}" target="_blank" class="font-bold text-orange-600 hover:text-orange-700 flex items-center gap-1.5">
                                                    <i data-lucide="message-circle" class="w-4 h-4 text-emerald-600"></i>
                                                    <span>Instant WhatsApp Inquiry</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                @elseif($hasRichChildren)
                                    <!-- Standard Dropdown Menu -->
                                    <div class="relative" 
                                         x-data="{ open: false }" 
                                         @mouseenter="open = true" 
                                         @mouseleave="open = false">
                                        <a href="{{ $item->getUrl() }}" 
                                           class="inline-flex items-center gap-1 transition py-2 text-xs xl:text-sm font-semibold {{ $item->isActive() ? 'text-orange-600 font-bold' : 'text-slate-800 hover:text-orange-600' }}">
                                            <span>{{ $item->title }}</span>
                                            <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180 text-orange-500' : 'text-slate-400'"></i>
                                        </a>

                                        <div x-show="open" x-cloak 
                                             x-transition:enter="transition ease-out duration-150"
                                             x-transition:enter-start="opacity-0 translate-y-2"
                                             x-transition:enter-end="opacity-100 translate-y-0"
                                             x-transition:leave="transition ease-in duration-100"
                                             x-transition:leave-start="opacity-100 translate-y-0"
                                             x-transition:leave-end="opacity-0 translate-y-2"
                                             class="absolute left-0 top-full w-56 bg-white border border-slate-200/90 shadow-2xl py-1.5 rounded-xl z-50">
                                            @foreach($item->activeChildren as $child)
                                                <a href="{{ $child->getUrl() }}" class="block px-4 py-2 text-xs font-semibold text-slate-800 hover:text-orange-600 hover:bg-orange-50/50 transition">
                                                    {{ $child->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>

                                @else
                                    <!-- Standard Menu Link -->
                                    <a href="{{ $item->getUrl() }}" target="{{ $item->target }}" 
                                       class="{{ $isContactMenuItem ? 'inline-flex items-center justify-center px-4 py-2 text-xs xl:text-sm font-bold text-white bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 shadow-md shadow-orange-500/20 rounded-xl transition whitespace-nowrap' : 'transition py-2 text-xs xl:text-sm font-semibold '.($item->isActive() ? 'text-orange-600 font-bold' : 'text-slate-800 hover:text-orange-600') }}">
                                        {{ $isContactMenuItem ? 'Contact Us' : $item->title }}
                                    </a>
                                @endif
                            @endforeach
                        @else
                            <!-- Fallback Links -->
                            <a href="{{ route('home') }}" class="transition py-2 text-sm font-bold text-orange-600">Home</a>
                            <a href="/service/solar-installation-karachi" class="transition py-2 text-sm font-semibold text-slate-800 hover:text-orange-600">Solar Installation</a>
                            <a href="/service/solar-frame-structure-karachi" class="transition py-2 text-sm font-semibold text-slate-800 hover:text-orange-600">Solar Frame Structure</a>
                            <a href="/service/cctv-services-karachi" class="transition py-2 text-sm font-semibold text-slate-800 hover:text-orange-600">CCTV Services</a>
                            <a href="/service/lithium-batteries-karachi" class="transition py-2 text-sm font-semibold text-slate-800 hover:text-orange-600">Lithium Batteries</a>
                            <a href="{{ route('blog.index') }}" class="transition py-2 text-sm font-semibold text-slate-800 hover:text-orange-600">Blogs</a>
                            <a href="{{ route('about') }}" class="transition py-2 text-sm font-semibold text-slate-800 hover:text-orange-600">About Us</a>
                        @endif
                        @unless($hasHeaderContactLink)
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs xl:text-sm font-bold text-white bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 shadow-md shadow-orange-500/20 rounded-xl transition whitespace-nowrap">Contact Us</a>
                        @endunless
                    </nav>
                </div>

                <!-- Right Side: Admin Link (when authenticated) -->
                @auth
                    <div class="hidden lg:flex items-center gap-2 pl-3 border-l border-slate-200 shrink-0">
                        @if(auth()->user()->canManageContent())
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold rounded-lg bg-slate-900 text-sky-400 hover:bg-slate-800 transition">
                                <i data-lucide="layout-dashboard" class="w-3.5 h-3.5"></i>
                                Admin
                            </a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 transition" title="Logout">
                                <i data-lucide="log-out" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                @endauth

                <!-- Mobile Hamburger Button -->
                <div class="lg:hidden flex items-center gap-2">
                    <a href="tel:+923012118111" class="p-2 text-sky-600 rounded-lg hover:bg-sky-50">
                        <i data-lucide="phone-call" class="w-5 h-5"></i>
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-slate-700 hover:text-slate-900 rounded-lg hover:bg-slate-100">
                        <i data-lucide="menu" class="w-6 h-6" x-show="!mobileMenuOpen"></i>
                        <i data-lucide="x" class="w-6 h-6" x-show="mobileMenuOpen" x-cloak></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Menu Dropdown (Hierarchical Accordion) -->
        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3 shadow-xl max-h-[85vh] overflow-y-auto">
            <div class="flex flex-col space-y-1 text-sm font-semibold text-slate-800">
                @if(isset($headerMenuItems) && $headerMenuItems->isNotEmpty())
                    @foreach($headerMenuItems as $item)
                        @php
                            $itemPath = trim(parse_url((string) $item->url, PHP_URL_PATH) ?: '', '/');
                            $isContactMenuItem = $item->route_name === 'contact'
                                || in_array(strtolower(trim($item->title)), ['contact', 'contact us'], true)
                                || $itemPath === 'contact-us';
                        @endphp
                        @if($item->activeChildren->isNotEmpty())
                            <div x-data="{ open: false }" class="border-b border-slate-100 py-2">
                                <div class="flex items-center justify-between">
                                    <a href="{{ $item->getUrl() }}" class="font-bold text-slate-900 hover:text-sky-600 py-1">
                                        {{ $item->title }}
                                    </a>
                                    <button type="button" @click="open = !open" class="p-1.5 text-slate-400 hover:text-sky-600">
                                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" :class="open ? 'rotate-180 text-sky-600' : ''"></i>
                                    </button>
                                </div>
                                
                                <div x-show="open" x-cloak class="pl-3 pt-2 pb-1 space-y-2 border-l-2 border-sky-400 ml-1">
                                    @foreach($item->activeChildren as $child)
                                        @if($child->activeChildren->isNotEmpty())
                                            <div x-data="{ subOpen: false }" class="py-1">
                                                <div class="flex items-center justify-between">
                                                    <a href="{{ $child->getUrl() }}" class="text-xs font-bold text-slate-800 hover:text-sky-600">
                                                        {{ $child->title }}
                                                    </a>
                                                    <button type="button" @click="subOpen = !subOpen" class="p-1 text-slate-400 hover:text-sky-600">
                                                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform" :class="subOpen ? 'rotate-180 text-sky-600' : ''"></i>
                                                    </button>
                                                </div>
                                                <div x-show="subOpen" x-cloak class="pl-3 pt-1 space-y-1 border-l-2 border-slate-200 ml-1">
                                                    @foreach($child->activeChildren as $subChild)
                                                        <a href="{{ $subChild->getUrl() }}" class="block py-1 text-xs text-slate-600 hover:text-sky-600">
                                                            &bull; {{ $subChild->title }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ $child->getUrl() }}" class="block py-1 text-xs text-slate-600 hover:text-sky-600">
                                                {{ $child->title }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $item->getUrl() }}" class="py-2.5 border-b border-slate-100 hover:text-sky-600 {{ $item->isActive() ? 'text-sky-600 font-bold' : 'text-slate-800' }}">
                                {{ $isContactMenuItem ? 'Contact Us' : $item->title }}
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="pt-4 border-t border-slate-100 space-y-2">
                <a href="tel:+923012118111" class="block w-full py-3 bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white text-center font-bold text-xs rounded-xl transition shadow-md shadow-orange-500/20">
                    Call Hotline: +92 301 2118111
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Global Footer -->
    <footer class="bg-slate-950 text-white border-t border-slate-800 mt-20">
        <!-- Pre-footer CTA Strip -->
        <div class="border-b border-slate-800 bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 py-12 px-4 relative overflow-hidden">
            <!-- Ambient Glows: Solar Orange left, Electric Light Blue right -->
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-orange-500/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-10 -right-10 w-72 h-72 bg-sky-500/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left relative z-10">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gradient-to-r from-orange-500/20 to-sky-500/20 text-orange-300 text-xs font-bold mb-3 border border-orange-500/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Free Karachi Site Assessment &amp; Sizing</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold font-display text-white">Powering Karachi With Solar, Frames, CCTV &amp; Batteries</h3>
                    <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-xl">
                        Turnkey engineering across DHA, Clifton, Gulshan, SITE, and Korangi. Tier-1 PV panels, hot-dip galvanized mounting, AI CCTV surveillance, and Grade-A LiFePO4 cells.
                    </p>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ route('contact') }}" class="px-7 py-3.5 rounded-full bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 hover:from-orange-600 hover:to-amber-600 text-white text-xs font-extrabold shadow-lg shadow-orange-500/30 transition">
                        Request Rapid Quote
                    </a>
                    <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to request a quote.') }}" target="_blank" class="px-7 py-3.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition flex items-center gap-2">
                        <i data-lucide="message-circle" class="w-4 h-4 text-white"></i>
                        <span>WhatsApp Direct</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
                
                <!-- Col 1: Brand & Heritage -->
                <div class="space-y-4 lg:col-span-2">
                    <a href="{{ route('home') }}" class="inline-flex items-center">
                        <img src="{{ str_starts_with($siteLogoWhite ?? '', 'http') ? $siteLogoWhite : asset(ltrim($siteLogoWhite ?? '/images/fwb-logo-white.svg', '/')) }}" 
                             alt="{{ $siteTitle ?? config('app.name', 'FWB Ventures') }}" 
                             style="height: {{ $logoHeightFooter ?? 40 }}px; width: auto;"
                             class="max-w-[260px] object-contain transition-all">
                    </a>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                        FWB Ventures is Karachi's trusted engineering partner for high-yield Solar Installations, Heavy-Duty Hot-Dip Galvanized Mounting Structures, Authorized CCTV Security Systems, and Grade-A LiFePO4 Lithium Battery Storage.
                    </p>
                    <div class="space-y-2 text-xs text-slate-300 pt-2">
                        <div class="flex items-center gap-2">
                            <i data-lucide="phone-call" class="w-4 h-4 text-orange-400"></i>
                            <span class="font-bold text-white">+92 301 2118111</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-sky-400"></i>
                            <a href="mailto:info@fwbventures.com" class="text-slate-300 hover:underline">info@fwbventures.com</a>
                        </div>
                        <div class="flex items-start gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 text-orange-400 shrink-0 mt-0.5"></i>
                            <span class="text-slate-300">Shahrah-e-Faisal / DHA Phase 6, Karachi, Pakistan</span>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Solar Installation -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Solar Solutions</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="/service/solar-installation-karachi" class="hover:text-sky-400 transition">&bull; Residential Solar Systems</a></li>
                        <li><a href="/service/solar-installation-karachi" class="hover:text-sky-400 transition">&bull; Commercial &amp; Industrial Solar</a></li>
                        <li><a href="/service/solar-installation-karachi#types" class="hover:text-sky-400 transition">&bull; On-Grid &amp; Net Metering</a></li>
                        <li><a href="/service/solar-installation-karachi#types" class="hover:text-sky-400 transition">&bull; Hybrid Solar Systems</a></li>
                        <li><a href="/service/solar-installation-karachi#capacity" class="hover:text-sky-400 transition">&bull; 3kW to 100kW+ Capacities</a></li>
                        <li><a href="/service/solar-installation-karachi#prices" class="hover:text-sky-400 transition">&bull; Solar System Prices Karachi</a></li>
                    </ul>
                </div>

                <!-- Col 3: Structures & CCTV -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Frames &amp; CCTV</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="/service/solar-frame-structure-karachi" class="hover:text-sky-400 transition">&bull; Solar Farm Structure Karachi</a></li>
                        <li><a href="/service/solar-frame-structure-karachi#materials" class="hover:text-sky-400 transition">&bull; Hot-Dip Galvanized Frames</a></li>
                        <li><a href="/service/solar-frame-structure-karachi#types" class="hover:text-sky-400 transition">&bull; Rooftop Pergolas &amp; Carports</a></li>
                        <li><a href="/service/cctv-services-karachi" class="hover:text-sky-400 transition">&bull; CCTV Installation Karachi</a></li>
                        <li><a href="/service/cctv-services-karachi#cameras" class="hover:text-sky-400 transition">&bull; IP &amp; 4K Security Cameras</a></li>
                        <li><a href="/service/cctv-services-karachi#services" class="hover:text-sky-400 transition">&bull; CCTV Maintenance &amp; AMC</a></li>
                    </ul>
                </div>

                <!-- Col 4: Lithium Batteries & Areas -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Batteries &amp; Areas</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="/service/lithium-batteries-karachi" class="hover:text-sky-400 transition">&bull; LiFePO4 Lithium Batteries</a></li>
                        <li><a href="/service/lithium-batteries-karachi#residential" class="hover:text-sky-400 transition">&bull; 12V/24V/48V 100Ah-200Ah</a></li>
                        <li><a href="/service/lithium-batteries-karachi#commercial" class="hover:text-sky-400 transition">&bull; 10kWh to 200kWh ESS</a></li>
                        <li><a href="/service/solar-installation-karachi#areas" class="hover:text-sky-400 transition">&bull; DHA &amp; Clifton Karachi</a></li>
                        <li><a href="/service/solar-installation-karachi#areas" class="hover:text-sky-400 transition">&bull; Gulshan &amp; Johar Karachi</a></li>
                        <li><a href="/service/solar-frame-structure-karachi#areas" class="hover:text-sky-400 transition">&bull; SITE &amp; Korangi Industrial</a></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Legal & Compliance -->
            <div class="pt-10 mt-12 border-t border-slate-900 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <div class="flex items-center gap-4 flex-wrap">
                    <p>&copy; {{ date('Y') }} {{ config('app.name', 'FWB Ventures') }} (www.fwbventures.com). All rights reserved.</p>
                    <span class="text-slate-700 hidden sm:inline">&bull;</span>
                    <span class="text-slate-400">Engineering Excellence in Solar, Structures, CCTV &amp; Batteries</span>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" class="hover:text-slate-300">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-slate-300">About Us</a>
                    <a href="{{ route('service.index') }}" class="hover:text-slate-300">Services</a>
                    <a href="{{ route('contact') }}" class="hover:text-slate-300">Contact Us</a>
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-slate-400">Admin Login</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp CTA -->
    <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to inquire about Solar, Frame Structures, CCTV, or Lithium Batteries.') }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 flex items-center gap-2 px-4 py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full shadow-2xl hover:scale-105 transition-all group font-bold text-xs"
       aria-label="Chat on WhatsApp with FWB Ventures">
        <i data-lucide="message-circle" class="w-5 h-5 fill-current"></i>
        <span class="hidden sm:inline">WhatsApp 24/7</span>
    </a>

    <script>
        if (typeof lucide !== 'undefined' && typeof lucide.createIcons === 'function') {
            lucide.createIcons();
        } else if (window.lucide && typeof window.lucide.createIcons === 'function') {
            window.lucide.createIcons();
        }
    </script>
    @stack('scripts')
</body>
</html>
