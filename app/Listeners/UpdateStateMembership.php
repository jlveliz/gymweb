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
        if ($membershipToUpdate->expiry_mode == 'day_job') {
            $jobSecuenceDay = $event->detailMembership->length_secuence_day ? $event->detailMembership->length_secuence_day : null;
            $maxJobDaysMembership = $membershipToUpdate->max_day_job > 0 ? $membershipToUpdate->max_day_job : null;
            
            //state 'caducado' or 'activo'
            if ($maxJobDaysMembership) {
                if ($jobSecuenceDay == $maxJobDaysMembership) {
                    $membershipToUpdate->membership_state_phisical = $membershipToUpdate->getInactive();
                }
            }

        }


        if ($membershipToUpdate->expiry_mode == 'period_to' && ( $event->detailMembership->date_job == $membershipToUpdate->period_to)) {
            $membershipToUpdate->membership_state_phisical = $membershipToUpdate->getInactive();
        }

        //state economics
        $sumPayments =      $membershipToUpdate->getSumPayments();
        $membershipPrice =  $membershipToUpdate->price;
       


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
