<?php

use App\Message;
use Illuminate\Database\Seeder;


class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $new_message = new Message();
            $new_message->sender_email = "ciao@ciao.com";
            $new_message->content = "ciao";
            $new_message->structure_id = 1;
            $new_message->save();
       
    }
}
