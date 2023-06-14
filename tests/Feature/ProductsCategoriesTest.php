<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Http\Livewire\ProductCategory\Create as ProductCategoryCreate;
use App\Http\Livewire\ProductCategory\Edit as ProductCategoryEdit;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsCategoriesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }
    
    public function testCanCreateProductCategory()
    {
        $user = User::find(1);

        $roductCategory = new ProductCategory();
        // dd($file);
        Livewire::actingAs($user)
            ->test(ProductCategoryCreate::class, [$roductCategory])
            ->set('productCategory.name', 'Test meal')
            ->set('productCategory.active', 1)
            ->call('submit')
            ->assertHasNoErrors();
    }

    public function testCanEditProductCategory()
    {
        $user = User::find(1);

        $productCategory = ProductCategory::find(1);
        // dd($productCategory);
        Livewire::actingAs($user)
            ->test(ProductCategoryEdit::class, [$productCategory])
            ->set('productCategory.name', 'Edit name')
            ->set('productCategory.active', 0)
            ->call('submit')
            ->assertHasNoErrors();
    }

    public function testCanViewProductIngredientPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/product-categories/create')
            ->assertStatus(200)
            ->assertSee('Create Product Category')
            ->assertSessionHasNoErrors();
    }

    public function testCanViewProductCategoryIndexPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/product-categories')
            ->assertSee('Product Category')
            ->assertSessionHasNoErrors();
    }

}
