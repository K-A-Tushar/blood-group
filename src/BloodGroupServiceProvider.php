<?php

namespace Tushar\BloodGroup;

use Illuminate\Support\ServiceProvider;

class BloodGroupServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/../config/bloodgroup.php' => config_path('bloodgroup.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bloodgroup.php', 'bloodgroup'
        );
    }
}
