<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// facade
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function ($user) {
            return $user->role === 'admin' || $user->role === 'developer';
        });
        Gate::define('developer', function ($user) {
            return $user->role === 'developer';
        });
    }
}