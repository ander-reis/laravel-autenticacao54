<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Executa antes do Gate:define()
         * se user não for admin = false, bloqueia tudo
         * se usar for admin = true, libera tudo
         */
//        Gate::before(function ($user){
//           if($user->role == User::ROLE_ADMIN){
//               return true;
//           }
//        });

        /**
         * só vai liberar acesso se user for admin
         */
        Gate::define('admin', function ($user){
            return $user->role == User::ROLE_ADMIN;
        });
    }
}
