<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\breakdown;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'process',
        'process_No',
        'equipment_name',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function breakdowns(){
        return $this->belongsTo(breakdown::class);
    }

}
