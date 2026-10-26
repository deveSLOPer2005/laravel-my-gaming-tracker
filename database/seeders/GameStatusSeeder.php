<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('game_statuses')->insert([
        ['game_status' => 'playing'],
        ['game_status' => 'in plans'],
        ['game_status' => 'abandoned'],
        ['game_status' => 'completed'],
        ]);
    }
}
