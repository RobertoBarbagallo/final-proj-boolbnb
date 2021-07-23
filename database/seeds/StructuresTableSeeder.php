<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) { 

            $lang = 45.536363;
            $long = 10.142320;
            $name = 'Hotel di '. $faker->name;

            DB::table('structures')->insert([
                'name' => $name,
                'rooms' => rand(1,10),
                'beds' => rand(1,8),
                'bathrooms' => rand(1,4),
                'sqm' => rand(60,500),
                'user_id' => 1,
                'slug' => Str::slug($name),
                "lat" => $faker->latitude($min = ($lang - (rand(0,5000) / 1000)), $max = ($lang + (rand(0,500) / 1000))),
                "lng" => $faker->longitude($min = ($long - (rand(0,5000) / 1000)), $max = ($long + (rand(0,500) / 1000))),
            ]);

        }
    }
}
