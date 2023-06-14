<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $position = [];

    public $lng; 

    public $lat; 

    public function mount($lng = 0, $lat = 0)
    {
        $this->lng = $lng;

        $this->lat = $lat;
    }

    public function render()
    {
        return view('livewire.map');
    }
}
