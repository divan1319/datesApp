<?php

namespace App\Presentation\Services;

use App\Domain\Repository\PriceRepository;
use App\Http\Requests\CreatePriceRequest;

class PriceServices{
    public function __construct(
        private readonly PriceRepository $priceRepository
    ){}

    public function create(CreatePriceRequest $request){

    }
}