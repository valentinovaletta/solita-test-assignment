<?php

namespace App\Http\Livewire;

use App\Models\Journey;
use Livewire\Component;

class stationendaveragedistance extends Component
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

            //The average distance of a journey ending from the station
            $journeyEnded = round(Journey::Where('return_station_id', $this->stationId)->avg('covered_distance'), 1);

            } else {
                $journeyEnded = 0;
            }
            return view('livewire.station-end-average-distance', [
               "journeyEnded"=>$journeyEnded
            ]);
        }catch(\Exception $e)
        {
            return view('livewire.station-end-average-distance')->with('e' , $e);
        }
    }
}