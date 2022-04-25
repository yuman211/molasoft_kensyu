<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PracticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practices')->insert([
            [
            'date' => "2022-04-18",
            'start_time' => "10:00",
            'end_time' => "18:00",
            'location' => "東京中央体育館",
        ],
        [
            'date' => "2022-04-20",
            'start_time' => "11:00",
            'end_time' => "19:00",
            'location' => "大阪中央体育館",
        ],
        [
            'date' => "2022-04-21",
            'start_time' => "16:00",
            'end_time' => "21:30",
            'location' => "神戸中央体育館",
        ],
        [
            'date' => "2022-04-22",
            'start_time' => "18:00",
            'end_time' => "23:30",
            'location' => "仙台中央体育館",
        ]
    ]);
    }
}
