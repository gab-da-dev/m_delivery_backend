<?php

namespace App\Http\Livewire\Stores;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.store.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
        ]);
    }
}
