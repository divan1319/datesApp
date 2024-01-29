<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\Auth\LoginDto;
use App\Domain\Dtos\Auth\RegisterDto;
use App\Domain\Entities\UserEntity;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService
{

    public function __construct()
    {
    }

    public function registerUser(RegisterRequest $registerRequest)
    {

        $data = $registerRequest->validated();

        //Registrando al usuario
        try {

            $userDto = RegisterDto::createUser($data);

            $user = User::create([
                'name' => $userDto->name,
                'username' => $userDto->username,
                'email' => $userDto->email,
                'telephone' => $userDto->telephone,
                'dui' => $userDto->dui,
                'password' => bcrypt($userDto->password)
            ]);

            $user->refresh();

            $userInfo = UserEntity::fromArray($user->toArray());

            return response([
                'user' => $userInfo,
                'token' => $user->createToken('token')->plainTextToken
            ],201);
        } catch (\Throwable $th) {
            //throw $th;

            throw new HttpException(500, 'Hubo un error al registrar el usuario', $th);
        }
    }

    public function loginUser(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();
        $userInfo = [];
        try {
            //code...
            $userDto = LoginDto::login($data);

            if (!auth()->attempt(['username' => $userDto->username, 'password' => $userDto->password])) {
                return response([
                    'error' => 'Credenciales inconrrectas'
                ], 422);
            }

            $user = auth()->user();
            //dd($user);
            if (!$user) {
                throw new HttpException(401,'Usuario no autenticado');
            }

            $userInfo = UserEntity::fromArray([
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'telephone' => $user->telephone,
                'dui' => $user->dui,
                'email_verified_at' => $user->email_verified_at,
                'status' => $user->status,
            ]);

            return response([
                'user' => $userInfo,
                'token' => $user->createToken('token')->plainTextToken
            ],201);

        } catch (\Throwable $th) {
            throw new HttpException(500, 'Hubo un error al iniciar sesion', $th);
        }
    }
}
