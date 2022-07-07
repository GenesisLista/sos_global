<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // For Super Admin
        Gate::define('isSuperAdmin', function($user){
            return $user->role_id == 1;
        });

        // For Group Administrator
        Gate::define('isGroupAdministrator', function($user){
            return $user->role_id == 2;
        });

        // For Customer
        Gate::define('isCustomer', function($user){
            return $user->role_id == 3;
        });
        
    }
}
