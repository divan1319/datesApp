<?php

namespace App\Domain\Entities;

use Carbon\Carbon;

class EmployeeEntity {
    
    private int $id;
    private int $establishment_id;
    private string $name;
    private string $photo;
    private Carbon $created_at;
    private string $status;
    private string $nickname;
    public function __construct(
        int $id,
        int $establishment_id,
        string $name,
        string $photo,
        Carbon $created_at,
        string $status,
        string $nickname
    )
    {
        $this->id = $id;
        $this->establishment_id = $establishment_id;
        $this->name = $name;
        $this->photo = $photo;
        $this->created_at = $created_at;
        $this->status = $status;
        $this->nickname = $nickname;
    }

    static function fromArray(array $obj){
        $created = Carbon::parse($obj["created_at"]);
        return new self($obj["id"],$obj["establishment_id"],$obj["name"],$obj["photo"],$created,$obj["status"],$obj["nickname"]);
    }

    public function getId():int{
        return $this->id;
    }
    public function getEstablishmentId():int{
        return $this->establishment_id;
    }
    public function getName():string{
        return $this->name;
    }
    public function getPhoto():string{
        return $this->photo;
    }
    public function getCreatedAt():string{
        return $this->created_at->toDateTimeString();
    }
    public function getStatus():string{
        return $this->status;
    }
}