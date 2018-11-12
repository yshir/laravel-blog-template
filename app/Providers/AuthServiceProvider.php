<?php

namespace App\Providers;

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

        Gate::define('system-only', function($user) {
            return (in_array($user->role, ['system']));
        });
        Gate::define('admin-higher', function($user) {
            return (in_array($user->role, ['system', 'admin']));
        });
        Gate::define('user-higher', function($user) {
            return (in_array($user->role, ['system', 'admin', 'user']));
        });
        Gate::define('editor-higher', function($user) {
            return (in_array($user->role, ['system', 'admin', 'user', 'editor']));
        });
    }
}
