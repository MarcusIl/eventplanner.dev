<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role = null)
{
    // Check if the user is authenticated
    if ($request->user()) {
        // Check if a role is specified and the user has the specified role
        if ($role && $request->user()->hasRole($role)) {
            // User has the required role, proceed with the request
            return $next($request);
        }
        // User is authenticated but does not have the required role, return unauthorized response
        abort(403, 'Unauthorized');
    }

    // User is not authenticated, allow the request to proceed
    return $next($request);
}

}