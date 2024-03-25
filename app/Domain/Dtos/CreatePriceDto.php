<?php

namespace App\Domain\Dtos;

use Carbon\Carbon;

class CreatePriceDto {

    public function __construct(

        public ?int $establishment_id,
        public ?int $freelancer_id,
        public float $price,
        public Carbon $time,
        public string $type
    ){}

    static function createPrice(array $obj):self|bool{
        
        if(!isset($obj['freelancer_id']) && !isset($obj['establishment_id'])){
            return false;
        }

        $hora = Carbon::parse($obj['time']);
        
        return new self($obj['establishment_id'] ?? null ,$obj['freelancer_id'] ?? null, $obj['price'],$hora,$obj['type']);
    }
}