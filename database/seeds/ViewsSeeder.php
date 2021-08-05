<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1000; $i++) { 

            $date = Carbon::create(2020, 1, 1, 0, 0, 0);
            $randomDate = $date->addWeeks(rand(1, 104))->addHours(rand(0, 24))->addMinutes(rand(0, 60))->addSeconds(rand(0, 60))->format('Y-m-d H:i:s');

            DB::table('views')->insert([
                'visitor' => 'XNEUxQT315dwmRqHSswxUlkLbR7D9vl32uM3VZsbeJizL4V59FgGa4eMXKiK5vHgvrBfbQ6NlQqwc9vP',
                'viewable_id' => rand(1,8),
                'viewable_type' => 'App\Structure',
                'viewed_at' => $randomDate,
            ]);

        }
    }
}
