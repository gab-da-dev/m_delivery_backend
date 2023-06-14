<?php

namespace App\Http\Livewire\Stores;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Store $store;
    public $logo;
    public $header_image;

    protected $listeners =
    [
    'setStoreLocation',
    ];

    public function mount(Store $store)
    {
        $this->store = $store;
    }

    public function submit()
    {
        $logo_path = $this->logo->store('store_images');
        $header_path = $this->header_image->store('store_images');
        $this->store->user_id = auth()->user()->id;
        $this->store->logo = $logo_path;
        $this->store->header_image = $header_path;
        $this->store->save();

        return redirect()->intended('/admin/products/create');
    }

    public function render()
    {
        return view('livewire.store.create')->extends('layouts.app')->section('content');
    }

    public function setStoreLocation($location)
    {
        $this->store->lat = $location['geometry']['location']['lat'];
        $this->store->lng = $location['geometry']['location']['lng'];
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
