<?php

namespace App\Http\Livewire\Auth;

use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Login extends Component
{
    public Collection $store;
    public $email;
    public $password;
    public $logo;

    public function mount()
    {
        $this->store = Store::all();
        $this->logo = $this->store[0]->logo;
    }

    public function render()
    {
        return view('auth.login')->extends('layouts.guest')->layoutData(['logo' => $this->store[0]->logo ?? '', 'header_image' => $this->store[0]->header_image ?? '']);
    }

    public function submit()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended('admin/dashboard');
        }

        return back()->with('errors', 'Wrong email or password. Please try again.');
    }
}
