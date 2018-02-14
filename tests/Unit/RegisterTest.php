<?php

namespace Pivotal\Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Register extends TestCase
{
    use RefreshDatabase;

    protected $name = 'John Smith';

    protected $email = 'john@example.com';

    protected $password = 'password';

    public function testSuccessfulRegistration()
    {
        $response = $this->json('post', getenv('APP_DOMAIN') . '/register', [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $response->assertStatus(203);
    }

    public function testExistingEmailRegistration()
    {
        $existingUser = factory(User::class)->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $response = $this->json('post', getenv('APP_DOMAIN') . '/register', [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $response->assertStatus(409);
    }

    public function testMissingDataForRegistration()
    {
        $response = $this->json('post', getenv('APP_DOMAIN') . '/register', [
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $response->assertStatus(403);
    }
}

