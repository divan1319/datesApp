<?php

namespace App\Presentation\Services;

use App\Domain\Entities;
use App\Http\Requests\Auth\RegisterRequest;

class AuthService {

    public function __construct()
    {}

    public function registerUser(RegisterRequest $registerRequest){
        $data = $registerRequest->validated();

        //Registrando al usuario

        
    }
}