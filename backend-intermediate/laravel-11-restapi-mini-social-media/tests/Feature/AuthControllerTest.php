<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Seeders\UserSeeder;

class AuthControllerTest extends TestCase
{
    public function testLoginSuccess()
    {
        $this->seed(UserSeeder::class);

        $data = $this->post('/api/login', [
            'email' => "test@test",
            "password" => "rahasia"
        ])
            ->assertStatus(200);

        self::assertNotNull($data->json('data.0.user.fullname'));
        self::assertNotNull($data->json('data.0.user.email'));
        self::assertNotNull($data->json('data.0.access_token'));

        return $data;
    }

    public function testLoginFailed()
    {
        $this->seed(UserSeeder::class);

        $data = $this->post('/api/login', [
            'email' => "test@test",
            "password" => "salah"
        ])
            ->assertJson(['errors' => 'unauthorized'])
            ->assertStatus(401);
    }

    public function testLoginRequired()
    {
        $data = $this->post('/api/login', [
            'email' => "",
            "password" => ""
        ])
            ->assertJson([
                'errors' =>
                [
                    'email' =>
                    ['The email field is required.'],
                    'password' =>
                    ['The password field is required.']
                ]
            ])
            ->assertStatus(400);
    }

    public function testRegisterSuccess()
    {
        $this->seed(UserSeeder::class);

        $this->post('/api/register', [
            'fullname' => 'andi',
            'email' => 'andi@test',
            'password' => 'rahasia'
        ])->assertStatus(201);
    }

    public function testRegisterAlreadyExist()
    {
        $this->seed(UserSeeder::class);

        $this->post('/api/register', [
            'fullname' => 'test',
            'email' => 'test@test',
            'password' => 'rahasia'
        ])
            ->assertJson([
                'errors' => [
                    'email' =>
                    ['The email has already been taken.']
                ]
            ])
            ->assertStatus(400);
    }

    public function testRegisterRequired()
    {
        $this->seed(UserSeeder::class);

        $this->post('/api/register', [
            'fullname' => '',
            'email' => '',
            'password' => ''
        ])
            ->assertJson([
                'errors' => [
                    'email' =>
                    ['The email field must be a valid email address.', 'The email field is required.'],
                    'fullname' =>
                    ['The fullname field is required.'],
                    'password' =>
                    ['The password field is required.']
                ]
            ])
            ->assertStatus(400);
    }

    public function testLogoutSuccess()
    {
        $credentials = $this->testLoginSuccess()->json('data.0.access_token');

        $this
            ->withHeader('Authorization', 'bearer' . $credentials)
            ->post('/api/logout')
            ->assertJson(['data' => ['message' => 'Successfully logged out']])
            ->assertStatus(200);
    }

    public function testLogoutTokenNotProvided()
    {
        $this
            ->post('/api/logout')
            ->assertJson(['error' => 'Token not provided'])
            ->assertStatus(401);
    }

    public function testLogoutTokenInvalid()
    {
        $this
            ->withHeader('Authorization', 'bearer 123')
            ->post('/api/logout')
            ->assertJson(['error' => 'Token invalid'])
            ->assertStatus(401);
    }
}
