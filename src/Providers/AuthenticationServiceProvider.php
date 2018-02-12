<?php

namespace Pivotal\ApiAuthentication\Providers;

use Illuminate\Support\ServiceProvider;
use Pivotal\ApiAuthentication\ApiAuthentication;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '../Routes/api.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(ApiAuthentication::class, 'VoyagerApiAuthentication');
    }
}