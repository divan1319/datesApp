<?php

namespace App\Domain\Repository;

use App\Domain\Dtos\Auth\LoginDto;
use App\Domain\Dtos\Auth\RegisterDto;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class UserRepository{

    public function createUser(RegisterDto $registerDto):User{

            $user = User::create([
                'name' => $registerDto->name,
                'username' => $registerDto->username,
                'email' => $registerDto->email,
                'telephone' => $registerDto->telephone,
                'dui' => $registerDto->dui,
                'password' => Hash::make($registerDto->password)
            ]);
            return $user;
    }

    public function loginUser(LoginDto $loginDto):Authenticatable{
        
        if (!auth()->attempt(['username' => $loginDto->username, 'password' => $loginDto->password])) {
            return response([
                'error' => 'Credenciales inconrrectas'
            ], 422);
        }

        return auth()->user();;
    }
}