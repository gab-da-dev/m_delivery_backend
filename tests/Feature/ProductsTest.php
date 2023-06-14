<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use App\Http\Livewire\Products\Create;
use App\Http\Livewire\Products\Edit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }
    
    public function testCanCreateProduct()
    {
        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('avatar.png');
        $path = Storage::putFile('products', $file);

        $user = User::find(1);

        $product = new Product();
        // dd($file);
        Livewire::actingAs($user)
            ->test(Create::class, [$product])
            ->set('product.name', 'Test meal')
            ->set('filename', $file)
            ->set('product.ingredients', [2, 3, 4])
            ->set('product.price', 45)
            ->set('product.product_category_id', 2)
            ->set('product.prep_time', 12)
            ->set('product.active', 1)
            ->set('product.size_pricing', [['size' => 'sm', 'price' => 3.00, 'active' => 1]])
            ->call('submit')
            ->assertHasNoErrors();
    }

    public function testCanEditProduct()
    {
        $user = User::find(1);

        $product = Product::find(1);
        
        Livewire::actingAs($user)
            ->test(Edit::class, [$product])
            ->set('product.name', 'Test meal')
            ->set('product.ingredients', [2, 3, 4])
            ->set('product.price', 45)
            ->set('product.product_category_id', 2)
            ->set('product.prep_time', 12)
            ->set('product.active', 1)
            ->set('product.size_pricing', [['size' => 'sm', 'price' => 3.00, 'active' => 'bbfdb']])
            ->call('submit')
            ->assertHasNoErrors()
            ;
            
    }

    public function testCanViewPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/products/create')
            ->assertStatus(200)
            ->assertSee('Create Product')
            ->assertSessionHasNoErrors();
    }

    public function testCanViewProductIndexPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/products')
            ->assertSee('Product')
            ->assertSessionHasNoErrors();
    }

    public function testCanViewProductEditPage()
    {
        $user = User::find(1);

        $this->actingAs($user)
            ->get('/admin/products/1')
            ->assertSee('Update Product')
            ->assertSessionHasNoErrors();
    }
}
