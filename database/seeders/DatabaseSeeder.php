<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
                // \App\Models\User::factory(10)->create();
                $this->call([MembersTableSeeder::class]);
                $this->call([TeamsTableSeeder::class]);
                $this->call([PracticesTableSeeder::class]);
                $this->call([TeamsPracticesTableSeeder::class]);
                $this->call([PracticesMembersTableSeeder::class]);
                $this->call([RanksTableSeeder::class]);
                $this->call([TeamsMembersTableSeeder::class]);
                $this->call([GamesTableSeeder::class]);
                $this->call([TeamsGamesTableSeeder::class]);
        }
}
