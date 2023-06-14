<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Http\Livewire\ProductIngredients\Create as ProductIngredientsCreate;
use App\Http\Livewire\ProductIngredients\Edit as ProductIngredientsEdit;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use App\Http\Livewire\Products\Create;
use App\Http\Livewire\Products\Edit;
use App\Models\ProductIngredient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsIngredientsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }
    
    public function testCanCreateProductIngredients()
    {
        $user = User::find(1);

        $roductIngredients = new ProductIngredient();
        // dd($file);
        Livewire::actingAs($user)
            ->test(ProductIngredientsCreate::class, [$roductIngredients])
            ->set('productIngredient.name', 'Test meal')
            ->set('productIngredient.price', 1.99)
            ->set('productIngredient.active', 1)
            ->call('submit')
            ->assertHasNoErrors();
    }

    public function testCanEditProductIngredients()
    {
        $user = User::find(1);

        $productIngredients = ProductIngredient::find(1);
        // dd($productIngredients);
        Livewire::actingAs($user)
            ->test(ProductIngredientsEdit::class, [$productIngredients])
            ->set('productIngredient.name', 'Edit name')
            ->set('productIngredient.price', 3.99)
            ->set('productIngredient.active', 0)
            ->call('submit')
            ->assertHasNoErrors();
    }

    public function testCanViewProductIngredientPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/product-ingredients/create')
            ->assertStatus(200)
            ->assertSee('Create Product Ingredient')
            ->assertSessionHasNoErrors();
    }

    public function testCanViewProductIngredientsIndexPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/product-ingredients')
            ->assertSee('Product Ingredients')
            ->assertSessionHasNoErrors();
    }

}
