<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Models\Station;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $journeys = Journey::orderBy('id', 'ASC')->limit(25)->get();
        $station = Station::count();

        $avgDistance = round( Journey::orderBy('id', 'ASC')->limit(1000)->get()->avg('covered_distance'), 1);
        $avgDuration = round( Journey::orderBy('id', 'ASC')->limit(1000)->get()->avg('duration'), 1);

        return view("dashboard", [
            "journeys"=>$journeys, 
            "station"=>$station, 
            "avgDistance"=>$avgDistance, 
            "avgDuration"=>$avgDuration
        ]);
    }
    
}
