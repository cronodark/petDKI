<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Manager PetShop',
                'role' => 'manager',
                'username' => 'manager',
                'email' => 'manager@petshop.com',
                'password' => Hash::make('manager'),
            ],
            [
                'name' => 'Cashier PetShop',
                'role' => 'cashier',
                'username' => 'cashier',
                'email' => 'cashier@petshop.com',
                'password' => Hash::make('cashier'),
            ],
            [
                'name' => 'Cashier PetShop 02',
                'role' => 'cashier',
                'username' => 'cashier02',
                'email' => 'cashier02@petshop.com',
                'password' => Hash::make('cashier'),
            ],
            [
                'name' => 'Warehouse PetShop',
                'role' => 'warehouse',
                'username' => 'warehouse',
                'email' => 'warehouse@petshop.com',
                'password' => Hash::make('warehouse'),
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'role' => $user['role'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => $user['password'],
                'photo' => 'https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png',
            ]);
        }
    }
}
