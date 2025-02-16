<?php

namespace App\Services\Interfaces;

interface AuthService
{
    public function login($credentials);
    public function register($data);
    public function logout();
    public function respondWithToken($token);
}
