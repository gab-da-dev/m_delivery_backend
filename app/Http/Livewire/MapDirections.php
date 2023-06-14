<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MapDirections extends Component
{
    public $position = [];

    public function render()
    {
        return view('livewire.map-directions');
    }
}
