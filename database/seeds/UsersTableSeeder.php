<?php

namespace Database\Seeders;

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
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(6),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'birth_date' => Carbon::create('2000', '01', '01'),
            'password' => Hash::make('password'),
        ]);
    }
}
