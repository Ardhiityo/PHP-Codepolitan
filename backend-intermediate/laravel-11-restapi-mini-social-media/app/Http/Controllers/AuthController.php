<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Services\Interfaces\AuthService;

class AuthController extends Controller
{
    public function __construct(private AuthService $authRepository) {}

    public function login(StoreLoginRequest $request)
    {
        return $this->authRepository->login($request->validated());
    }

    public function register(StoreRegisterRequest $request)
    {
        return $this->authRepository->register($request->validated());
    }

    public function logout()
    {
        return $this->authRepository->logout();
    }
}
