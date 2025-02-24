<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Ambil semua user_id yang ada di database
        $productData = Product::select('id', 'price')->get();
        $transactionIds = Transaction::pluck('id')->toArray();

        // Generate 50 transaksi
        for ($i = 0; $i < 50; $i++) {
            $product = $faker->randomElement($productData);
            $quantity = $faker->numberBetween(1, 5);

            TransactionDetail::create([
                'transaction_id' => $faker->randomElement($transactionIds),
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price, // Harga pada saat transaksi (tidak berubah meskipun harga produk berubah)
            ]);
        }
    }
}
