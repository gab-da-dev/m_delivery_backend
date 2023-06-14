<?php

namespace App\Http\Livewire\Client\Stores;

use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Collection;

class Index extends Component
{
    public Store $store;

    public Collection $stores;

    public function mount(Store $store)
    {
        $this->stores = Store::all();
    }

    public function render()
    {
        return view('livewire.client.stores.index')->extends('layouts.client')->section('content');
    }
}
