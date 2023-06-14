<?php

namespace App\Http\Livewire\Clients;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\FcmUserToken;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

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
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    public function submit()
    {
        $this->user->password = Hash::make($this->password);
        $this->user->save();

        return redirect()->intended('/admin/users/');
    }

    public function render()
    {
        return view('livewire.users.create')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
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
            'user.name' => 'required|string|min:3|max:50',
            'user.email' => 'required|email',
            'user.password' => 'required',
            'user.is_admin' => 'required|',
            'user.user_type' => 'required|',
        ];
    }
}
