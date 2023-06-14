<?php

namespace App\Http\Livewire\Client\Profile;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Events\OrderSentEvent;
use App\Events\MessageSentEvent;
use Illuminate\Support\Collection;

class Edit extends Component
{
    public Store $store;
    public User $user;
    public Collection $products;
    public Collection $stores;

    public $orderObj = [];

    public $quantity = 1;
    public $total_price = 0;
    public $notes;
    public $selected;
    public $removeIngredient = [];

    protected $listeners = [];


    public function mount(Store $store)
    {
        $this->user = User::find(auth()->user()->id); 
        $this->stores = Store::all();
    }

    private function addNewOrder(): void
    {
        $this->order = new Order([
            'order' => [],
            'status' => 0,
        ]);
    }

    public function addProduct($obj)
    {
        $this->orderObj = $obj;
    }

    public function submit()
    {
        event(new OrderSentEvent('New order recieved!'));
        $this->order->order = json_encode($this->orderObj);
        $this->order->user_id = auth()->user()->id;
        $this->order->store_id = $this->store->id;
        $this->order->status = 0;
        $this->order->save();
        $this->emit('showAlert', "Order successfully sent.");
    }

    public function render()
    {
        return view('livewire.client.profile.edit')->extends('layouts.client')->section('content')->layoutData(['logo' => $this->stores[0]->logo ?? '', 'header_image' => $this->stores[0]->header_image ?? '']);
    }
}
