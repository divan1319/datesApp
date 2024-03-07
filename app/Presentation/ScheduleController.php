<?php

namespace App\Presentation;

use App\Domain\Dtos\CreateScheduleDto;
use App\Domain\Entities\ScheduleEntity;
use App\Domain\Repository\ScheduleRepository;
use App\Domain\UseCases\Schedule\CreateSchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleCreateRequest;

class ScheduleController extends Controller{
    
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
                'message' => 'Debes de registrar un negocio o freelancer'
            ],400);
        }

        $schedule = new CreateSchedule($this->scheduleRepository);
        $schedule->create($scheduleDto);


        return response()->json([
            'message' => 'Horario guardado correctamente',

        ],200);
    }
}