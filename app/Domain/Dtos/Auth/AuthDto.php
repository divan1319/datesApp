<?php

namespace  App\Domain\Dtos\Auth;

class AuthDto{
    private function __construct(
        public string $name,
        public string $username,
        public string $email,
        public string $telephone,
        public string $dui,
        public string $password,
    )
    {}

    static function createUser(array $obj): AuthDto{
        return new AuthDto($obj['name'],$obj['username'],$obj['email'],$obj['telephone'],$obj['dui'],$obj['password']);
    }
}