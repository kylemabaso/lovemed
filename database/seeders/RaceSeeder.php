<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Race::create(['name' => 'African']);
        Race::create(['name' => 'Chinese']);
        Race::create(['name' => 'Coloured']);
        Race::create(['name' => 'Indian']);
        Race::create(['name' => 'White']);
    }
}
