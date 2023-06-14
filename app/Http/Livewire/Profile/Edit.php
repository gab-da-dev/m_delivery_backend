<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Models\FcmUserToken;
use Illuminate\Support\Collection;
use App\Events\DriverLocationUpdatedEvent;

class Edit extends Component
{
    public Collection $products;

    public Order $order;

    public User $user;

    public Store $store;

    public $price = 0;

    public $removeIngredient = [];

    public $ingredients = [];

    public $removed = [];

    public $position = [];

    public $token;
    public function mount(Order $order)
    {
        $this->store = Store::find(1);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    public function render()
    {
        return view('livewire.profile.show')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        $this->dispatchBrowserEvent('driverUpdate', ['order' => $this->order->id]);
        $this->order->save();
        event(new DriverLocationUpdatedEvent($this->order, 'Driver is on their way to you.'));
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
