<?php

namespace App\Http\Livewire\Client\Stores;

use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Collection;

class Create extends Component
{
    public Store $store;

    public Collection $stores;

    public function mount(Store $store)
    {
        $this->stores = $store;
    }

    public function render()
    {
        return view('livewire.client.stores.create')->extends('layouts.client')->section('content');
    }
}
