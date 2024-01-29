<?php

namespace App\Presentation\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Presentation\Services\AuthService;


class AuthController extends Controller{
    
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function register(RegisterRequest $registerRequest){
        
        
        $newUser = $this->authService->registerUser($registerRequest);
        
        return $newUser;
    }

    public function login(LoginRequest $loginRequest){
        
        $authUser = $this->authService->loginUser($loginRequest);

        return $authUser;
    }
}