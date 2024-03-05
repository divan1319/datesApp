<?php

namespace App\Domain\Dtos\Establishments;

class RegisterEstablishmentDto {

    public function __construct(
        public string $name,
        public int $user_id,
        public string $telephone,
        public string $address,
        public string $photo
    )
    {}

    static function createEstablishment(array $obj):self{
        return new self($obj['name'],$obj['user_id'],$obj['telephone'],$obj['address'],$obj['photo']);
    }
}