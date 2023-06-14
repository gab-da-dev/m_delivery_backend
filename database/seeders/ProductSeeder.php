<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Number 1',
            'ingredients' => ["2","4","5"],
            'price' => 44.50,
            'image' => 'products/SHwwNEAOoMPf3CWbxQwa4fIlBdR7kEp73ixZmzAK.jpg',
            'prep_time' => 10,
            'active' => true,
            'product_category_id' => 1,
            'description' => 'Product description'
        ]);
        Product::create([
            'name' => 'Number 2',
            'ingredients' => ["2","4","5"],
            'price' => 44.50,
            'image' => 'products/SHwwNEAOoMPf3CWbxQwa4fIlBdR7kEp73ixZmzAK.jpg',
            'prep_time' => 14,
            'active' => true,
            'product_category_id' => 2,
            'description' => 'Product description'
        ]);
        Product::create([
            'name' => 'Number 3',
            'ingredients' => ["2","4","5"],
            'price' => 55.50,
            'image' => 'products/fRXTaIywjMDYDZlhlgju01KwJqrsszTxyG2ZqH0G.jpg',
            'prep_time' => 14,
            'active' => true,
            'product_category_id' => 2,
            'description' => 'Product description'
        ]);
        Product::create([
            'name' => 'Number 4',
            'ingredients' => ["2","4","5"],
            'price' => 65.99,
            'image' => 'products/lzwuDNrdwtJDvTHKlDC4fgMzU2vf26S4QaJgsuPg.jpg',
            'prep_time' => 14,
            'active' => true,
            'product_category_id' => 3,
            'description' => 'Product description'
        ]);
        Product::create([
            'name' => 'The Chow',
            'ingredients' => ["2","4","5"],
            'price' => 65.99,
            'image' => 'products/TFjo1cZb5miOLEYW9WHckmaNenKGAVK48cgw6v7G.jpg',
            'prep_time' => 14,
            'active' => true,
            'product_category_id' => 3,
            'description' => 'Product description'
        ]);

        
    }
}
