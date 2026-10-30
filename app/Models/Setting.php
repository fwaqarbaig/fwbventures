<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    protected static function booted(): void
    {
        static::saved(function () {
            static::clearCache();
        });

        static::deleted(function () {
            static::clearCache();
        });
    }

    /**
     * Get all settings cached in memory / cache store.
     *
     * @return array<string, mixed>
     */
    public static function allCached(): array
    {
        return Cache::rememberForever('app_settings_map', function () {
            return static::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Retrieve a setting by its key with fallback.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $settings = static::allCached();

        if (array_key_exists($key, $settings) && $settings[$key] !== null && $settings[$key] !== '') {
            return $settings[$key];
        }

        return $default;
    }

    /**
     * Set / update a setting value.
     */
    public static function set(string $key, mixed $value, string $group = 'general'): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );

        static::clearCache();

        return $setting;
    }

    /**
     * Clear settings cache.
     */
    public static function clearCache(): void
    {
        Cache::forget('app_settings_map');
    }
}
