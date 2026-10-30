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

        if ($path !== '/' && str_ends_with($path, '/')) {
            $trimmedPath = rtrim($path, '/');
            $query = $request->getQueryString();
            $target = $query ? $trimmedPath.'?'.$query : $trimmedPath;

            return redirect($target, 301);
        }

        return $next($request);
    }
}
