<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\Establishments\RegisterEstablishmentDto;
use App\Domain\Repository\Establishments\EstablishmentsRepository;
use App\Http\Requests\Establishments\EstablishmentCreateRequest;

class EstablishmentsService {

    protected $establishmentRepository;

    public function __construct(EstablishmentsRepository $establishmentRepository){
        $this->establishmentRepository = $establishmentRepository;
    }

    public function createEstablishment(EstablishmentCreateRequest $request){
        
        $establishmentDto = RegisterEstablishmentDto::createEstablishment($request->toArray());

        $establishment = $this->establishmentRepository->registerEstablishment($establishmentDto,$request);

        return $establishment;

    }

}