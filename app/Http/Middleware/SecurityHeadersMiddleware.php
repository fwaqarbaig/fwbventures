<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request and attach enterprise security headers.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=()');
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');

        // Content Security Policy (CSP)
        // Explicitly allow all legitimate CDNs, styles, fonts, scripts, and media used across frontend and admin
        $csp = [
            "default-src 'self' 'unsafe-inline' data: blob:",
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com https://cdn.jsdelivr.net https://unpkg.com https://www.googletagmanager.com https://fonts.bunny.net",
            "style-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdn.jsdelivr.net https://fonts.googleapis.com https://fonts.bunny.net",
            "font-src 'self' https://fonts.gstatic.com https://fonts.bunny.net data:",
            "img-src 'self' data: https: blob: https://api.qrserver.com",
            "connect-src 'self' https://cdn.tailwindcss.com https://unpkg.com https: ws: wss:",
            "frame-src 'self' https://www.google.com https://www.youtube.com https://youtube-nocookie.com https://player.vimeo.com",
            "frame-ancestors 'self'",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self' https://wa.me",
        ];
        $response->headers->set('Content-Security-Policy', implode('; ', $csp));

        // Prevent header leakage
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');

        if ($request->isSecure() || app()->isProduction()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
        }

        return $response;
    }
}
