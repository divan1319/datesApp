<?php

namespace App\Domain\Repository;

use App\Domain\Dtos\Auth\LoginDto;
use App\Domain\Dtos\Auth\RegisterDto;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserRepository{

    public function createUser(RegisterDto $registerDto):JsonResponse{
        try {
            $user = User::create([
                'name' => $registerDto->name,
                'username' => $registerDto->username,
                'email' => $registerDto->email,
                'telephone' => $registerDto->telephone,
                'dui' => $registerDto->dui,
                'password' => Hash::make($registerDto->password)
            ])->sendEmailVerificationNotification();
            
            return response()->json([
                'info'=>'Usuario creado exitosamente',
                
            ],201);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Hubo un error al registrar el usuario' . $th->getMessage()
            ],500);
        }
            
            
    }

    public function loginUser(LoginDto $loginDto):Authenticatable|JsonResponse{

        if (!auth()->attempt(['username' => $loginDto->username, 'password' => $loginDto->password])) {
            return response()->json([
                'error' => 'Tiene credencial le estoy preguntando'
            ], 422);
        }

        

        return auth()->user();
    }
}