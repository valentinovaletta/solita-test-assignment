<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Journey;

class Journeycount extends Component
{
    public bool $loadData = false;

    public function init()
    {
        $this->loadData = true;
    }

    public function render()
    {
        try {
            if ($this->loadData) {
                $JourneyCount = Journey::count();
            } else {
                $JourneyCount = [];
            }
            return view('livewire.journey-count')->with('JourneyCount' , $JourneyCount);
        }catch(\Exception $e)
        {
            return view('livewire.journey-count')->with('e' , $e);
        }
    }
}
