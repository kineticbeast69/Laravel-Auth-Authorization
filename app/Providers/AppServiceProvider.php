<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        // admin gate
        Gate::define("isAdmin", function (User $user) {
            return $user->role === "admin";
        });

        // author gate
        Gate::define("isAuthor", function (User $user) {
            return $user->role === "author";
        });
    }
}
