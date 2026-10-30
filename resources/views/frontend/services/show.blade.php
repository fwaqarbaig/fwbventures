@extends('layouts.app')

@section('seo_meta')
    <title>{{ $service->seo_title }}</title>
    <meta name="description" content="{{ $service->seo_description }}">
    @if($service->meta_keywords)
        <meta name="keywords" content="{{ $service->meta_keywords }}">
    @endif
    <link rel="canonical" href="{{ route('service.show', $service->slug) }}">
    <meta name="robots" content="{{ $service->is_indexable ? 'index, follow' : 'noindex, nofollow' }}">
    <meta property="og:title" content="{{ $service->og_title ?: $service->seo_title }}">
    <meta property="og:description" content="{{ $service->og_description ?: $service->seo_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('service.show', $service->slug) }}">
    @if($service->seo_image)
        <meta property="og:image" content="{{ $service->seo_image }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">

    <!-- Schema.org Service JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'Service',
      'name' => $service->title,
      'serviceType' => $service->focus_keyword ?: $service->title,
      'description' => $service->seo_description,
      'url' => route('service.show', $service->slug),
      'provider' => [
        '@@type' => 'Organization',
        '@@id' => url('/#organization'),
        'name' => config('app.name', 'FWB Ventures'),
        'url' => url('/'),
        'address' => [
          '@@type' => 'PostalAddress',
          'addressLocality' => 'Karachi',
          'addressRegion' => 'Sindh',
          'addressCountry' => 'PK',
        ],
      ],
      'areaServed' => [
        ['@@type' => 'City', 'name' => 'Karachi'],
        ['@@type' => 'AdministrativeArea', 'name' => 'Sindh'],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'BreadcrumbList',
      'itemListElement' => [
        [
          '@@type' => 'ListItem',
          'position' => 1,
          'name' => 'Home',
          'item' => route('home'),
        ],
        [
          '@@type' => 'ListItem',
          'position' => 2,
          'name' => 'Services',
          'item' => route('service.index'),
        ],
        [
          '@@type' => 'ListItem',
          'position' => 3,
          'name' => $service->title,
          'item' => route('service.show', $service->slug),
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    @if(!empty($service->faqs) && count($service->faqs) > 0)
    <!-- FAQPage Schema -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'FAQPage',
      'mainEntity' => array_map(function($faq) {
          return [
              '@@type' => 'Question',
              'name' => $faq['question'],
              'acceptedAnswer' => [
                  '@@type' => 'Answer',
                  'text' => $faq['answer'],
              ],
          ];
      }, $service->faqs),
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @endif

    <x-schema-json-ld :schema="$service->schema_markup" />
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen">

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-b from-slate-950 via-slate-900 to-slate-900 text-white pt-20 pb-16 overflow-hidden">
        <div class="absolute inset-0 opacity-15 pointer-events-none" style="background-image: radial-gradient(#0ea5e9 1px, transparent 1px); background-size: 28px 28px;"></div>
        <div class="absolute -top-32 right-10 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-6" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-sky-400 transition">Home</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-600"></i>
                <a href="{{ route('service.index') }}" class="hover:text-sky-400 transition">Services</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-600"></i>
                <span class="text-sky-400 font-semibold">{{ $service->title }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-8">
                    @if($service->hero_badge)
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-sky-500/15 text-sky-400 border border-sky-500/30 mb-5 backdrop-blur-sm">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>{{ $service->hero_badge }}</span>
                        </div>
                    @endif

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black font-display tracking-tight leading-tight">
                        {{ $service->title }}
                    </h1>

                    @if($service->tagline)
                        <p class="mt-3.5 text-base sm:text-lg text-sky-300/90 font-medium font-sans">
                            {{ $service->tagline }}
                        </p>
                    @endif

                    <p class="mt-5 text-sm sm:text-base text-slate-300 leading-relaxed font-light">
                        {{ $service->summary }}
                    </p>

                    <!-- 4 Value Proposition Cards Tailored by Pillar -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-8">
                        @if($service->isSolar())
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="sun" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">Tier-1 N-Type PV</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Longi &amp; Jinko 550W+</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="activity" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">K-Electric Net Metering</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Turnkey Green Meter</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="shield" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">140+ km/h Frames</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Hot-Dip Galvanized</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="award" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">25-Year Warranty</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Linear Power Guarantee</div>
                            </div>
                        @elseif($service->isSolarFrame())
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="hammer" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">ASTM A123 Zinc</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">80-120 Micron Anti-Rust</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="wind" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">140–160 km/h Rated</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Coastal Storm Tested</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="layers" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">L2 / L3 / L4 Elevated</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Custom Rooftop Designs</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="check-circle" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">SS304 Fasteners</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Anti-Theft Clamping</div>
                            </div>
                        @elseif($service->isCctv())
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="camera" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">4K &amp; ColorVu</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">24/7 Color Night Vision</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="cpu" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">AcuSense AI</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Human &amp; Vehicle Filter</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="smartphone" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">Live Mobile View</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Hik-Connect / DMSS</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">Genuine Hardware</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Official Warranty &amp; AMC</div>
                            </div>
                        @else
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="battery-charging" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">LiFePO4 Chemistry</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">6,000+ Deep Cycles</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">15-Year Life</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Zero Acid / Zero Refills</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2">
                                    <i data-lucide="cpu" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">Smart CAN/RS485 BMS</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Auto Inverter Comms</div>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80 backdrop-blur-sm">
                                <div class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-2">
                                    <i data-lucide="thermometer" class="w-4 h-4"></i>
                                </div>
                                <div class="text-xs font-bold text-white">55°C Proof</div>
                                <div class="text-[11px] text-slate-400 mt-0.5">Built for Karachi Heat</div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="#quote-box" class="px-6 py-3.5 rounded-xl font-bold text-xs sm:text-sm bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-slate-950 shadow-lg shadow-sky-500/20 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                            <span>Request Karachi Site Survey &amp; Quote</span>
                            <i data-lucide="arrow-down" class="w-4 h-4"></i>
                        </a>
                        <a href="tel:+923012118111" class="px-6 py-3.5 rounded-xl font-bold text-xs sm:text-sm bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 transition flex items-center gap-2">
                            <i data-lucide="phone-call" class="w-4 h-4 text-sky-400"></i>
                            <span>Call: +92 301 2118111</span>
                        </a>
                        <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I need pricing & site inspection for ' . $service->title) }}" target="_blank" class="px-5 py-3.5 rounded-xl font-bold text-xs sm:text-sm bg-emerald-600 hover:bg-emerald-500 text-white shadow-lg shadow-emerald-600/20 transition flex items-center gap-2">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-4">
                    @if($service->featured_image_url)
                        <div class="space-y-2">
                            <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl bg-slate-800 aspect-[4/3] relative group">
                                <img src="{{ $service->featured_image_url }}" 
                                     alt="{{ $service->featured_image_alt }}" 
                                     title="{{ $service->featured_image_title }}" 
                                     width="800"
                                     height="600"
                                     loading="eager"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute bottom-3 left-3 right-3 p-3 rounded-2xl bg-slate-950/80 backdrop-blur-md border border-white/10 text-xs text-white flex items-center justify-between">
                                    <span class="font-bold">Verified EPC Project</span>
                                    <span class="text-sky-400 font-semibold">Karachi, Pakistan</span>
                                </div>
                            </div>
                            @if($service->featured_image_caption)
                                <p class="text-[11px] text-slate-400 italic text-center px-2">
                                    {{ $service->featured_image_caption }}
                                </p>
                            @endif
                        </div>
                    @else
                        <div class="p-8 rounded-3xl bg-slate-800/80 border border-slate-700/80 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-sky-500/20 text-sky-400 flex items-center justify-center">
                                <i data-lucide="{{ $service->icon ?: 'zap' }}" class="w-6 h-6"></i>
                            </div>
                            <h4 class="text-base font-bold text-white font-display">Karachi Engineering Discipline</h4>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                Backed by certified electrical engineers, ASTM A123 hot-dip structural fabrication, official K-Electric net metering approvals, and 24/7 on-call technical support across all Karachi zones.
                            </p>
                            <div class="pt-2 border-t border-slate-700 flex items-center justify-between text-xs text-sky-400">
                                <span>Zero Carbon Footprint</span>
                                <span class="text-emerald-400 font-bold">100% Turnkey</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Engineering & Equipment Partners Bar -->
    <section class="py-5 bg-slate-900 border-y border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-6 text-slate-400 text-xs font-semibold">
                <span class="text-slate-500 uppercase tracking-widest text-[11px]">Hardware &amp; Compliance Standards:</span>
                <span class="hover:text-sky-400 transition flex items-center gap-1.5"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-400"></i> K-Electric Net-Metering</span>
                <span class="hover:text-sky-400 transition flex items-center gap-1.5"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-400"></i> NEPRA SRO 1325</span>
                <span class="hover:text-sky-400 transition flex items-center gap-1.5"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-400"></i> ASTM A123 Hot-Dip Zinc</span>
                <span class="hover:text-sky-400 transition flex items-center gap-1.5"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-400"></i> Hikvision &amp; Dahua</span>
                <span class="hover:text-sky-400 transition flex items-center gap-1.5"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-400"></i> LiFePO4 Grade-A Cells</span>
                <span class="hover:text-sky-400 transition flex items-center gap-1.5"><i data-lucide="check-circle" class="w-3.5 h-3.5 text-emerald-400"></i> ISO 9001:2015</span>
            </div>
        </div>
    </section>

    <!-- Main Content Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- Left 8 Columns: Service Body & Detailed Sections -->
            <main class="lg:col-span-8 space-y-12">

                <!-- Service WYSIWYG Content (Rich Tables & Specs with Complete Competitor Research) -->
                <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-600 mb-2">
                        <i data-lucide="book-open" class="w-4 h-4"></i>
                        <span>Technical Guide &amp; Analysis</span>
                    </div>
                    <div class="prose prose-slate prose-amber max-w-none text-slate-700 leading-relaxed">
                        {!! $service->content !!}
                    </div>
                </div>

                <!-- Features & Technical Specifications -->
                @if(!empty($service->features) && is_array($service->features))
                    <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm space-y-6">
                        <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-600">
                            <i data-lucide="shield-check" class="w-4 h-4"></i>
                            <span>Engineered Standards</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 font-display">
                            Technical Features &amp; Engineering Specifications
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                            @foreach($service->features as $feature)
                                <div class="flex items-start gap-3 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                    <div class="w-5 h-5 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="check" class="w-3.5 h-3.5"></i>
                                    </div>
                                    <span class="text-xs font-medium text-slate-800 leading-relaxed">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Turnkey Benefits -->
                @if(!empty($service->benefits) && is_array($service->benefits))
                    <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm space-y-6">
                        <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-emerald-600">
                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                            <span>Commercial &amp; Operational Advantages</span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 font-display">
                            Why Karachi Property Owners Choose FWB Ventures
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                            @foreach($service->benefits as $benefit)
                                <div class="flex items-start gap-3 p-4 rounded-2xl bg-emerald-50/50 border border-emerald-100">
                                    <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 mt-0.5">
                                        <i data-lucide="zap" class="w-3.5 h-3.5"></i>
                                    </div>
                                    <span class="text-xs font-medium text-slate-800 leading-relaxed">{{ $benefit }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 4-Step Turnkey Execution Process Guide -->
                <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm space-y-8">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-600">
                        <i data-lucide="arrow-right-circle" class="w-4 h-4"></i>
                        <span>How We Deliver</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 font-display">
                        Our 4-Step Turnkey EPC &amp; Installation Process
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                        <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2">
                            <div class="w-8 h-8 rounded-xl bg-sky-500 text-slate-950 font-black flex items-center justify-center text-sm">1</div>
                            <h4 class="font-bold text-slate-900 text-sm">On-Site Audit &amp; 3D Shading Simulation</h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Our certified engineers inspect your rooftop structural load capacity, perform drone 3D shadow simulation, and evaluate existing K-Electric IBC billing meter specs.
                            </p>
                        </div>
                        <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2">
                            <div class="w-8 h-8 rounded-xl bg-sky-500 text-slate-950 font-black flex items-center justify-center text-sm">2</div>
                            <h4 class="font-bold text-slate-900 text-sm">Precision Engineering &amp; Frame Fabrication</h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                We design custom hot-dip galvanized mounting structures rated for 140+ km/h coastal winds and build electrical Single-Line Diagrams (SLDs) for KE compliance.
                            </p>
                        </div>
                        <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2">
                            <div class="w-8 h-8 rounded-xl bg-sky-500 text-slate-950 font-black flex items-center justify-center text-sm">3</div>
                            <h4 class="font-bold text-slate-900 text-sm">Installation &amp; Net Metering Commissioning</h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Professional panel clamping, pure copper earthing boring (<5 ohms), DC surge protection, and end-to-end K-Electric green bidirectional meter commissioning.
                            </p>
                        </div>
                        <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2">
                            <div class="w-8 h-8 rounded-xl bg-sky-500 text-slate-950 font-black flex items-center justify-center text-sm">4</div>
                            <h4 class="font-bold text-slate-900 text-sm">24/7 Mobile Telemetry &amp; Lifetime Support</h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Real-time smartphone monitoring app setup, battery health management, periodic panel cleaning protocols, and fast-response maintenance across Karachi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Locations We Cover Across Karachi -->
                <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-slate-950 text-white rounded-3xl p-8 sm:p-10 border border-slate-800 shadow-xl space-y-6">
                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-400">
                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                        <span>Karachi-Wide Coverage</span>
                    </div>
                    <h3 class="text-2xl font-black font-display tracking-tight">
                        Turnkey Services Across All Karachi Districts &amp; Industrial Zones
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Our certified EPC engineering teams deploy daily across all key residential, commercial, and industrial hubs in Karachi:
                    </p>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2">
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">DHA Karachi</div>
                            <div class="text-[10px] text-slate-400">Phases 1 to 8 &amp; Ext</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Clifton Karachi</div>
                            <div class="text-[10px] text-slate-400">Blocks 1 to 9 &amp; Sea View</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Gulshan-e-Iqbal</div>
                            <div class="text-[10px] text-slate-400">Blocks 1 to 19 &amp; University Rd</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Gulistan-e-Johar</div>
                            <div class="text-[10px] text-slate-400">Blocks 1 to 20 &amp; Pehlwan Goth</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">North Nazimabad</div>
                            <div class="text-[10px] text-slate-400">Blocks A to W &amp; Hyderi</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">PECHS &amp; Tariq Rd</div>
                            <div class="text-[10px] text-slate-400">Blocks 2, 3, 6 &amp; Khalid Bin Waleed</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Korangi Industrial Area</div>
                            <div class="text-[10px] text-slate-400">Sector 7A to 32 &amp; Creek</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">SITE Industrial Area</div>
                            <div class="text-[10px] text-slate-400">Heavy Industrial Estate</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Scheme 33 &amp; Malir Cantt</div>
                            <div class="text-[10px] text-slate-400">Super Highway Societies</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Federal B Area</div>
                            <div class="text-[10px] text-slate-400">Blocks 1 to 22 &amp; Yaseenabad</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Port Qasim &amp; Landhi</div>
                            <div class="text-[10px] text-slate-400">Export Processing Zone</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-slate-800/80 border border-slate-700/80">
                            <div class="font-bold text-xs text-white">Bahria Town Karachi</div>
                            <div class="text-[10px] text-slate-400">Precincts 1 to 35</div>
                        </div>
                    </div>
                </div>

                <!-- Nearby Karachi Areas Block for Area Pages -->
                @if(isset($nearbyAreaServices) && $nearbyAreaServices->isNotEmpty())
                    <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-orange-600">Karachi Localized Coverage</span>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-900 font-display mt-1">
                                    Nearby Karachi Areas for This Service
                                </h3>
                                <p class="text-xs text-slate-500 mt-1">
                                    Our mobile EPC engineering teams provide rapid on-site surveys and turnkey deployment across adjacent Karachi districts:
                                </p>
                            </div>
                            @if(isset($parentService))
                                <a href="{{ route('service.show', $parentService->slug) }}" class="text-xs font-bold text-sky-600 hover:underline hidden sm:inline-flex items-center gap-1 shrink-0">
                                    <span>Main Service Hub &rarr;</span>
                                </a>
                            @endif
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                            @foreach($nearbyAreaServices as $areaSvc)
                                <a href="{{ route('service.show', $areaSvc->slug) }}" class="p-3 rounded-2xl bg-slate-50 hover:bg-orange-50/80 border border-slate-200/80 hover:border-orange-300 text-xs font-bold text-slate-700 hover:text-orange-950 transition flex items-center justify-between group">
                                    <span class="truncate">{{ $areaSvc->title }}</span>
                                    <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-400 group-hover:text-orange-600 group-hover:translate-x-0.5 transition shrink-0 ml-1"></i>
                                </a>
                            @endforeach
                        </div>

                        @if(isset($parentService))
                            <div class="pt-2 text-center sm:text-left">
                                <a href="{{ route('service.show', $parentService->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-700 hover:text-sky-800 transition">
                                    <span>&larr; View Central Karachi Service Overview: {{ $parentService->title }}</span>
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Silo Hub: Guides & Resources Section -->
                @if(isset($isSiloHub) && $isSiloHub && isset($siloGuides) && $siloGuides->isNotEmpty())
                    <div class="bg-gradient-to-br from-white to-orange-50/30 rounded-3xl p-8 sm:p-10 border border-orange-200/90 shadow-sm space-y-6">
                        <div class="flex items-center justify-between border-b border-orange-100 pb-4">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-orange-600">Silo Knowledge Hub</span>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-900 font-display mt-1">
                                    Guides &amp; Technical Sizing Resources
                                </h3>
                                <p class="text-xs text-slate-500 mt-1">
                                    Comprehensive engineering guides, pricing comparisons, and sizing manuals in this discipline:
                                </p>
                            </div>
                            <a href="{{ route('blog.index') }}" class="text-xs font-bold text-orange-600 hover:underline hidden sm:inline-flex items-center gap-1 shrink-0">
                                <span>Browse All Articles &rarr;</span>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($siloGuides as $guide)
                                <article class="p-4 rounded-2xl bg-white border border-slate-200/90 hover:border-orange-300 hover:shadow-xs transition group flex flex-col justify-between space-y-2">
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-orange-600 transition line-clamp-2">
                                        <a href="{{ route('post.show', $guide->slug) }}">{{ $guide->title }}</a>
                                    </h4>
                                    <div class="flex items-center justify-between text-[11px] text-slate-400 pt-1">
                                        <span>{{ $guide->reading_time ?? 6 }} min read</span>
                                        <span class="font-bold text-orange-600">Read &rarr;</span>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Specialized Cross-Linking Grid (Connecting All 4 FWB Ventures Pillars) -->
                <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm space-y-8">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-sky-600">Cross-Discipline Solutions</span>
                        <h3 class="text-2xl font-black text-slate-900 font-display mt-1">FWB Ventures 4 Engineering Divisions</h3>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2">
                            Integrate our turnkey clean energy, mounting fabrication, security surveillance, and battery storage services for maximum property value and security.
                        </p>
                    </div>

                    <!-- Division 1: Solar Installation -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-2">
                            <i data-lucide="sun" class="w-4 h-4 text-sky-500"></i>
                            <span>Solar Installation &amp; K-Electric Net Metering</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="/service/solar-installation-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-installation-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Solar Installation Karachi</a>
                            <a href="/service/solar-panel-installation-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-panel-installation-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Solar Panel Installation</a>
                            <a href="/service/solar-solutions-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-solutions-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Solar Solutions</a>
                            <a href="/service/solar-systems-by-type-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-systems-by-type-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">On-Grid &amp; Hybrid Systems</a>
                            <a href="/service/solar-systems-by-capacity-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-systems-by-capacity-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Capacity Sizing (3kW - 100kW+)</a>
                            <a href="/service/solar-system-prices-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-system-prices-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Solar System Prices 2026</a>
                        </div>
                    </div>

                    <!-- Division 2: Solar Frame Structure -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-2">
                            <i data-lucide="frame" class="w-4 h-4 text-emerald-600"></i>
                            <span>Hot-Dip Galvanized Solar Frames &amp; Mounting</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="/service/solar-frame-structure-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-frame-structure-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Solar Frame Structures</a>
                            <a href="/service/solar-mounting-structures-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-mounting-structures-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Rooftop &amp; Ground Mount</a>
                            <a href="/service/solar-structure-types-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-structure-types-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">L2, L3 &amp; Elevated Pergolas</a>
                            <a href="/service/solar-structure-materials-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-structure-materials-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">ASTM A123 Galvanized Steel</a>
                            <a href="/service/solar-structures-by-application-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'solar-structures-by-application-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Industrial &amp; Carport Frames</a>
                        </div>
                    </div>

                    <!-- Division 3: CCTV Services -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-2">
                            <i data-lucide="camera" class="w-4 h-4 text-sky-600"></i>
                            <span>CCTV Surveillance, IP Cameras &amp; AMC</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="/service/cctv-services-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'cctv-services-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">CCTV Services Karachi</a>
                            <a href="/service/cctv-cameras-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'cctv-cameras-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">IP &amp; WiFi Security Cameras</a>
                            <a href="/service/cctv-solutions-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'cctv-solutions-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Home &amp; Commercial Security</a>
                            <a href="/service/cctv-services-installation-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'cctv-services-installation-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">CCTV Installation &amp; AMC</a>
                            <a href="/service/cctv-camera-prices-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'cctv-camera-prices-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">CCTV Prices &amp; Packages</a>
                        </div>
                    </div>

                    <!-- Division 4: Lithium Batteries -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-2">
                            <i data-lucide="battery-charging" class="w-4 h-4 text-emerald-500"></i>
                            <span>Grade-A LiFePO4 Lithium Batteries</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="/service/lithium-batteries-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'lithium-batteries-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Lithium Batteries Karachi</a>
                            <a href="/service/residential-lithium-batteries-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'residential-lithium-batteries-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Residential 12V, 24V, 48V (5kWh)</a>
                            <a href="/service/commercial-industrial-lithium-batteries-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'commercial-industrial-lithium-batteries-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Commercial &amp; Industrial Storage (10-200kWh)</a>
                            <a href="/service/lithium-battery-prices-karachi" class="px-3.5 py-2 rounded-xl text-xs font-semibold {{ $service->slug === 'lithium-battery-prices-karachi' ? 'bg-sky-500 text-slate-950 font-bold' : 'bg-slate-50 hover:bg-sky-50 text-slate-700 hover:text-sky-900 border border-slate-200/80 hover:border-sky-300' }} transition">Lithium Battery Rates in Karachi</a>
                        </div>
                    </div>
                </div>

                <!-- Related Engineering Guides & Technical Articles -->
                @if(isset($relatedPosts) && $relatedPosts->isNotEmpty())
                    <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/90 shadow-sm space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div>
                                <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-sky-600 mb-1">
                                    <i data-lucide="book-open" class="w-4 h-4"></i>
                                    <span>Engineering Knowledge Base</span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-900 font-display">
                                    Related Technical Sizing &amp; Installation Guides
                                </h3>
                            </div>
                            <a href="{{ route('blog.index') }}" class="text-xs font-bold text-sky-700 hover:text-sky-800 hidden sm:inline-flex items-center gap-1">
                                <span>All 320 Guides &rarr;</span>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($relatedPosts as $rPost)
                                <article class="p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-sky-300 hover:shadow-xs transition group flex flex-col justify-between space-y-3">
                                    <div class="space-y-1.5">
                                        <span class="text-[10px] font-bold uppercase text-sky-600 tracking-wider">
                                            {{ $rPost->categories->first()?->name ?? 'Engineering Guide' }}
                                        </span>
                                        <h4 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-sky-600 transition line-clamp-2">
                                            <a href="{{ route('post.show', $rPost->slug) }}">{{ $rPost->title }}</a>
                                        </h4>
                                    </div>
                                    <div class="flex items-center justify-between pt-2 border-t border-slate-200/60 text-[11px] text-slate-400">
                                        <span>{{ $rPost->reading_time ?? 8 }} min read</span>
                                        <span class="font-bold text-sky-600 group-hover:translate-x-1 transition inline-flex items-center gap-1">Read Guide &rarr;</span>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif

            </main>

            <!-- Right 4 Columns: Quote Request & Navigator Sidebar -->
            <aside class="lg:col-span-4">
                <div class="sticky top-28 space-y-6">
                    @include('frontend.partials.service-sidebar', [
                        'service' => $service,
                        'otherServices' => $otherServices
                    ])
                </div>
            </aside>

        </div>
    </div>

</div>
@endsection
