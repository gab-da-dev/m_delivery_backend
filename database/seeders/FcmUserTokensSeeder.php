<?php

namespace Database\Seeders;

use App\Models\FcmUserToken;
use Illuminate\Database\Seeder;

class FcmUserTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FcmUserToken::create(['user_id'=>2, 'token'=>'jrwnlvwitpqp,csrjwckiwhvntmewoqv']);
    }
}
