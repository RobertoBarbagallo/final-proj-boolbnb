<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Message;
use Illuminate\Database\Seeder;


class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) { 

            DB::table('messages')->insert([

                'sender_email' => $faker->unique()->Email,
                'structure_id' => rand(1,5),
                'content' => $faker->text,
                
            ]);

        }
        // $new_message = new Message();
        // $new_message->sender_email = "ciao@ciao.com";
        // $new_message->content = "ciao";
        // $new_message->structure_id = 1;
        // $new_message->save();
       
    }
}
