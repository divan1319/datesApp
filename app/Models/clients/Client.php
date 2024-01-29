<?php

namespace App\Models\clients;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
