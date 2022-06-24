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

        Gate::define('create-movie', function ($user) {
            return ($user->role === 'ADMIN' ) ;
        });
        Gate::define('delete-movie', function ($user) {
            return ($user->role === 'ADMIN') ;
        });
        Gate::define('update-movie', function ($user) {
            return ($user->role === 'ADMIN') ;
        });

        Gate::define('create-review', function ($user) {
            return ($user->role === 'ADMIN' || $user->role === 'USER' || $user->role === 'GUEST') ;
        });
        Gate::define('delete-review', function ($user) {
            return ($user->role === 'ADMIN' ) ;
        });
    }
}
