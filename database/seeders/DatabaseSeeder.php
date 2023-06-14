<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            $this->call([
                ProductSeeder::class,
                OrderSeeder::class,
                UserTypesSeeder::class,
                StoreSeeder::class,
                RoleAndPermissionSeeder::class,
                AdminUserSeeder::class,
                UserSeeder::class,
                UserTypesSeeder::class,
                ProductIngredientSeeder::class,
                ProductCategorySeeder::class
            ]);
        }
        if (App::environment('production')) {
            $this->call([
                StoreSeeder::class,
                RoleAndPermissionSeeder::class,
                AdminUserSeeder::class,
            ]);
        }

    }
}
