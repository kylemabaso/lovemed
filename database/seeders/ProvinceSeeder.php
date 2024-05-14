<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['name' => 'Eastern Cape', 'abbreviation' => 'EC'],
            ['name' => 'Free State', 'abbreviation' => 'FS'],
            ['name' => 'Gauteng', 'abbreviation' => 'GP'],
            ['name' => 'KwaZulu-Natal', 'abbreviation' => 'KZN'],
            ['name' => 'Limpopo', 'abbreviation' => 'LP'],
            ['name' => 'Mpumalanga', 'abbreviation' => 'MP'],
            ['name' => 'Northern Cape', 'abbreviation' => 'NC'],
            ['name' => 'North West', 'abbreviation' => 'NW']
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
