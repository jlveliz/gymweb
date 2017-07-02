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

        ///MEMBERS ACCESS LOG
        $this->app->bind(
            'GymWeb\RepositoryInterface\MemberAccessLogRepositoryInterface',
            'GymWeb\Repository\MemberAccessLogRepository'
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

        //MEMBERS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MemberRepositoryInterface',
            'GymWeb\Repository\MemberRepository'
        );

        //CATEGORIES
        $this->app->bind(
            'GymWeb\RepositoryInterface\CategoryRepositoryInterface',
            'GymWeb\Repository\CategoryRepository'
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
            'GymWeb\RepositoryInterface\MembershipAssistanceDetailRepositoryInterface',
            'GymWeb\Repository\MembershipAssistanceDetailRepository'
        );

        //MEMBERSHIPS PAYMENTS DETAILS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MembershipPaymentDetailRepositoryInterface',
            'GymWeb\Repository\MembershipPaymentDetailRepository'
        );
    }
}
