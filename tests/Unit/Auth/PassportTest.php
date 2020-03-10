<?php

namespace Tests\Unit\Auth;

use App\User;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;
use Tests\TestCase;


class PassportTest extends TestCase
{
    private $tokenUrl = '/oauth/token';
    private $authenticatedUser;
    private $clientSecret;

    public function setUp()
    {
        parent::setUp();
        $this->authenticatedUser = factory(User::class)->create();
        $this->clientSecret = DB::table('oauth_clients')
            ->where('id', config('auth.passport.client.id'))
            ->first()
            ->secret;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetJWTByValidData()
    {
        $data = [
            'grant_type' => config('auth.passport.grant'),
            'client_id' => config('auth.passport.client.id'),
            'client_secret' => $this->clientSecret,
            'username' => $this->authenticatedUser->login,
            'password' => 'password',
            'scope' => '*'
        ];
        $this->json('POST', $this->tokenUrl, $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'token_type',
                'expires_in',
                'access_token',
                'refresh_token'
            ]);
    }

  
}
