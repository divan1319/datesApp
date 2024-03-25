<?php

namespace App\Domain\Dtos\Establishments;

class RegisterEmployeeDto{

    public function __construct(
        public int $establishment_id,
        public string $name,
        public string $photo,
        public string $status,
        public string $nickname
    ){}

    static function register(array $obj){

        return new self($obj["establishment_id"],$obj["name"],$obj["photo"],$obj["status"],$obj["nickname"]);
    }
}