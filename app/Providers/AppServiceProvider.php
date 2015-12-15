<?php

namespace App\Providers;

use App\Events\UserDeleted;
use App\Events\UserRegistered;
use App\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        User::created(function ($user) {
//            Event::fire(new UserRegistered($user));
//        });
//
//        User::deleted(function ($user) {
//            Event::fire(new UserDeleted($user));
//        });
        View::addNamespace('parsedownextra',
            base_path('resources/views/vendor/parsedownextra'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
