<?php

namespace App\Presentation\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Presentation\Services\AuthService;


class AuthController extends Controller{
    public function __construct()
    {
        
    }
    public function register(RegisterRequest $registerRequest){
        dd('d');
        $user =  new AuthService();
        $newUser = $user->registerUser($registerRequest);

        return [
            'user'=> $newUser
        ];
    }
}