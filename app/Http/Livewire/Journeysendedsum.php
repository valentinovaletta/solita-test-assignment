<?php

namespace App\Http\Livewire;

use App\Models\Journey;
use Livewire\Component;

class Journeysendedsum extends Component
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

                //Total number of journeys ending at the station
                $JournesEndedSum = Journey::Where('return_station_id', $this->stationId)->count();

            } else {
                $JournesEndedSum = 0;
            }
            return view('livewire.journeys-ended-sum', [
               "JournesEndedSum"=>$JournesEndedSum
            ]);
        }catch(\Exception $e)
        {
            return view('livewire.journeys-ended-sum')->with('e' , $e);
        }
    }
}