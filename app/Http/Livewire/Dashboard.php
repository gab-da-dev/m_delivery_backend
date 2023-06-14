<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Models\FcmUserToken;
use App\Models\ProductIngredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class Dashboard extends Component
{
    public $chartObj = [];
    public $countArray = [];
    public $collection_count = 0;
    public $delivery_count = 0;
    public $end_date = '';
    public $labels = [];
    public $nameArray = [];
    public $start_date = '';
    public $order_count = 0;
    public $total_amount = 0;
    public $token;
    public $usersPerMonth = [];
    public $orderTypeArray;
    public Store $store;
    public Collection $products;
    public Collection $orders;
    public $clients;
    public $productCount;
    public $productongredients;

    protected $listeners = [
        'filter',
    ];

    public function mount()
    {
        $this->store = Store::find(1);
        $this->products = Product::all();
        $this->labels = $this->products->pluck(['id']);
        $this->chartObj = array_flip($this->labels->toArray());

        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->format('Y-m-d');
        

        $this->usersPerMonth =User::select(DB::raw('count(id) as `data`'),DB::raw("DATE_FORMAT(created_at, '%Y-%m') new_date"))
        ->groupBy('new_date')->orderBy('new_date')->get();
    
        $this->filter();

        $users = User::role(['Admin'])->get();
        $this->clients = User::role(['Client'])->get()->count();
        $this->productCount = $this->products->count(); 
        $this->productongredients = ProductIngredient::all()->count(); 
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    public function filter()
    {
        $this->orders = Order::select("*")->whereBetween('created_at', [$this->start_date, Carbon::parse($this->end_date)->endOfDay()])->get();
        $this->countArray = [];
        $this->nameArray = [];
        $this->orderTypeArray = [];
        $this->total_amount = 0;
        $this->delivery_count = 0;
        $this->collection_count = 0;
        foreach ($this->products as $keys => $product) {
            array_push($this->nameArray, $product->name);
            array_push($this->countArray, 0);

            foreach ($this->orders as $order) {
                foreach (json_decode($order->order, true) as $value) { 
                    if ($value['id'] == $product->id) { 
                        $this->countArray[$keys] = $this->countArray[$keys] + $value['quantity'];
                        $this->total_amount = $this->total_amount + (int) $value['price'];
                    }
                }
                
            }
        }

        foreach ($this->orders as $key => $order) {
            if ($order->order_type == 'delivery') { 
                $this->delivery_count = $this->delivery_count + 1; 
            }elseif ($order->order_type == 'collect') {
                $this->collection_count = $this->collection_count + 1;
            }
        }

        $this->order_count = $this->orders->count();
        $this->orderTypeArray = [$this->collection_count, $this->delivery_count];
        $this->dispatchBrowserEvent('updateChart', ['name' => $this->nameArray, 'count' => $this->countArray, 'order_type' => $this->orderTypeArray ]);
    }

    public function render()
    {
        return view('dashboard')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }
}
