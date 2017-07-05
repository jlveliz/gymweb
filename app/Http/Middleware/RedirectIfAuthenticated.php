<?php

namespace GymWeb\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if ($guard == 'member') {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect('/');
        //     }
        // } else if (!$guard ||$guard == 'member') {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect('/admgym/dashboard'); //TODO : CHANGE TO DASHBOARD
        //     }
        // }

        return $next($request);
    }
}
