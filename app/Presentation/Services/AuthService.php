<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\Auth\LoginDto;
use App\Domain\Dtos\Auth\RegisterDto;
use App\Domain\Entities\UserEntity;
use App\Domain\Repository\UserRepository;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    protected function dataReturn(Authenticatable $authenticatable, UserEntity $userEntity): JsonResponse
    {
        if ($authenticatable->client) {
            return response()->json([
                'user' => [
                    'id' => $userEntity->id,
                    'status' => $userEntity->status
                ],
                'info' => [
                    'type'=> 1,
                    'id' => $authenticatable->client->id,
                    'photo' => $authenticatable->client->photo
                ],
                'token' => $authenticatable->createToken('token', ['*'], now()->addHour())->plainTextToken
            ], 202);
        } else if ($authenticatable->freelancer) {
            return response()->json([
                'user' => $userEntity,
                'info' => [
                    'type' => 2,
                    'freelancer' => $authenticatable->freelancer->id,
                ],
                'token' => $authenticatable->createToken('token', ['*'], now()->addHour())->plainTextToken
            ], 202);
        } else if ($authenticatable->establishment) {
            return response()->json([
                'user' => $userEntity,
                'info' => [
                    'type' => 3,
                    'id' => $authenticatable->establishment->id,
                ],
                'token' => $authenticatable->createToken('token', ['*'], now()->addHour())->plainTextToken
            ], 202);
        }
    }

    public function registerUser(RegisterRequest $registerRequest): JsonResponse
    {
        //Registrando al usuario
        //$data = $registerRequest->validated();
        $userDto = RegisterDto::createUser($registerRequest->toArray());
        $user = $this->userRepository->createUser($userDto);
        //$user->refresh();
        //$userInfo = UserEntity::fromArray($user->toArray());

        return $user;
    }

    public function loginUser(LoginRequest $loginRequest): JsonResponse
    {
        try {

            $data = $loginRequest->validated();

            $userDto = LoginDto::login($data);

            $user = $this->userRepository->loginUser($userDto);

            if ($user instanceof JsonResponse) {
                return $user;
            }

            $userInfo = UserEntity::fromArray($user->toArray());

            if ($user->client || $user->establishment || $user->freelancer) {
                return $this->dataReturn($user, $userInfo);
            }

            return response()->json([
                'message' => 'Usuario incompleto, debe de completar el procedimiento de registro.',
                'id' => $userInfo->id,
                'token' => $user->createToken('token', ['*'], now()->addHour())->plainTextToken
            ], 400);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al iniciar sesión' . $th->getMessage()
            ], 500);
        }
    }
}
