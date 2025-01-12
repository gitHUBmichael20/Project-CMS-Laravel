<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    
        
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
                'author' => 'Michael',
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ]);
        }
    }
}
