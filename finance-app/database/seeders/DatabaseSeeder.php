<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\position::factory(5)->create();
        \App\Models\division::factory(3)->create();
        // \App\Models\employee::factory(50)->create();
    }
}
