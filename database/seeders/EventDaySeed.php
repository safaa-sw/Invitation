<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventDaySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_days')->insert([
            'holl' => 'big Holl',
            'image' => 'hollImages/plan3.jpg',
            'address' => 'Damas',
            
        ]);

    }
}
