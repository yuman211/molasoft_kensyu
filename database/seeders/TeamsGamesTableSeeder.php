<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsGamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams_games')->insert([
            [
                'teamId' => 1,
                'gameId' => 2,
                'createdAt' => "XXX",
            ],
            [
                'teamId' => 2,
                'gameId' => 2,
                'createdAt' => "XXX",
            ],
            [
                'teamId' => 1,
                'gameId' => 1,
                'createdAt' => "XXX",
            ]
        ]);
    }
}
