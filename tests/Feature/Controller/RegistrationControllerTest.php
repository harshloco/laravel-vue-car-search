<?php

namespace Tests\Feature\Controller;

use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    private $registerUrl = '/api/users';

    public function testInvalidRegister()
    {
        $this->json('POST', $this->registerUrl)
            ->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'user.login',
                    'user.email',
                    'user.password'
                ]
            ]);
    }

    public function testValidRegister()
    {
        $this->json('POST', $this->registerUrl, [
            'user' => [
                'login' => 'someRandomName',
                'email' => 'random12321238432@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password'
            ]
        ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
                'userId',
                'status',
                'code',
            ]);
    }
}
