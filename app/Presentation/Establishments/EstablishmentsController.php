<?php

namespace App\Presentation\Establishments;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePriceRequest;
use App\Http\Requests\Establishments\CreateEmployeeRequest;
use App\Http\Requests\Establishments\EstablishmentCreateRequest;
use App\Http\Requests\ScheduleCreateRequest;
use App\Presentation\Services\EstablishmentsService;
use App\Presentation\Services\PriceServices;
use App\Presentation\Services\ScheduleService;
use Illuminate\Http\JsonResponse;

class EstablishmentsController extends Controller{



    public function __construct(
        private readonly EstablishmentsService $establishmentService,
        private readonly ScheduleService $scheduleService,
        private readonly PriceServices $priceServices
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

    public function create_price(CreatePriceRequest $request){
        //dd($request["establishment_id"]);
        $price = $this->priceServices->create($request);

        return $price;
    }

    public function register_employee(CreateEmployeeRequest $request){
        $employee = $this->establishmentService->createEmployee($request);

        return $employee;
    }

    
}