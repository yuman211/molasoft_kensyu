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
                'team_id' => 1,
                'member_id' => 2,
                // 'created_at' => "2010-12-24 20:00:00",
                // 'updated_at' => "2010-12-24 20:00:00",
            ],
            [
                'team_id' => 2,
                'member_id' => 2,
                // 'created_at' => "2010-12-24 20:00:00",
                // 'updated_at' => "2010-12-24 20:00:00",
            ],
            [
                'team_id' => 1,
                'member_id' => 1,
                // 'created_at' => "2010-12-24 20:00:00",
                // 'updated_at' => "2010-12-24 20:00:00",
            ]
        ]);
    }
}
