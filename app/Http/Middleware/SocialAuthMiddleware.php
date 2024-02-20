<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $services = ['facebook', 'twitter', 'linkedin', 'google', 'github', 'gitlab'];

        $enabledServices = [];
        foreach ($services as $service) {
            if (config('services.'.$service)) {
                $enabledServices[] = $service;
            }
        }

        if (! in_array(strtolower($request->service), $enabledServices)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'invalid social service',
                ], 403);
            }

            return redirect()->back();
        }

        return $next($request);
    }
}
