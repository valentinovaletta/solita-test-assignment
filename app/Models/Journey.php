<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'departure_time', 
        'return_time', 
        'departure_station_id',
        'departure_station_name',
        'return_station_id',
        'return_station_name',
        'covered_distance',
        'duration'
    ];
}
