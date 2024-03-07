<?php

namespace App\Domain\UseCases\Schedule;

use App\Domain\Dtos\CreateScheduleDto;
use App\Domain\Repository\ScheduleRepository;

interface ICreateTodo {
    public function create(CreateScheduleDto $createScheduleDto);
}

class CreateSchedule implements ICreateTodo{

    public function __construct(
        private readonly ScheduleRepository $scheduleRepository)
    {}

    public function create(CreateScheduleDto $createScheduleDto){
        return $this->scheduleRepository->createSchedule($createScheduleDto);
    }
}