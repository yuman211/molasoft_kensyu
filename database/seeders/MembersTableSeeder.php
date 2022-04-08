<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<100; $i++){

            DB::table('members')->insert(
                [
                    'name' => "name . $i",
                    'age' => $i,
                    'area' => Arr::random(['東京', '大阪']),
                    'leader' => Arr::random([true, false]),
                    'comment' => Arr::random(['こんにちは', 'こんばんは']),
                    'gender' => Arr::random(['男性', '女性', 'その他']),
                ]);
        }
        // DB::table('members')->insert(
        // [
        //     'id' => 1,
        //     'name' => 'demo1',
        //     'age' => 22,
        //     'area' =>'東京',
        //     'leader'=> true,
        //     'comment'=>'こんにちは',
        // ]);

        // DB::table('members')->insert(
        // [
        //     'id' => 2,
        //     'name' => 'demo2',
        //     'age' => 32,
        //     'area' =>'大阪',
        //     'leader'=> false,
        //     'comment'=> NULL,
        // ]);
    }
}
