<?php

namespace App\Domain\UseCases\Schedule;

use App\Domain\Dtos\CreateScheduleDto;
use App\Domain\Repository\ScheduleRepository;

interface ICreateSchedule {
    public function create(CreateScheduleDto $createScheduleDto);
}

class CreateSchedule implements ICreateSchedule{

    public function __construct(
        private readonly ScheduleRepository $scheduleRepository)
    {}

    public function create(CreateScheduleDto $createScheduleDto){
        return $this->scheduleRepository->createSchedule($createScheduleDto);
    }
}