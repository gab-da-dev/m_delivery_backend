<?php

namespace App\Http\Livewire\Promotions;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.deliveries.index')->extends('layouts.app')->section('content');
    }
}
