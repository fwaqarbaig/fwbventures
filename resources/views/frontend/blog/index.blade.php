@extends('layouts.app')

@section('seo_meta')
    <title>{{ $search ? "Search results for '{$search}'" : "Solar, Mounting Frames, CCTV & Lithium Battery Engineering Knowledge Base" }} - {{ config('app.name', 'FWB Ventures') }}</title>
    <meta name="description" content="Explore expert solar installation guides, net metering procedures, ASTM A123 galvanizing standards, CCTV security analytics, and LiFePO4 battery engineering insights in Karachi, Pakistan.">
    <meta name="keywords" content="solar blog karachi, k-electric net metering guide, lifepo4 battery guide karachi, solar mounting structures karachi, cctv security camera guide karachi, fwb ventures blogs">
    <link rel="canonical" href="{{ $posts->currentPage() > 1 ? $posts->url($posts->currentPage()) : route('blog.index') }}">
    @if($posts->previousPageUrl())
        <link rel="prev" href="{{ $posts->previousPageUrl() }}">
    @endif
    @if($posts->nextPageUrl())
        <link rel="next" href="{{ $posts->nextPageUrl() }}">
    @endif
    <meta property="og:title" content="{{ $search ? "Search results for '{$search}'" : "Solar, Mounting Frames, CCTV & Lithium Battery Engineering Knowledge Base" }} - {{ config('app.name', 'FWB Ventures') }}">
    <meta property="og:description" content="Explore expert solar installation guides, net metering procedures, ASTM A123 galvanizing standards, CCTV security analytics, and LiFePO4 battery engineering insights in Karachi, Pakistan.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('blog.index') }}">
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
          'name' => 'Blogs',
          'item' => route('blog.index'),
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Schema.org CollectionPage / ItemList JSON-LD -->
    <script type="application/ld+json">
    {!! json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'CollectionPage',
      'name' => 'Solar Energy, Mounting Structures, CCTV & Lithium Battery Knowledge Base',
      'description' => 'Technical engineering publications, K-Electric net metering guides, CCTV DORI standards, and LiFePO4 battery lifecycle analyses by FWB Ventures engineers in Karachi.',
      'url' => route('blog.index'),
      'mainEntity' => [
        '@@type' => 'ItemList',
        'itemListElement' => $posts->map(function($p, $idx) {
            return [
                '@@type' => 'ListItem',
                'position' => $idx + 1,
                'name' => $p->title,
                'url' => route('post.show', $p->slug),
                'description' => $p->seo_description,
                'image' => $p->seo_image ?: ($p->featured_image_url ?: asset('storage/media/rental-generator.webp')),
            ];
        })->values()->all(),
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endsection

@section('content')
<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
    <!-- Header -->
    <div class="border-b border-slate-200 pb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <span class="text-xs font-bold uppercase tracking-widest text-sky-600 block mb-1">Engineering Publications</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-display">
                @if($search)
                    Search results for "{{ $search }}"
                @else
                    Engineering Publications & Energy Guides
                @endif
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">In-depth guides on solar installation, K-Electric net metering, mounting structures, CCTV security optics, and LiFePO4 batteries in Karachi.</p>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('blog.index') }}" method="GET" class="relative w-full md:w-80">
            <input type="text" name="q" value="{{ $search }}" placeholder="Search articles..."
                   class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-2.5"></i>
        </form>
    </div>

    <!-- Category Filter Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
        <a href="{{ route('blog.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap {{ !$search ? 'bg-sky-700 text-white shadow-xs' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
            All Publications ({{ \App\Models\Post::where('status', 'published')->count() }})
        </a>
        <a href="{{ route('category.show', 'solar-installation-guides') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700">
            ☀️ Solar Installation ({{ \App\Models\Category::find(43)?->posts()->where('status', 'published')->count() ?? 0 }})
        </a>
        <a href="{{ route('category.show', 'solar-mounting-frames') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700">
            🏗️ Solar Frame Structures ({{ \App\Models\Category::find(45)?->posts()->where('status', 'published')->count() ?? 0 }})
        </a>
        <a href="{{ route('category.show', 'lithium-battery-technology') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700">
            🔋 Lithium Batteries ({{ \App\Models\Category::find(44)?->posts()->where('status', 'published')->count() ?? 0 }})
        </a>
        <a href="{{ route('category.show', 'cctv-surveillance-guides') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition whitespace-nowrap bg-slate-100 text-slate-700 hover:bg-sky-50 hover:text-sky-700">
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
                    @if($post->categories->first())
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-bold bg-white/95 text-slate-800 shadow-sm">
                            {{ $post->categories->first()->name }}
                        </span>
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
                <i data-lucide="inbox" class="w-10 h-10 mx-auto mb-3 opacity-40"></i>
                <p class="text-sm font-semibold text-slate-700">No articles found.</p>
                @if($search)
                    <p class="text-xs text-slate-400 mt-1">Try another search keyword.</p>
                    <a href="{{ route('blog.index') }}" class="mt-4 inline-block px-4 py-2 bg-slate-100 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-200">Clear Search</a>
                @endif
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
        <div class="pt-6">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
