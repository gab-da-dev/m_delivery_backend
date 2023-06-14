<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create(['name'=>'Burgers']);
        ProductCategory::create(['name'=>'Kotas']);
        ProductCategory::create(['name'=>'Bunny']);
        ProductCategory::create(['name'=>'Drinks', 'active' => 0]);
    }
}
