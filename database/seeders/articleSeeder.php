<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Article;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ambil admin pertama atau buat jika belum ada
        $admin = Admin::first() ?? Admin::create([
            'name' => 'Michael',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);

        for ($i = 0; $i < 10; $i++) {
            $createdAt = $faker->dateTimeBetween('-1 year', 'now');
            $updatedAt = $faker->dateTimeBetween($createdAt, 'now');

            $imageName = 'article-' . $i . '.jpg';
            $imageContent = file_get_contents('https://picsum.photos/1920/1080?random=' . $i);
            Storage::disk('public')->put('images/' . $imageName, $imageContent);

            Article::create([
                'title' => $faker->sentence(6, true),
                'content' => $faker->paragraphs(5, true),
                'image' => 'images/' . $imageName,
                'author' => $admin->name,
                'admin_id' => $admin->id, // Tambahkan admin_id
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ]);
        }
    }
}
