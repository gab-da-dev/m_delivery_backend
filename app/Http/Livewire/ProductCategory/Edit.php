<?php

namespace App\Http\Livewire\ProductCategory;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\FcmUserToken;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use WithFileUploads;

    public ProductCategory $productCategory;

    public $newArray;

    public $filename;

    public $store;

    use LivewireAlert;

    public $token;

    public function mount(ProductCategory $product_categories)
    {
        $this->productCategory = $product_categories;
        $this->store = Store::find(1);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    public function remove($id)
    {
        $newArray = $this->product->ingredients;
        unset($newArray[$id]);
        $this->product->ingredients = $newArray;
    }
    
    public function render()
    {
        return view('livewire.productCategory.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        $this->validate();
        $this->productCategory->save();
        $this->flash('success', 'Product category updated!', [], '/admin/product-categories');
    }

    protected function rules()
    {
        return [
            'productCategory.active' => 'bool|',
            'productCategory.name' => 'required|string|min:3|max:50',
        ];
    }


}
