<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MapDelivery extends Component
{
    public $user_position = [];
    public $driver_position = [];

    public function render()
    {
        return view('livewire.map-delivery');
    }
}
