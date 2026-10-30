<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Service;
use App\Services\SeoInternalLinker;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index(Request $request): View
    {
        $services = Service::published()->ordered()->get();

        return view('frontend.services.index', compact('services'));
    }

    /**
     * Display the specified service.
     */
    public function show(string $slug, ?SeoInternalLinker $linker = null): View
    {
        $linker = $linker ?? app(SeoInternalLinker::class);

        // Resilient lookup to ensure zero broken links
        $service = Service::published()->where('slug', $slug)->first();

        if (! $service && ! str_ends_with($slug, '-karachi')) {
            $service = Service::published()->where('slug', $slug.'-karachi')->first();
        }

        if (! $service && str_ends_with($slug, '-karachi')) {
            $baseSlug = preg_replace('/-karachi$/', '', $slug);
            $service = Service::published()->where('slug', $baseSlug)->first();
        }

        if (! $service) {
            $keyword = str_replace('-', ' ', $slug);
            $service = Service::published()
                ->where('title', 'like', "%{$keyword}%")
                ->orWhere('slug', 'like', "%{$slug}%")
                ->first();
        }

        if (! $service) {
            if (str_contains($slug, 'frame') || str_contains($slug, 'structure') || str_contains($slug, 'mounting')) {
                $service = Service::published()->where('slug', 'solar-frame-structure-karachi')->first();
            } elseif (str_contains($slug, 'cctv') || str_contains($slug, 'camera') || str_contains($slug, 'surveillance')) {
                $service = Service::published()->where('slug', 'cctv-services-karachi')->first();
            } elseif (str_contains($slug, 'lithium') || str_contains($slug, 'battery') || str_contains($slug, 'lifepo4')) {
                $service = Service::published()->where('slug', 'lithium-batteries-karachi')->first();
            } elseif (str_contains($slug, 'solar')) {
                $service = Service::published()->where('slug', 'solar-installation-karachi')->first();
            }
        }

        if (! $service) {
            abort(404);
        }

        // 1. Silo-aware related services (3 to 6 in same category)
        $siloQuery = Service::published()->where('id', '!=', $service->id);
        if ($service->isSolar()) {
            $siloServices = (clone $siloQuery)->where(function ($q) {
                $q->where('slug', 'like', 'solar-%')
                    ->orWhere('slug', 'like', '%kw-%')
                    ->orWhere('slug', 'like', '%on-grid%')
                    ->orWhere('slug', 'like', '%hybrid%');
            })->take(6)->get();
        } elseif ($service->isSolarFrame()) {
            $siloServices = (clone $siloQuery)->where(function ($q) {
                $q->where('slug', 'like', '%frame%')
                    ->orWhere('slug', 'like', '%structure%')
                    ->orWhere('slug', 'like', '%mounting%')
                    ->orWhere('slug', 'like', '%pergola%');
            })->take(6)->get();
        } elseif ($service->isLithiumBattery()) {
            $siloServices = (clone $siloQuery)->where(function ($q) {
                $q->where('slug', 'like', '%lithium%')
                    ->orWhere('slug', 'like', '%battery%')
                    ->orWhere('slug', 'like', '%lifepo4%');
            })->take(6)->get();
        } elseif ($service->isCctv()) {
            $siloServices = (clone $siloQuery)->where(function ($q) {
                $q->where('slug', 'like', '%cctv%')
                    ->orWhere('slug', 'like', '%camera%')
                    ->orWhere('slug', 'like', '%surveillance%');
            })->take(6)->get();
        } else {
            $siloServices = (clone $siloQuery)->ordered()->take(6)->get();
        }

        if ($siloServices->count() < 3) {
            $fallbackServices = Service::published()
                ->where('id', '!=', $service->id)
                ->whereNotIn('id', $siloServices->pluck('id'))
                ->ordered()
                ->take(6 - $siloServices->count())
                ->get();
            $siloServices = $siloServices->merge($fallbackServices);
        }
        $otherServices = $siloServices;

        // 2. Area page detection: nearby areas + parent service
        $isAreaPage = preg_match('/-(in-[a-z0-9\-]+-karachi)$/', $service->slug, $areaMatch);
        $nearbyAreaServices = collect();
        $parentService = null;

        if ($isAreaPage) {
            $basePrefix = rtrim(str_replace($areaMatch[1], '', $service->slug), '-');
            $nearbyAreaServices = Service::published()
                ->where('id', '!=', $service->id)
                ->where('slug', 'like', $basePrefix.'-%')
                ->take(12)
                ->get();

            $parentSlug = $basePrefix.'-karachi';
            $parentService = Service::published()->where('slug', $parentSlug)->first()
                ?? Service::published()->where('slug', $basePrefix)->first()
                ?? Service::published()->where('slug', 'solar-installation-areas-karachi')->first();
        }

        // 3. Silo Hub detection: load all guide articles in that silo
        $siloHubs = [
            'solar-solutions-karachi' => 'solar-installation-guides',
            'solar-mounting-structures-karachi' => 'solar-mounting-frames',
            'lithium-battery-in-karachi' => 'lithium-battery-technology',
            'cctv-solutions-karachi' => 'cctv-surveillance-guides',
        ];
        $isSiloHub = isset($siloHubs[$service->slug]);
        $siloGuides = collect();
        if ($isSiloHub) {
            $catSlug = $siloHubs[$service->slug];
            $siloGuides = Post::published()
                ->whereHas('categories', function ($q) use ($catSlug) {
                    $q->where('categories.slug', $catSlug);
                })
                ->with(['user', 'categories'])
                ->latest('published_at')
                ->take(12)
                ->get();
        }

        $relatedPosts = $linker->getRelatedPostsForService($service, 4);

        return view('frontend.services.show', compact(
            'service',
            'otherServices',
            'relatedPosts',
            'nearbyAreaServices',
            'parentService',
            'isSiloHub',
            'siloGuides'
        ));
    }
}
