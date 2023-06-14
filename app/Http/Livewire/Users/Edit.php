<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public Store $store;
    
    public User $user;

    public Collection $roles;

    public $role;

    public function mount($id)
    {
        
        $this->user = User::find((int) $id);
        $this->store = Store::find(1);
        $this->roles = Role::all();
        // dd($this->roles);
    }

    public function render()
    {
        return view('livewire.users.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
        ]);
    }

    protected function rules()
    {
        return [
            'user.first_name' => 'required|string|min:3|max:50',
            'user.last_name' => 'required|string|min:3|max:50',
            'user.email' => 'required|email',
            // 'user.password' => 'required',
            // 'user.user_type' => 'required|',
        ];
    }

    public function submit()
    {
        // dd($this->user->user_type);
        $this->user->assignRole($this->role);

        $this->user->save();

        return redirect()->intended('/admin/users/');
    }
}
