<?php

namespace App\Models;

use App\Models\Traits\HasFeaturedImageSeo;
use App\Models\Traits\HasYoastSeo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    use HasFeaturedImageSeo;
    use HasYoastSeo;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'featured_image',
        'template',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'is_indexable',
        'focus_keyword',
        'seo_score',
        'readability_score',
        'schema_markup',
    ];

    protected function casts(): array
    {
        return [
            'is_indexable' => 'boolean',
            'seo_score' => 'integer',
            'readability_score' => 'integer',
        ];
    }

    /**
     * Author relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'FWB Ventures Engineering Team',
            'email' => 'info@fwbventures.com',
        ]);
    }

    /**
     * Scope for published pages.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
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
}
