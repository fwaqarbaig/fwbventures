<?php

namespace App\Services;

class HtmlSanitizer
{
    /**
     * Dangerous tags that must never be permitted in stored rich text HTML.
     */
    protected const DANGEROUS_TAGS = [
        'script',
        'object',
        'embed',
        'applet',
        'meta',
        'link',
        'base',
        'form',
        'input',
        'button',
        'textarea',
        'frame',
        'frameset',
    ];

    /**
     * Sanitize user-provided HTML content to neutralize Stored XSS vectors while preserving legitimate styling.
     */
    public static function clean(?string $html): ?string
    {
        if ($html === null || trim($html) === '') {
            return $html;
        }

        $cleaned = $html;

        // 1. Strip dangerous tags and their contents
        foreach (self::DANGEROUS_TAGS as $tag) {
            $cleaned = preg_replace("#<{$tag}\b[^>]*>(.*?)</{$tag}>#is", '', $cleaned);
            $cleaned = preg_replace("#<{$tag}\b[^>]*\/?>#is", '', $cleaned);
        }

        // 2. Strip inline JavaScript event handlers (e.g. onload=, onerror=, onclick=, onmouseover=)
        $cleaned = preg_replace('/\s+on[a-z0-9_-]+\s*=\s*(["\'])(.*?)\1/is', '', $cleaned);
        $cleaned = preg_replace('/\s+on[a-z0-9_-]+\s*=\s*[^\s>]+/is', '', $cleaned);

        // 3. Disarm pseudo-protocol URLs in href, src, or xlink:href (javascript:, vbscript:, data:text/html)
        $cleaned = preg_replace_callback(
            '/\b(href|src|xlink:href)\s*=\s*(["\'])(.*?)\2/is',
            function ($matches) {
                $attr = $matches[1];
                $quote = $matches[2];
                $val = trim($matches[3]);

                // Normalize HTML entities and whitespace
                $decoded = html_entity_decode($val, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $decoded = preg_replace('/\s+/', '', strtolower($decoded));

                if (
                    str_starts_with($decoded, 'javascript:') ||
                    str_starts_with($decoded, 'vbscript:') ||
                    str_starts_with($decoded, 'data:text/html') ||
                    str_starts_with($decoded, 'data:application')
                ) {
                    return "{$attr}={$quote}#{$quote}";
                }

                return "{$attr}={$quote}{$val}{$quote}";
            },
            $cleaned
        );

        // 4. Strip iframe unless explicitly embedded from trusted video domains (YouTube, Vimeo, Google Maps)
        $cleaned = preg_replace_callback(
            '/<iframe\b([^>]*)>(.*?)<\/iframe>/is',
            function ($matches) {
                $attrs = $matches[1];
                if (preg_match('/src\s*=\s*["\'](https:\/\/(www\.)?(youtube\.com|youtube-nocookie\.com|player\.vimeo\.com|google\.com\/maps)[^"\']*)["\']/i', $attrs)) {
                    // Safe embed, preserve iframe but strip any event handlers
                    $cleanAttrs = preg_replace('/\s+on[a-z0-9_-]+\s*=\s*([^\s>]+|["\'].*?["\'])/is', '', $attrs);

                    return "<iframe {$cleanAttrs}></iframe>";
                }

                return '';
            },
            $cleaned
        );

        return $cleaned;
    }

    /**
     * Inspect an SVG string for security vulnerabilities (XSS, XXE, script execution).
     * Returns true if the SVG is safe, false if any suspicious or dangerous vector is found.
     */
    public static function isSafeSvg(string $content): bool
    {
        if (trim($content) === '') {
            return false;
        }

        // Must look like an SVG
        if (! preg_match('/<svg\b[^>]*>/i', $content)) {
            return false;
        }

        // Strip comments first to prevent bypass via comment injection
        $stripped = preg_replace('/<!--.*?-->/s', '', $content);

        // Disallow XML entity declarations (XXE defense)
        if (preg_match('/<!ENTITY|<!DOCTYPE[^>]*SYSTEM/i', $stripped)) {
            return false;
        }

        // Disallow dangerous tags
        if (preg_match('/<(script|object|embed|foreignObject|iframe|applet|meta|link|base|form|input|button|textarea)\b/i', $stripped)) {
            return false;
        }

        // Disallow any inline event handler (e.g. onload, onerror, onclick, onmouseover)
        if (preg_match('/\bon[a-z0-9_-]+\s*=/i', $stripped)) {
            return false;
        }

        // Disallow dangerous pseudo-protocols in attributes (href, xlink:href, etc.)
        if (preg_match('/\b(href|xlink:href|src)\s*=\s*(["\'])\s*(javascript:|vbscript:|data:text\/html|data:application\/)/i', $stripped)) {
            return false;
        }

        // Disallow animation manipulation of scripts or URLs
        if (preg_match('/<(animate|set)\b[^>]*(attributeName\s*=\s*["\'](href|xlink:href|on\w+)["\'])/i', $stripped)) {
            return false;
        }

        return true;
    }
}
