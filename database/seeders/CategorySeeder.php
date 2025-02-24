<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        Category::create([
            'category_name' => 'Pasir Kucing'
        ]);

        Category::create([
            'category_name' => 'Makanan Kucing'
        ]);

        Category::create([
            'category_name' => 'Shampoo dan Parfum Hewan'
        ]);

        Category::create([
            'category_name' => 'Aksesori dan Tempat Makan'
        ]);

        Category::create([
            'category_name' => 'Snack Kucing'
        ]);

        Category::create([
            'category_name' => 'Peralatan Kucing'
        ]);

        Category::create([
            'category_name' => 'Wet Foods'
        ]);

    }
}
