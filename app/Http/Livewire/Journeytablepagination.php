<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Journey;

class Journeytablepagination extends Component
{
    const LIMIT = 25; 
    public bool $loadData = false;
    public $page;

    public function init()
    {
        $this->loadData = true;
    }

    public function render()
    {
        try {
            if ($this->loadData) {
                $count = Journey::count();
                $pageCount = ceil($count/self::LIMIT);
                $currentPage = $this->page;
                $previousPage = ($this->page-1);
                $nextPage = ($this->page+1);
            } else {
                $count = 0;
            }
            return view('livewire.journeys-table-pagination',[
                'count' => $count,
                'pageCount' => $pageCount,
                'currentPage' => $currentPage,
                'previousPage' => $previousPage,
                'nextPage' => $nextPage
            ]);
        }catch(\Exception $e)
        {
            return view('livewire.journeys-table-pagination')->with('e' , $e);
        }
    }

    private function offset($page){
        return ($page-1) * self::LIMIT;
    }


}
