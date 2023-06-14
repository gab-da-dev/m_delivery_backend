<?php

namespace App\Http\Livewire\Clients;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\FcmUserToken;

class Edit extends Component
{
    public Store $store;
    
    public User $user;
    public $token;

    public function mount($id)
    {
        $this->user = User::find((int) $id);
        $this->store = Store::find(1);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    public function render()
    {
        return view('livewire.users.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    protected function rules()
    {
        return [
            'user.name' => 'required|string|min:3|max:50',
            'user.email' => 'required|email',
            'user.password' => 'required',
            'user.is_admin' => 'required|',
            'user.user_type' => 'required|',
        ];
    }

    public function submit()
    {
        $this->user->save();

        return redirect()->intended('/admin/users/');
    }
}
