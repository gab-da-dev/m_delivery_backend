<?php

namespace App\Http\Livewire\ProductCategory;

use App\Models\User;
use App\Models\Store;
use Livewire\Component;
use App\Models\FcmUserToken;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use WithFileUploads;

    use LivewireAlert;

    public ProductCategory $productCategory;

    public Store $store;
    public $token;

    public function mount(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
        $this->store = Store::find(1);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
        
    }

    public function render()
    {
        return view('livewire.productCategory.create')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        $this->validate();
        
        $this->productCategory->save();

        $this->flash('success', 'Product category created!', [], '/admin/product-categories');
    }

    protected function rules()
    {
        return [
            'productCategory.active' => 'required|bool',
            'productCategory.name' => 'required|string|min:3|max:50',
        ];
    }
}
