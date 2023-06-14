<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'name' => $this->faker->foodName(),
            'ingredients' => '["chips","ham","cheese","beef strips","onions","lettuce"]',
            'price' => $this->faker->numberBetween(11, 100),
            'image' => 'products/8NqPPHlqQfdT5iOIlTl1ltJy24B1h869lBFUgA0o.jpg',
            'prep_time' => $this->faker->numberBetween(5, 45),
            'product_category_id' => 1,
            'active' => $this->faker->boolean(),
        ];
    }
}

// nODucclJBQ8dme5955oMKMS0DGCiXtMsgRTgsBsq.jpg