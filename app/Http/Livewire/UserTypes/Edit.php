<?php

namespace App\Http\Livewire\UserTypes;

use App\Models\Store;
use App\Models\UserType;
use Livewire\Component;

class Edit extends Component
{
    public Store $store;

    // public UserType $user_type;

    public function mount(UserType $user_type)
    {dd($user_type);
        $this->user_type = $user_type;
        $this->store = Store::find(1);
    }

    public function render()
    {
        return view('livewire.user-types.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
        ]);
    }

    protected function rules()
    {
        return [
            'user_type.name' => 'required|string|min:3|max:50',
        ];
    }

    public function submit()
    {
        $this->user->save();

        return redirect()->intended('/admin/users/');
    }
}
