<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use WithFileUploads;

    public User $user;
    public Collection $roles;
    public $logo;
    public $name;
    public $email;
    public $user_type;
    public $password;
    public $token;

    public $header_image;

    protected $listeners =
    [
    'setStoreLocation',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->store = Store::find(1);
        $this->roles = Role::all();
        // dd($this->roles);
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->save();

        return redirect()->intended('/admin/users/');
    }

    public function render()
    {
        return view('livewire.users.create')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token
        ]);
    }

    protected function rules()
    {
        return [
            'user.first_name' => 'required|string|min:3|max:50',
            'user.last_name' => 'required|string|min:3|max:50',
            'user.email' => 'required|email',
            'user.password' => 'required',
            'user.is_admin' => 'required|',
            'user.user_type' => 'required|',
        ];
    }
}
