<?php

namespace App\Http\Livewire;

use App\Models\Journey;
use Livewire\Component;

class journeysstartedsum extends Component
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

                //Total number of journeys starting from the station
                $JournesStartedSum = Journey::Where('departure_station_id', $this->stationId)->count();

            } else {
                $JournesStartedSum = 0;
            }
            return view('livewire.journeys-started-sum', [
               "JournesStartedSum"=>$JournesStartedSum
            ]);
        }catch(\Exception $e)
        {
            return view('livewire.journeys-started-sum')->with('e' , $e);
        }
    }
}