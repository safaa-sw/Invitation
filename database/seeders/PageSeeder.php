<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'name' => 'ارسال الدعوات',
            ],
            [
                'name' => 'الدعوات العامة',
            ],
            [
                'name' => 'الدعوات المقبولة يوم الحفل',
            ],
            [
                'name' => 'qrcode',
            ],
            [
                'name' => 'تعيين الكراسي',
            ],
            [
                'name' => 'الاطلاع على الداشبورد',
            ],
            [
                'name' => 'ادارة الموظفين',
            ],
            [
                'name' => 'الاطلاع على سجل التغييرات',
            ]            
        ]);
    }
}
