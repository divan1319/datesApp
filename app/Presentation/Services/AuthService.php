<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\Auth\AuthDto;


use App\Domain\Entities\UserEntity;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService {

    public function __construct()
    {}

    public function registerUser(RegisterRequest $registerRequest){
        $data = $registerRequest->validated();

        //Registrando al usuario

        try {
            $userDto = AuthDto::createUser($data);
            
            $user = User::create([
                'name' => $userDto->name,
                'username'=> $userDto->username,
                'email'=> $userDto->email,
                'telephone'=> $userDto->telephone,
                'dui'=> $userDto->dui,
                'password'=> bcrypt($userDto->password)
            ]);

            $userInfo = UserEntity::fromArray($user);

            return $userInfo;


        } catch (\Throwable $th) {
            //throw $th;
            
           throw $th;
        }

        
    }
}