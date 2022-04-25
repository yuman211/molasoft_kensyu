<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PracticesMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practices_members')->insert([
            [
                'practice_id' => 1,
                'member_id' => 2,
                'createdAt' => "2018-05-15 01:15:30",
            ],
            [
                'practice_id' => 2,
                'member_id' => 3,
                'createdAt' => "2018-05-15 01:15:30",
            ],
            [
                'practice_id' => 3,
                'member_id' => 4,
                'createdAt' => "2018-05-15 01:15:30",
            ]
        ]);
    }
}
