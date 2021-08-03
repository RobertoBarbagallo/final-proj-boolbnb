<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) { 

            DB::table('users')->insert([
                'name' => $faker->name,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->Email,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'password' => 'password',
                'birth_date' => Carbon::create(rand(1950, 2005), rand(1, 12), rand(1, 30)),
                'user_img_path' => 'defaults/default.png',
            ]);

        }

    }
}
