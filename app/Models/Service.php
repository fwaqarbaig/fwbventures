<?php

namespace App\Models;

use App\Models\Traits\HasFeaturedImageSeo;
use App\Models\Traits\HasYoastSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    use HasFeaturedImageSeo;
    use HasYoastSeo;

    protected $fillable = [
        'title',
        'slug',
        'tagline',
        'hero_badge',
        'icon',
        'summary',
        'content',
        'features',
        'benefits',
        'benchmarks',
        'featured_image',
        'status',
        'order',
        'is_featured',
        'focus_keyword',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'is_indexable',
        'seo_score',
        'readability_score',
        'schema_markup',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'benefits' => 'array',
            'benchmarks' => 'array',
            'is_featured' => 'boolean',
            'is_indexable' => 'boolean',
            'order' => 'integer',
            'seo_score' => 'integer',
            'readability_score' => 'integer',
        ];
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saved(function (): void {
            Cache::forget('active_redirect_rule_paths');
        });

        static::deleted(function (): void {
            Cache::forget('active_redirect_rule_paths');
        });
    }

    /**
     * Determine if this service belongs to Solar Installation.
     */
    public function isSolar(): bool
    {
        return str_contains($this->slug, 'solar-installation') ||
               str_contains($this->slug, 'solar-panel') ||
               str_contains($this->slug, 'solar-system') ||
               str_contains($this->slug, 'on-grid') ||
               str_contains($this->slug, 'hybrid');
    }

    /**
     * Determine if this service belongs to Solar Frame Structure.
     */
    public function isSolarFrame(): bool
    {
        return str_contains($this->slug, 'frame') ||
               str_contains($this->slug, 'structure') ||
               str_contains($this->slug, 'mounting') ||
               str_contains($this->slug, 'carport') ||
               str_contains($this->slug, 'tracker');
    }

    /**
     * Determine if this service belongs to CCTV Services.
     */
    public function isCctv(): bool
    {
        return str_contains($this->slug, 'cctv') ||
               str_contains($this->slug, 'camera') ||
               str_contains($this->slug, 'surveillance') ||
               str_contains($this->slug, 'hikvision') ||
               str_contains($this->slug, 'dahua') ||
               str_contains($this->slug, 'security');
    }

    /**
     * Determine if this service belongs to Lithium Batteries.
     */
    public function isLithiumBattery(): bool
    {
        return str_contains($this->slug, 'lithium') ||
               str_contains($this->slug, 'battery') ||
               str_contains($this->slug, 'lifepo4') ||
               str_contains($this->slug, 'storage') ||
               str_contains($this->slug, 'energy-storage');
    }

    /**
     * Backwards compatibility methods.
     */
    public function isCooling(): bool
    {
        return false;
    }

    public function isPower(): bool
    {
        return false;
    }

    public function isTrading(): bool
    {
        return false;
    }

    /**
     * Get effective hero badge with standard default.
     */
    public function getEffectiveHeroBadgeAttribute(): string
    {
        if ($this->hero_badge) {
            return $this->hero_badge;
        }

        if ($this->isSolar()) {
            return 'Tier-1 High-Efficiency Solar PV Modules • K-Electric Net Metering Approved • 25-Year Warranty';
        }

        if ($this->isSolarFrame()) {
            return 'Heavy-Duty Hot-Dip Galvanized & Aluminium Fabrication • 140+ km/h Karachi Wind-Resistant • Custom Ground & Rooftop Mounting';
        }

        if ($this->isCctv()) {
            return 'Authorized Hikvision & Dahua Partner • 4K Sony Sensor AI Security • 24/7 Remote Viewing & AMC';
        }

        if ($this->isLithiumBattery()) {
            return 'Grade-A LiFePO4 Chemistry • 6,000+ Deep Cycles (15+ Years) • Built-in Smart BMS Protection';
        }

        return 'Karachi Premier Clean Energy & Security Hub • Certified EPC Engineering • Turnkey Installation';
    }

    /**
     * Get effective benchmarks array with lab defaults.
     */
    public function getEffectiveBenchmarksAttribute(): array
    {
        $defaults = [
            'standard' => 'IEC 61215 / IEC 61730 & K-Electric Net-Metering Compliant',
            'evaluation' => 'Free Karachi Site Assessment, Roof Load Analysis & Yield Estimation',
            'guarantee' => '25-Year Solar Linear Performance & 5-10 Year LiFePO4 Warranty',
            'turnaround' => 'Fast Mobilization Across DHA, Clifton, SITE, Korangi & All Karachi',
            'support' => 'Dedicated Technical Support & Lifetime System Monitoring',
        ];

        return array_merge($defaults, is_array($this->benchmarks) ? $this->benchmarks : []);
    }

    /**
     * Scope for published services.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope for featured services.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope ordered by custom order index.
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Featured image URL accessor.
     */
    public function getFeaturedImageUrlAttribute(): ?string
    {
        if (! $this->featured_image) {
            return null;
        }

        if (str_starts_with($this->featured_image, 'http://') || str_starts_with($this->featured_image, 'https://')) {
            return $this->featured_image;
        }

        $clean = ltrim($this->featured_image, '/');

        if (str_starts_with($clean, 'images/')) {
            return asset($clean);
        }

        if (file_exists(public_path($clean))) {
            return asset($clean);
        }

        if (str_starts_with($clean, 'storage/')) {
            return asset($clean);
        }

        if (file_exists(public_path('storage/'.$clean))) {
            return asset('storage/'.$clean);
        }

        return asset($clean);
    }

    /**
     * SEO Title fallback.
     */
    public function getSeoTitleAttribute(): string
    {
        return $this->meta_title ?: ($this->title.' - '.config('app.name', 'FWB Ventures'));
    }

    /**
     * SEO Description fallback.
     */
    public function getSeoDescriptionAttribute(): string
    {
        if ($this->meta_description) {
            return $this->meta_description;
        }

        if ($this->summary) {
            return Str::limit(strip_tags($this->summary), 160);
        }

        return Str::limit(strip_tags($this->content ?? ''), 160);
    }

    /**
     * SEO Image fallback.
     */
    public function getSeoImageAttribute(): string
    {
        $image = $this->og_image ?: $this->featured_image;

        if (! $image) {
            return asset('images/services/solar/solar-rooftop-installation-karachi.webp');
        }

        if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
            return $image;
        }

        $clean = ltrim($image, '/');

        if (str_starts_with($clean, 'images/')) {
            return asset($clean);
        }

        if (file_exists(public_path($clean))) {
            return asset($clean);
        }

        if (str_starts_with($clean, 'storage/')) {
            return asset($clean);
        }

        if (file_exists(public_path('storage/'.$clean))) {
            return asset('storage/'.$clean);
        }

        return asset($clean);
    }

    /**
     * Automatically generate unique slug.
     */
    public static function createUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    /**
     * Extract structured FAQs from service content for Schema.org JSON-LD.
     *
     * @return array<int, array{question: string, answer: string}>
     */
    public function getFaqsAttribute(): array
    {
        if (empty($this->content)) {
            return [];
        }

        $faqs = [];

        // 1. Try matching <details><summary>Question</summary><div>Answer</div></details>
        if (preg_match_all('/<details[^>]*>\s*<summary[^>]*>(.*?)<\/summary>\s*<div[^>]*>(.*?)<\/div>\s*<\/details>/is', $this->content, $detailMatches)) {
            foreach ($detailMatches[1] as $index => $rawQuestion) {
                // Remove arrows like ▼ or icons
                $cleanQ = preg_replace('/[▼▲►▼]/u', '', strip_tags($rawQuestion));
                $cleanQ = trim($cleanQ);
                $cleanA = trim(strip_tags($detailMatches[2][$index] ?? ''));
                if ($cleanQ !== '' && $cleanA !== '') {
                    $faqs[] = [
                        'question' => $cleanQ,
                        'answer' => $cleanA,
                    ];
                }
            }
        }

        // 2. Fallback or additional: <h3/h4>Question?</h3/h4><p>Answer</p>
        if (empty($faqs)) {
            preg_match_all('/<h[34][^>]*>([^<]*\?[^<]*)<\/h[34]>\s*<p[^>]*>(.*?)<\/p>/is', $this->content, $headingMatches);
            if (! empty($headingMatches[1])) {
                foreach ($headingMatches[1] as $index => $question) {
                    $q = trim(strip_tags($question));
                    $a = trim(strip_tags($headingMatches[2][$index] ?? ''));
                    if ($q !== '' && $a !== '') {
                        $faqs[] = [
                            'question' => $q,
                            'answer' => $a,
                        ];
                    }
                }
            }
        }

        return $faqs;
    }
}
