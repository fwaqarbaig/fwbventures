@extends('layouts.app')

@section('seo_meta')
    <title>Solar Installation, CCTV & Lithium Batteries Karachi | FWB Ventures</title>
    <meta name="description" content="FWB Ventures is Karachi's premier EPC for Solar Panel Installation, Custom Hot-Dip Galvanized Mounting Frames, Hikvision/Dahua CCTV Surveillance, and LiFePO4 Lithium Batteries. Free site survey in Karachi.">
    <meta name="keywords" content="fwb ventures, solar installation karachi, solar frame structure karachi, cctv services karachi, lithium battery karachi, lifepo4 battery in karachi, net metering karachi, solar panel mounting structure karachi">
    <link rel="canonical" href="{{ route('home') }}">
    <meta property="og:title" content="FWB Ventures | Solar, Structural Frames, CCTV & Lithium Energy Storage">
    <meta property="og:description" content="Turnkey Solar Installation, Heavy-Duty Mounting Structures, Advanced CCTV Security & LiFePO4 Batteries in Karachi & Pakistan.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Schema.org WebSite JSON-LD with Sitelinks Searchbox -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'WebSite',
      '@id' => route('home') . '#website',
      'name' => config('app.name', 'FWB Ventures'),
      'alternateName' => ['FWB Ventures Karachi', 'FWB Solar, Frames, CCTV & Batteries'],
      'url' => route('home'),
      'description' => 'Turnkey Solar Installation, Galvanized Solar Farm Structures, CCTV Surveillance Systems, and LiFePO4 Lithium Battery Storage across Karachi, Pakistan.',
      'publisher' => [
        '@id' => url('/#organization'),
      ],
      'potentialAction' => [
        '@@type' => 'SearchAction',
        'target' => [
          '@@type' => 'EntryPoint',
          'urlTemplate' => route('search') . '?q={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Schema.org FAQPage JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'FAQPage',
      'mainEntity' => [
        [
          '@@type' => 'Question',
          'name' => 'How much does solar panel installation cost in Karachi?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'Solar system costs depend on capacity (3kW, 5kW, 10kW, 15kW, or industrial 100kW+), inverter type (On-Grid vs. Hybrid), and battery storage requirements. With electricity tariffs continuing to climb in Karachi, most residential and commercial solar systems achieve full capital payback within 18 to 26 months.',
          ],
        ],
        [
          '@@type' => 'Question',
          'name' => 'Why are heavy-duty hot-dip galvanized mounting structures essential in Karachi?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'Karachi has high coastal humidity and airborne salt mist that rusts ordinary steel structures in less than two years. FWB Ventures manufactures heavy-duty hot-dip galvanized steel frames with 80-120 micron zinc coatings engineered to withstand 140+ km/h coastal wind gusts for 25+ years without corrosion.',
          ],
        ],
        [
          '@@type' => 'Question',
          'name' => 'Why should I replace lead-acid batteries with LiFePO4 Lithium batteries?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'Old tubular and lead-acid batteries only offer 300 to 500 cycles (lasting 1-2 years) and allow only 50% depth of discharge. FWB Ventures LiFePO4 lithium batteries deliver over 6,000 cycles (15+ years), 95% usable capacity, and super-fast 1 to 2 hour charging between load-shedding intervals.',
          ],
        ],
        [
          '@@type' => 'Question',
          'name' => 'Which CCTV brands does FWB Ventures install and support in Karachi?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'We are authorized system integrators for Hikvision, Dahua, Uniview, EZVIZ, Imou, and TP-Link Tapo. We install IP, HD, wireless, and 4K ColorVu night-vision cameras with remote mobile app viewing on iOS and Android.',
          ],
        ],
        [
          '@@type' => 'Question',
          'name' => 'Does FWB Ventures manage K-Electric net metering documentation and green meters?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'Yes. We offer complete turnkey K-Electric net metering processing, from initial feasibility and load sanctioning to NEPRA licensing, equipment testing, and bi-directional green meter installation.',
          ],
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endsection

@section('content')
<div class="space-y-20 sm:space-y-28 overflow-hidden">

    <!-- ================= 1. HERO SECTION ================= -->
    <section class="relative overflow-hidden pt-12 pb-20 lg:pt-20 lg:pb-32 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white">
        <!-- Ambient Dual-Tone Glows: Radiant Solar Orange left, Electric Light Blue right -->
        <div class="absolute top-10 left-10 w-96 h-96 bg-orange-500/20 blur-[150px] rounded-full pointer-events-none"></div>
        <div class="absolute top-1/4 right-10 w-[550px] h-[350px] bg-sky-500/20 blur-[150px] rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left Column: Copy & Actions -->
                <div class="lg:col-span-7 space-y-6 text-left">
                    <!-- Hero Top Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gradient-to-r from-orange-500/15 via-white/5 to-sky-500/15 backdrop-blur-md border border-orange-400/30 text-xs font-bold text-orange-300 shadow-lg shadow-slate-950/40">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Karachi's Premier Energy &amp; Security EPC</span>
                        <span class="text-white/40">|</span>
                        <span class="text-slate-300 font-semibold">Free Sizing &amp; Assessment</span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-display tracking-tight leading-[1.1] text-white">
                        Power Your Future with <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-300 to-sky-400">FWB Ventures</span>
                    </h1>

                    <!-- Tagline / Subtitle -->
                    <div class="space-y-3">
                        <p class="text-base sm:text-lg text-slate-200 font-bold leading-snug">
                            <span class="text-orange-400">Solar Installation</span> &bull; <span class="text-sky-300">Mounting Structures</span> &bull; <span class="text-sky-300">CCTV Security</span> &bull; <span class="text-orange-400">Lithium Batteries</span>
                        </p>
                        <p class="text-sm sm:text-base text-slate-300 font-normal leading-relaxed">
                            FWB Ventures delivers comprehensive clean energy, heavy structural engineering, and smart security solutions across Karachi. From residential rooftops in DHA &amp; Clifton to massive industrial manufacturing plants in SITE &amp; Korangi, we engineer systems that lower electricity bills, protect premises, and eliminate load-shedding.
                        </p>
                    </div>

                    <!-- CTAs -->
                    <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                        <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to inquire about Solar, Frame Structures, CCTV or Lithium Batteries.') }}" 
                           target="_blank"
                           class="px-8 py-4 rounded-full bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 hover:from-orange-600 hover:to-amber-600 text-slate-950 font-black text-sm shadow-xl shadow-orange-500/30 hover:scale-105 transition-all flex items-center justify-center gap-2 group">
                            <i data-lucide="message-circle" class="w-4 h-4 text-slate-950"></i>
                            <span>Chat on WhatsApp: +92 301 2118111</span>
                        </a>
                        <a href="{{ route('contact') }}" 
                           class="px-7 py-4 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-sm border-2 border-sky-400/70 hover:border-sky-300 backdrop-blur-md transition flex items-center justify-center gap-2">
                            <span>Request Free Site Sizing</span>
                            <i data-lucide="arrow-right" class="w-4 h-4 text-sky-400"></i>
                        </a>
                    </div>

                    <!-- Trust Micro-Badges -->
                    <div class="pt-4 flex flex-wrap items-center gap-4 sm:gap-6 text-xs text-slate-300 font-medium">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="sun" class="w-4 h-4 text-orange-400"></i>
                            <span>K-Electric Net-Metering</span>
                        </div>
                        <span class="text-slate-700 hidden sm:inline">&bull;</span>
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="shield-check" class="w-4 h-4 text-emerald-400"></i>
                            <span>140 km/h Wind Structures</span>
                        </div>
                        <span class="text-slate-700 hidden sm:inline">&bull;</span>
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="battery-charging" class="w-4 h-4 text-orange-400"></i>
                            <span>6000+ Cycles LiFePO4</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: 4-Pillars Quick Grid Card -->
                <div class="lg:col-span-5">
                    <div class="rounded-3xl border border-slate-800 bg-slate-900/80 backdrop-blur-md p-6 shadow-2xl space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                            <div>
                                <h3 class="font-extrabold text-white text-base">4 Flagship Divisions</h3>
                                <p class="text-xs text-slate-400">Integrated Turnkey Solutions in Karachi</p>
                            </div>
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-gradient-to-r from-orange-500/20 to-sky-500/20 text-orange-300 border border-orange-500/30">FWB Verified</span>
                        </div>

                        <!-- 4 Mini Division Tiles -->
                        <div class="grid grid-cols-2 gap-3">
                            <a href="/service/solar-installation-karachi" class="p-3.5 rounded-2xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/60 hover:border-orange-500/50 transition group">
                                <div class="w-8 h-8 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <i data-lucide="sun" class="w-4 h-4"></i>
                                </div>
                                <h4 class="text-xs font-bold text-white group-hover:text-orange-300 transition">Solar Installation</h4>
                                <p class="text-[10px] text-slate-400 mt-1 leading-tight">3kW-100kW+ On-Grid, Hybrid &amp; Net Metering</p>
                            </a>

                            <a href="/service/solar-frame-structure-karachi" class="p-3.5 rounded-2xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/60 hover:border-sky-500/50 transition group">
                                <div class="w-8 h-8 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <i data-lucide="grid" class="w-4 h-4"></i>
                                </div>
                                <h4 class="text-xs font-bold text-white group-hover:text-sky-300 transition">Frame Structures</h4>
                                <p class="text-[10px] text-slate-400 mt-1 leading-tight">Hot-Dip Galvanized &amp; Aluminium Rooftop/Farm</p>
                            </a>

                            <a href="/service/cctv-services-karachi" class="p-3.5 rounded-2xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/60 hover:border-sky-500/50 transition group">
                                <div class="w-8 h-8 rounded-xl bg-sky-500/20 text-sky-400 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <i data-lucide="video" class="w-4 h-4"></i>
                                </div>
                                <h4 class="text-xs font-bold text-white group-hover:text-sky-300 transition">CCTV Services</h4>
                                <p class="text-[10px] text-slate-400 mt-1 leading-tight">Hikvision, Dahua, IP, 4K Night Vision &amp; AMC</p>
                            </a>

                            <a href="/service/lithium-batteries-karachi" class="p-3.5 rounded-2xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700/60 hover:border-orange-500/50 transition group">
                                <div class="w-8 h-8 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <i data-lucide="battery-charging" class="w-4 h-4"></i>
                                </div>
                                <h4 class="text-xs font-bold text-white group-hover:text-orange-300 transition">Lithium Batteries</h4>
                                <p class="text-[10px] text-slate-400 mt-1 leading-tight">12V/24V/48V 100Ah-200Ah &amp; 5-200kWh ESS</p>
                            </a>
                        </div>

                        <!-- Direct Inquiry Strip Inside Hero Card -->
                        <div class="pt-3 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                            <span>Karachi Technical Support:</span>
                            <a href="tel:+923012118111" class="font-bold text-orange-400 hover:text-orange-300 flex items-center gap-1">
                                <i data-lucide="phone" class="w-3.5 h-3.5"></i>
                                <span>+92 301 2118111</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ================= 2. STATS STRIP ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 sm:-mt-14 relative z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 sm:p-8 rounded-3xl bg-white border border-slate-200 shadow-xl">
            <div class="text-center p-4 border-r border-slate-100 last:border-none">
                <div class="text-3xl sm:text-4xl font-black font-display text-slate-900 tracking-tight">4 Pillars</div>
                <div class="text-xs font-bold text-orange-600 uppercase tracking-wider mt-1">Solar, Frames, CCTV, ESS</div>
                <p class="text-[11px] text-slate-500 mt-0.5">Under One Single Roof</p>
            </div>
            <div class="text-center p-4 border-r border-slate-100 last:border-none">
                <div class="text-3xl sm:text-4xl font-black font-display text-slate-900 tracking-tight">140+ km/h</div>
                <div class="text-xs font-bold text-sky-600 uppercase tracking-wider mt-1">Wind Resilience</div>
                <p class="text-[11px] text-slate-500 mt-0.5">Engineered for Karachi Coast</p>
            </div>
            <div class="text-center p-4 border-r border-slate-100 last:border-none">
                <div class="text-3xl sm:text-4xl font-black font-display text-slate-900 tracking-tight">6,000+</div>
                <div class="text-xs font-bold text-orange-600 uppercase tracking-wider mt-1">LiFePO4 Cycles</div>
                <p class="text-[11px] text-slate-500 mt-0.5">15+ Year Battery Lifespan</p>
            </div>
            <div class="text-center p-4">
                <div class="text-3xl sm:text-4xl font-black font-display text-slate-900 tracking-tight">100%</div>
                <div class="text-xs font-bold text-sky-600 uppercase tracking-wider mt-1">Karachi Coverage</div>
                <p class="text-[11px] text-slate-500 mt-0.5">DHA, Clifton, SITE, Korangi</p>
            </div>
        </div>
    </section>

    <!-- ================= 3. THE 4 FLAGSHIP SERVICES SHOWCASE ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-12">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-to-r from-orange-500/10 to-sky-500/10 text-orange-700 text-xs font-extrabold uppercase tracking-wider border border-orange-500/20">
                <i data-lucide="layers" class="w-3.5 h-3.5 fill-current"></i>
                <span>Our Core Offerings</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black font-display text-slate-950 tracking-tight">
                Engineered Solutions Tailored for Karachi’s Power &amp; Security Needs
            </h2>
            <p class="text-sm text-slate-600">
                Explore our 4 dedicated service departments designed to provide sustainable energy independence, heavy structural integrity, and uncompromising security.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Service 1: Solar Installation -->
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="sun" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-orange-50 text-orange-800 border border-orange-200">On-Grid &amp; Hybrid</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-orange-600 transition">
                        Solar Installation in Karachi
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Turnkey EPC solar solutions from 3kW residential bungalows to 500kW+ industrial manufacturing plants. Full K-Electric net metering documentation, Tier-1 PV panels, and guaranteed zero-downtime hybrid configurations.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-700">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Residential 3kW, 5kW, 10kW, 15kW Systems</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Commercial &amp; Industrial Solar (20kW to 100kW+)</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Bi-Directional K-Electric Net Metering Approvals</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> 25-Year Linear Performance Warranty</li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="/service/solar-installation-karachi" class="font-bold text-xs sm:text-sm text-orange-600 hover:text-orange-700 flex items-center gap-1.5">
                        <span>Explore Solar Installation</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="/service/solar-installation-karachi#prices" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Price Guide &rarr;
                    </a>
                </div>
            </div>

            <!-- Service 2: Solar Frame Structure -->
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 text-sky-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="grid" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border border-sky-200">Heavy Galvanized</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-sky-600 transition">
                        Solar Frame Structure in Karachi
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Heavy-duty hot-dip galvanized steel (80-120 micron) and high-strength aluminium (AL6005-T5) mounting structures designed specifically for Karachi’s corrosive coastal climate and high wind speeds.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-700">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Ground-Mounted &amp; Rooftop Solar Structures</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Elevated Rooftop Pergolas &amp; Solar Carports</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> 140+ km/h Wind Resistance Engineering</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Wholesale Supply for EPC Contractors in SITE &amp; Korangi</li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="/service/solar-frame-structure-karachi" class="font-bold text-xs sm:text-sm text-sky-600 hover:text-sky-700 flex items-center gap-1.5">
                        <span>Explore Frame Structures</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="/service/solar-frame-structure-karachi#pricing" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Fabrication Rates &rarr;
                    </a>
                </div>
            </div>

            <!-- Service 3: CCTV Services -->
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 text-sky-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="video" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border border-sky-200">Hikvision &amp; Dahua</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-sky-600 transition">
                        CCTV Services in Karachi
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Authorized IP, HD, and wireless security camera installation, cabling, DVR/NVR configuration, and annual maintenance contracts (AMC) for residences, corporate offices, warehouses, and factories.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-700">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> 4K Ultra-HD &amp; ColorVu 24/7 Full-Color Night Vision</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> IP PoE Cameras &amp; High-Speed PTZ Patrol Cameras</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Seamless Mobile App Live Streaming &amp; Alerts</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Corporate Annual Maintenance Contracts (AMC)</li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="/service/cctv-services-karachi" class="font-bold text-xs sm:text-sm text-sky-600 hover:text-sky-700 flex items-center gap-1.5">
                        <span>Explore CCTV Services</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="/service/cctv-services-karachi#pricing" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Camera Packages &rarr;
                    </a>
                </div>
            </div>

            <!-- Service 4: Lithium Batteries -->
            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="battery-charging" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-orange-50 text-orange-800 border border-orange-200">LiFePO4 Chemistry</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-orange-600 transition">
                        Lithium Batteries in Karachi
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Upgrade from obsolete lead-acid batteries to Grade-A Lithium Iron Phosphate (LiFePO4) energy storage. 6,000+ deep cycles, 15-year lifespan, super-fast 1-2 hour charging, and zero maintenance.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-700">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> 12V 100Ah/200Ah, 24V &amp; 48V/51.2V Wall-Mount Units</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> 5kWh &amp; 10kWh Home Solar Battery Storage</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Commercial &amp; Industrial ESS (20kWh to 200kWh)</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-500"></i> Built-in Smart BMS with Inverter Communications</li>
                    </ul>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="/service/lithium-batteries-karachi" class="font-bold text-xs sm:text-sm text-orange-600 hover:text-orange-700 flex items-center gap-1.5">
                        <span>Explore Lithium Batteries</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="/service/lithium-batteries-karachi#pricing" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Battery Pricing &rarr;
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= 4. INTERACTIVE SIZING CALCULATOR ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 border border-slate-800 p-8 sm:p-12 text-white"
             x-data="{
                monthlyBill: 45000,
                calculate() {
                    let units = this.monthlyBill / 65;
                    let kw = Math.ceil((units / 120) * 10) / 10;
                    if (kw < 3) kw = 3;
                    return {
                        units: Math.round(units),
                        systemKw: Math.min(Math.max(Math.round(kw), 3), 100),
                        savings: Math.round(this.monthlyBill * 0.85),
                        batteryKwh: Math.round(kw * 0.8)
                    };
                }
             }">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-6 space-y-5">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gradient-to-r from-orange-500/20 to-sky-500/20 text-orange-300 text-xs font-bold border border-orange-500/30">
                        <i data-lucide="calculator" class="w-3.5 h-3.5"></i>
                        <span>Karachi Solar &amp; Battery Estimator</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black font-display tracking-tight text-white">
                        Estimate Your System Size &amp; Monthly Bill Savings
                    </h2>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Move the slider to reflect your average monthly K-Electric bill in PKR. See your recommended solar capacity, battery requirement, and estimated monthly savings:
                    </p>

                    <!-- Slider Input -->
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center justify-between text-xs font-bold">
                            <span class="text-slate-400">Monthly K-Electric Bill:</span>
                            <span class="text-orange-400 text-lg font-black" x-text="'PKR ' + Number(monthlyBill).toLocaleString()"></span>
                        </div>
                        <input type="range" 
                               min="15000" 
                               max="300000" 
                               step="5000" 
                               x-model="monthlyBill" 
                               class="w-full h-2.5 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-orange-500">
                        <div class="flex items-center justify-between text-[11px] text-slate-500 font-semibold">
                            <span>PKR 15,000</span>
                            <span>PKR 150,000</span>
                            <span>PKR 300,000+</span>
                        </div>
                    </div>
                </div>

                <!-- Sizing Output Card -->
                <div class="lg:col-span-6">
                    <div class="p-6 sm:p-8 rounded-2xl bg-slate-800/80 border border-slate-700/80 space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-700">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Recommended Solar</span>
                                <div class="text-2xl sm:text-3xl font-black text-orange-400 mt-1" x-text="calculate().systemKw + ' kW'"></div>
                                <span class="text-[11px] text-slate-400">On-Grid or Hybrid</span>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-700">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Est. Monthly Savings</span>
                                <div class="text-2xl sm:text-3xl font-black text-emerald-400 mt-1" x-text="'PKR ' + calculate().savings.toLocaleString()"></div>
                                <span class="text-[11px] text-slate-400">~85% Bill Reduction</span>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-700">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">LiFePO4 Storage</span>
                                <div class="text-xl sm:text-2xl font-black text-sky-400 mt-1" x-text="calculate().batteryKwh + ' - ' + (calculate().batteryKwh + 5) + ' kWh'"></div>
                                <span class="text-[11px] text-slate-400">Full Night Backup</span>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-700">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Frame Structure</span>
                                <div class="text-base sm:text-lg font-black text-white mt-1">Elevated Galvanized</div>
                                <span class="text-[11px] text-slate-400">140 km/h Wind Rated</span>
                            </div>
                        </div>

                        <a href="https://wa.me/923012118111?text=Hello%20FWB%20Ventures%2C%20I%20would%20like%20to%20get%20a%20detailed%20quotation%20for%20Solar%20and%20Lithium%20Batteries%20in%20Karachi."
                           :href="'https://wa.me/923012118111?text=' + encodeURIComponent('Hello FWB Ventures, my monthly electricity bill is PKR ' + Number(monthlyBill).toLocaleString() + '. I would like to get a detailed quotation for a ' + calculate().systemKw + ' kW Solar System with Lithium Batteries.')"
                           target="_blank"
                           class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-orange-500 via-amber-500 to-sky-500 hover:from-orange-600 hover:to-sky-600 text-slate-950 font-black text-xs sm:text-sm text-center flex items-center justify-center gap-2 shadow-lg shadow-orange-500/20 transition">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>Get Itemized Quotation for this Sizing</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 5. WHY CHOOSE FWB VENTURES ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-12">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-800 text-xs font-extrabold uppercase tracking-wider border border-emerald-500/20">
                <i data-lucide="award" class="w-3.5 h-3.5 fill-current"></i>
                <span>Engineering Excellence</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black font-display text-slate-950 tracking-tight">
                Why Karachi Homeowners &amp; Industries Trust FWB Ventures
            </h2>
            <p class="text-sm text-slate-600">
                We combine deep technical expertise, in-house fabrication, certified brand partnerships, and uncompromising quality standards.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-sky-500/10 text-sky-600 flex items-center justify-center">
                    <i data-lucide="shield" class="w-5 h-5"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-base">Coastal Climate Engineering</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Karachi’s salt air and humidity destroy generic metals. Our structures are hot-dip galvanized with 80-120 micron coatings, fastened with SS304 stainless steel bolts, guaranteeing 25+ years without rust.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="file-check-2" class="w-5 h-5"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-base">Turnkey K-Electric Net Metering</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    We handle the entire net-metering pipeline: load sanctioning, DISCO inspections, NEPRA licensing, and green meter installation so you sell excess solar power back to the grid with zero paperwork stress.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-sm space-y-3">
                <div class="w-10 h-10 rounded-xl bg-sky-500/10 text-sky-600 flex items-center justify-center">
                    <i data-lucide="cpu" class="w-5 h-5"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-base">Grade-A LiFePO4 Chemistry</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    We strictly supply brand-new Grade-A Lithium Iron Phosphate prismatic cells with smart active cell balancing BMS. No recycled EV cells or risky second-hand batteries.
                </p>
            </div>
        </div>
    </section>

    <!-- ================= 6. KARACHI AREAS COVERAGE ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-8 sm:p-12 rounded-3xl bg-slate-100 border border-slate-200 space-y-8">
            <div class="text-center max-w-2xl mx-auto space-y-2">
                <h3 class="text-xl sm:text-3xl font-black font-display text-slate-900">
                    Comprehensive Installation Across All Karachi Areas
                </h3>
                <p class="text-xs sm:text-sm text-slate-600">
                    Our technical installation and emergency maintenance teams are dispatched daily throughout Karachi's residential, commercial, and industrial hubs:
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 text-xs">
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    DHA Karachi (Phases 1-8)
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    Clifton &amp; Sea View
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    Gulshan-e-Iqbal
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    Gulistan-e-Johar
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    North Nazimabad
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    PECHS &amp; Tariq Road
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    Scheme 33 &amp; Super Highway
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    Korangi Industrial Area
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    SITE Industrial Area
                </div>
                <div class="p-3 rounded-xl bg-white border border-slate-200/80 font-semibold text-slate-800 text-center hover:border-sky-500 transition">
                    Port Qasim &amp; Landhi
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 7. FREQUENTLY ASKED QUESTIONS ================= -->
    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-3 mb-10">
            <h2 class="text-2xl sm:text-3xl font-black font-display text-slate-900">
                Frequently Asked Questions
            </h2>
            <p class="text-xs sm:text-sm text-slate-600">
                Clear answers regarding solar panel installation, custom structures, CCTV cameras, and lithium batteries in Karachi.
            </p>
        </div>

        <div class="space-y-4">
            <details class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs group">
                <summary class="font-bold text-slate-900 cursor-pointer flex items-center justify-between text-sm sm:text-base">
                    <span>How much will a solar system reduce my monthly K-Electric bill?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    A properly sized on-grid or hybrid solar system typically reduces monthly K-Electric bills by 70% to 90%. When enrolled in net metering, many of our residential and commercial clients in Karachi achieve net-zero or negative utility bills where K-Electric owes them credits.
                </div>
            </details>

            <details class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs group">
                <summary class="font-bold text-slate-900 cursor-pointer flex items-center justify-between text-sm sm:text-base">
                    <span>Will solar panels withstand severe monsoon winds and coastal storms in Karachi?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Yes. All FWB Ventures mounting structures are structurally engineered for wind loads exceeding 140 km/h. We use hot-dip galvanized heavy gauge steel, solid concrete ballasts or chemical anchor bolts, and stainless steel fasteners designed specifically to resist coastal storms.
                </div>
            </details>

            <details class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs group">
                <summary class="font-bold text-slate-900 cursor-pointer flex items-center justify-between text-sm sm:text-base">
                    <span>How many hours will a LiFePO4 Lithium battery run my inverter AC?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    A standard 1.5-ton DC inverter AC consumes approximately 800 to 1,200 watts per hour after stabilizing room temperature. A 48V 100Ah (5.12 kWh) lithium battery will comfortably run one inverter AC plus basic lights/fans for 4 to 5 hours, while a 10 kWh battery bank powers it through an entire 8-to-10 hour night.
                </div>
            </details>

            <details class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs group">
                <summary class="font-bold text-slate-900 cursor-pointer flex items-center justify-between text-sm sm:text-base">
                    <span>Can I view my CCTV cameras on my smartphone when outside Pakistan?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="mt-3 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                    Yes. We configure genuine cloud P2P mobile viewing (Hik-Connect, DMSS, EZVIZ) on your iOS or Android smartphone. You can watch live feeds, view playback archives, and receive motion alert notifications from anywhere in the world.
                </div>
            </details>
        </div>
    </section>

    @if((isset($featuredPost) && $featuredPost) || (isset($latestPosts) && $latestPosts->isNotEmpty()))
    <!-- ================= LATEST ENGINEERING GUIDES & ARTICLES ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center max-w-3xl mx-auto space-y-2 mb-10">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-sky-500/10 text-sky-700 border border-sky-500/20 uppercase tracking-wider">
                <i data-lucide="book-open" class="w-3.5 h-3.5 fill-current"></i>
                Technical Knowledge Base
            </span>
            <h2 class="text-2xl sm:text-4xl font-black font-display text-slate-950">
                Latest Engineering &amp; Installation Guides
            </h2>
            <p class="text-xs sm:text-sm text-slate-600">
                In-depth technical guides, solar sizing rules, K-Electric net metering documentation, and security best practices for Karachi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @if(isset($featuredPost) && $featuredPost)
                <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-xl transition-all flex flex-col justify-between group">
                    @if($featuredPost->featured_image)
                        <div class="aspect-video w-full overflow-hidden bg-slate-100">
                            <img src="{{ $featuredPost->featured_image }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full bg-sky-500/10 text-sky-700 border border-sky-500/20">Featured Guide</span>
                            <h3 class="font-extrabold text-lg text-slate-900 group-hover:text-sky-600 transition mt-3">
                                <a href="{{ route('post.show', $featuredPost->slug) }}">{{ $featuredPost->title }}</a>
                            </h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($featuredPost->content), 120) }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-slate-100 mt-4 flex items-center justify-between">
                            <a href="{{ route('post.show', $featuredPost->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-600 hover:text-sky-700">
                                <span>Read Technical Guide</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @endif

            @foreach($latestPosts as $post)
                <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-xl transition-all flex flex-col justify-between group">
                    @if($post->featured_image)
                        <div class="aspect-video w-full overflow-hidden bg-slate-100">
                            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-extrabold text-base text-slate-900 group-hover:text-sky-600 transition">
                                <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>
                        </div>
                        <div class="pt-4 border-t border-slate-100 mt-4 flex items-center justify-between">
                            <a href="{{ route('post.show', $post->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-600 hover:text-sky-700">
                                <span>Read Technical Guide</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition">
                <span>View All Technical Knowledge Guides</span>
                <i data-lucide="arrow-right" class="w-4 h-4 text-sky-400"></i>
            </a>
        </div>
    </section>
    @endif

    <!-- ================= 8. INQUIRY / CONTACT FORM SECTION ================= -->
    <section id="contact-booking" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="p-8 sm:p-12 rounded-3xl bg-white border border-slate-200 shadow-xl space-y-6">
            <div class="text-center space-y-2">
                <span class="text-xs font-bold text-sky-600 uppercase tracking-wider">Fast Response Guaranteed</span>
                <h2 class="text-2xl sm:text-3xl font-black font-display text-slate-950">
                    Book a Free Site Survey or Request an Itemized Quote
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 max-w-xl mx-auto">
                    Fill out the form below. An FWB Ventures senior engineer will review your site requirements and contact you within 2 hours.
                </p>
            </div>

            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">Your Full Name *</label>
                        <input type="text" name="name" required placeholder="e.g. Tariq Ahmed" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">Phone / WhatsApp Number *</label>
                        <input type="tel" name="phone" required placeholder="e.g. 0300 1234567" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">Email Address (Optional)</label>
                        <input type="email" name="email" placeholder="e.g. name@company.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">Primary Service Needed *</label>
                        <select name="service" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500 bg-white">
                            <option value="Solar Installation">Solar Installation (Residential / Commercial)</option>
                            <option value="Solar Frame Structure">Solar Frame Structure &amp; Fabrication</option>
                            <option value="CCTV Services">CCTV Security &amp; Surveillance Systems</option>
                            <option value="Lithium Batteries">LiFePO4 Lithium Batteries &amp; ESS</option>
                            <option value="Multiple Solutions">Multiple / Turnkey Project</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1">Installation Location in Karachi *</label>
                    <input type="text" name="location" required placeholder="e.g. DHA Phase 6, Clifton Block 4, Korangi Industrial Area, etc." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-800 mb-1">Project Details / Monthly Bill / Camera Count</label>
                    <textarea name="message" rows="3" placeholder="Tell us about your requirements (e.g., average monthly electricity bill, rooftop type, or number of CCTV cameras needed)..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500"></textarea>
                </div>

                <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-sky-600 via-sky-500 to-emerald-500 hover:from-sky-700 hover:to-blue-600 text-white font-extrabold text-sm shadow-lg shadow-sky-600/25 transition">
                    Submit Inquiry for Free Engineering Assessment
                </button>
            </form>
        </div>
    </section>

</div>
@endsection
