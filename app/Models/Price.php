<?php

namespace App\Models;

use App\Models\establishments\Employee;
use App\Models\freelancers\Freelancer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'price',
        'time',
        'type'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function freelancer(){
        return $this->belongsTo(Freelancer::class,'freelancer_id');
    }
}
