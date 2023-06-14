<?php

namespace App\Http\Livewire\Promotions;

use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Collection;
use App\Events\DriverLocationUpdatedEvent;

class Edit extends Component
{
    public Collection $products;

    public Order $order;

    public $price = 0;

    public $removeIngredient = [];

    public $ingredients = [];

    public $removed = [];

    protected $listeners = ['driverUpdate'];

    public function mount(Order $order)
    {
        $this->products = Product::all();
        $this->order->order = json_decode($order->order, true);
        foreach($this->order->order as $item){
            array_push($this->removeIngredient, $item['removeIngredient']);
        }
        
        foreach($this->products as $item){
            array_push($this->ingredients, json_decode($item['ingredients'], true));
        }
        $this->store = Store::find(1);
        
    }

    public function render()
    {
        return view('livewire.deliveries.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
        ]);
    }

    public function submit()
    {
        event(new DriverLocationUpdatedEvent($this->order, 'Driver is on their way to you.')); 
        $this->order->save();
    }
    
    protected function rules()
    {
        return [
            'order.order.*' => 'required',
            'order.status' => 'required',
            'order.delivery_status' => 'required',
        ];
    }
}
