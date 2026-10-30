@extends('layouts.app')

@section('seo_meta')
    <title>Services in Karachi | Solar, Mounting Frames, CCTV & Lithium Storage | {{ config('app.name', 'FWB Ventures') }}</title>
    <meta name="description" content="FWB Ventures provides comprehensive Solar Installation, Hot-Dip Galvanized Mounting Structures, Hikvision & Dahua CCTV Surveillance, and LiFePO4 Lithium Energy Storage in Karachi, Pakistan.">
    <meta name="keywords" content="solar installation karachi, solar frame structure karachi, cctv services karachi, lithium battery karachi, solar mounting structure karachi, fwb ventures services">
    <link rel="canonical" href="{{ route('service.index') }}">
    <meta property="og:title" content="Services in Karachi | Solar, Frames, CCTV & Lithium Batteries | {{ config('app.name', 'FWB Ventures') }}">
    <meta property="og:description" content="Explore our 4 core engineering divisions: Solar EPC, Structural Steel Frames, Smart CCTV Surveillance, and LiFePO4 Energy Storage across Karachi.">
    <meta property="og:url" content="{{ route('service.index') }}">
    <meta property="og:type" content="website">

    <!-- Schema.org ItemList JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'ItemList',
      'name' => 'FWB Ventures Core Services Karachi',
      'itemListElement' => $services->map(function($s, $idx) {
          return [
              '@@type' => 'ListItem',
              'position' => $idx + 1,
              'name' => $s->title,
              'url' => route('service.show', $s->slug),
              'description' => $s->seo_description,
          ];
      })->values()->all(),
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Schema.org BreadcrumbList JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'BreadcrumbList',
      'itemListElement' => [
        [
          '@type' => 'ListItem',
          'position' => 1,
          'name' => 'Home',
          'item' => route('home'),
        ],
        [
          '@type' => 'ListItem',
          'position' => 2,
          'name' => 'Services',
          'item' => route('service.index'),
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen">

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-b from-slate-950 via-slate-900 to-slate-900 text-white pt-24 pb-20 overflow-hidden">
        <div class="absolute inset-0 opacity-15 pointer-events-none" style="background-image: radial-gradient(#0ea5e9 1px, transparent 1px); background-size: 28px 28px;"></div>
        <div class="absolute -top-36 right-0 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-8" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-sky-400 transition">Home</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-600"></i>
                <span class="text-sky-400 font-semibold">Services</span>
            </nav>

            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-sky-500/15 text-sky-400 border border-sky-500/30 mb-6 backdrop-blur-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>TURNKEY SOLAR, STRUCTURES, CCTV &amp; ESS &bull; KARACHI EPC</span>
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black font-display tracking-tight leading-tight">
                    Engineering Services <span class="bg-gradient-to-r from-sky-400 via-cyan-200 to-emerald-400 bg-clip-text text-transparent">in Karachi</span>
                </h1>
                <p class="mt-6 text-lg sm:text-xl text-slate-300 leading-relaxed font-light">
                    FWB Ventures provides comprehensive turnkey engineering across Karachi. From Tier-1 Solar PV installations and 140+ km/h wind-resistant hot-dip galvanized mounting structures to Hikvision &amp; Dahua 4K CCTV surveillance and 6,000+ cycle LiFePO4 battery energy storage.
                </p>
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#services-grid" class="px-6 py-3.5 rounded-xl font-bold text-sm bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-slate-950 shadow-lg shadow-sky-500/20 transition flex items-center gap-2">
                        <span>Explore Our Services</span>
                        <i data-lucide="arrow-down" class="w-4 h-4"></i>
                    </a>
                    <a href="tel:+923012118111" class="px-6 py-3.5 rounded-xl font-bold text-sm bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 transition flex items-center gap-2">
                        <i data-lucide="phone-call" class="w-4 h-4 text-sky-400"></i>
                        <span>Hotline: +92 301 2118111</span>
                    </a>
                </div>
            </div>

            <!-- Stats Bar -->
            <div class="mt-16 pt-10 border-t border-slate-800 grid grid-cols-2 md:grid-cols-4 gap-6 text-slate-300">
                <div>
                    <div class="text-3xl font-black text-white font-display">4 Divisions</div>
                    <div class="text-xs text-slate-400 mt-1">Solar, Frames, CCTV &amp; ESS</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-white font-display">140+ km/h</div>
                    <div class="text-xs text-slate-400 mt-1">Wind Load Structural Rating</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-white font-display">6,000+</div>
                    <div class="text-xs text-slate-400 mt-1">LiFePO4 Deep Discharge Cycles</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-white font-display">100%</div>
                    <div class="text-xs text-slate-400 mt-1">Karachi Metro Coverage</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid Section -->
    <section id="services-grid" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-sky-600">Integrated Capabilities</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight mt-2 font-display">
                Engineered for Karachi's Urban &amp; Industrial Demands
            </h2>
            <p class="mt-4 text-slate-600 text-base">
                Each service is backed by experienced certified engineers, premium materials, and complete turnkey execution across DHA, Clifton, Gulshan, Korangi, and SITE.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($services as $svc)
                <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-sky-300 transition-all duration-300 flex flex-col justify-between p-8 group">
                    <div>
                        <!-- Icon & Tag -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 group-hover:bg-sky-500 group-hover:text-slate-950 transition-all duration-300 flex items-center justify-center shadow-inner">
                                <i data-lucide="{{ $svc->icon ?: 'zap' }}" class="w-6 h-6"></i>
                            </div>
                            @if($svc->hero_badge)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-sky-50 text-sky-800 border border-sky-200 max-w-[280px] truncate">
                                    {{ $svc->hero_badge }}
                                </span>
                            @endif
                        </div>

                        <!-- Title & Tagline -->
                        <h3 class="text-2xl font-black text-slate-900 group-hover:text-sky-600 transition font-display">
                            <a href="{{ route('service.show', $svc->slug) }}">
                                {{ $svc->title }}
                            </a>
                        </h3>

                        @if($svc->tagline)
                            <p class="text-xs font-semibold text-slate-500 mt-1">{{ $svc->tagline }}</p>
                        @endif

                        <p class="text-sm text-slate-600 leading-relaxed mt-4 line-clamp-3">
                            {{ $svc->summary }}
                        </p>

                        <!-- Key Features Checklist -->
                        @if(!empty($svc->features) && is_array($svc->features))
                            <div class="mt-6 pt-6 border-t border-slate-100 space-y-2">
                                @foreach(array_slice($svc->features, 0, 4) as $feat)
                                    <div class="flex items-start gap-2 text-xs text-slate-700">
                                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5"></i>
                                        <span>{{ $feat }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ route('service.show', $svc->slug) }}" class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-sky-600 hover:text-sky-700 transition">
                            <span>Explore Details &amp; Specifications</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                        <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to inquire about ' . $svc->title) }}" target="_blank" class="p-2 text-emerald-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-xl transition" title="Inquire on WhatsApp">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 text-slate-500 text-sm">
                    Services are currently being updated. Please check back shortly.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Bottom Contact Strip -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="p-8 sm:p-12 rounded-3xl bg-slate-900 text-white flex flex-col md:flex-row items-center justify-between gap-6 border border-slate-800">
            <div class="space-y-2 text-center md:text-left">
                <h3 class="text-2xl font-black font-display text-white">Need a Custom Turnkey Project in Karachi?</h3>
                <p class="text-xs sm:text-sm text-slate-300 max-w-xl">
                    Our structural, electrical, and security engineers offer complimentary site assessments, roof load calculations, and K-Electric feasibility studies.
                </p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('contact') }}" class="px-6 py-3.5 rounded-xl font-bold text-xs sm:text-sm bg-sky-500 hover:bg-sky-400 text-slate-950 transition shadow-lg">
                    Book Site Survey
                </a>
                <a href="https://wa.me/923012118111" target="_blank" class="px-6 py-3.5 rounded-xl font-bold text-xs sm:text-sm bg-emerald-600 hover:bg-emerald-500 text-white transition flex items-center gap-2">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
