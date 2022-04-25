<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'date' => 20220418,
                'start_time' => 1000,
                'end_time' => 1800,
                'location' => "東京中央体育館",
                'genre' => "ラグビー",
            ],
            [
                'date' => 20220420,
                'start_time' => 1100,
                'end_time' => 1900,
                'location' => "大阪中央体育館",
                'genre' => "野球",
            ],
            [
                'date' => 20220421,
                'start_time' => 1600,
                'end_time' => 2130,
                'location' => "神戸中央体育館",
                'genre' => "サッカー",
            ],
            [
                'date' => 20220422,
                'start_time' => 1800,
                'end_time' => 2330,
                'location' => "武道館",
                'genre' => "バンド",
            ]
        ]);
    }
}
