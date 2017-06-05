<?php

namespace GymWeb\Http\Middleware;

use Closure;

use GymWeb\Models\Membership;

class PayMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $membershipId = $request->route()->getParameter('memberships');
        $memberId = $request->route()->getParameter('members');
        if (!$membershipId) return redirect()->route('admgym.members.show',$memberId);
        $membership = Membership::find($membershipId);
        if (!$membership || ($membership->membership_state_economic == (new Membership())->stateEconomics['pagado'])) {
            return redirect()->route('admgym.members.show',$memberId);
        }
        return $next($request);
    }
}
