<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JourneyController extends Controller
{
    public function showAllRecords($page=1){
        return view("journeys", ["page"=>$page]);
    }

    public function showOneRecord($id = 1){
        $journey = Journey::Where('id', $id)->get();
        $departure_station_XY = Station::select('x', 'y')->where('ID', $journey->first()->departure_station_id);
        $return_station_XY = Station::select('x', 'y')->where('ID', $journey->first()->return_station_id);

        return view("journey", [
            "journey"=>$journey,
            "departure_station_XY"=>$departure_station_XY,
            "return_station_XY"=>$return_station_XY
        ]);
    }
    
    public function addJourney(Request $request){

        // Invalid Token
        if(!($request->bearerToken() == ENV('API_TOKEN'))){
            return response()->json(['success' => false, 'error' => 'Invalid Token'.$request->bearerToken()]);
        }

        $validate = Validator::make($request->all(), [
            'departure_time' => 'date_format:Y-m-d\\TH:i:s|required',
            'return_time' => 'date_format:Y-m-d\\TH:i:s|required',
            'departure_station_id' => 'numeric|required',
            'departure_station_name' => 'string|required',
            'return_station_id' => 'numeric|required',
            'return_station_name' => 'string|required',
            'covered_distance' => 'numeric|required',
            'duration' => 'numeric|required'
        ]);

        if($validate->fails()){
            return response()->json(['success' => false, 'errors'=>$validate->errors()]);
        }

        if($request->header('X-Header-Test')){
            return response()->json(['success' => true, 'message'=>'Passed']);
        }

        $addJourney = Journey::insert($request->all());

        return response()->json(['success' => true, 'token' => $request->bearerToken(), 'data'=>$addJourney]);
    }


}
