<?php

namespace App\Http\Livewire\Client\Products;

use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Collection;

class Show extends Component
{
    public Product $product;
    public Collection $products;
    public Store $store;
    public Order $order;
    public $orderObj =[];
    public $quantity = 0;
    public $total_price = 0;
    public $notes;

    protected $listeners = ['showProduct', 'addProduct', 'totalOrderPrice', 'createOrderArray'];

    public function showProduct(Product $product)
    {
        $this->product = $product;
    }

    public function selectedProduct(Product $product)
    {
        $this->product = $product;
    }

    public function mount(Store $store, Product $product)
    {
        $this->store = $store;
        $this->product = $product;
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
        array_push($this->orderObj, ["id"=>$this->product['id'], "name"=>$this->product['name'], "quantity"=>$this->quantity, "notes"=>$this->notes, "price"=>$this->product['price'],]);

        $this->emitUp('addProduct', $this->orderObj);
        $this->emitUp('totalOrderPrice');
        $this->totalOrderPrice();
    }

    public function totalOrderPrice()
    {
        foreach ($this->orderObj as $item) {
            $this->total_price = $this->total_price + $item['price'] * $item['quantity'];
            $this->quantity = $this->quantity +  $item['quantity'];
        }
    }

    public function render()
    {
        return view('livewire.client.products.show');
    }
}
