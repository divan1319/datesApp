<?php

namespace App\Domain\Dtos;

use Carbon\Carbon;

class CreatePriceDto {

    public function __construct(
        public ?int $employee_id,
        public ?int $freelancer_id,
        public float $price,
        public Carbon $time,
        public string $type
    ){}

    static function createPrice(array $obj):self{
        $hora = Carbon::parse($obj['time']);
        return new self($obj['employee_id'] ?? null,$obj['freelancer_id'] ?? null, $obj['price'],$hora,$obj['type']);
    }
}