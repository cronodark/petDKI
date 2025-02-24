<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $idCat = Category::all()->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'product_name' => "lorem food" . $i,
                'price' => $faker->numberBetween(10000, 100000),
                'sku' => $faker->unique()->randomNumber(6, true),
                'stock' => $faker->numberBetween(1, 100),
                'photo' => 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=',
                'description' => $faker->randomElement(['', $faker->text(30)]),
                'category_id' => $faker->randomElement($idCat)
            ]);
        }
    }
}
