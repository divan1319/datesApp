<?php

namespace App\Domain\Entities;

class UserEntity {
    
    
    public function __construct(
        public int $id,
        public string $name,
        public string $username,
        public string $email,
        public string $telephone,
        public string $dui,
        public ?string $email_verified_at,
        public bool $status
    ){}
    

    static function fromArray(array $obj){
        
        return new self($obj['id'],$obj['name'],$obj['username'],$obj['email'],$obj['telephone'],$obj['dui'],$obj['email_verified_at'],$obj['status']);
    }
    
}