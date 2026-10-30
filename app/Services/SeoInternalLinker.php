<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class SeoInternalLinker
{
    /**
     * Map a blog post to its most relevant commercial EPC service in Karachi.
     */
    public function matchServiceForPost(Post $post): ?Service
    {
        $services = Service::published()->get();

        if ($services->isEmpty()) {
            return null;
        }

        $categoriesText = $post->relationLoaded('categories')
            ? $post->categories->pluck('name')->join(' ')
            : $post->categories()->pluck('name')->join(' ');

        $haystack = strtolower(
            $post->title.' '.
            $post->slug.' '.
            $categoriesText.' '.
            Str::limit(strip_tags((string) $post->content), 300)
        );

        // 1. CCTV & Security Surveillance
        if (str_contains($haystack, 'cctv') || str_contains($haystack, 'camera') || str_contains($haystack, 'surveillance') || str_contains($haystack, 'dvr') || str_contains($haystack, 'nvr') || str_contains($haystack, 'security')) {
            if (str_contains($haystack, 'price') || str_contains($haystack, 'cost')) {
                $service = $services->firstWhere('slug', 'cctv-camera-prices-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'install')) {
                $service = $services->firstWhere('slug', 'cctv-services-installation-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'solution') || str_contains($haystack, 'commercial') || str_contains($haystack, 'office') || str_contains($haystack, 'warehouse')) {
                $service = $services->firstWhere('slug', 'cctv-solutions-karachi');
                if ($service) {
                    return $service;
                }
            }

            return $services->firstWhere('slug', 'cctv-services-karachi')
                ?? $services->firstWhere('slug', 'cctv-cameras-karachi')
                ?? $services->firstWhere('slug', 'cctv-solutions-karachi');
        }

        // 2. Lithium Batteries & LiFePO4 ESS
        if (str_contains($haystack, 'lithium') || str_contains($haystack, 'lifepo4') || str_contains($haystack, 'battery') || str_contains($haystack, 'powerwall') || str_contains($haystack, 'ess') || str_contains($haystack, 'energy storage')) {
            if (str_contains($haystack, 'commercial') || str_contains($haystack, 'industrial') || str_contains($haystack, 'server rack') || str_contains($haystack, '100kwh') || str_contains($haystack, '50kwh') || str_contains($haystack, 'factory')) {
                $service = $services->firstWhere('slug', 'commercial-industrial-lithium-batteries-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'residential') || str_contains($haystack, 'home') || str_contains($haystack, 'ups') || str_contains($haystack, '12v') || str_contains($haystack, '24v') || str_contains($haystack, '48v') || str_contains($haystack, '5kwh') || str_contains($haystack, '10kwh')) {
                $service = $services->firstWhere('slug', 'residential-lithium-batteries-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'price') || str_contains($haystack, 'cost') || str_contains($haystack, 'wholesale') || str_contains($haystack, 'rate')) {
                $service = $services->firstWhere('slug', 'lithium-battery-prices-karachi');
                if ($service) {
                    return $service;
                }
            }

            return $services->firstWhere('slug', 'lithium-batteries-karachi');
        }

        // 3. Solar Frame & Mounting Structures
        if (str_contains($haystack, 'structure') || str_contains($haystack, 'frame') || str_contains($haystack, 'mounting') || str_contains($haystack, 'carport') || str_contains($haystack, 'pergola') || str_contains($haystack, 'frp') || str_contains($haystack, 'galvanized') || str_contains($haystack, 'elevated')) {
            if (str_contains($haystack, 'farm') || str_contains($haystack, 'ground')) {
                $service = $services->firstWhere('slug', 'solar-farm-structure-in-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'material') || str_contains($haystack, 'galvaniz') || str_contains($haystack, 'astm') || str_contains($haystack, 'gi pipe')) {
                $service = $services->firstWhere('slug', 'solar-structure-materials-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'type') || str_contains($haystack, 'elevated') || str_contains($haystack, 'pergola') || str_contains($haystack, 'l2') || str_contains($haystack, 'l3')) {
                $service = $services->firstWhere('slug', 'solar-structure-types-karachi');
                if ($service) {
                    return $service;
                }
            }

            return $services->firstWhere('slug', 'solar-frame-structure-karachi')
                ?? $services->firstWhere('slug', 'solar-mounting-structures-karachi')
                ?? $services->firstWhere('slug', 'solar-structure-types-karachi');
        }

        // 4. Solar Installation & PV Systems
        if (str_contains($haystack, 'solar') || str_contains($haystack, 'inverter') || str_contains($haystack, 'net metering') || str_contains($haystack, 'k-electric')) {
            if (str_contains($haystack, 'price') || str_contains($haystack, 'cost') || str_contains($haystack, 'roi') || str_contains($haystack, 'payback')) {
                $service = $services->firstWhere('slug', 'solar-system-prices-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'type') || str_contains($haystack, 'on-grid') || str_contains($haystack, 'hybrid') || str_contains($haystack, 'off-grid')) {
                $service = $services->firstWhere('slug', 'solar-systems-by-type-karachi');
                if ($service) {
                    return $service;
                }
            }
            if (str_contains($haystack, 'panel') || str_contains($haystack, 'installation') || str_contains($haystack, 'rooftop')) {
                $service = $services->firstWhere('slug', 'solar-panel-installation-karachi')
                    ?? $services->firstWhere('slug', 'solar-panel-installation');
                if ($service) {
                    return $service;
                }
            }

            return $services->firstWhere('slug', 'solar-installation-karachi')
                ?? $services->firstWhere('slug', 'solar-solutions-karachi');
        }

        return $services->firstWhere('slug', 'solar-installation-karachi') ?? $services->first();
    }

    /**
     * Get related technical articles for a specific power & engineering service.
     *
     * @return Collection<int, Post>
     */
    public function getRelatedPostsForService(Service $service, int $limit = 4): Collection
    {
        $keywords = match (true) {
            $service->isCctv() => ['cctv', 'camera', 'surveillance', 'security', 'nvr', 'dvr', 'hikvision', 'dahua', 'night vision', 'ip camera'],
            $service->isLithiumBattery() => ['lithium', 'battery', 'lifepo4', 'powerwall', 'energy storage', '12v', '48v', 'bms', 'backup'],
            $service->isSolarFrame() => ['frame', 'structure', 'mounting', 'galvanized', 'pergola', 'carport', 'elevated', 'astm a123', 'wind'],
            $service->isSolar() => ['solar', 'net metering', 'inverter', 'k-electric', 'rooftop', 'panel', 'hybrid', 'on-grid', 'commercial solar'],
            default => ['solar', 'cctv', 'battery', 'structure', 'karachi'],
        };

        $query = Post::published()
            ->with(['user', 'categories'])
            ->where(function ($q) use ($keywords) {
                foreach ($keywords as $kw) {
                    $q->orWhere('title', 'like', "%{$kw}%");
                }
            })
            ->latest('published_at');

        $posts = $query->take($limit)->get();

        if ($posts->count() < $limit) {
            $missing = $limit - $posts->count();
            $fallbackPosts = Post::published()
                ->whereNotIn('id', $posts->pluck('id'))
                ->with(['user', 'categories'])
                ->latest('published_at')
                ->take($missing)
                ->get();

            $posts = $posts->merge($fallbackPosts);
        }

        return $posts;
    }
}
