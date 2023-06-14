<?php

namespace App\Http\Livewire\UserTypes;

use App\Models\Store;
use Livewire\Component;

class Index extends Component
{
    public Store $store;

    public function mount()
    {
        $this->store = Store::find(1);
    }

    public function render()
    {
        return view('livewire.user-types.index')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
        ]);
    }
}
