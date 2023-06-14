<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Collection;

class Create extends Component
{
    public Collection $products;

    public Order $order;
    public User $user;

    public $orderCount = [];

    public $price;
    public $store_id;

    public function render()
    {
        return view('livewire.deliveries.create')->extends('layouts.app')->section('content');
    }

    public function mount(Order $order)
    {
        $this->store_id  = Store::where('user_id', auth()->user()->id)->first()->id;
        $this->getNewOrder();
        $this->products = Product::where('store_id', $this->store_id)->get();
    }

    private function getNewOrder(): void
    {
        $this->order = new Order([
            'order' => [],
            'status' => 0,
        ]);
    }

    public function submit()
    {
        $this->order->user_id = auth()->user()->id;
        $this->order->store_id = $this->store_id;
        $this->order->status = 0;
        $this->order->order = json_encode($this->order->order);
        $this->order->save();
        $this->getNewOrder();
    }

    public function updated($name, $value)
    {
    }

    protected function rules()
    {
        return [
                'order.order.*' => 'required',
                'order.status' => 'required',
                'order.order.*.notes' => 'required',
                'order.order.*.quantity' => 'required',
                'order.order.*.name' => 'required',
                'order.order.*.name_id' => 'required',
            ];
    }
}
