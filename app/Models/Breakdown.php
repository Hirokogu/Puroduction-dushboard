<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Equipment;

class Breakdown extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'process_No',
        'date',
        'count',
    ];

    public function getdate(){
        return DB::table('breakdowns')->select('date','process_No','count')->groupBy('date','process_No','count')->get();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Equipment(){
        return $this->belongsTo(Equipment::class);
    }

}
