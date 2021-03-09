<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotMitra
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "mitra")
    {
        if (!auth()->guard($guard)->check()) {
            return redirect(route('login.mitra'));
        }
        return $next($request);
    }
}
