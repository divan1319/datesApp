<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\CreateScheduleDto;
use App\Domain\Dtos\Establishments\RegisterEstablishmentDto;
use App\Domain\Entities\ScheduleEntity;
use App\Domain\Repository\Establishments\EstablishmentsRepository;
use App\Domain\Repository\ScheduleRepository;
use App\Http\Requests\Establishments\EstablishmentCreateRequest;
use App\Http\Requests\ScheduleCreateRequest;
use Illuminate\Http\JsonResponse;

class EstablishmentsService {

    protected $establishmentRepository;
    protected $scheduleRepositary;

    public function __construct(EstablishmentsRepository $establishmentRepository, ScheduleRepository $scheduleRepositary){
        $this->establishmentRepository = $establishmentRepository;
        $this->scheduleRepositary = $scheduleRepositary;
    }

    public function createEstablishment(EstablishmentCreateRequest $request){
        
        $establishmentDto = RegisterEstablishmentDto::createEstablishment($request->toArray());

        $establishment = $this->establishmentRepository->registerEstablishment($establishmentDto,$request);

        return $establishment;

    }

    public function getEstablishment(string $id){

        $establishment = $this->establishmentRepository->getInfoEstablishment($id);

        return $establishment;
    }

    public function createSchedule(ScheduleCreateRequest $request):JsonResponse{
        
        $validating_hour = ScheduleEntity::validateHours($request['start_hour'],$request['end_hour']);

        if(!$validating_hour){
            return response()->json([
                'message' => 'La hora final ingresada es menor o igual que la hora inicial'
            ],400);
        }
        $scheduleDto = CreateScheduleDto::createSchedule($request->toArray());
        $schedule = $this->scheduleRepositary->createSchedule($scheduleDto);
        $scheduleInfo = ScheduleEntity::fromArray($schedule->toArray());

        return response()->json([
            'message' => 'Horario guardado correctamente',
            'schedule' => $scheduleInfo->getId()
        ],200);
    }

}