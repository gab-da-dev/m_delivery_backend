<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
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
    public $usersPerMonth = [];
    public $orderTypeArray = [];
    public Store $store;
    public Collection $products;
    public Collection $orders;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::where('active', 1)->get();

        return response()->json(['data' => $products]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function popularProduct()
    {
        $this->countArray = [];
        $this->nameArray = [];
        $this->orderTypeArray = [];
        $this->total_amount = 0;
        $this->delivery_count = 0;
        $this->collection_count = 0;
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->format('Y-m-d');
        $this->orders = Order::select("*")->whereBetween('created_at', [$this->start_date, Carbon::parse($this->end_date)->endOfDay()])->get();
        $this->products = Product::all();

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

        $count = 0;
        $index = 0;
        foreach ($this->countArray as $key => $value) {
            if ($value > $count) {
                $count = $value;
                $index = $key;
            }
        }

        return response()->json(['data' => $this->products[$index]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
    }
}
