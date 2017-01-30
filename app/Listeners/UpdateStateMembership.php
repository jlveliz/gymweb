<?php

namespace GymWeb\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GymWeb\Models\Membership;
use GymWeb\Events\CheckStateMembership;

class UpdateStateMembership
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
    public function handle(CheckStateMembership $event)
    {
        
        $membershipToUpdate = Membership::find($event->detailMembership->membership_id);

        //state phisical
        // $jobSecuenceDay = $event->detailMembership->length_secuence_day ? $event->detailMembership->length_secuence_day : null;
        // $maxJobDaysMembership = $membershipToUpdate->max_day ? $membershipToUpdate->max_days : null;
        
        //state economics
        $sumPayments =      $membershipToUpdate->getSumPayments();
        $membershipPrice =  $membershipToUpdate->price;
       

        //state 'caducado' or 'activo'
        // if ($jobSecuenceDay) {
        //     if ($jobSecuenceDay == $maxJobDaysMembership) {
        //         $membershipToUpdate->membership_state_phisical = $membershipToUpdate->getInactive();
        //     }
        // }

        //state 'impago', 'Abonado' or 'Pagado'
        if ($event->detailMembership->value) {
            if ($sumPayments < $membershipPrice) {
                $membershipToUpdate->membership_state_economic = $membershipToUpdate->stateEconomics['abonado'];
            } else if($sumPayments == $membershipPrice){    
                $membershipToUpdate->membership_state_economic = $membershipToUpdate->stateEconomics['pagado'];
            } else {
                $membershipToUpdate->membership_state_economic = $membershipToUpdate->stateEconomics['impago'];
            }
        }

        $membershipToUpdate->save();

    }
}
