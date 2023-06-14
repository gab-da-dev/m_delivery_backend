<?php

namespace App\Http\Livewire\Client\Products;

use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public Product $product;
    public Store $store;
    public Order $order;
    public $orderObj =[];
    public $total_price = 0;


    public $quantity = 0;
    public $notes;

    protected $listeners = ['showProduct', 'addProduct', 'total_price'];

    public function showProduct(Product $product)
    {
        $this->product = $product;
    }

    public function selectedProduct(Product $product)
    {
        $this->product = $product;
    }

    public function mount(Store $store)
    {
        $this->store = $store;
        $this->getNewOrder();
        $this->products = Product::with('store')->where('store_id', $store->id)->get();
    }

    private function getNewOrder(): void
    {
        $this->order = new Order([
            'order' => [],
            'status' => 0,
            'store_id' => 0,
        ]);
    }

    public function createOrderArray()
    {
        array_push($this->orderObj, ["name"=>$this->product->id,"quantity"=>$this->quantity, "notes"=>$this->notes]);
        $this->emitUp('addProduct', $this->orderObj);
    }

    public function total_price()
    {
        // 
    }

    public function render()
    {
        return view('livewire.client.products.show')->extends('layouts.app')->section('content');
    }
}
