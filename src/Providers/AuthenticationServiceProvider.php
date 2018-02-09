<?php

namespace Pivotal\ApiAuthentication\Providers;

class AuthenticationServiceProvider
{
    public function routes()
    {
        require __DIR__.'../Routes/api.php';
    }
}