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
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    use WithFileUploads;

    public Product $product;
    public Collection $productCategories;
    public Collection $productIngredients;
    public User $user;
    public Store $store;
    public $filename;
    public $token;

    use LivewireAlert;

    public function mount()
    {
        $this->productCategories = ProductCategory::where('active',1)->get();
        $this->productIngredients = ProductIngredient::where('active',1)->get();
        $this->getNewProduct();
        $this->store = Store::find(1);
        $users = User::role(['Admin'])->get();
        $this->token = FcmUserToken::where('user_id', $users[0]->id)->first();
    }

    public function render()
    {
        return view('livewire.products.create')->extends('layouts.app')->section('content')->layoutData([
            'logo' => $this->store['logo'] ?? '',
            'header_logo' => $this->store['header_image'] ?? '',
            'token' => $this->token->token ?? ''
        ]);
    }

    public function submit()
    {
        $this->validate();
        $path = Storage::putFile('products', $this->filename);
        $this->product->image = $path;
        $this->product->save();
        
        $this->flash('success', 'Product created!', [], '/admin/products');
    }

    public function update()
    {
        $this->product->ingredients = json_encode($this->product->ingredients);
        $this->product->save();
    }

    protected function rules()
    {
        return [
            'product.name' => 'required|string|min:3|max:50',
            'product.ingredients.*' => '',
            'product.size_pricing' => 'array',
            'product.size_pricing.*.size' => 'string',
            'product.size_pricing.*.price' => '',
            'product.size_pricing.*.active' => 'bool',
            'product.image' => '',//'required',
            'product.price' => 'required|string|min:3|max:50',
            'product.description' => 'string|min:3|max:50',
            'product.prep_time' => 'required|int',
            'product.product_category_id' => 'required',
            'product.active' => 'bool|',
        ];
    }

    private function getNewProduct(): void
    {
        $this->product = new Product([
            // 'name' => '',
            'ingredients' => [],
            'image' => [],
            'price' => '',
            'prep_time' => '',
            'active' => 1,
            'size_pricing' => [['size' => 'sm', 'price' => 3.00, 'active' => true]],
        ]);
    }
}
