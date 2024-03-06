<?php

namespace App\Domain\Dtos;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class CreateScheduleDto{

    public function __construct(
        public ?int $freelancer_id,
        public ?int $establishment_id,
        public string $days,
        public Carbon $start_hour,
        public Carbon $end_hour,
        public string $type
    ){}

    static function createSchedule(array $obj):self|bool{
        
        $start = Carbon::parse($obj['start_hour']);
        $end= Carbon::parse($obj['end_hour']);

        if(!isset($obj['freelancer_id']) && !isset($obj['establishment_id'])){
            return false;
        }

        return new self($obj['freelancer_id'] ?? null,$obj['establishment_id'] ?? null,$obj['days'],$start,$end,$obj['type']);
    }

}