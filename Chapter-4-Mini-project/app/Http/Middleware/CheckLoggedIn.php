<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        // Simple practice check: toggle this flag to simulate auth state.
        $loggedIn = true;

        if (! $loggedIn) {
            abort(403, 'Access denied. Please log in first.');
        }

        return $next($request);
    }
}
