<?php

namespace App\Http\Livewire;

use App\Models\Journey;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class stationtop5ended extends Component
{
    public bool $loadData = false;
    public $stationId;

    public function init()
    {
        $this->loadData = true;
    }

    public function render()
    {
        try {
            if ($this->loadData) {

            //Top 5 most popular departure stations for journeys ending at the station
            try {
                $top5ended = Journey::select(DB::raw('departure_station_id, departure_station_name, count(*) as count'))
                    ->where('return_station_id', DB::raw($this->stationId))
                    ->groupBy('departure_station_id','departure_station_name')
                    ->orderBy(DB::raw('count(departure_station_id)'), 'DESC')
                    ->limit(5)
                    ->get();
            } catch (\Illuminate\Database\QueryException $e) {
                $top5ended = $e->errorInfo;
            }

            } else {
                $top5ended = 0;
            }
            return view('livewire.station-top5-ended', [
               "top5ended"=>$top5ended
            ]);
        }catch(\Exception $e)
        {
            return view('livewire.station-top5-ended')->with('e' , $e);
        }
    }
}