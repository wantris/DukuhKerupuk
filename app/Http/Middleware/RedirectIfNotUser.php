<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "users")
    {
        if (!auth()->guard($guard)->check()) {
            return redirect(route('login.konsumen'));
        }
        return $next($request);
    }
}
