<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public Collection $store;
    public User $user;
    public $name;
    public $email;
    public $password;
    public $is_admin;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->store = Store::all();
        $this->logo = $this->store[0]->logo;
    }

    public function render()
    {
        return view('auth.register')
        ->extends('layouts.guest')
        ->layoutData(
            [
                'logo' => $this->store[0]->logo ?? '', 
                'header_image' => $this->store[0]->header_image ?? ''
            ]);
    }

    public function submit()
    {dd(__CLASS__, __LINE__);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'is_admin' => 1])) {
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register()
    {dd(__CLASS__);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->user_type_id = 3;
        $this->user->password = Hash::make($this->password);

        $this->user->save();

        if (Auth::attempt(['email' => $this->user->email, 'password' => $this->password, 'is_admin' => 1])) {
            return redirect()->intended('/admin/store/create');
        }
    }
}
