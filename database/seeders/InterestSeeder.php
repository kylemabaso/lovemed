<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interests = [
            ['name' => 'Technology', 'description' => 'All about the latest in tech and innovations.'],
            ['name' => 'Cooking', 'description' => 'Discover recipes, cooking techniques, and culinary arts.'],
            ['name' => 'Sports', 'description' => 'Everything from football to cricket, and more.'],
            ['name' => 'Music', 'description' => 'Exploring genres, artists, and musical trends.'],
            ['name' => 'Travel', 'description' => 'Guides, tips, and adventures around the globe.'],
            ['name' => 'Reading', 'description' => 'Literature, books, and reading strategies.'],
            ['name' => 'Gaming', 'description' => 'Video games, board games, and gaming news.'],
            ['name' => 'Fitness', 'description' => 'Fitness regimes, workouts, and health tips.']
        ];

        foreach ($interests as $interest) {
            Interest::create($interest);
        }
    }
}
