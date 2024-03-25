<?php

namespace App\Models\freelancers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'services',
        'places'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
