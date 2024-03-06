<?php

namespace App\Domain\Repository;

use App\Domain\Dtos\CreateScheduleDto;
use App\Http\Requests\ScheduleCreateRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleRepository
{

    public function createSchedule(CreateScheduleDto $createScheduleDto)
    {
        try {
            $schedule = Schedule::create([
                'freelancer_id' => $createScheduleDto->freelancer_id ?? null,
                'establishment_id' => $createScheduleDto->establishment_id ?? null,
                'days' => $createScheduleDto->days,
                'start_hour' => $createScheduleDto->start_hour,
                'end_hour'=> $createScheduleDto->end_hour,
                'type' => $createScheduleDto->type
            ]);

            return $schedule;
        } catch (\Throwable $th) {
            //throw $th
            return $th->getMessage();
        }
    }
}
