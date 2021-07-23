<?php
<<<<<<< HEAD
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use App\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
=======

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Message;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


>>>>>>> 3c557b5c3c7cb9f57b6b2dfd4b5ea79adaa2ef31
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
<<<<<<< HEAD
        for ($i=0; $i < 8; $i++) {

            DB::table("messages")->insert([
                "sender_email" => $faker->unique()->Email,
                "structure_id" => rand(1,5),
                "content" => $faker->text,
            ]);
        }
=======
        for ($i=0; $i < 8; $i++) { 

            DB::table('messages')->insert([

                'sender_email' => $faker->unique()->Email,
                'structure_id' => rand(1,10),
                'content' => $faker->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
       
>>>>>>> 3c557b5c3c7cb9f57b6b2dfd4b5ea79adaa2ef31
    }
}

