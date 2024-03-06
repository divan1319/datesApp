<?php

namespace App\Domain\Dtos;

use Carbon\Carbon;

class CreateScheduleDto{

    public function __construct(
        public ?int $freelancer_id,
        public ?int $establishment_id,
        public string $days,
        public Carbon $start_hour,
        public Carbon $end_hour,
        public string $type
    ){}

    static function createSchedule(array $obj):self{
        
        $start = Carbon::parse($obj['start_hour']);
        $end= Carbon::parse($obj['end_hour']);

        return new self($obj['freelancer_id'],$obj['establishment_id'],$obj['days'],$start,$end,$obj['type']);
    }
}