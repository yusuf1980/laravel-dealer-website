<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::guest()) {
            abort(403);
        }
        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);
        foreach ($permissions as $permission) {
            if (Auth::user()->can($permission) ) {
                return $next($request);
            }
        }
        abort(403);
    }
}
