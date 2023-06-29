<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if ($request->user()) {
            // Check if the user has any of the specified roles
            foreach ($roles as $role) {
                if ($request->user()->hasRole($role)) {
                    // User has at least one of the required roles, proceed with the request
                    return $next($request);
                }
            }
        }

        // User does not have any of the required roles, return unauthorized response
        abort(403, 'Unauthorized');
    }
}
