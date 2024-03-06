<?php

namespace App\Models;

use App\Models\establishments\Establishment;
use App\Models\freelancers\Freelancer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'freelancer_id',
        'establishment_id',
        'days',
        'start_hour',
        'end_hour',
        'type'
    ];

    public function freelancer(){
        return $this->belongsTo(Freelancer::class,'freelancer_id');
    }

    public function establishment(){
        return $this->belongsTo(Establishment::class,'establishment_id');
    }
}
