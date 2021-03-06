<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('admin', function ($user) {
            return $user->hasRole('Admin');
        });

        Gate::define('operator', function ($user) {
            return $user->hasRole('Operator');
        });

        Gate::define('kasie', function ($user) {
            return $user->hasRole('Kasie');
        });

        Gate::define('kabid', function ($user) {
            return $user->hasRole('Kabid');
        });

        Gate::define('kadis', function ($user) {
            return $user->hasRole('Kadis');
        });

        Gate::define('loket', function ($user) {
            return $user->hasRole('Operator Loket');
        });
    }
}
