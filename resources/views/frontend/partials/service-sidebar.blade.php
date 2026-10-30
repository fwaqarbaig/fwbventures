@php
    $sidebarSubject = $subject ?? (isset($service) ? 'Inquiry: ' . $service->title : 'FWB Ventures Karachi Sizing Inquiry');
    $whatsappText = $whatsappMessage ?? (isset($service) ? 'Hello FWB Ventures Karachi, I would like to inquire about ' . $service->title : 'Hello FWB Ventures, I need a quotation for solar, frames, CCTV, or lithium batteries in Karachi.');

    // Resolve services list for the navigator
    if (!isset($navServices)) {
        if (isset($otherServices) && $otherServices->isNotEmpty()) {
            $navServices = $otherServices;
        } elseif (isset($services) && $services->isNotEmpty()) {
            $navServices = isset($service) ? $services->where('id', '!=', $service->id) : $services;
        } else {
            $allServices = \App\Models\Service::published()->ordered()->get();
            $navServices = isset($service) ? $allServices->where('id', '!=', $service->id) : $allServices;
        }
    }
@endphp

<div id="quote-box" class="space-y-6">

    <!-- Flash Message Notification -->
    @if(session('success'))
        <div class="p-4 rounded-2xl bg-emerald-600 text-white shadow-lg space-y-1">
            <div class="flex items-center gap-2 font-bold text-xs uppercase tracking-wide">
                <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                <span>Quote Request Dispatched!</span>
            </div>
            <p class="text-xs text-emerald-50 leading-relaxed">{{ session('success') }}</p>
        </div>
    @endif

    <!-- 1. Rapid Sizing & Quote Form Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-sm space-y-4">
        <div class="flex items-center gap-2 text-xs font-bold uppercase text-sky-600">
            <i data-lucide="shield-check" class="w-4 h-4"></i>
            <span>Free Karachi Site Survey</span>
        </div>
        <h4 class="text-xl font-black text-slate-900 font-display">
            Request an Itemized Engineering Quote
        </h4>
        <p class="text-xs text-slate-500 leading-relaxed">
            Get an engineered quote with equipment bill-of-materials (BOM), K-Electric payback simulation, and guaranteed completion timeline.
        </p>

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 pt-1">
            @csrf
            <input type="hidden" name="subject" value="{{ $sidebarSubject }}">

            <!-- Anti-Bot Silent Honeypot -->
            <div style="display: none !important;" aria-hidden="true">
                <input type="text" name="_hp_website" tabindex="-1" autocomplete="off">
                <input type="text" name="bot_check" tabindex="-1" autocomplete="off">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Your Full Name</label>
                <input type="text" name="name" required placeholder="e.g. Tariq Mehmood" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Karachi Phone / WhatsApp</label>
                <input type="tel" name="phone" required placeholder="+92 300 1234567" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Email Address (Optional)</label>
                <input type="email" name="email" placeholder="client@domain.com" class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 bg-slate-50/50">
            </div>

            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Service Division</label>
                    <select name="service_division" class="w-full px-3 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 bg-white">
                        <option value="Solar Installation" {{ isset($service) && $service->isSolar() ? 'selected' : '' }}>Solar Installation</option>
                        <option value="Solar Frame Structure" {{ isset($service) && $service->isSolarFrame() ? 'selected' : '' }}>Solar Frame Structure</option>
                        <option value="CCTV Services" {{ isset($service) && $service->isCctv() ? 'selected' : '' }}>CCTV Surveillance</option>
                        <option value="Lithium Batteries" {{ isset($service) && $service->isLithiumBattery() ? 'selected' : '' }}>LiFePO4 Lithium Batteries</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Karachi Location</label>
                    <select name="location" class="w-full px-3 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 bg-white">
                        <option value="DHA Karachi" selected>DHA Karachi</option>
                        <option value="Clifton Karachi">Clifton Karachi</option>
                        <option value="Gulshan-e-Iqbal">Gulshan-e-Iqbal</option>
                        <option value="Gulistan-e-Johar">Gulistan-e-Johar</option>
                        <option value="North Nazimabad">North Nazimabad</option>
                        <option value="PECHS / Tariq Rd">PECHS / Tariq Rd</option>
                        <option value="Scheme 33">Scheme 33</option>
                        <option value="Korangi Industrial">Korangi Industrial</option>
                        <option value="SITE Industrial">SITE Industrial</option>
                        <option value="Malir / Shahrah-e-Faisal">Malir / Shahrah-e-Faisal</option>
                        <option value="Other Area">Other Karachi Area</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Project Details / Monthly Bill</label>
                <textarea name="message" rows="3" placeholder="Provide system size (e.g. 10kW), current monthly K-Electric bill in PKR, or specific requirement..." class="w-full px-3.5 py-2.5 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500/20 focus:border-sky-500 bg-slate-50/50"></textarea>
            </div>

            <div class="flex items-center gap-2 p-2.5 rounded-xl bg-slate-50 border border-slate-200/80">
                <input type="checkbox" id="free_audit" name="free_audit" value="yes" checked class="rounded text-sky-600 focus:ring-sky-500">
                <label for="free_audit" class="text-[11px] text-slate-700 font-medium">Request <strong>Free On-Site 3D Shading &amp; Roof Load Audit</strong></label>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl font-bold text-xs bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-slate-950 shadow-lg shadow-sky-500/20 transition transform hover:-translate-y-0.5">
                Submit Engineering Quote Request
            </button>
        </form>
    </div>

    <!-- 2. Emergency 24/7 Dispatch Card -->
    <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-slate-950 text-white rounded-3xl p-6 border border-slate-800 shadow-md space-y-4">
        <div class="flex items-center gap-2 text-xs font-bold uppercase text-sky-400">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
            <span>Direct Karachi Engineering Hotline</span>
        </div>
        <div class="space-y-1">
            <div class="text-xs text-slate-400">Speak directly with an EPC engineer:</div>
            <a href="tel:+923012118111" class="text-xl font-black text-white hover:text-sky-400 transition block font-mono">
                +92 301 2118111
            </a>
        </div>
        <a href="https://wa.me/923012118111?text={{ urlencode($whatsappText) }}" target="_blank" class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs flex items-center justify-center gap-2 transition shadow-md">
            <i data-lucide="message-circle" class="w-4 h-4"></i>
            <span>Instant WhatsApp Chat</span>
        </a>
        <div class="pt-2 border-t border-slate-800 flex items-center justify-between text-[11px] text-slate-400">
            <span>Site Visit SLA: <strong>Same Day</strong></span>
            <span>Karachi City-Wide</span>
        </div>
    </div>

    <!-- 3. Other Services Navigator -->
    @if(isset($navServices) && $navServices->isNotEmpty())
        <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-sm space-y-4">
            <h5 class="text-xs font-bold uppercase tracking-wider text-slate-500 flex items-center gap-2">
                <i data-lucide="layers" class="w-4 h-4 text-sky-500"></i>
                <span>FWB Ventures Divisions</span>
            </h5>
            <div class="space-y-1.5">
                @foreach($navServices as $navSvc)
                    <a href="{{ route('service.show', $navSvc->slug) }}" class="flex items-center justify-between p-3 rounded-2xl text-xs font-semibold text-slate-700 hover:bg-sky-50 hover:text-sky-900 transition group border border-transparent hover:border-sky-200">
                        <span class="whitespace-normal break-words leading-snug">{{ $navSvc->title }}</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-slate-400 group-hover:text-sky-600 group-hover:translate-x-0.5 transition shrink-0 ml-2"></i>
                    </a>
                @endforeach
            </div>
            <div class="pt-2">
                <a href="{{ route('service.index') }}" class="block text-center py-2 text-xs font-bold text-sky-700 hover:text-sky-800 transition">
                    Explore All 4 Karachi Engineering Divisions &rarr;
                </a>
            </div>
        </div>
    @endif

    <!-- 4. Quick Karachi Areas Badge Strip -->
    <div class="p-5 rounded-3xl bg-slate-100 border border-slate-200/60 text-xs space-y-2">
        <span class="font-extrabold uppercase text-[10px] text-slate-500 tracking-wider">Fast Karachi Dispatch:</span>
        <div class="flex flex-wrap gap-1.5 pt-1">
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">DHA</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">Clifton</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">Gulshan</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">Johar</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">Nazimabad</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">Korangi Ind</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">SITE Ind</span>
            <span class="px-2.5 py-1 rounded-lg bg-white text-slate-700 font-bold border border-slate-200 text-[11px]">Scheme 33</span>
        </div>
        <div class="pt-2 border-t border-slate-200">
            <a href="https://wa.me/923012118111?text={{ urlencode('Hello FWB Ventures, please schedule a free site survey in Karachi.') }}" target="_blank" class="text-emerald-700 hover:underline font-bold flex items-center gap-1 text-[11px]">
                <i data-lucide="calendar" class="w-3 h-3"></i>
                <span>Schedule Free Site Survey Today &rarr;</span>
            </a>
        </div>
    </div>

</div>
