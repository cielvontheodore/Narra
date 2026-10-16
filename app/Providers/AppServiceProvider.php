<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define('manage-admins', function (User $user) {
            return $user->role === 'super_admin';
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-admins', function (User $user) {
            return $user->role === 'super_admin';
        });

       // if (app()->environment('local')) {
       //     URL::forceScheme('https');
       // }

    }
}
