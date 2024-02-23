<?php

namespace App\Domain\Dtos\Establishments;

class RegisterEstablishmentDto {

    public function __construct(
        public string $name,
        public int $user_id,
        public string $telephone,
        public string $address
    )
    {}

    static function createEstablishment(array $obj):self{
        return new self($obj['name'],$obj['user_id'],$obj['telephone'],$obj['address']);
    }
}