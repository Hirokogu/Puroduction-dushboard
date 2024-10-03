<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Result extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'date',
        'shift',
        'production_rate',
        'production_time',
        'working_rate',
        'JPH',
        'body',
        'image',
    ];
   
    public function user(){
        return $this->belongsTo(User::class);
    }
}