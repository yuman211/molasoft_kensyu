<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->insert([
            [
                'rank' => "無し",
                'detail' => "まだまだのチームです",
            ],
            [
                'rank' => "銅",
                'detail' => "試合数が10を超えるチームです",
            ],
            [
                'rank' => "銀",
                'detail' => "試合数が50を超えるチームです",
            ],
            [
                'rank' => "金",
                'detail' => "試合数が100を超えるチームです",
            ]
        ]);
    }
}
