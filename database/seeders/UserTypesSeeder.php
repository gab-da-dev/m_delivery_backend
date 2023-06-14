<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create(['name'=>'admin']);
        UserType::create(['name'=>'user']);
        UserType::create(['name'=>'client']);
        UserType::create(['name'=>'driver']);
    }
}
