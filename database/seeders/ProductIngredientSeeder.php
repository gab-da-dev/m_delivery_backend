<?php

namespace Database\Seeders;

use App\Models\ProductIngredient;
use Illuminate\Database\Seeder;

class ProductIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductIngredient::create(['name'=>'Ham', 'price' => 2.50,]);
        ProductIngredient::create(['name'=>'Russian', 'price' => 5.50,]);
        ProductIngredient::create(['name'=>'Cheese', 'price' => 1.50,]);
        ProductIngredient::create(['name'=>'Tomato', 'price' => 1.50,]);
    }
}
