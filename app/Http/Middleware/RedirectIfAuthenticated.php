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
        
        switch ($guard) {
            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect('/admgym/dashboard'); //TODO : CHANGE TO DASHBOARD
                }
                break;
            
            case 'member':
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }
        return $next($request);
    }
}
