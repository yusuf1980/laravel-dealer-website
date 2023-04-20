<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            abort(403);
        }
        $role = is_array($role)
            ? $role
            : explode('|', $role);
        if (! Auth::user()->hasAnyRole($role)) {
            abort(403);
        }
        return $next($request);
    }
}
