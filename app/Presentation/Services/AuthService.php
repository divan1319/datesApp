<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\Auth\LoginDto;
use App\Domain\Dtos\Auth\RegisterDto;
use App\Domain\Entities\UserEntity;
use App\Domain\Repository\UserRepository;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\JsonResponse;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(RegisterRequest $registerRequest):JsonResponse
    {
        //Registrando al usuario
        try {
            //$data = $registerRequest->validated();
            $userDto = RegisterDto::createUser($registerRequest->toArray());

            $user = $this->userRepository->createUser($userDto);
            $user->refresh();

            $userInfo = UserEntity::fromArray($user->toArray());

            return response()->json([
                'user' => $userInfo,
                'token' => $user->createToken('token',['*'], now()->addDay())->plainTextToken
            ],201);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'error'=>'Hubo un error al registrar el usuario'
            ],500);
        }
    }

    public function loginUser(LoginRequest $loginRequest):JsonResponse
    {
        try {

            //$data = $loginRequest->validated();
            
            $userDto = LoginDto::login($loginRequest->toArray());

            $user = $this->userRepository->loginUser($userDto);

            if($user instanceof JsonResponse){
                return $user;
            }

            $userInfo = UserEntity::fromArray($user->toArray());

            if($user->client){
                $userInfo->type = "client";
                return response()->json([
                    'user'=>$userInfo,
                    'client'=>$user->client->id
                ],200);
            }else{
                
                return response()->json([
                    'user' => $userInfo,
                    'token' => $user->createToken('token',['*'], now()->addHour())->plainTextToken
                ],200);
            }



        } catch (\Throwable $th) {
            return response()->json([
                'error'=>'Error al iniciar sesión'.$th
            ],500);
        }
    }
}
