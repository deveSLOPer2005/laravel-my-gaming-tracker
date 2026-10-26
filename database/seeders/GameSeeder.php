<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('games')->insert([
        ['title' => 'genshin impact', 'genre_id' => 5, 'status_id' => 1, 'user_id' => 1],
        ['title' => 'honkai: star rail', 'genre_id' => 5, 'status_id' => 3, 'user_id' => 1],
        ['title' => 'minecraft', 'genre_id' => 4, 'status_id' => 1, 'user_id' => 1],
        ['title' => 'where winds meet', 'genre_id' => 3, 'status_id' => 2, 'user_id' => 1],
        ['title' => 'R.E.P.O.', 'genre_id' => 2, 'status_id' => 2, 'user_id' => 1],
        ]);
    }
}
