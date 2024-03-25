<?php

namespace App\Domain\Dtos\Freelancers;

class FreelancerRegisterDto{

    public function __construct(
        public int $user_id,
        public string $description,
        public array $services,
        public array $places,
    ){}

    static function registerFreelancer(array $obj):self{
        if(!is_array($obj["places"])) return response()->json(['message'=> 'Formato de datos invalido'],400);
        if(count($obj["places"])  == 0) return response()->json(['message'=> 'Los lugares no pueden ir vacios'],400);
        return new self($obj["user_id"],$obj["description"],$obj["services"],$obj["places"]);
    }
}