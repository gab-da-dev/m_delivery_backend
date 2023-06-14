<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['first_name'=>'admin', 'last_name'=>'admin', 'phone_number'=>'0000000000', 'email'=>'admin@admin.com', 'email_verified_at'=> now(), 'password'=> bcrypt('password')])->assignRole('Admin');
        User::create(['first_name'=>'admin', 'last_name'=>'user', 'phone_number'=>'0000000000', 'email'=>'user@user.com', 'email_verified_at'=> now(), 'password'=> bcrypt('password')])->assignRole('Client');
        User::create(['first_name'=>'driver', 'last_name'=>'driver', 'phone_number'=>'0000000000', 'email'=>'driver@driver.com', 'email_verified_at'=> now(), 'password'=> bcrypt('password')])->assignRole('Driver');
    }
}
