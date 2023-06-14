<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordRequest extends Component
{
    public Collection $store;
    public User $user;
    public $name;
    public $email;
    public $password;
    public $is_admin;
    public $logo;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->store = Store::all();
        $this->logo = $this->store[0]->logo;
    }
    public function render()
    {
        return view('auth.forgot-password')->extends('layouts.guest')->layoutData(['logo' => $this->store[0]->logo ?? '', 'header_image' => $this->store[0]->header_image ?? '']);
    }

    public function submit()
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }

}
