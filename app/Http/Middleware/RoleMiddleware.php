<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if ($request->user()) {
            // Check if the user has the specified role
            if ($request->user()->hasRole($role)) {
                // User has the required role, proceed with the request
                return $next($request);
            }
        }

        // User does not have the required role, return unauthorized response
        abort(403, 'Unauthorized');
    }
}
