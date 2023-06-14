<?php

namespace App\Http\Livewire\Client\Stores;

use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Events\OrderSentEvent;
use App\Events\MessageSentEvent;
use Illuminate\Support\Collection;

class Show extends Component
{
    public Store $store;
    public Product $product;
    public Order $order;
    public Collection $products;

    public $orderObj = [];

    public $quantity = 1;
    public $total_price = 0;
    public $notes;
    public $selected;
    public $removeIngredient = [];

    protected $listeners =
    ['selectedProduct',
    'addProduct',
    'totalOrderPrice',
    'echo:test-channel,my-event' => 'createOrderArray',
    'createOrderArray',
    ];


    public function mount(Store $store)
    {
        $this->store = $store;
        $this->products = Product::with('store')->where('store_id', $store->id)->get();
        $this->addNewOrder();
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

    public function selectedProduct($index)
    {
        $this->product = $this->products[$index];
        $this->selected = ['id' => $this->product->id, 'name' => $this->product->name, 'price' => $this->product->price, 'ingredients' => $this->product->ingredients, 'image' => $this->product->image, "prep_time"=>$this->product->prep_time];
        $this->emit('showProduct', $this->product);
        $this->dispatchBrowserEvent('name-updated', ['newName' => asset($this->product->image)]);
    }

    public function totalOrderPrice()
    {
        foreach ($this->orderObj as $item) {
            $this->total_price = $this->total_price + $item['price'] * $item['quantity'];
            $this->quantity = $this->quantity +  $item['quantity'];
        }
    }

    public function createOrderArray()
    {
        array_push($this->orderObj, ["id"=>$this->product['id'], "name"=>$this->product['name'], "quantity"=>$this->quantity, "notes"=>$this->notes, "price"=>$this->product['price'], "removeIngredient" => $this->removeIngredient]);

        $this->emitUp('addProduct', $this->orderObj);
        $this->emitUp('totalOrderPrice');
    }

    public function render()
    {
        return view('livewire.client.stores.show')->extends('layouts.client')->section('content')->layoutData(['logo' => $this->store->logo, 'header_image' => $this->store->header_image]);
    }
}
