<?php

namespace App\Models\establishments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'establishment_id',
        'name',
        'photo',
        'status',
        'nickname'
    ];

    public function establishment(){
        return $this->belongsTo(Establishment::class,'establishment_id');
    }
}
