@extends('layouts.app')

@section('seo_meta')
    <title>404 - Page Not Found | {{ config('app.name', 'FWB Ventures') }}</title>
    <meta name="description" content="The page or equipment specification you requested could not be located. Explore our heavy-duty diesel generator fleet from 50 to 2500 kVA or contact our 24/7 power dispatch team.">
    <meta name="robots" content="noindex, follow">
@endsection

@section('content')
<div class="min-h-[70vh] bg-slate-900 text-white flex items-center justify-center py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Ambient Power Glow -->
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-3xl w-full text-center space-y-8 relative z-10">
        <!-- 404 Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-sky-500/20 text-sky-400 border border-sky-500/30">
            <i data-lucide="zap-off" class="w-4 h-4 text-sky-400"></i>
            <span>Power Route Unavailable &bull; HTTP 404</span>
        </div>

        <div class="space-y-4">
            <h1 class="text-6xl sm:text-8xl font-black font-display tracking-tight text-white">
                4<span class="text-sky-500">0</span>4
            </h1>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Equipment Page or Specification Not Found
            </h2>
            <p class="text-slate-400 text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
                The URL you requested may have been relocated, upgraded, or is no longer in service. Choose a primary destination below to get back on track or contact our 24/7 technical team.
            </p>
        </div>

        <!-- Search Bar -->
        <div class="max-w-md mx-auto">
            <form action="{{ route('blog.index') }}" method="GET" class="relative">
                <input type="text" name="q" placeholder="Search generator sizing, fleet specs, services..."
                       class="w-full pl-11 pr-4 py-3 text-xs sm:text-sm rounded-2xl bg-slate-800/90 text-white placeholder-slate-400 border border-slate-700 focus:outline-none focus:ring-2 focus:ring-sky-500/50 focus:border-sky-500">
                <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-4 top-3.5 sm:top-4"></i>
            </form>
        </div>

        <!-- Quick Navigation Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4 text-left">
            <a href="{{ route('service.show', 'solar-solutions-karachi') }}" class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700/80 hover:border-orange-400 hover:bg-slate-800 transition group block">
                <div class="w-9 h-9 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                    <i data-lucide="sun" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold text-white group-hover:text-orange-400 transition">Solar Systems</h3>
                <p class="text-xs text-slate-400 mt-1">3kW to 100kW residential & commercial on-grid and hybrid solar installations.</p>
            </a>

            <a href="{{ route('service.show', 'lithium-battery-in-karachi') }}" class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700/80 hover:border-sky-400 hover:bg-slate-800 transition group block">
                <div class="w-9 h-9 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                    <i data-lucide="battery-charging" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold text-white group-hover:text-sky-400 transition">Lithium Batteries</h3>
                <p class="text-xs text-slate-400 mt-1">Grade-A LiFePO4 batteries, 5.12 kWh Powerwalls, and telecom rack units.</p>
            </a>

            <a href="{{ route('service.show', 'cctv-solutions-karachi') }}" class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700/80 hover:border-sky-400 hover:bg-slate-800 transition group block">
                <div class="w-9 h-9 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold text-white group-hover:text-sky-400 transition">CCTV Security</h3>
                <p class="text-xs text-slate-400 mt-1">4K IP surveillance cameras, NVR monitoring packages across Karachi.</p>
            </a>
        </div>

        <!-- Emergency Hotline Banner -->
        <div class="pt-6 border-t border-slate-800/80 flex flex-wrap items-center justify-center gap-4 text-xs">
            <span class="text-slate-400">Need solar or CCTV guidance?</span>
            <a href="tel:+923012118111" class="inline-flex items-center gap-1.5 font-bold text-sky-400 hover:text-sky-300 transition">
                <i data-lucide="phone-call" class="w-3.5 h-3.5"></i>
                <span>+92 301 2118111</span>
            </a>
            <span class="text-slate-600 hidden sm:inline">&bull;</span>
            <a href="https://wa.me/923012118111" target="_blank" class="inline-flex items-center gap-1.5 font-bold text-emerald-400 hover:text-emerald-300 transition">
                <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                <span>WhatsApp 24/7</span>
            </a>
            <span class="text-slate-600 hidden sm:inline">&bull;</span>
            <a href="{{ route('home') }}" class="text-slate-300 hover:text-white underline transition">
                Return to Homepage &rarr;
            </a>
        </div>
    </div>
</div>
@endsection
