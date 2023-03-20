<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('user', function (User $user) {
            return $user->role == 'user';
        });

        Gate::define('admin', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('moderator', function (User $user) {
            return $user->role == 'moderator';
        });

        Gate::define('seller', function (User $user) {
            return $user->role == 'seller';
        });
    }
}
