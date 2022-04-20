<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('teams_members')->insert([
            [
                'teamId' => 1,
                'memberId' => 2,
                'createdAt' => "XXX",
            ],
            [
                'teamId' => 2,
                'memberId' => 2,
                'createdAt' => "XXX",
            ],
            [
                'teamId' => 1,
                'memberId' => 1,
                'createdAt' => "XXX",
            ]
        ]);
    }
}
