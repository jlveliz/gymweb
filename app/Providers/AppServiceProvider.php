<?php

namespace GymWeb\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        

        //REGISTERS LOGS

        ///USERS ACCESS LOG
        $this->app->bind(
            'GymWeb\RepositoryInterface\UserAccessLogRepositoryInterface',
            'GymWeb\Repository\UserAccessLogRepository'
        );

        ///END LOGS

        //USERS
        $this->app->bind(
            'GymWeb\RepositoryInterface\UserRepositoryInterface',
            'GymWeb\Repository\UserRepository'
        );

        //PERMISSIONS
        $this->app->bind(
            'GymWeb\RepositoryInterface\PermissionRepositoryInterface',
            'GymWeb\Repository\PermissionRepository'
        );

        //ROLES
        $this->app->bind(
            'GymWeb\RepositoryInterface\RoleRepositoryInterface',
            'GymWeb\Repository\RoleRepository'
        );

        //CLIENTS
        $this->app->bind(
            'GymWeb\RepositoryInterface\ClientRepositoryInterface',
            'GymWeb\Repository\ClientRepository'
        );

        //DIVISIONS
        $this->app->bind(
            'GymWeb\RepositoryInterface\DivisionRepositoryInterface',
            'GymWeb\Repository\DivisionRepository'
        );


        //MEMBERSHIPS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MembershipRepositoryInterface',
            'GymWeb\Repository\MembershipRepository'
        );
        //TYPE MEMBERSHIPS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MembershipTypeRepositoryInterface',
            'GymWeb\Repository\MembershipTypeRepository'
        );

        //MEMBERSHIPS DETAILS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MembershipDetailRepositoryInterface',
            'GymWeb\Repository\MembershipDetailRepository'
        );

        //MEMBERSHIPS PAYMENTS DETAILS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MembershipPaymentDetailRepositoryInterface',
            'GymWeb\Repository\MembershipPaymentDetailRepository'
        );
    }
}
