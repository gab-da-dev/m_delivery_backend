<?php

namespace App\Http\Livewire\Orders;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Models\FcmUserToken;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    public Collection $products;

    public Order $order;
    public User $user;
    public Store $store;
    public Product $product;

    public $orderCount = [];

    public $price = 0;
    public $store_id;
    public $orderObj = [];
    public $ordersArray = [];
    public $token;

    use LivewireAlert;

    public function render()
    {
        return view('livewire.orders.create')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function mount()
    {
        $this->store = Store::find(1);
        $this->getNewOrder();
        $this->products = Product::all();
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
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
        $this->order->status = 0;
        $this->order->order_type = 'store_order';

        $this->createOrderArray();
        $this->order->save();
        $this->flash('success', 'Order created!', [], '/admin/orders');
    }

    public function updatedOrder($value, $name )
    {
        if (str_contains($name, 'id')) { 
             $this->price = 0;
             $this->ordersArray = [];

        foreach ($this->order->order as $key => $order) {
            array_push($this->ordersArray, ["id"=> $order['id'], "name"=> $this->products->firstWhere('id', (int) $order['id'])->name, "notes"=> "", "price"=> $this->products->firstWhere('id', (int) $order['id'])->price, "quantity"=> $order['quantity'] ?? 1, "removeIngredient"=> []]);
        }
        }

        if (str_contains($name, 'quantity')) { 
            $this->price = 0;
            $id = trim($name,"quantity.order");
            $this->ordersArray[$id]['quantity'] = $value;
       }
        
        foreach ($this->ordersArray as $key => $order) { 
            $this->price += $order['quantity']  * $order['price'];
        }
    }

    public function createOrderArray()
    {
        $this->orderObj = [];
        foreach ($this->order->order as $key => $order) {
            $order['price'] = $this->products[$this->order->order[$key]['id']]->price;
            $order['name'] = $this->products[$this->order->order[$key]['id']]->name;
            array_push($this->orderObj, $order);
        }

        $this->order->order = json_encode($this->orderObj);
    }

    public function remove($id)
    {
        unset($this->order->order[$id]);
    }

    protected function rules()
    {
        return [
                'order.order.*' => 'required',
                'order.status' => 'required',
                'order.order.*.notes' => 'required',
                'order.order.*.quantity' => 'required',
                'order.order.*.id' => 'required',
            ];
    }
}
