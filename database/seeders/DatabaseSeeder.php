<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            GenderSeeder::class,
            LanguageSeeder::class,
            InterestSeeder::class,
            ProvinceSeeder::class,
            RaceSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
