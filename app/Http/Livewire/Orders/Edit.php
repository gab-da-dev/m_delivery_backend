<?php

namespace App\Http\Livewire\Orders;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Models\FcmUserToken;
use App\Models\ProductIngredient;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    public Collection $products;

    public Order $order;

    public Store $store;

    public $price = 0;

    public $removeIngredient = [];

    public $removed = [];

    public $config;

    public $token;

    public Collection $ingredients;

    use LivewireAlert;

    public function mount(Order $order)
    {
        $this->store = Store::find(1);
        $this->products = Product::where('active', 1)->get();
        $this->ingredients = ProductIngredient::where('active', 1)->get();
        $this->order->order = json_decode($order->order, true);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
        
        foreach ($this->order->order as $item) {
            if (array_key_exists('removeIngredient', $item)) {
                array_push($this->removeIngredient, $item['removeIngredient']);
            }
        }

        // foreach ($this->products as $item) {
        //     array_push($this->ingredients, $item['ingredients'], true);
        // }
        
        $this->config = $this->order->order;
    }

    public function render()
    {
        return view('livewire.orders.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function updated()
    {
        $this->order->order = $this->config;
    }

    public function submit()
    {
        $this->order->order = $this->config;

        $this->order->save();

        $fcmUserToken = FcmUserToken::where('user_id', $this->order->user_id)->first();

        if ($this->order->status == 1) {
            // event(new OrderUpdateEvent($this->order, 'Your order is being prepared!'));
            $this->sendNotification('Order status', 'Your order is being prepared.', $fcmUserToken->token);
        }

        if ($this->order->status == 2) {
            // event(new OrderUpdateEvent($this->order, 'Your order is complete!'));
            $this->sendNotification('Order status', 'Your order is complete.', $fcmUserToken->token);
        }

        $this->dispatchBrowserEvent('orderUpdate', ['order' => $this->order->id]);

        $this->flash('success', 'Order updated!', [], '/admin/orders');
    }

    protected function rules()
    {
        return [
            'order.order.*' => 'required',
            'order.status' => 'required',
            'order.collect_status' => 'nullable',
            'order.order.*.notes' => 'required',
            'order.order.*.quantity' => 'required',
            'order.order.*.name' => 'required',
            'order.order.*.name_id' => 'required',
            'order.order.*.removeIngredient' => 'nullable',
        ];
    }

    public function sendNotification($title, $body, $token)
    {
        $firebaseToken = [$token];
        $SERVER_API_KEY = "AAAApirut_M:APA91bGcYb7iXC3a9QrSlDM8T2JusKaZF9CuuJjj9hwAOeFWgrwwcj7ibyKZNcwq3RqGBk-pMxaYnRnkr2mcgrtUIEU6j6rK2XGXLk6twgJHcBsla212x_7Uxkv7-dqeLOTr0BqlcjiR";

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
