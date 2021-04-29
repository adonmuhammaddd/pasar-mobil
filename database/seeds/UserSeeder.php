<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++)
        {
            DB::table('tbl_user')->insert([
                'id' => Str::uuid(),
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Str::random(11),
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
