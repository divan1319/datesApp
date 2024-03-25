<?php

namespace App\Presentation\Services;

use App\Domain\Dtos\CreateScheduleDto;
use App\Domain\Entities\ScheduleEntity;
use App\Domain\Repository\ScheduleRepository;
use App\Domain\UseCases\Schedule\CreateSchedule;
use App\Http\Requests\ScheduleCreateRequest;

class ScheduleService {
    public function __construct(private readonly ScheduleRepository $scheduleRepository)
    {}

    public function create(ScheduleCreateRequest $request){
        
        $validating_hour = ScheduleEntity::validateHours($request['start_hour'],$request['end_hour']);
        $scheduleDto = CreateScheduleDto::createSchedule($request->toArray());

        if(!$validating_hour){
            return response()->json([
                'message' => 'La hora final ingresada es menor o igual que la hora inicial'
            ],422);
        }

        if(!$scheduleDto){
            return response()->json([
                'message' => 'Debes de ingresar el establecimiento.'
            ],400);
        }

        $schedule = new CreateSchedule($this->scheduleRepository);
        $scheduleRes = $schedule->create($scheduleDto);

        $scheduleInfo = ScheduleEntity::fromArray($scheduleRes->toArray());

        return response()->json([
            'message' => 'Horario guardado correctamente',
            'schedule' => $scheduleInfo->getId()
        ],200);
    }
}