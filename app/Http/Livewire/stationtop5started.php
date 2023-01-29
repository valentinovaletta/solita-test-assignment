<?php

namespace App\Http\Livewire;

use App\Models\Journey;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class stationtop5started extends Component
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

            //Top 5 most popular return stations for journeys starting from the station
            //select *, count(*) as count from `journeys` where `departure_station_id` = 30 group by `return_station_id` order by count(return_station_id) DESC limit 5;

            $top5started = Journey::select(DB::raw('return_station_id, return_station_name, count(*) as count'))
            ->where('departure_station_id', DB::raw($this->stationId))
            ->groupBy('return_station_id','return_station_name')
            ->orderBy(DB::raw('count(return_station_id)'), 'DESC')
            ->limit(5)
            ->get();

            } else {
                $top5started = 0;
            }
            return view('livewire.station-top5-started', [
               "top5started"=>$top5started
            ]);
        }catch(\Exception $e)
        {
            return view('livewire.station-top5-started')->with('e' , $e);
        }
    }
}