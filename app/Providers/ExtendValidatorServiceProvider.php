<?php

namespace GymWeb\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

use GymWeb\Models\Membership;

class ExtendValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('exist_membership_active',function($attribute, $value, $parameters, $validator){
            $existMembershipActive = Membership::where($attribute,$value)
                               ->where('membership_state_phisical',(new Membership())->getActive())
                               ->first();
            if ($existMembershipActive) return false;
            return true;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
