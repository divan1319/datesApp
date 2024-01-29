<?php

namespace App\Domain\Dtos\Auth;

use Symfony\Component\HttpKernel\Exception\HttpException;

readonly class LoginDto{

    public function __construct(
        public string $username,
        public string $password
    ){}

    static function login(array $obj){

        if(!$obj['username']) return throw new HttpException(401,'missing username');
        if(!$obj['password']) return throw new HttpException(401,'missing password');

        return new self($obj['username'],$obj['password']);
        
    }
}