<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectTrailingSlash
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rawUri = (string) ($request->server->get('REQUEST_URI') ?: $request->getRequestUri());
        $path = parse_url($rawUri, PHP_URL_PATH) ?? '';
        $schemeAndHost = $request->getSchemeAndHttpHost();

        // 1. Strip any explicit /public segment(s) from the URL and redirect cleanly
        if (preg_match('#^/+(?:public(?:/|$))+#i', $path)) {
            $cleanPath = trim((string) preg_replace('#^/+(?:public(?:/|$))+|\/+$#i', '', $path), '/');
            $target = $cleanPath === '' ? '/' : '/'.$cleanPath;
            $query = $request->getQueryString();
            if ($query) {
                $target .= '?'.$query;
            }

            return redirect()->away($schemeAndHost.$target, 301);
        }

        // 2. Strip trailing slash for non-root paths
        if ($path !== '/' && str_ends_with($path, '/')) {
            $trimmedPath = rtrim($path, '/');
            $query = $request->getQueryString();
            $target = $query ? $trimmedPath.'?'.$query : $trimmedPath;

            return redirect()->away($schemeAndHost.$target, 301);
        }

        return $next($request);
    }
}
