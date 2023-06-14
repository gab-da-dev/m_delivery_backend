<?php

namespace App\Http\Livewire\Products;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use Livewire\Component;
use App\Models\FcmUserToken;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use App\Models\ProductIngredient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Edit extends Component
{
    use WithFileUploads;

    public $newArray;
    public Product $product;
    public Collection $productCategories;
    public Collection $productIngredients;
    public User $user;
    public Store $store;
    public $filename;
    public $token;

    use LivewireAlert;

    public function mount(Product $product)
    {
        $this->product = $product; //dd($this->product);
        $this->productCategories = ProductCategory::where('active',1)->get();
        $this->productIngredients = ProductIngredient::where('active',1)->get();
        $this->product->ingredients = $product->ingredients;
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
        return view('livewire.products.edit')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        if ($this->filename != null) {
            $path = Storage::putFile('products', $this->filename[0]);
            $this->product->image = $path;
        }
        $this->product->save();
        $this->flash('success', 'Product updated!', [], '/admin/products');
    }

    protected function rules()
    {
        return [
            'product.name' => 'required|string|min:3|max:50',
            'product.ingredients.*' => '',
            'product.size_pricing' => 'array',
            'product.size_pricing.*.size' => 'string',
            'product.size_pricing.*.price' => 'string',
            'product.size_pricing.*.active' => 'bool',
            'product.image' => '',//'required',
            'product.description' => 'string|min:3|max:50',
            'product.price' => 'required|string|min:3|max:50',
            'product.prep_time' => 'required|string|min:3|max:50',
            'product.product_category_id' => 'required',
            'product.active' => 'bool|',
        ];
    }


}
