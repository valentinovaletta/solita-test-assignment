<?php

namespace App\Http\Controllers;
use App\Models\Station;
use App\Models\Journey;

use Illuminate\Http\Request;

class StationController extends Controller
{
    public function showAllRecords(){
        $stations = Station::orderBy('id', 'ASC')->paginate(25);
        return view("stations", ["stations"=>$stations]);
    }
    public function showOneRecord($id = 1){
        $station = Station::Where('id', $id)->get();
        return view("station", [
            "stations"=>$station
        ]);
    }
}
