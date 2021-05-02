<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use MyHelper;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++)
        {
            DB::table('tbl_supplier')->insert([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'description' => MyHelper::readable_random_string()
            ]);
        }
    }
}

