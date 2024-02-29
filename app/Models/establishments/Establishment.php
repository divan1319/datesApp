<?php

namespace App\Models\establishments;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'telephone',
        'address'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
