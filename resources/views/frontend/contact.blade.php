@extends('layouts.app')

@section('seo_meta')
    <title>Contact FWB Ventures | Solar, Structures, CCTV &amp; Lithium Batteries Karachi</title>
    <meta name="description" content="Contact FWB Ventures for inquiries, site audits, and quotations on Solar Installation, Solar Mounting Frames, CCTV Surveillance, and LiFePO4 Lithium Batteries in Karachi. Hotline: +92 301 2118111.">
    <meta name="keywords" content="contact fwb ventures, solar company contact karachi, cctv services phone number karachi, lithium battery dealer karachi, solar mounting frame karachi">
    <link rel="canonical" href="{{ route('contact') }}">
    <meta property="og:title" content="Contact FWB Ventures | Engineering Team Karachi">
    <meta property="og:description" content="Speak directly with our solar, structural, CCTV, and battery specialists. Free site audits across all Karachi areas.">
    <meta property="og:url" content="{{ route('contact') }}">
    <meta property="og:type" content="website">

    <!-- Schema.org ContactPage JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@@context' => 'https://schema.org',
      '@@type' => 'ContactPage',
      'name' => 'Contact FWB Ventures',
      'description' => 'Inquiries and Consultations for Solar Installation, Mounting Frames, CCTV & Lithium Batteries in Karachi, Pakistan.',
      'url' => route('contact'),
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
          'name' => 'Contact Us',
          'item' => route('contact'),
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen">

    <!-- Header Section -->
    <section class="relative bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 text-white pt-24 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-3xl">
            <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold bg-sky-500/20 text-sky-300 border border-sky-500/30 mb-6 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                <span>KARACHI-WIDE ENGINEERING &amp; SITE SURVEY DESK</span>
            </span>
            <h1 class="text-3xl sm:text-5xl font-black font-display tracking-tight text-white">
                Contact <span class="text-sky-400">FWB Ventures</span>
            </h1>
            <p class="mt-4 text-sm sm:text-base text-slate-300 font-normal leading-relaxed">
                Planning solar installation, custom mounting structures, CCTV security upgrades, or LiFePO4 battery storage? Our engineering team is available to provide immediate consultations, load assessments, and itemized quotations.
            </p>
        </div>
    </section>

    <!-- Main Contact Grid -->
    <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start max-w-6xl mx-auto">
            
            <!-- Contact Info Card (5 cols) -->
            <div class="lg:col-span-5 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-white rounded-3xl p-8 sm:p-10 space-y-8 shadow-2xl border border-slate-800">
                <div>
                    <div class="mb-3">
                        <img src="{{ asset('images/fwb-logo-white.svg') }}" 
                             alt="{{ config('app.name', 'FWB Ventures') }}" 
                             class="h-8 w-auto object-contain">
                    </div>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        Turnkey Solar EPC, Heavy Hot-Dip Galvanized Mounting Structures, Hikvision &amp; Dahua CCTV Security, and LiFePO4 Energy Storage across Karachi, Pakistan.
                    </p>
                </div>

                <div class="space-y-6 text-xs text-slate-300">
                    <div class="flex items-start gap-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-500/10 border border-sky-500/20 text-sky-400 flex items-center justify-center shrink-0">
                            <i data-lucide="phone-call" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase text-slate-400 block">Karachi Inquiry Hotline</span>
                            <a href="tel:+923012118111" class="font-extrabold text-white hover:text-sky-400 transition text-sm">+92 301 2118111</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-9 h-9 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase text-slate-400 block">WhatsApp Direct</span>
                            <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, I would like to inquire about Solar, Frames, CCTV or Lithium Batteries.') }}" target="_blank" class="font-extrabold text-emerald-400 hover:underline text-sm">
                                Chat on WhatsApp (24/7)
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-500/10 border border-sky-500/20 text-sky-400 flex items-center justify-center shrink-0">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase text-slate-400 block">Email Inquiries</span>
                            <a href="mailto:info@fwbventures.com" class="font-bold text-white hover:underline">info@fwbventures.com</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-9 h-9 rounded-xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 flex items-center justify-center shrink-0">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase text-slate-400 block">Karachi Corporate &amp; Technical Desk</span>
                            <span class="text-slate-300 leading-snug block">Shahrah-e-Faisal / DHA Phase 6, Karachi, Sindh, Pakistan</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-800">
                    <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-2">Karachi Installation Areas</span>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        DHA &bull; Clifton &bull; Gulshan-e-Iqbal &bull; Gulistan-e-Johar &bull; North Nazimabad &bull; PECHS &bull; Scheme 33 &bull; Korangi Industrial &bull; SITE Industrial &bull; Port Qasim &bull; Landhi
                    </p>
                </div>
            </div>

            <!-- Contact Form (7 cols) -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-200">
                <div class="mb-6">
                    <h2 class="text-2xl font-black font-display text-slate-900">Request Engineering Quote / Free Survey</h2>
                    <p class="text-xs text-slate-600 mt-1">Please provide your project details and location in Karachi. Our technical team responds within 2 hours.</p>
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-800 mb-1">Full Name *</label>
                            <input type="text" name="name" required placeholder="e.g. Asim Raza" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-800 mb-1">Phone / WhatsApp *</label>
                            <input type="tel" name="phone" required placeholder="e.g. 0300 1234567" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-800 mb-1">Email Address</label>
                            <input type="email" name="email" placeholder="name@domain.com" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-800 mb-1">Service Division *</label>
                            <select name="service" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500 bg-white">
                                <option value="Solar Installation">Solar Installation (On-Grid / Hybrid / Off-Grid)</option>
                                <option value="Solar Frame Structure">Solar Frame Structure &amp; Mounting</option>
                                <option value="CCTV Services">CCTV Security &amp; Surveillance Systems</option>
                                <option value="Lithium Batteries">LiFePO4 Lithium Batteries &amp; ESS</option>
                                <option value="Multiple Divisions">Multiple Services / Turnkey Project</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">Installation Location in Karachi *</label>
                        <input type="text" name="location" required placeholder="e.g. DHA Phase 5, Korangi Creek, Gulshan Block 10, etc." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-800 mb-1">Project Details / Requirements</label>
                        <textarea name="message" rows="4" placeholder="Mention your monthly electricity bill, system size (kW), camera count, or battery backup requirements..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs focus:outline-none focus:border-sky-500"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-sky-600 via-sky-500 to-emerald-500 hover:from-sky-700 hover:to-blue-600 text-white font-extrabold text-sm shadow-lg shadow-sky-600/25 transition">
                        Submit Inquiry &bull; Free Site Assessment
                    </button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection
