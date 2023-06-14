<?php

namespace App\Http\Livewire\ProductIngredients;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\FcmUserToken;
use Livewire\WithFileUploads;
use App\Models\ProductIngredient;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use WithFileUploads;

    public $newArray;

    public $filename;

    public $store;
    
    public $token;

    public ProductIngredient $productIngredient;

    use LivewireAlert;

    public function mount(ProductIngredient $product_ingredient)
    {
        $this->productIngredient = $product_ingredient;
        $this->store = Store::find(1);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    
    public function render()
    {
        return view('livewire.productIngredients.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        $this->validate();
        $this->productIngredient->save();
        $this->flash('success', 'Product ingredient updated!', [], '/admin/product-ingredients');
    }

    protected function rules()
    {
        return [
            'productIngredient.active' => 'required|bool',
            'productIngredient.name' => 'required|string|min:3|max:50',
            'productIngredient.price' => 'required|string',
        ];
    }


}
