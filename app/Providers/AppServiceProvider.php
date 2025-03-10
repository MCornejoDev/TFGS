<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('viewUsers', [UserPolicy::class, 'view']);
    }
}
