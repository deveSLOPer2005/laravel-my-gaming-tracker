<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('genres')->insert([
        ['genre' => 'MMORPG'],
        ['genre' => 'co-op survival'],
        ['genre' => 'open-world RPG'],
        ['genre' => 'sandbox'],
        ['genre' => 'gacha'],
        ]);
    }
}
