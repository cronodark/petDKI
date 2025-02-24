<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockAdjustments;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockAdjustmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Ambil semua produk yang ada
        $products = Product::pluck('id')->toArray();
        $users = User::where('role', 'warehouse')->pluck('id')->toArray();

        if (empty($products) || empty($users)) {
            $this->command->info('Tidak ada produk atau user di database. Jalankan ProductSeeder dan UserSeeder terlebih dahulu.');
            return;
        }

        // Buat 20 penyesuaian stok acak
        for ($i = 0; $i < 20; $i++) {
            $adjustmentType = $faker->randomElement(['in', 'out']);
            $quantity = $faker->numberBetween(1, 10);

            StockAdjustments::create([
                'adjustment_type' => $adjustmentType,
                'quantity' => $quantity,
                'reason' => $adjustmentType === 'in' ? 'Restock dari supplier' : 'Penjualan atau rusak',
                'product_id' => $faker->randomElement($products),
                'user_id' => $faker->randomElement($users),
            ]);
        }
    }
}
