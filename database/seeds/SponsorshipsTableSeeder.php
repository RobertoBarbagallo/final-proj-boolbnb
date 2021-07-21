<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsorships')->insert([
            'duration' => 24,
            'price' => 2.99,
        ]);
        DB::table('sponsorships')->insert([
            'duration' => 72,
            'price' => 5.99,
        ]);
        DB::table('sponsorships')->insert([
            'duration' => 144,
            'price' => 9.99,
        ]);
    }
}
