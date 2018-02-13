<?php

namespace Pivotal\ApiAuthentication;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services
     *
     * @param Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');

        $router->aliasMiddleware('jwt.auth', \Tymon\JWTAuth\Middleware\GetUserFromToken::class);
        $router->aliasMiddleware('jwt.refresh', \Tymon\JWTAuth\Middleware\RefreshToken::class);
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