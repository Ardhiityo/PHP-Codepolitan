<?php

namespace App\Services\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\AuthService;

class AuthRepository implements AuthService
{
    public function login($credentials)
    {
        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['errors' => 'unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function register($data)
    {
        $user = User::create($data);
        return response()->json([
            'data' => [
                $user
            ]
        ], 201);
    }

    public function respondWithToken($token)
    {
        return response()->json(['data' => [
            [
                'user' => Auth::user(),
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 60
            ]
        ]]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['data' => [
            'message' => 'Successfully logged out'
        ]]);
    }
}
