<?php

namespace App\Presentation\Establishments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Establishments\EstablishmentCreateRequest;
use App\Http\Requests\ScheduleCreateRequest;
use App\Presentation\Services\EstablishmentsService;
use App\Presentation\Services\ScheduleService;
use Illuminate\Http\JsonResponse;

class EstablishmentsController extends Controller{



    public function __construct(
        private readonly EstablishmentsService $establishmentService,
        private readonly ScheduleService $scheduleService
        )
    {}

    public function create(EstablishmentCreateRequest $establishmentCreateRequest):JsonResponse{
        
        $establishment = $this->establishmentService->createEstablishment($establishmentCreateRequest);

        return $establishment;
    }

    public function get(string $id){
        $establishment = $this->establishmentService->getEstablishment($id);

        return $establishment;
    }

    public function create_schedule(ScheduleCreateRequest $request){
        
        $establishment = $this->scheduleService->create($request);

        return $establishment;
    }
}