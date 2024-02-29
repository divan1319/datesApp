<?php

namespace App\Presentation\Establishments;

use App\Http\Requests\Establishments\EstablishmentCreateRequest;
use App\Presentation\Services\EstablishmentsService;
use Illuminate\Http\JsonResponse;

class EstablishmentsController {

    protected $establishmentService;

    public function __construct(EstablishmentsService $establishmentService)
    {
        $this->establishmentService = $establishmentService;   
    }

    public function create(EstablishmentCreateRequest $establishmentCreateRequest):JsonResponse{
        
        $establishment = $this->establishmentService->createEstablishment($establishmentCreateRequest);

        return $establishment;
    }
}