<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'momo',
            'lat' => '',
            'lng' => '',
            'logo' => './momo-logos_transparent.png',
            'header_image' => './momo-logos.jpeg',
            'delivery_cost' => 35.00,
            'delivery_limit' => 8,
            'open_time' => '09:00',
            'close_time' => '23:00',
            'active' => 1,
            'user_id' => 1,
        ];
    }
}
