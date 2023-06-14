<?php

namespace App\Http\Livewire\UserTypes;

use App\Models\Store;
use Livewire\Component;
use App\Models\UserType;

class Create extends Component
{
    public UserType $user_type;
    public $logo;
    public $name;
    public $email;
    public $password;

    public $header_image;

    protected $listeners =
    [
    'setStoreLocation',
    ];

    public function mount(UserType $user_type)
    {
        $this->user_type = $user_type;
        $this->store = Store::find(1);
    }

    public function submit()
    {
        $this->user_type->save();

        return redirect()->intended('/admin/user-types/');
    }

    public function render()
    {
        return view('livewire.user-types.create')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
        ]);
    }

    public function setStoreLocation($location)
    {
        $this->store->lat = $location['geometry']['location']['lat'];
        $this->store->lng = $location['geometry']['location']['lng'];
    }

    protected function rules()
    {
        return [
            'user_type.name' => 'required|string|min:3|max:50',
        ];
    }
}
