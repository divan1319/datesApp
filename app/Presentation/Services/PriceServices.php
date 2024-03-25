<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\CreatePriceDto;
use App\Domain\Entities\PriceEntity;
use App\Domain\Repository\PriceRepository;
use App\Domain\UseCases\Prices\CreatePrice;
use App\Http\Requests\CreatePriceRequest;

class PriceServices{
    public function __construct(
        private readonly PriceRepository $priceRepository
    ){}

    public function create(CreatePriceRequest $request){
        //dd($request["establishment_id"]);
        $priceDto = CreatePriceDto::createPrice($request->toArray());
        
        if(!$priceDto){
            return response()->json([
                'message' => 'Debes de ingresar el local.'
            ],400);
        }
        $price = new CreatePrice($this->priceRepository);
        //dd($priceDto->establishment_id);
        $priceRes = $price->create($priceDto);
        //dd($priceRes);
        $priceInfo = PriceEntity::fromArray($priceRes->toArray());
        
        return response()->json([
            'message' => 'Precio guardado correctamente',
            'price' => $priceInfo->getId()
        ],201);
        
    }
}