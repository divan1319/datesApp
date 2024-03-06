<?php

namespace App\Domain\Entities;

use Carbon\Carbon;

class ScheduleEntity
{
    private int $id;
    private ?int $freelancer_id;
    private ?int $establishment_id;
    private string $days;
    private Carbon $start_hour;
    private Carbon $end_hour;
    private string $type;

    public function __construct(
        int $id,
        ?int $freelancer_id,
        ?int $establishment_id,
        string $days,
        Carbon $start_hour,
        Carbon $end_hour,
        string $type,
    ) {
        $this->id = $id;
        $this->freelancer_id = $freelancer_id;
        $this->establishment_id = $establishment_id;
        $this->days = $days;
        $this->start_hour = $start_hour;
        $this->end_hour = $end_hour;
        $this->type = $type;
    }


    static function fromArray(array $obj): self
    {

        $start = Carbon::parse($obj['start_hour']);
        $end = Carbon::parse($obj['end_hour']);

        return new self($obj['id'], $obj['freelancer_id'], $obj['establishment_id'], $obj['days'], $start, $end, $obj['type']);
    }

    static function validateHours(string $startHour, string $endHour): bool
    {
        $start_hour = Carbon::parse($startHour);
        $end_hour = Carbon::parse($endHour);

        if ($end_hour <= $start_hour) {
            return false;
        }

        return true;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
