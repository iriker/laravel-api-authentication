<?php

namespace Pvtl\ApiAuthentication;

class ApiAuthentication
{
    public function routes()
    {
        require __DIR__.'/routes/api.php';
    }
}