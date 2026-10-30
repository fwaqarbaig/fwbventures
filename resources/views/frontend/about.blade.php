@extends('layouts.app')

@section('seo_meta')
    <title>About Us | {{ config('app.name', 'FWB Ventures') }} - Solar EPC, Structures, CCTV &amp; Lithium Storage Karachi</title>
    <meta name="description" content="Discover FWB Ventures, Karachi's premier engineering enterprise delivering turnkey Solar PV Installations, Hot-Dip Galvanized Mounting Structures, AI CCTV Security, and LiFePO4 Lithium Batteries.">
    <meta name="keywords" content="about fwb ventures, solar company karachi, solar frame manufacturer karachi, cctv installer karachi, lithium battery supplier karachi, net metering epc karachi">
    <link rel="canonical" href="{{ route('about') }}">
    <meta property="og:title" content="About FWB Ventures | Advanced Clean Energy &amp; Security Engineering">
    <meta property="og:description" content="Engineering high-yield Solar Installations, Heavy-Duty Mounting Frames, AI CCTV Surveillance &amp; LiFePO4 Energy Storage across Karachi, Pakistan.">
    <meta property="og:url" content="{{ route('about') }}">
    <meta property="og:type" content="website">

    <!-- Schema.org AboutPage JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'AboutPage',
      '@id' => route('about') . '#aboutpage',
      'name' => 'About FWB Ventures',
      'description' => 'Karachi premier engineering enterprise specializing in Solar Installation, Heavy-Duty Mounting Frame Structures, CCTV Security Systems, and LiFePO4 Lithium Energy Storage.',
      'url' => route('about'),
      'mainEntity' => [
        '@id' => url('/#organization'),
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Schema.org BreadcrumbList JSON-LD -->
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
          'name' => 'About Us',
          'item' => route('about'),
        ],
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
          'name' => 'Where is FWB Ventures located and which areas do you serve in Karachi?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'FWB Ventures operates from Shahrah-e-Faisal and DHA Karachi, providing complete turnkey engineering services across DHA (Phases 1-8), Clifton, Bahria Town Karachi, Gulshan-e-Iqbal, Gulistan-e-Johar, PECHS, North Nazimabad, SITE Industrial Area, Korangi Industrial Area, and Port Qasim.',
          ],
        ],
        [
          '@@type' => 'Question',
          'name' => 'Does FWB Ventures manage complete K-Electric net metering documentation?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'Yes. We offer end-to-end turnkey K-Electric net metering facilitation, including initial load assessment, technical wiring testing, NEPRA generation license application, DISCO approval, and bi-directional green meter installation.',
          ],
        ],
        [
          '@@type' => 'Question',
          'name' => 'Why does FWB Ventures manufacture hot-dip galvanized mounting structures specifically for Karachi?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'Karachi coastal air carries airborne sea salt and heavy humidity that corrodes painted or pre-galvanized iron within 18 months. FWB Ventures manufactures heavy-duty hot-dip galvanized structures with an 80 to 120 micron protective zinc bath (ASTM A123) engineered to withstand 140+ km/h coastal wind gusts for 25+ maintenance-free years.',
          ],
        ],
        [
          '@@type' => 'Question',
          'name' => 'What warranties are provided across FWB Ventures solar, battery, and CCTV systems?',
          'acceptedAnswer' => [
            '@@type' => 'Answer',
            'text' => 'We supply authentic Tier-1 equipment backed by official manufacturer warranties: 25-year linear performance warranty on solar panels, 5 to 10 year warranty on hybrid inverters, 5-year replacement warranty on Grade-A LiFePO4 batteries, 10-year anti-rust structural warranty on galvanized frames, and 1 to 2 year warranty on Hikvision and Dahua CCTV systems.',
          ],
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen space-y-20 sm:space-y-28 overflow-hidden">

    <!-- ================= 1. HERO SECTION (ORANGE & LIGHT BLUE AMBIENCE) ================= -->
    <section class="relative bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white pt-20 pb-20 sm:pb-28 overflow-hidden">
        <!-- Ambient Dual-Color Lighting -->
        <div class="absolute -top-20 -left-20 w-[500px] h-[500px] bg-orange-500/20 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="absolute top-1/4 -right-20 w-[550px] h-[450px] bg-sky-500/20 rounded-full blur-[160px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-slate-400 mb-8" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-1">
                    <i data-lucide="home" class="w-3.5 h-3.5"></i>
                    <span>Home</span>
                </a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-slate-600"></i>
                <span class="text-orange-400 font-bold">About Us</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-8 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-orange-500/20 to-sky-500/20 text-orange-300 border border-orange-400/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>KARACHI'S PREMIER EPC &amp; ENGINEERING ENTERPRISE</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-display tracking-tight leading-[1.1]">
                        Pioneering Clean Energy &amp; <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-300 to-sky-400">Intelligent Security</span> in Karachi
                    </h1>

                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed font-normal max-w-2xl">
                        <strong>FWB Ventures</strong> is an integrated turnkey engineering partner delivering heavy-duty <a href="{{ route('service.show', 'solar-installation-karachi') }}" class="text-orange-400 hover:underline font-semibold">Solar Panel Installations</a>, custom <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}" class="text-sky-300 hover:underline font-semibold">Hot-Dip Galvanized Mounting Structures</a>, enterprise <a href="{{ route('service.show', 'cctv-services-karachi') }}" class="text-sky-300 hover:underline font-semibold">CCTV Surveillance Systems</a>, and Grade-A <a href="{{ route('service.show', 'lithium-batteries-karachi') }}" class="text-orange-400 hover:underline font-semibold">LiFePO4 Lithium Energy Storage</a> across Karachi and Sindh.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="#divisions" class="px-7 py-3.5 rounded-full bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 hover:from-orange-600 hover:to-amber-600 text-slate-950 font-black text-xs shadow-xl shadow-orange-500/30 transition flex items-center gap-2">
                            <span>Explore Our 4 Core Divisions</span>
                            <i data-lucide="arrow-down" class="w-4 h-4"></i>
                        </a>
                        <a href="{{ route('contact') }}" class="px-6 py-3.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-xs border-2 border-sky-400/70 hover:border-sky-300 backdrop-blur-md transition flex items-center gap-2">
                            <i data-lucide="calendar" class="w-4 h-4 text-sky-400"></i>
                            <span>Book Free Site Sizing</span>
                        </a>
                        <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to learn more about your engineering services in Karachi.') }}" target="_blank" class="px-6 py-3.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition flex items-center gap-2">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>WhatsApp Technical Desk</span>
                        </a>
                    </div>
                </div>

                <!-- Right Brand Pillar Card -->
                <div class="lg:col-span-4">
                    <div class="rounded-3xl border border-slate-800 bg-slate-900/90 backdrop-blur-md p-6 sm:p-7 shadow-2xl space-y-5">
                        <div class="flex items-center gap-3 pb-4 border-b border-slate-800">
                            <div class="w-10 h-10 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h3 class="font-extrabold text-white text-sm">Certified Turnkey Partner</h3>
                                <p class="text-[11px] text-slate-400">Single-Source Accountability</p>
                            </div>
                        </div>

                        <div class="space-y-3 text-xs text-slate-300">
                            <div class="flex items-start gap-2.5">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-orange-400 shrink-0 mt-0.5"></i>
                                <span><strong>Tier-1 PV Panels:</strong> Longi, Jinko &amp; Canadian Solar</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-sky-400 shrink-0 mt-0.5"></i>
                                <span><strong>ASTM A123 Galvanization:</strong> 80-120 micron coastal zinc coating</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-sky-400 shrink-0 mt-0.5"></i>
                                <span><strong>Authorized CCTV Integrator:</strong> Hikvision &amp; Dahua</span>
                            </div>
                            <div class="flex items-start gap-2.5">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-orange-400 shrink-0 mt-0.5"></i>
                                <span><strong>Grade-A LiFePO4:</strong> 6,000+ cycles, 15+ year lifespan</span>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-800 flex items-center justify-between text-[11px] text-slate-400">
                            <span>K-Electric Certified Vendor</span>
                            <span class="text-orange-400 font-bold">100% Karachi Coverage</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Metric Counters Bar -->
            <div class="mt-16 pt-10 border-t border-slate-800 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6 text-slate-300">
                <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                    <div class="text-2xl sm:text-3xl font-black text-orange-400 font-display">15+ Years</div>
                    <div class="text-xs text-slate-300 font-bold mt-1">Engineering Heritage</div>
                    <p class="text-[10px] text-slate-400 mt-0.5">Specialized in Karachi Climate</p>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                    <div class="text-2xl sm:text-3xl font-black text-sky-400 font-display">500+</div>
                    <div class="text-xs text-slate-300 font-bold mt-1">Projects Commissioned</div>
                    <p class="text-[10px] text-slate-400 mt-0.5">Residential &amp; Commercial</p>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                    <div class="text-2xl sm:text-3xl font-black text-orange-400 font-display">140+ km/h</div>
                    <div class="text-xs text-slate-300 font-bold mt-1">Wind Resilience</div>
                    <p class="text-[10px] text-slate-400 mt-0.5">Coastal Heavy Galvanized</p>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/5">
                    <div class="text-2xl sm:text-3xl font-black text-sky-400 font-display">6,000+</div>
                    <div class="text-xs text-slate-300 font-bold mt-1">LiFePO4 Cycles</div>
                    <p class="text-[10px] text-slate-400 mt-0.5">15-Year Zero Maintenance</p>
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/5 col-span-2 sm:col-span-1">
                    <div class="text-2xl sm:text-3xl font-black text-emerald-400 font-display">100%</div>
                    <div class="text-xs text-slate-300 font-bold mt-1">Turnkey Accountable</div>
                    <p class="text-[10px] text-slate-400 mt-0.5">In-House Design &amp; Fabrication</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 2. COMPANY NARRATIVE & WHY WE EXIST ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-50 text-orange-700 text-xs font-extrabold uppercase tracking-wider border border-orange-200">
                    <i data-lucide="compass" class="w-3.5 h-3.5"></i>
                    <span>Our Story &amp; Purpose</span>
                </div>
                
                <h2 class="text-2xl sm:text-4xl font-black font-display text-slate-950 tracking-tight leading-tight">
                    Engineered Specifically for Karachi’s Harsh Coastal Realities
                </h2>
                
                <div class="space-y-4 text-xs sm:text-sm text-slate-600 leading-relaxed">
                    <p>
                        Karachi presents a demanding environmental triad: extreme summer heat with solar cell derating, airborne marine salt mist that accelerates structural corrosion, and frequent unannounced grid load-shedding. For decades, property owners relied on piecemeal contractors: a solar vendor who blamed the structural welder when brackets buckled, or an inverter supplier who blamed battery chemistry when acid cells died after 14 months.
                    </p>
                    <p>
                        <strong>FWB Ventures was built to eliminate this fragmentation.</strong> By uniting precision <a href="{{ route('service.show', 'solar-installation-karachi') }}" class="text-orange-600 font-bold hover:underline">Solar Engineering</a>, in-house <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}" class="text-sky-600 font-bold hover:underline">Heavy-Duty Structural Fabrication</a>, authorized <a href="{{ route('service.show', 'cctv-services-karachi') }}" class="text-sky-600 font-bold hover:underline">CCTV Security Integration</a>, and advanced <a href="{{ route('service.show', 'lithium-batteries-karachi') }}" class="text-orange-600 font-bold hover:underline">Lithium Battery Storage</a> under one accountable organization, we guarantee total system compatibility, peak performance, and longevity.
                    </p>
                    <p>
                        Today, FWB Ventures protects and powers luxury residences in <a href="{{ route('service.show', 'solar-installation-karachi') }}#areas" class="text-slate-800 font-semibold hover:text-orange-600">DHA Karachi</a> and <a href="{{ route('service.show', 'solar-installation-karachi') }}#areas" class="text-slate-800 font-semibold hover:text-orange-600">Clifton</a>, massive industrial textile mills in <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#areas" class="text-slate-800 font-semibold hover:text-sky-600">SITE</a> and <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#areas" class="text-slate-800 font-semibold hover:text-sky-600">Korangi</a>, modern villas in <a href="{{ route('service.show', 'solar-installation-karachi') }}#areas" class="text-slate-800 font-semibold hover:text-orange-600">Bahria Town Karachi</a>, and corporate commercial plazas throughout the metropolitan area.
                    </p>
                </div>

                <div class="pt-2 flex items-center gap-4 text-xs font-bold text-slate-800">
                    <a href="{{ route('contact') }}" class="text-orange-600 hover:text-orange-700 flex items-center gap-1.5">
                        <span>Request a Consultation with Our Senior Engineers</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Right Box: Mission, Vision & Core Values -->
            <div class="lg:col-span-6 space-y-6">
                <!-- Mission Box -->
                <div class="rounded-3xl bg-white border border-slate-200 p-7 shadow-sm hover:shadow-md transition space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center">
                            <i data-lucide="target" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-display">Our Mission</h3>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        To liberate Karachi homes and businesses from unpredictable electricity tariffs and load-shedding by engineering zero-compromise solar and lithium energy ecosystems, sheltered by corrosion-proof mounting structures and protected by 24/7 intelligent surveillance.
                    </p>
                </div>

                <!-- Vision Box -->
                <div class="rounded-3xl bg-white border border-slate-200 p-7 shadow-sm hover:shadow-md transition space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                            <i data-lucide="eye" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 font-display">Our Vision</h3>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        To be Pakistan's most trusted and technically rigorous EPC company, recognized for setting the benchmark in structural wind resilience, battery lifecycle management, and smart security integration.
                    </p>
                </div>

                <!-- Engineering Core Values -->
                <div class="rounded-3xl bg-gradient-to-br from-slate-900 via-slate-850 to-slate-900 text-white p-7 shadow-xl space-y-4 border border-slate-800">
                    <h3 class="text-sm font-bold text-orange-400 uppercase tracking-wider flex items-center gap-2">
                        <i data-lucide="award" class="w-4 h-4"></i>
                        <span>The 4 FWB Engineering Commitments</span>
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs text-slate-300">
                        <div class="p-3 rounded-xl bg-white/5 border border-white/5">
                            <strong class="text-white block mb-0.5">1. Zero Component Compromise</strong>
                            Strictly Tier-1 PV modules, Grade-A LiFePO4 cells &amp; genuine copper cabling.
                        </div>
                        <div class="p-3 rounded-xl bg-white/5 border border-white/5">
                            <strong class="text-white block mb-0.5">2. In-House Quality Control</strong>
                            Precision structural fabrication, ultrasonic welding inspection &amp; hot-dip zinc verification.
                        </div>
                        <div class="p-3 rounded-xl bg-white/5 border border-white/5">
                            <strong class="text-white block mb-0.5">3. 100% Turnkey Compliance</strong>
                            K-Electric net metering documentation, NEPRA licensing &amp; safety testing.
                        </div>
                        <div class="p-3 rounded-xl bg-white/5 border border-white/5">
                            <strong class="text-white block mb-0.5">4. 24/7 Rapid Karachi Support</strong>
                            Dedicated local technicians for emergency maintenance, AMC and system monitoring.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= 3. THE 4 FLAGSHIP DIVISIONS (DEEP INTERNAL LINKING) ================= -->
    <section id="divisions" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-12">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-to-r from-orange-500/10 to-sky-500/10 text-orange-700 text-xs font-extrabold uppercase tracking-wider border border-orange-500/20">
                <i data-lucide="layers" class="w-3.5 h-3.5"></i>
                <span>Specialized Departments</span>
            </div>
            <h2 class="text-2xl sm:text-4xl font-black font-display text-slate-950 tracking-tight">
                Our 4 Core Engineering Divisions
            </h2>
            <p class="text-xs sm:text-sm text-slate-600">
                Each division operates under certified engineers and project managers to deliver seamless performance and end-to-end warranties.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Division 1: Solar Installation -->
            <div class="rounded-3xl bg-white border border-slate-200 p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="sun" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-orange-50 text-orange-800 border border-orange-200">Turnkey EPC</span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-orange-600 transition">
                        <a href="{{ route('service.show', 'solar-installation-karachi') }}">Solar Panel Installation Division</a>
                    </h3>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        We design and install high-yield residential, commercial, and industrial solar PV systems across Karachi. Specializing in on-grid net-metered arrays, zero-export hybrid systems, and off-grid solutions with intelligent peak-shaving.
                    </p>

                    <div class="space-y-2 text-xs text-slate-700">
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-installation-karachi') }}#residential" class="hover:text-orange-600 font-semibold">Residential Systems:</a> 3kW, 5kW, 10kW &amp; 15kW turnkey packages</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-installation-karachi') }}#commercial" class="hover:text-orange-600 font-semibold">Commercial &amp; Industrial:</a> 20kW to 500kW+ heavy EPC solar</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-installation-karachi') }}#netmetering" class="hover:text-orange-600 font-semibold">K-Electric Net-Metering:</a> Complete NEPRA licensing &amp; green meter testing</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-installation-karachi') }}#prices" class="hover:text-orange-600 font-semibold">Solar Pricing in Karachi:</a> Transparent rates with 18-24 month payback</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('service.show', 'solar-installation-karachi') }}" class="font-bold text-xs sm:text-sm text-orange-600 hover:text-orange-700 flex items-center gap-1.5">
                        <span>View Solar Installation Specs</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="{{ route('service.show', 'solar-installation-karachi') }}#prices" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Check Price Guide &rarr;
                    </a>
                </div>
            </div>

            <!-- Division 2: Frame Structures -->
            <div class="rounded-3xl bg-white border border-slate-200 p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="grid" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border border-sky-200">In-House Fabrication</span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-sky-600 transition">
                        <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}">Solar Frame &amp; Mounting Structure Division</a>
                    </h3>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Operating our own precision fabrication facility, we manufacture heavy-duty mounting frames specifically engineered for Karachi’s marine atmosphere. 80-120 micron hot-dip galvanized steel and architectural aluminium structures.
                    </p>

                    <div class="space-y-2 text-xs text-slate-700">
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#materials" class="hover:text-sky-600 font-semibold">Hot-Dip Galvanized Frames:</a> ASTM A123 compliant with 25-year anti-rust guarantee</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#types" class="hover:text-sky-600 font-semibold">Elevated Rooftop Pergolas:</a> 8ft-12ft clearance preserving rooftop recreational space</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#types" class="hover:text-sky-600 font-semibold">Solar Carport Canopies:</a> Waterproof shaded parking structures with integrated EV charging</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#pricing" class="hover:text-sky-600 font-semibold">Wholesale Structure Supply:</a> Supply for EPC contractors across SITE &amp; Korangi</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}" class="font-bold text-xs sm:text-sm text-sky-600 hover:text-sky-700 flex items-center gap-1.5">
                        <span>Explore Structure Specs</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#pricing" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Fabrication Rates &rarr;
                    </a>
                </div>
            </div>

            <!-- Division 3: CCTV Services -->
            <div class="rounded-3xl bg-white border border-slate-200 p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="video" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-sky-50 text-sky-800 border border-sky-200">Hikvision &amp; Dahua</span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-sky-600 transition">
                        <a href="{{ route('service.show', 'cctv-services-karachi') }}">CCTV Security &amp; AI Surveillance Division</a>
                    </h3>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Authorized security systems integrators providing end-to-end premises surveillance. From standalone wireless cameras to multi-building corporate IP networks with smart video analytics, perimeter tripwire detection, and mobile viewing.
                    </p>

                    <div class="space-y-2 text-xs text-slate-700">
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'cctv-services-karachi') }}#cameras" class="hover:text-sky-600 font-semibold">4K &amp; ColorVu Night Vision:</a> 24/7 full-color footage in total pitch darkness</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'cctv-services-karachi') }}#commercial" class="hover:text-sky-600 font-semibold">IP PoE &amp; PTZ Patrol Cameras:</a> Optical zoom speed domes for perimeter factories</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'cctv-services-karachi') }}#services" class="hover:text-sky-600 font-semibold">Annual Maintenance Contracts (AMC):</a> Quarterly maintenance and zero-downtime service</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'cctv-services-karachi') }}#pricing" class="hover:text-sky-600 font-semibold">Camera Packages in Karachi:</a> 4-channel to 32-channel complete bundles</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('service.show', 'cctv-services-karachi') }}" class="font-bold text-xs sm:text-sm text-sky-600 hover:text-sky-700 flex items-center gap-1.5">
                        <span>Explore CCTV Solutions</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="{{ route('service.show', 'cctv-services-karachi') }}#pricing" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Camera Packages &rarr;
                    </a>
                </div>
            </div>

            <!-- Division 4: Lithium Batteries -->
            <div class="rounded-3xl bg-white border border-slate-200 p-8 shadow-sm hover:shadow-xl transition-all space-y-6 flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="battery-charging" class="w-6 h-6"></i>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-full bg-orange-50 text-orange-800 border border-orange-200">LiFePO4 Chemistry</span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-black font-display text-slate-950 group-hover:text-orange-600 transition">
                        <a href="{{ route('service.show', 'lithium-batteries-karachi') }}">LiFePO4 Lithium Battery Storage Division</a>
                    </h3>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Replacing outdated lead-acid and tubular batteries with Grade-A Lithium Iron Phosphate (LiFePO4) energy storage. Delivering 6,000+ deep cycles, 95% depth of discharge, rapid 1-2 hour recharge, and 15+ years of dependable operation.
                    </p>

                    <div class="space-y-2 text-xs text-slate-700">
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'lithium-batteries-karachi') }}#residential" class="hover:text-orange-600 font-semibold">Residential Battery Units:</a> 12V 100Ah/200Ah, 24V, &amp; 48V/51.2V 100Ah Powerwalls</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'lithium-batteries-karachi') }}#residential" class="hover:text-orange-600 font-semibold">Home Solar ESS:</a> 5kWh &amp; 10kWh modular wall-mount and rack-mount battery banks</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'lithium-batteries-karachi') }}#commercial" class="hover:text-orange-600 font-semibold">Commercial &amp; Industrial ESS:</a> 20kWh to 200kWh+ high-voltage containerized storage</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-emerald-500 shrink-0"></i>
                            <span><a href="{{ route('service.show', 'lithium-batteries-karachi') }}#pricing" class="hover:text-orange-600 font-semibold">Lithium Battery Prices in Karachi:</a> Direct wholesale &amp; retail supply</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('service.show', 'lithium-batteries-karachi') }}" class="font-bold text-xs sm:text-sm text-orange-600 hover:text-orange-700 flex items-center gap-1.5">
                        <span>View Battery Specifications</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="{{ route('service.show', 'lithium-batteries-karachi') }}#pricing" class="text-xs font-semibold text-slate-500 hover:text-slate-800">
                        Check Price Guide &rarr;
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= 4. GEOGRAPHIC COVERAGE ACROSS KARACHI ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-white border border-slate-200 p-8 sm:p-12 shadow-sm space-y-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-slate-100 pb-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-50 text-sky-700 text-xs font-bold border border-sky-200 mb-2">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                        <span>Local Presence</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black font-display text-slate-900 tracking-tight">
                        Serving Every Sector &amp; Neighborhood of Karachi
                    </h2>
                </div>
                <p class="text-xs sm:text-sm text-slate-500 max-w-md">
                    Our technical survey teams and mobile installation vans operate across all Karachi municipal districts daily.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Zone 1 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                        <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
                        <h4>DHA &amp; Clifton District</h4>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Phases 1 through 8, DHA City, and Clifton Blocks 1-9. Luxury rooftop solar, elevated pergolas, and ultra-HD ColorVu perimeter security for bungalows.
                    </p>
                    <a href="{{ route('service.show', 'solar-installation-karachi') }}#areas" class="text-xs font-bold text-orange-600 hover:underline flex items-center gap-1">
                        <span>Solar &amp; CCTV in DHA &rarr;</span>
                    </a>
                </div>

                <!-- Zone 2 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-500"></span>
                        <h4>Bahria Town Karachi &amp; Scheme 33</h4>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Precincts 1 through 35, Bahria Sports City, and Scheme 33. High-capacity 10kW-20kW villa solar arrays, solar carports, and whole-house lithium storage.
                    </p>
                    <a href="{{ route('service.show', 'solar-installation-karachi') }}#areas" class="text-xs font-bold text-sky-600 hover:underline flex items-center gap-1">
                        <span>Solar &amp; ESS in Bahria Town &rarr;</span>
                    </a>
                </div>

                <!-- Zone 3 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                        <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
                        <h4>Gulshan, Johar &amp; PECHS</h4>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Gulshan-e-Iqbal, Gulistan-e-Johar, PECHS, and Bahadurabad. Net-metered solar conversions, battery UPS retrofits, and smart commercial shop security.
                    </p>
                    <a href="{{ route('service.show', 'solar-installation-karachi') }}#areas" class="text-xs font-bold text-orange-600 hover:underline flex items-center gap-1">
                        <span>Solar &amp; CCTV in Gulshan &rarr;</span>
                    </a>
                </div>

                <!-- Zone 4 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-500"></span>
                        <h4>SITE &amp; Korangi Industrial</h4>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        SITE Area, Korangi Industrial, Landhi, and Port Qasim. Heavy 50kW to 500kW+ industrial solar, factory structural canopies, and enterprise IP surveillance.
                    </p>
                    <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}#areas" class="text-xs font-bold text-sky-600 hover:underline flex items-center gap-1">
                        <span>Industrial Solar &amp; Structures &rarr;</span>
                    </a>
                </div>

                <!-- Zone 5 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                        <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
                        <h4>North Nazimabad &amp; Nazimabad</h4>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Blocks A to N, Federal B Area, and North Karachi. 5kW-15kW residential hybrid systems, elevated pergola structures, and medical clinic power backup.
                    </p>
                    <a href="{{ route('service.show', 'solar-installation-karachi') }}#areas" class="text-xs font-bold text-orange-600 hover:underline flex items-center gap-1">
                        <span>Solar in North Nazimabad &rarr;</span>
                    </a>
                </div>

                <!-- Zone 6 -->
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
                    <div class="flex items-center gap-2 text-sm font-bold text-slate-900">
                        <span class="w-2.5 h-2.5 rounded-full bg-sky-500"></span>
                        <h4>Corporate &amp; Commercial Plazas</h4>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        I.I. Chundrigar Road, Shahrah-e-Faisal, and Saddar. Corporate office hybrid solar, NVR surveillance rooms, and three-phase server lithium banks.
                    </p>
                    <a href="{{ route('service.show', 'cctv-services-karachi') }}#commercial" class="text-xs font-bold text-sky-600 hover:underline flex items-center gap-1">
                        <span>Corporate CCTV &amp; Power &rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 5. KNOWLEDGE BASE & EDUCATIONAL GUIDES (BLOG LINKING) ================= -->
    @if(isset($recentPosts) && $recentPosts->isNotEmpty())
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-orange-50 text-orange-700 text-xs font-bold border border-orange-200 mb-1">
                        <i data-lucide="book-open" class="w-3.5 h-3.5"></i>
                        <span>Engineering Insights</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-black font-display text-slate-900 tracking-tight">
                        Expert Articles &amp; Karachi Buying Guides
                    </h2>
                </div>
                <a href="{{ route('blog.index') }}" class="text-xs font-bold text-orange-600 hover:text-orange-700 flex items-center gap-1 shrink-0">
                    <span>Explore All Educational Articles</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($recentPosts as $post)
                    <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-lg transition-all flex flex-col justify-between group">
                        <div>
                            @if($post->featured_image)
                                <a href="{{ route('post.show', $post->slug) }}" class="block aspect-video overflow-hidden bg-slate-100">
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </a>
                            @endif
                            <div class="p-5 space-y-2">
                                <span class="text-[10px] font-bold text-orange-600 uppercase tracking-wider">
                                    {{ $post->categories->first()->name ?? 'Engineering Guide' }}
                                </span>
                                <h3 class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-orange-600 transition leading-snug line-clamp-2">
                                    <a href="{{ route('post.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 90) }}
                                </p>
                            </div>
                        </div>
                        <div class="p-5 pt-0">
                            <a href="{{ route('post.show', $post->slug) }}" class="text-xs font-bold text-sky-600 hover:text-sky-700 flex items-center gap-1">
                                <span>Read Full Article &rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    <!-- ================= 6. FREQUENTLY ASKED QUESTIONS (ACCORDION) ================= -->
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-3 mb-10">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-50 text-sky-700 text-xs font-bold border border-sky-200">
                <i data-lucide="help-circle" class="w-3.5 h-3.5"></i>
                <span>Common Questions</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-black font-display text-slate-900 tracking-tight">
                Frequently Asked Questions About FWB Ventures
            </h2>
        </div>

        <div class="space-y-4" x-data="{ activeAccordion: 1 }">
            <!-- FAQ 1 -->
            <div class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-xs">
                <button type="button" @click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-sm text-slate-900 hover:text-orange-600 transition">
                    <span>Where is FWB Ventures located and which areas do you serve in Karachi?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform" :class="activeAccordion === 1 ? 'rotate-180 text-orange-600' : ''"></i>
                </button>
                <div x-show="activeAccordion === 1" x-cloak class="p-5 pt-0 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100">
                    FWB Ventures maintains central offices and engineering workshops near Shahrah-e-Faisal and DHA Phase 6. We dispatch technical survey and installation teams across all parts of Karachi daily, including DHA (Phases 1-8), Clifton, Bahria Town Karachi, Gulshan-e-Iqbal, Gulistan-e-Johar, PECHS, North Nazimabad, SITE, Korangi, Landhi, and Port Qasim.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-xs">
                <button type="button" @click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-sm text-slate-900 hover:text-orange-600 transition">
                    <span>Does FWB Ventures manage complete K-Electric net metering documentation?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform" :class="activeAccordion === 2 ? 'rotate-180 text-orange-600' : ''"></i>
                </button>
                <div x-show="activeAccordion === 2" x-cloak class="p-5 pt-0 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100">
                    Yes. We provide complete turnkey K-Electric net metering services. We handle the entire engineering dossier: load sanction verification, electrical wiring testing, NEPRA generation license application, DISCO liaison, and final bi-directional green meter installation, ensuring you start exporting surplus solar units and reducing your bills immediately.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-xs">
                <button type="button" @click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-sm text-slate-900 hover:text-orange-600 transition">
                    <span>Why does FWB Ventures manufacture hot-dip galvanized mounting structures specifically for Karachi?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform" :class="activeAccordion === 3 ? 'rotate-180 text-orange-600' : ''"></i>
                </button>
                <div x-show="activeAccordion === 3" x-cloak class="p-5 pt-0 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100">
                    Karachi is a coastal metropolis with high atmospheric humidity and marine salt mist. Standard painted iron or thin electroplated steel structures begin rusting within 12 to 18 months. FWB Ventures fabricates heavy-gauge steel structures treated with an 80-120 micron hot-dip molten zinc bath conforming to ASTM A123, providing 25+ years of maintenance-free structural integrity capable of withstanding 140+ km/h coastal monsoon wind gusts.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-xs">
                <button type="button" @click="activeAccordion = activeAccordion === 4 ? null : 4" class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-sm text-slate-900 hover:text-orange-600 transition">
                    <span>What warranties are provided across FWB Ventures solar, battery, and CCTV systems?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform" :class="activeAccordion === 4 ? 'rotate-180 text-orange-600' : ''"></i>
                </button>
                <div x-show="activeAccordion === 4" x-cloak class="p-5 pt-0 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100">
                    We strictly supply genuine hardware backed by manufacturer warranties: 25-year linear performance warranty on Tier-1 solar panels, 5 to 10 year warranty on hybrid inverters, 5-year replacement warranty on Grade-A LiFePO4 batteries, 10-year anti-corrosion structural warranty on galvanized mounting frames, and 1 to 2 year warranty on Hikvision and Dahua security cameras.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-xs">
                <button type="button" @click="activeAccordion = activeAccordion === 5 ? null : 5" class="w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-sm text-slate-900 hover:text-orange-600 transition">
                    <span>How can I book a free site survey and engineering sizing for my property in Karachi?</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform" :class="activeAccordion === 5 ? 'rotate-180 text-orange-600' : ''"></i>
                </button>
                <div x-show="activeAccordion === 5" x-cloak class="p-5 pt-0 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100">
                    You can schedule a free site visit by filling out our online <a href="{{ route('contact') }}" class="text-orange-600 font-bold hover:underline">Contact Form</a>, calling our Karachi hotline at <strong>+92 301 2118111</strong>, or messaging us directly on <a href="https://wa.me/923012118111" class="text-emerald-600 font-bold hover:underline">WhatsApp</a>. Our engineers will visit your premises, inspect your roof orientation, evaluate shadow obstructions, analyze your electricity bills, and provide an itemized financial proposal.
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 7. CONVERSION BANNER (SOLAR ORANGE & ELECTRIC LIGHT BLUE) ================= -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="rounded-3xl bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800 text-white p-8 sm:p-14 relative overflow-hidden shadow-2xl">
            <!-- Ambient Glows -->
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-orange-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-10 -right-10 w-72 h-72 bg-sky-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
                <div class="space-y-3 max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-500/20 text-orange-300 text-xs font-bold border border-orange-500/30">
                        <i data-lucide="zap" class="w-3.5 h-3.5 text-orange-400"></i>
                        <span>Start Your Clean Energy &amp; Security Journey</span>
                    </div>
                    <h3 class="text-2xl sm:text-4xl font-black font-display text-white">
                        Ready to Partner with Karachi’s Most Trusted EPC?
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Whether you need a 10kW residential hybrid solar system, a hot-dip galvanized rooftop pergola, whole-facility CCTV surveillance, or a high-capacity lithium battery bank, our senior engineers are here to help.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3 shrink-0">
                    <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 hover:from-orange-600 hover:to-amber-600 text-slate-950 font-black text-xs shadow-xl shadow-orange-500/30 transition flex items-center justify-center gap-2">
                        <span>Request Free Site Sizing</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to inquire about your engineering services.') }}" target="_blank" class="w-full sm:w-auto px-7 py-4 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition flex items-center justify-center gap-2">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        <span>WhatsApp: +92 301 2118111</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
