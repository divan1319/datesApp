<?php

namespace App\Domain\Entities;

class UserEntity {
    
    
    public function __construct(
        int $id,
        string $name,
        string $username,
        string $email,
        string $telephone,
        string $dui,
        string $password,
        bool $status
    ){}
    

    static function fromArray(array $obj): UserEntity{
        
        return new UserEntity($obj['id'],$obj['name'],$obj['username'],$obj['email'],$obj['telephone'],$obj['dui'],$obj['password'],$obj['status']);
    }
    
}