<?php

namespace App\Http\Livewire\Client\Orders;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Collection;

class Show extends Component
{
    public Order $order;
    public Collection $products;
    public $total_price = 0;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->products = Product::where('store_id', $order->store_id)->get()->pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.client.orders.show')->extends('layouts.client')->section('content');
        ;
    }
}
