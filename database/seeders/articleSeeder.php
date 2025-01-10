<?php

namespace Database\Seeders;

use App\Models\article;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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

        // Create 100 article records
        for ($i = 0; $i < 100; $i++) {
            article::create([
                'title' => $faker->sentence(6, true),
                'content' => $faker->paragraphs(5, true),
                'image' => 'https://picsum.photos/1920/1080?random=' . $i,
                'author' => 'Michael'
            ]);
        }
    }
}
