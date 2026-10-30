@extends('layouts.app')

@section('seo_meta')
    <title>{{ $category->name }} - {{ config('app.name', 'FWB Ventures') }}</title>
    <meta name="description" content="{{ $category->description && strlen($category->description) > 40 ? $category->description : ('Explore technical guides, engineering insights, and equipment advice for ' . $category->name . ' in Karachi, Pakistan by FWB Ventures.') }}">
    <meta name="keywords" content="{{ strtolower($category->name) }}, {{ strtolower($category->name) }} karachi, solar installation karachi, cctv security karachi, lifepo4 battery pakistan, fwb ventures">
    <link rel="canonical" href="{{ $posts->currentPage() > 1 ? $posts->url($posts->currentPage()) : route('category.show', $category->slug) }}">
    @if($posts->previousPageUrl())
        <link rel="prev" href="{{ $posts->previousPageUrl() }}">
    @endif
    @if($posts->nextPageUrl())
        <link rel="next" href="{{ $posts->nextPageUrl() }}">
    @endif
    <meta property="og:title" content="{{ $category->name }} - {{ config('app.name', 'FWB Ventures') }}">
    <meta property="og:description" content="{{ $category->description && strlen($category->description) > 40 ? $category->description : ('Explore technical guides, engineering insights, and equipment advice for ' . $category->name . ' in Karachi, Pakistan by FWB Ventures.') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('category.show', $category->slug) }}">
    <meta property="og:image" content="{{ asset('images/fwb-logo.svg') }}">


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
          'name' => 'Articles',
          'item' => route('blog.index'),
        ],
        [
          '@type' => 'ListItem',
          'position' => 3,
          'name' => $category->name,
          'item' => route('category.show', $category->slug),
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Schema.org CollectionPage / ItemList JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'CollectionPage',
      'name' => $category->name . ' - Technical Engineering Publications',
      'description' => $category->description ?: ('Explore technical guides and case studies in ' . $category->name . ' from FWB Ventures.'),
      'url' => route('category.show', $category->slug),
      'mainEntity' => [
        '@type' => 'ItemList',
        'itemListElement' => $posts->map(function($p, $idx) {
            return [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'name' => $p->title,
                'url' => route('post.show', $p->slug),
                'description' => $p->seo_description,
                'image' => $p->seo_image ?: ($p->featured_image_url ?: asset('images/fwb-logo.svg')),
            ];
        })->values()->all(),
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Custom Schema.org JSON-LD (from Dashboard) -->
    <x-schema-json-ld :schema="$category->schema_markup" />
@endsection

@section('content')
<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
    <!-- Header -->
    <div class="border-b border-slate-200 pb-8 space-y-2">
        <span class="text-xs font-bold uppercase tracking-widest text-sky-600">Category Knowledge Base</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">{{ $category->name }}</h1>
        @if($category->description)
            <p class="text-xs sm:text-sm text-slate-500 max-w-2xl">{{ $category->description }}</p>
        @else
            <p class="text-xs sm:text-sm text-slate-500 max-w-2xl">Authoritative engineering publications, cost breakdowns, and technical standards by FWB Ventures.</p>
        @endif
    </div>

    <!-- Comprehensive Silo Intro Block with Hub Link -->
    <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 sm:p-8 border border-slate-200/90 shadow-xs space-y-4">
        @if($category->slug === 'solar-installation-guides')
            <div class="prose max-w-none text-xs sm:text-sm text-slate-600 leading-relaxed space-y-3">
                <p>
                    Welcome to the <strong>FWB Ventures Solar Engineering Knowledge Hub</strong>. Our comprehensive technical guides cover everything from sizing 3kW to 100kW residential and commercial rooftop solar arrays to navigating K-Electric three-phase net metering approvals in Karachi. Whether you are evaluating tier-1 monocrystalline bifacial solar panels, comparing hybrid versus on-grid string inverters, or calculating levelized cost of electricity (LCOE), our certified engineering team provides field-tested data and verified pricing benchmarks.
                </p>
                <p>
                    Ready to eliminate your peak tariff K-Electric bills? Explore our turnkey commercial and residential <a href="{{ route('service.show', 'solar-solutions-karachi') }}" class="text-orange-600 font-bold hover:underline">Solar Solutions in Karachi</a>, review our <a href="{{ route('service.show', 'solar-systems-by-capacity-karachi') }}" class="text-sky-600 font-bold hover:underline">Solar Systems by Capacity (3kW–100kW)</a>, or request a free on-site solar assessment with net metering feasibility analysis across DHA, Clifton, and all Karachi districts.
                </p>
            </div>
        @elseif($category->slug === 'solar-mounting-frames')
            <div class="prose max-w-none text-xs sm:text-sm text-slate-600 leading-relaxed space-y-3">
                <p>
                    Karachi’s coastal atmospheric humidity and severe wind loading require specialized structural engineering for rooftop and ground-mounted solar installations. In this knowledge repository, FWB Ventures structural engineers explain the crucial differences between ASTM A123 hot-dip galvanized steel frames, non-metallic corrosion-proof FRP composite channels, and custom elevated pergola structures designed to withstand wind gusts up to 140 km/h.
                </p>
                <p>
                    Protect your solar panel investment with heavy-gauge mounting hardware. Visit our central <a href="{{ route('service.show', 'solar-mounting-structures-karachi') }}" class="text-orange-600 font-bold hover:underline">Solar Mounting Structures Hub</a> to inspect technical load calculations, learn about our <a href="{{ route('service.show', 'solar-frame-structure-karachi') }}" class="text-sky-600 font-bold hover:underline">Custom Elevated Pergolas</a>, or download structural specifications for commercial solar carports and factory rooftop installations in Karachi.
                </p>
            </div>
        @elseif($category->slug === 'lithium-battery-technology')
            <div class="prose max-w-none text-xs sm:text-sm text-slate-600 leading-relaxed space-y-3">
                <p>
                    Lithium Iron Phosphate (LiFePO4) chemistry represents the gold standard in clean, maintenance-free energy storage for Pakistan’s climate. This technical knowledge base breaks down cell chemistry, built-in intelligent Battery Management System (BMS) communications, round-trip efficiency (98%), cycle life (6,000+ cycles at 80% DoD), and safety ratings compared to traditional tubular lead-acid batteries.
                </p>
                <p>
                    Looking to upgrade your home inverter or industrial solar backup? Discover our complete inventory of Grade-A <a href="{{ route('service.show', 'lithium-battery-in-karachi') }}" class="text-orange-600 font-bold hover:underline">Lithium Batteries in Karachi</a>, compare <a href="{{ route('service.show', 'lithium-battery-prices-karachi') }}" class="text-sky-600 font-bold hover:underline">Residential & Commercial Lithium Battery Prices</a>, or view our wall-mounted 5.12 kWh Powerwalls and 48V server rack modules for zero-downtime backup during load shedding.
                </p>
            </div>
        @elseif($category->slug === 'cctv-surveillance-guides')
            <div class="prose max-w-none text-xs sm:text-sm text-slate-600 leading-relaxed space-y-3">
                <p>
                    Protecting commercial facilities, warehouses, residential bungalows, and retail outlets requires strategic surveillance engineering. Our CCTV technical guides provide practical walkthroughs on camera placement, optical versus digital zoom, ColorVu 24/7 full-color low-light performance, smart AcuSense motion analytics, bandwidth calculation for H.265+ compression, and NVR storage sizing.
                </p>
                <p>
                    Secure your premises with certified Hikvision and Dahua systems. Check our turnkey <a href="{{ route('service.show', 'cctv-solutions-karachi') }}" class="text-orange-600 font-bold hover:underline">CCTV Solutions in Karachi</a>, compare HD and 4K <a href="{{ route('service.show', 'cctv-camera-prices-karachi') }}" class="text-sky-600 font-bold hover:underline">CCTV Camera Package Prices</a>, or schedule an on-site security audit and cable pathway inspection with our surveillance technicians.
                </p>
            </div>
        @endif
    </div>

    <!-- Category Filter Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
        <a href="{{ route('blog.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap bg-slate-100 text-slate-700 hover:bg-slate-200">
            All Publications ({{ \App\Models\Post::where('status', 'published')->count() }})
        </a>
        <a href="{{ route('category.show', 'solar-installation-guides') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap {{ $category->slug === 'solar-installation-guides' ? 'bg-sky-700 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700' }}">
            ☀️ Solar Installation ({{ \App\Models\Category::find(43)?->posts()->where('status', 'published')->count() ?? 0 }})
        </a>
        <a href="{{ route('category.show', 'solar-mounting-frames') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap {{ $category->slug === 'solar-mounting-frames' ? 'bg-sky-700 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700' }}">
            🏗️ Solar Frame Structures ({{ \App\Models\Category::find(45)?->posts()->where('status', 'published')->count() ?? 0 }})
        </a>
        <a href="{{ route('category.show', 'lithium-battery-technology') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap {{ $category->slug === 'lithium-battery-technology' ? 'bg-sky-700 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700' }}">
            🔋 Lithium Batteries ({{ \App\Models\Category::find(44)?->posts()->where('status', 'published')->count() ?? 0 }})
        </a>
        <a href="{{ route('category.show', 'cctv-surveillance-guides') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap {{ $category->slug === 'cctv-surveillance-guides' ? 'bg-sky-700 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700' }}">
            📹 CCTV &amp; Security ({{ \App\Models\Category::find(46)?->posts()->where('status', 'published')->count() ?? 0 }})
        </a>
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <article class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col justify-between group">
                <a href="{{ route('post.show', $post->slug) }}" class="aspect-[16/9] block relative overflow-hidden bg-slate-100">
                    @if($post->featured_image_url)
                        <img src="{{ $post->featured_image_url }}" 
                             alt="{{ $post->title }}" 
                             width="600" 
                             height="338" 
                             loading="lazy" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    @else

                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                            <i data-lucide="image" class="w-10 h-10"></i>
                        </div>
                    @endif
                </a>

                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex items-center gap-2 text-[11px] text-slate-400 mb-1.5">
                            <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            <span>•</span>
                            <span>{{ $post->reading_time }} min read</span>
                        </div>
                        <h2 class="text-base font-bold text-slate-900 group-hover:text-brand-600 transition line-clamp-2">
                            <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="text-xs text-slate-500 line-clamp-3 mt-2 leading-relaxed">
                            {{ $post->seo_description }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
                        <a href="{{ route('post.show', $post->slug) }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700">
                            Read →
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full py-16 text-center text-slate-400 bg-white rounded-3xl border border-slate-200">
                No articles published under this category yet.
            </div>
        @endforelse
    </div>

    @if($posts->hasPages())
        <div class="pt-6">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
