<?php

namespace Pivotal\Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testLoginRouteExists()
    {
        $response = $this->post(getenv('APP_DOMAIN') . '/login');

        $response->assertStatus(401);
    }
}