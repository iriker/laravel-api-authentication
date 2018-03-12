<?php

namespace Pvtl\ApiAuthentication\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Our root directory for this package to make traversal easier
     */
    const PACKAGE_DIR = __DIR__ . '/../../';

    /**
     * Bootstrap the application services
     *
     * @param Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->strapRoutes();
        $this->strapMiddleware($router);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(ApiAuthentication::class, 'JWTApiAuthentication');
    }

    /**
     * Bootstrap our Routes
     */
    protected function strapRoutes()
    {
        $this->loadRoutesFrom(self::PACKAGE_DIR . 'routes/api.php');
    }

    /**
     * Bootstrap our Middleware
     * @param Router $router
     */
    protected function strapMiddleware(Router $router)
    {
        $router->aliasMiddleware('jwt.auth', \Tymon\JWTAuth\Middleware\GetUserFromToken::class);
        $router->aliasMiddleware('jwt.refresh', \Tymon\JWTAuth\Middleware\RefreshToken::class);
    }
}