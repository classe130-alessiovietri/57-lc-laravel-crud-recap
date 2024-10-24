<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        for ($i = 0; $i < 10; $i++) {
            $name = ucfirst(fake()->words(rand(2, 6), true));

            $tagsArray = fake()->words(rand(0, 5));
            $tagsJson = json_encode($tagsArray);

            $product = Product::create([
                'name' => $name,
                'slug' => str()->slug($name),
                'price' => fake()->randomFloat(2, 1, 999),
                'description' => fake()->paragraph(),
                'img' => fake()->optional(0.3)->imageUrl(640, 480, 'products', true),
                'quantity' => rand(0, 100),
                'category' => fake()->word(),
                'tags' => $tagsJson,
                'visible' => fake()->boolean(80)
            ]);
        }
    }
}
