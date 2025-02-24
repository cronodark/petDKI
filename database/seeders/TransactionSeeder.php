<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Ambil semua user_id yang ada di database
        $userIds = User::where('role', 'cashier')->pluck('id')->toArray();

        // Generate 50 transaksi
        for ($i = 0; $i < 20; $i++) {
            $totalPrice = $faker->numberBetween(10000, 100000);
            $userId = $faker->randomElement($userIds);

            Transaction::create([
                'transaction_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'total_price' => $totalPrice,
                'user_id' => $userId
            ]);


        }
    }
}
