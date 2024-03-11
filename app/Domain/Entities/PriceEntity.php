<?php

namespace App\Domain\Entities;

use Carbon\Carbon;

class PriceEntity
{

    private int $id;
    private ?int $employee_id;
    private ?int $freelancer_id;
    private float $price;
    private Carbon $time;
    private string $type;

    public function __construct(
        int $id,
        ?int $employee_id,
        ?int $freelancer_id,
        float $price,
        Carbon $time,
        string $type,
    ) {
        $this->id = $id;
        $this->employee_id = $employee_id;
        $this->freelancer_id = $freelancer_id;
        $this->price = $price;
        $this->time = $time;
        $this->type = $type;
    }

    static function fromArray(array $obj):self{
        $hora = Carbon::parse($obj['time']);

        return new self($obj['id'],$obj['employee_id'],$obj['freelancer_id'],$obj['price'],$hora,$obj['type']);
    }

    public function getId():int{
        return $this->id;
    }

    public function getEmployeeId():int{
        return $this->employee_id;
    }

    public function getFreelancerId():int{
        return $this->freelancer_id;
    }


}
