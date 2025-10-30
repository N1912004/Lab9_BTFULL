<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Get the demo user
        $demoUser = User::where('email', 'demo@huit.edu.vn')->first();
        $faker = Factory::create('vi_VN'); // Using Vietnamese locale

        if ($demoUser) {
            // Create 5 articles for the demo user
            Article::factory()->count(5)->create([
                'user_id' => $demoUser->id,
                'title' => 'Bài viết test ' . $faker->numberBetween(1, 100),
                'body' => 'Nội dung bài viết test ' . $faker->paragraph()
            ]);
        }
    }
}