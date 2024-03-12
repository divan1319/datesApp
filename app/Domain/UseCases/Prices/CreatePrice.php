<?php

namespace App\Domain\UseCases\Prices;

use App\Domain\Dtos\CreatePriceDto;
use App\Domain\Repository\PriceRepository;

interface ICreatePrice {
    public function create(CreatePriceDto $createPriceDto);
}

class CreatePrice implements ICreatePrice{
    
    public function __construct(
        private readonly PriceRepository $priceRepository
    ){}

    public function create(CreatePriceDto $createPriceDto){
        return $this->priceRepository->registerPrice($createPriceDto);
    }
}