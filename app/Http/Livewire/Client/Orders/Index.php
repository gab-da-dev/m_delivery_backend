<?php

namespace App\Http\Livewire\Client\Orders;

use App\Models\Store;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class Index extends Component
{
    public Collection $stores;
    
    public function mount()
    {
        $this->stores = Store::all();
    }

    public function render()
    {
        return view('livewire.client.orders.index')->extends('layouts.client')->section('content')->layoutData(['logo' => $this->stores[0]->logo ?? '', 'header_image' => $this->stores[0]->header_image ?? '']);
    }
}
