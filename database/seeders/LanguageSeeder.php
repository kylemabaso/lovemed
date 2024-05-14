<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['name' => 'Afrikaans'],
            ['name' => 'English'],
            ['name' => 'Ndebele'],
            ['name' => 'Northern Sotho'],
            ['name' => 'Sotho'],
            ['name' => 'Swazi'],
            ['name' => 'Tsonga'],
            ['name' => 'Tswana'],
            ['name' => 'Venda'],
            ['name' => 'Xhosa'],
            ['name' => 'Zulu']
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
