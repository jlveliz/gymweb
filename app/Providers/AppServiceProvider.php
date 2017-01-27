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

        //BOOKS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MembershipRepositoryInterface',
            'GymWeb\Repository\MembershipRepository'
        );

        //TYPE BOOKS
        $this->app->bind(
            'GymWeb\RepositoryInterface\MembershipTypeRepositoryInterface',
            'GymWeb\Repository\MembershipTypeRepository'
        );

        //BOOKS DETAILS
        $this->app->bind(
            'GymWeb\RepositoryInterface\BookDetailRepositoryInterface',
            'GymWeb\Repository\BookDetailRepository'
        );

        //BOOKS PAYMENTS DETAILS
        $this->app->bind(
            'GymWeb\RepositoryInterface\BookPaymentDetailRepositoryInterface',
            'GymWeb\Repository\BookPaymentDetailRepository'
        );
    }
}
