<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsPracticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams_practices')->insert([
            [
                'team_id' => 1,
                'practice_id' => 2,
                'createdAt' => "2018-05-15 01:15:30",
            ],
            [
                'team_id' => 2,
                'practice_id' => 2,
                'createdAt' => "2018-05-15 01:15:30",
            ],
            [
                'team_id' => 1,
                'practice_id' => 1,
                'createdAt' => "2018-05-15 01:15:30",
            ]
        ]);
    }
}
