<?php

namespace App\Http\Livewire\Deliveries;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Models\FcmUserToken;
use Illuminate\Support\Collection;

class Edit extends Component
{
    public Collection $products;

    public Order $order;

    public User $user;

    public Store $store;

    public $price = 0;
    public $token;

    public $removeIngredient = [];

    public $ingredients = [];

    public $removed = [];

    public $position = [];

    protected $listeners = ['driverUpdate', 'setPosition'];

    public function mount(Order $order)
    {
        $this->store = Store::find(1);
        $this->products = Product::all();
        $this->user = User::find($order->user_id); //dd(json_decode($order->order, true));
        $this->order->order = json_decode($order->order, true);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
        
        foreach ($this->order->order as $item) {
            array_push($this->removeIngredient, $item['removeIngredient']);
        }

        foreach ($this->products as $item) {
            array_push($this->ingredients, $item['ingredients']);
        }
        $this->store = Store::find(1);
    }

    public function render()
    {
        return view('livewire.deliveries.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function setPosition($lat, $lng)
    {
        // [29.171079, -25.871937]
        $this->position = [$lat, $lng];
        $this->order->driver_latitude = $lat;
        $this->order->driver_longitude = $lng;
        // $this->order->driver_latitude = 29.171079;
        // $this->order->driver_longitude = 25.871937;
        $this->order->save();
    }

    public function updated()
    {
        //
    }

    public function submit()
    {
        $this->order->save();

        $fcmUserToken = FcmUserToken::where('user_id', $this->order->user_id)->first();

        if ($this->order->status == 3) {
            $this->sendNotification('Order status', 'Driver is on the way.', $fcmUserToken->token);
        }

        if ($this->order->status == 4) {
            $this->sendNotification('Order status', 'Your order has arrived.', $fcmUserToken->token);
        }
        $this->flash('success', 'Delivery status updated!', [], '');
    }

    protected function rules()
    {
        return [
            'order.order.*' => 'required',
            'order.status' => 'required',
            'order.delivery_status' => 'required',
        ];
    }

    public function sendNotification($title, $body, $token)
    {
        $firebaseToken = [$token];
        $SERVER_API_KEY = env('FCM_SERVER_KEY');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,  
            ]
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);

    }
}
