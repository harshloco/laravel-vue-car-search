<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    use PrepareValidator;

    private $loginUserUrl;


    public function setUp()
    {
        parent::setUp();
        $this->loginUserUrl = route('user.login');
        $this->validationRules = (new LoginRequest())->rules();
    }

    public function testIdentityRule()
    {
        $this->assertFalse(
            $this->validateField('user.identity', '')
        );
        $this->assertFalse(
            $this->validateField('user.identity', 'ut')
        );
        $this->assertFalse(
            $this->validateField('user.identity', str_random(255))
        );
    }

    

    public function testInvalidPassword()
    {
        $invalidPasswords = [
            '', 'qwerty', Str::random(37)
        ];

        foreach ($invalidPasswords as $password) {
            $data = [
                'user' => [
                    'identity' => 'randomeidentity',
                    'password' => $password
                ]
            ];
            $this->json('POST', $this->loginUserUrl, $data)
                ->assertStatus(422)
                ->assertJsonStructure([
                    'message',
                    'errors' => [
                        'user.password'
                    ]
                ]);
        }
    }
}
