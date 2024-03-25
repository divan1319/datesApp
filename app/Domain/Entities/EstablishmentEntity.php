<?php

namespace App\Domain\Entities;


class EstablishmentEntity{

    public function __construct(
        public int $id,
        public int $user_id,
        public string $name,
        public string $telephone,
        public string $address,
        public string $created_at,
        public string $photo,
    ){}

    static function fromArray(array $obj): self{
        return new self($obj['id'],$obj['user_id'],$obj['name'],$obj['telephone'],$obj['address'],$obj['created_at'],$obj['photo']);
    }
}