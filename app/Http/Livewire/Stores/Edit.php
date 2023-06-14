<?php

namespace App\Http\Livewire\Stores;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\FcmUserToken;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public Store $store;
    public $logo;
    public $header_image;
    public $token;

    protected $listeners = ['addCoordinates'];


    public function mount($id)
    {
        $this->store = Store::find($id);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }
    
    public function addCoordinates($coordinates)
    {
        $this->store->lng = $coordinates[0];
        $this->store->lat = $coordinates[1];
    }

    public function render()
    {
        return view('livewire.store.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        if ($this->logo) {
            $this->store->logo = $this->logo->store('store_images');
        }

        if ($this->header_image) {
            $this->store->header_image = $this->header_image->store('store_images');
        }

        $this->store->user_id = auth()->user()->id;

        $this->store->save();

        $this->flash('success', 'Stored updated!', [], '/admin/dashboard');
    }


    protected function rules()
    {
        return [
            'store.name' => 'required|string|min:3|max:50',
            'store.lat' => 'required',
            'store.lng' => 'required',
            'store.open_time' => 'required|string|min:3|max:50',
            'store.close_time' => 'required|string|min:3|max:50',
            'store.logo' => 'required|string',
            'store.header_image' => 'required|string',
            'store.active' => 'bool',
            'store.delivery_cost' => 'int',
            'store.delivery_limit' => 'int',
        ];
    }
}
