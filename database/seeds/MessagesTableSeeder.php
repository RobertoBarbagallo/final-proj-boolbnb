<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 8; $i++) { 

            DB::table('messages')->insert([

                'sender_email' => $faker->unique()->Email,
                'structure_id' => rand(1,10),
                'content' => $faker->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
       
    }
}
