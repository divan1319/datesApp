<?php

namespace App\Domain\Entities;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class FreelancerEntity
{

    private int $id;
    private int $user_id;
    private string $description;
    private array $services;
    private array $places;
    private Carbon $created_at;

    public function __construct(
        int $id,
        int $user_id,
        string $description,
        array $services,
        array $places,
        Carbon $created_at,
    ) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->description = $description;
        $this->services = $services;
        $this->places = $places;
        $this->created_at = $created_at;
    }

    static function fromArray(array $obj):self
    {
        return new self($obj["id"],$obj["user_id"],$obj["description"],$obj["services"],$obj["places"],$obj["created_at"]);
    }

    public function getId():int{
        return $this->id;
    }
}
