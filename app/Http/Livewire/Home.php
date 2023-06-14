<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Like;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Events\OrderSentEvent;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Home extends Component
{
    public Collection $store;
    public Product $product;
    public Order $order;
    public Collection $products;
    public Collection $orders;
    public $addExtras = [];
    public $current_time;
    public $start;
    public $end;
    public $orderObj = [];
    public $orderObjKey = 0;

    public $quantity = 1;
    public $total_price = 0;
    public $notes;
    public $selected;
    public $lat;
    public $long;
    public $position = [];
    public $directionsData;
    public $removeIngredient = [];
    public $order_type = '';
    public $order_status = false;
    public $rating = '';
    public $rating_description = '';
    public $driver_rating = 0;
    public $driver_rating_description = '';
    public $promo = false;

    protected $listeners =
    [
        'addProduct',
        'addCoordinates',
        'clearSelectedProduct',
        'createOrderArray',
        'deliveryUpdated',
        'orderUpdated',
        'refreshComponent' => '$refresh',
        'selectedProduct',
        'setdirectionsData',
        'setPosition',
        'skipRating',
        'totalOrderPrice',
    ];

    use LivewireAlert;

    public function mount()
    {
        $this->store = Store::all();
        $this->products = Product::all();

        $order = Order::where('status', '<', 2)->where('user_id', auth()->user()->id)->firstOr(function () {
            $this->order =  new Order();
        });

        $order = Order::whereNull('skip_comment')->where('user_id', auth()->user()->id)->firstOr(function () {
            $this->order =  new Order();
        });
        
        $this->current_time = Carbon::now();
// dd($this->store[0]->open_time);
        $this->start = Carbon::createFromTimeString($this->store[0]->open_time);
        $this->end = Carbon::createFromTimeString($this->store[0]->close_time);
        
        if ($order) {
            $this->order_status = true;

            $this->order = $order;
        }
    }

    public function addCoordinates($directionsData)
    {
        $this->directionsData = $directionsData;
    }

    public function addProduct($obj)
    {
        $this->orderObj = $obj;
    }

    public function createOrderArray()
    {
        array_push($this->orderObj, ["id"=>$this->product['id'], "name"=>$this->product['name'], "quantity"=>$this->quantity, "notes"=>$this->notes, "price"=> $this->product['price'], "removeIngredient" => $this->removeIngredient, 'addExtras' => $this->addExtras, 'totalPrice' => $this->calcExtrasPrice()]);
        $this->emitUp('addProduct', $this->orderObj);
        $this->totalOrderPrice();
        $this->quantity = 1;
        $this->removeIngredient = [];
        $this->addExtras = [];
        $this->notes = '';
        $this->product = new Product();
    }

    public function calcExtrasPrice()
    {
        foreach ($this->addExtras as $key => $value) {
            $this->product['price'] = $this->product['price'] + $this->products->firstWhere('id', $value)->price;
        }
        return $this->product['price'];

    }
    public function deleteOrderItem($id)
    {
        unset($this->orderObj[$id]);
        $this->totalOrderPrice();
    }

    public function deliveryUpdated($status)
    {
        dd($status);
    }

    public function editOrderItem($id)
    {
        $this->product = $this->products->firstWhere('id', $this->orderObj[$id]['id']);
        $this->quantity = $this->orderObj[$id]['quantity'];
        $this->removeIngredient = $this->orderObj[$id]['removeIngredient'];
        $this->notes = $this->orderObj[$id]['notes'];
        $this->orderObjKey = $id;
        $this->dispatchBrowserEvent('name-updated', ['newName' => asset($this->product->image)]);
    }

    public function foodRating($rating)
    {
        $this->order->food_rating = (int) $rating;
        $this->order->save();
        $this->orderObj = [];
    }


    public function driverRating($rating)
    {
        $this->order->driver_rating = (int) $rating;
        $this->order->save();
    }

    public function orderUpdated()
    {
        $this->order->refresh();
    }

    public function selectedProduct($index)
    {                               
        $this->product = $this->products[$index];
        $this->promo = false;

        if(count($this->product->promotions) == 1){
            $this->promo = true;
        }

        $this->emit('showProduct', $this->product);
        $this->dispatchBrowserEvent('name-updated', ['newName' => asset($this->product->image)]);
    }

    public function clearSelectedProduct()
    {                               
        $this->product = new Product();
        $this->emit('showProduct', $this->product);
        $this->dispatchBrowserEvent('name-updated', ['newName' => asset($this->store[0]->header_image)]);
    }

    public function submit()
    {
        $this->order->order = json_encode($this->orderObj);
        $this->order->user_id = auth()->user()->id;
        $this->order->status = 0;
        $this->order->order_type = $this->order_type;
        
        if ($this->order->order_type == 'delivery') {
            $this->order->latitude = end($this->directionsData['geometry']['coordinates'])[1] ?? '';
            $this->order->longitude = end($this->directionsData['geometry']['coordinates'])[0] ?? '';
            $this->order->distance = $this->directionsData['distance'] ?? '';
            $this->order->duration = $this->directionsData['duration'] ?? '';
            $this->dispatchBrowserEvent('driverUpdate', ['order' => $this->order->id]);
        }
        
        $this->order->save();
        event(new OrderSentEvent('New order recieved!'));

        if ($this->order->order_type == 'delivery') {
            $this->dispatchBrowserEvent('driverUpdate', ['order' => $this->order->id]);
        }

        $this->dispatchBrowserEvent('orderUpdate', ['order' => $this->order->id]);

        $this->alert('success', 'Order successfully sent.');
        $this->emit('refreshComponent');
    }
    
    public function submitRating()
    {   
        $this->order->skip_comment = 0;
        $this->order->save();
        $this->order = new Order();
        $this->alert('success', 'Thank you for you feedback.');
    }

    public function submitCollectRating()
    {
        $this->order->rating_description = $this->rating_description;
        $this->order_status = false;
        $this->order->skip_comment = 0;
        $this->order->save();
        $this->order = new Order();
        $this->alert('success', 'Thank you for you feedback.');
    }

    public function skipRating()
    {
        $this->order->skip_comment = 1;
        $this->order->save();
    }

    public function toggleLike($id, $value)
    {
        if($value){
            $like = new Like();
            $like->user_id = auth()->user()->id;
            $like->product_id = $id;
            $like->save();
            $this->products = Product::all();
            $this->alert('success', 'Product liked.');
        }else{
            $like = Like::find($id);
            $like->delete();
            $this->products = Product::all();
            $this->alert('warning', 'Product removed from likes.');
        }
    }

    public function totalOrderPrice()
    {
        $this->total_price = 0;
        foreach($this->orderObj as $item){
            $this->total_price = $this->total_price + $item['totalPrice'] * $item['quantity'];
        } 
    }

    public function setPosition($latitude,$longitude)
    {
        $this->position = [$latitude,$longitude];
    }

    public function setdirectionsData($distance,$duration)
    {
        $this->directionsData = ['distance' => $distance, 'duration' => $duration];
    }
    
    public function updateOrderItem($id)
    {
        $this->orderObj[$this->orderObjKey] = ["id"=>$this->product['id'], "name"=>$this->product['name'], "quantity"=>$this->quantity, "notes"=>$this->notes, "price"=>$this->product['price'], "removeIngredient" => $this->removeIngredient];
        $this->quantity = 1;
        $this->removeIngredient = [];
        $this->notes = '';
        $this->emitUp('addProduct', $this->orderObj);
    }

    public function updatedOrderType($value)
    {
        if ($value == 'delivery') {
            $this->total_price = $this->total_price + (int) $this->store[0]->delivery_cost;
        }
        return $this->total_price;
    }

    public function render()
    {
        return view('livewire.client.stores.show')->extends('layouts.client')->section('content')->layoutData(['logo' => $this->store[0]->logo ?? '', 'header_image' => $this->store[0]->header_image ?? '']);
    }
}
