<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('seats')->insert([
            [
                'code' => 'A1',
            'event_day_id' => '1',
            'seat_class' => 'VIP',
            'status' => 0,
            ],
            [
                'code' => 'A2',
            'event_day_id' => '1',
            'seat_class' => 'VIP',
            'status' => 0,
            ],
            [
                'code' => 'A3',
            'event_day_id' => '1',
            'seat_class' => 'VIP',
            'status' => 0,
            ],
            [
                'code' => 'B1',
            'event_day_id' => '1',
            'seat_class' => 'Normal',
            'status' => 0,
            ],
            [
                'code' => 'B2',
            'event_day_id' => '1',
            'seat_class' => 'Normal',
            'status' => 0,
            ],
            
        ]);
    }
}
