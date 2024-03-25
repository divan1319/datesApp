<?php

namespace App\Models;


use App\Models\establishments\Establishment;
use App\Models\freelancers\Freelancer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'freelancer_id',
        'establishment_id',
        'price',
        'time',
        'type'
    ];

    public function establishment(){
        return $this->belongsTo(Establishment::class,'establishment_id');
    }

    public function freelancer(){
        return $this->belongsTo(Freelancer::class,'freelancer_id');
    }
}
