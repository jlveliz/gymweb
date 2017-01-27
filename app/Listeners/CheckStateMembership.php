<?php

namespace GymWeb\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GymWeb\Models\Membership;

class CheckStateMembership
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckStateMembership  $event
     * @return void
     */
    public function handle(\GymWeb\Events\CheckStateMembership $membership)
    {
        //state 'caducado' or 'activo'
        if ($membership->detail->secuence) {
            if ($membership->detail->secuence == (new Membership())->getMaxDaysDetail()) {
                $membershipToUpdate = Membership::find($membership->detail->membership_id);
                $membershipToUpdate->membership_state_phisical = (new Membership())->getInactive();
                $membershipToUpdate->save();
            }
        }

        //state 'impago', 'Abonado' or 'Pagado'
        if ($membership->detail->value) {

            $sumPayments = (new Membership())->getSumPayments($membership->detail->membership_id);
            if ($sumPayments < (new Membership())->getPrice($membership->detail->membership_id)) {
                
                $membershipToUpdate = Membership::find($membership->detail->membership_id);
                $membershipToUpdate->membership_state_economic = (new Membership())->stateEconomics['abonado'];
                $membershipToUpdate->save();

            } else if($sumPayments == (new Membership())->getPrice($membership->detail->membership_id)){
                
                $membershipToUpdate = Membership::find($membership->detail->membership_id);
                $membershipToUpdate->membership_state_economic = (new Membership())->stateEconomics['pagado'];
                $membershipToUpdate->save();

            } else {

                $membershipToUpdate = Membership::find($membership->detail->membership_id);
                $membershipToUpdate->membership_state_economic = (new Membership())->stateEconomics['impago'];
                $membershipToUpdate->save();

            }
        }


    }
}
