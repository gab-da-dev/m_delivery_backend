<?php

namespace App\Http\Livewire\ProductIngredients;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\FcmUserToken;
use Livewire\WithFileUploads;
use App\Models\ProductIngredient;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use WithFileUploads;

    use LivewireAlert;
    public $token;

    public ProductIngredient $productIngredient;

    public Store $store;

    public function mount(ProductIngredient $productIngredient)
    {
        $this->productIngredient = $productIngredient;
        $this->store = Store::find(1);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    public function render()
    {
        return view('livewire.productIngredients.create')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        $this->validate();

        $this->productIngredient->save();

        $this->flash('success', 'Product ingredient created!', [], '/admin/product-ingredients');
    }

    protected function rules()
    {
        return [
            'productIngredient.active' => 'required|bool',
            'productIngredient.name' => 'required|string|min:3|max:50',
            'productIngredient.price' => 'required',
            'productIngredient.price' => 'required',
        ];
    }
}
