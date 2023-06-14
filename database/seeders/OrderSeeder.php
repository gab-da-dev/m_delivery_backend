<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create(['order' => '[{"id": 1, "name": "Number 7", "notes": null, "price": "34", "quantity": 1, "addExtras": [], "totalPrice": "34", "removeIngredient": []}, {"id": 2, "name": "number 2", "notes": "", "price": "45", "quantity": 1, "addExtras": [], "totalPrice": "45", "removeIngredient": []}]',
        'latitude' => '',
        'longitude' => '',
        'distance' => '',
        'duration' => '',
        'user_id' => 1,
        'status' => 0,
        'order_type' => 'delivery',]);
        Order::create(['order' => '[{"id": 1, "name": "Number 7", "notes": null, "price": "34", "quantity": 1, "addExtras": [], "totalPrice": "34", "removeIngredient": []}]',
        'latitude' => '',
        'longitude' => '',
        'distance' => '',
        'duration' => '',
        'user_id' => 1,
        'status' => 0,
        'order_type' => 'delivery',]);
        Order::create(['order' => '[{"id": 4, "name": "Number 4", "notes": null, "price": "34", "quantity": 1, "addExtras": [], "totalPrice": "34", "removeIngredient": []}]',
        'latitude' => '',
        'longitude' => '',
        'distance' => '',
        'duration' => '',
        'user_id' => 1,
        'status' => 0,
        'order_type' => 'delivery',]);
        Order::create(['order' => '[{"id": 4, "name": "Number 4", "notes": null, "price": "34", "quantity": 1, "addExtras": [], "totalPrice": "34", "removeIngredient": []}]',
        'latitude' => '',
        'longitude' => '',
        'distance' => '',
        'duration' => '',
        'user_id' => 1,
        'status' => 0,
        'order_type' => 'delivery',]);
        Order::create(['order' => '[{"id": 4, "name": "Number 4", "notes": null, "price": "34", "quantity": 1, "addExtras": [], "totalPrice": "34", "removeIngredient": []}]',
        'latitude' => '',
        'longitude' => '',
        'distance' => '',
        'duration' => '',
        'user_id' => 1,
        'status' => 0,
        'order_type' => 'delivery',]);
        Order::create(['order' => '[{"id": 4, "name": "Number 4", "notes": null, "price": "34", "quantity": 1, "addExtras": [], "totalPrice": "34", "removeIngredient": []}]',
        'latitude' => '',
        'longitude' => '',
        'distance' => '',
        'duration' => '',
        'user_id' => 1,
        'status' => 0,
        'order_type' => 'delivery',]);
    }
}
