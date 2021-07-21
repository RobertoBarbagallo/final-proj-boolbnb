<?php

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
    public function run()
    {
        DB::table('structures')->insert([
            'name' => Str::random(6),
            'lat' => rand(5,8),
            'long' => rand(5,8),
            'rooms' => rand(1,8),
            'beds' => rand(1,8),
            'bathrooms' => rand(1,4),
            'sqm' => rand(60,500),
            'user_id' => 1,
        ]);
    }
}
