<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order' => json_encode('[{"id": 1, "name": "Number 7", "notes": null, "price": "34", "quantity": 1, "addExtras": [], "totalPrice": "34", "removeIngredient": []}, {"id": 2, "name": "number 2", "notes": "", "price": "45", "quantity": 1, "addExtras": [], "totalPrice": "45", "removeIngredient": []}]'),
            'latitude' => '',
            'longitude' => '',
            'distance' => '',
            'duration' => '',
            'user_id' => 1,
            'status' => 0,
            'order_type' => 'delivery',
            'address' => '3951 Owen Mlisa, Ackerville, Witbank',
        ];
    }
}
