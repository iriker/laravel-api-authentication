<?php

namespace Pivotal\Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TokenTest extends TestCase
{
    use DatabaseMigrations;

    protected $email = 'john@example.com';

    protected $correctPassword = 'password';

    protected $incorrectPassword = 'fakepassword';

    public function testTokenIsReturned()
    {
        $user = factory(User::class)->create([
            'email' => $this->email,
            'password' => bcrypt($this->correctPassword),
        ]);

        $response = $this->json('post', getenv('APP_DOMAIN') . '/login', [
            'email' => $this->email,
            'password' => $this->correctPassword,
        ]);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'token',
                ],
            ],
        ])->assertStatus(200);
    }

    public function testTokenIsNotReturned()
    {
        $user = factory(User::class)->create([
            'email' => $this->email,
            'password' => bcrypt($this->correctPassword),
        ]);

        $response = $this->json('post', getenv('APP_DOMAIN') . '/login', [
            'email' => $this->email,
            'password' => $this->incorrectPassword,
        ]);

        $response->assertJsonStructure([
            'errors' => [
                '*' => [
                    'message',
                ],
            ],
        ])->assertStatus(401);
    }
}