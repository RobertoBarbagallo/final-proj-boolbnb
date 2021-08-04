<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesStructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=1; $i < 10; $i++) { 

            DB::table('service_structure')->insert([

                'structure_id' => rand(1,29),
                'service_id' => $faker->unique()->numberBetween(1,21),
        
            ]);

        }
    }
}
