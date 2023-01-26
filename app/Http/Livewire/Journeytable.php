<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Journey;
use Illuminate\Support\Facades\DB;

class Journeytable extends Component
{
    const LIMIT = 25; 
    public bool $loadData = false;
    public $page;
    public $sortParam = 'id';
    public $sortValue = 'ASC';

    public bool $search = false;
    public $searchParam;
    public $searchValue;

    public $searchId;
    public $searchdsn;
    public $searchrsn;
    public $searchdistance;
    public $searchduration;

    public function init()
    {
        $this->loadData = true; 
    }

    public function updatedsearchId()
    {
        if ( ($this->searchId <= 0) || (!is_numeric($this->searchId)) ){
            return $this->search = false;
        }
        $this->search = true;
        $this->searchParam = 'id';
        $this->searchValue = $this->searchId;
    }
    public function updatedsearchdsn()
    {
        $this->search = true;
        $this->searchParam = 'departure_station_name';
        $this->searchValue = $this->searchdsn;
    }
    public function updatedsearchrsn()
    {
        $this->search = true;
        $this->searchParam = 'return_station_name';
        $this->searchValue = $this->searchrsn;
    }
    public function updatedsearchdistance()
    {
        $this->search = true;
        $this->searchParam = 'covered_distance';
        $this->searchValue = $this->searchdistance;
    }
    public function updatedsearchduration()
    {
        $this->search = true;
        $this->searchParam = 'duration';
        $this->searchValue = $this->searchduration;
    }
    public function sort($param){
        $this->sortParam = $param;
        $this->sortValue = ($this->sortValue == 'ASC') ? 'DESC' : 'ASC';
    }

    public function render()
    {
        try {
            if ($this->loadData) {
                $journeys = Journey::orderBy($this->sortParam, $this->sortValue)->offset( $this->offset($this->page) )->limit(self::LIMIT);
                if($this->search){$journeys = $journeys->where($this->searchParam,'like', '%'.DB::raw($this->searchValue).'%' );}
                $journeys = $journeys->get();
            } else {
                $journeys = 0;
            }
            return view('livewire.journeys-table',['journeys' => $journeys, 'page' =>$this->page]);
        }catch(\Exception $e)
        {
            return view('livewire.journeys-table')->with('e' , $e);
        }
    }

    private function offset($page){
        return ($page-1) * self::LIMIT;
    }


}
