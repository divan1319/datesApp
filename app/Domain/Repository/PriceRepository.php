<?php

namespace App\Domain\Repository;

use App\Domain\Dtos\CreatePriceDto;
use App\Models\Price;

class PriceRepository {
    
    public function registerPrice(CreatePriceDto $createPriceDto){
        try {
            $precio = Price::create([
                'employee_id' => $createPriceDto->employee_id,
                'freelancer_id' => $createPriceDto->freelancer_id,
                'price' => $createPriceDto->price,
                'time' => $createPriceDto->time,
                'type' => $createPriceDto->type
            ]);

            return $precio;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}