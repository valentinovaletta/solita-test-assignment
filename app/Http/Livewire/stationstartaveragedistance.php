<?php

namespace App\Http\Livewire;

use App\Models\Journey;
use Livewire\Component;

class stationstartaveragedistance extends Component
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

            //The average distance of a journey starting from the station
            $journeyStarted = round(Journey::Where('departure_station_id', $this->stationId)->avg('covered_distance'), 1);

            } else {
                $journeyStarted = 0;
            }
            return view('livewire.station-start-average-distance', [
               "journeyStarted"=>$journeyStarted
            ]);
        }catch(\Exception $e)
        {
            return view('livewire.station-start-average-distance')->with('e' , $e);
        }
    }
}