<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;    
    
    protected $fillable = [
        'FID', 
        'ID',
        'Nimi',
        'Namn',
        'Name',
        'Osoite',
        'Adress',
        'Kaupunki',
        'Stad',
        'Operaattor',
        'Kapasiteet',
        'x',
        'y'
    ];
}