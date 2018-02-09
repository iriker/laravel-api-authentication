<?php

namespace Pivotal\ApiAuthentication;

class ApiAuthentication
{
    public function routes()
    {
        require __DIR__.'/Routes/api.php';
    }
}