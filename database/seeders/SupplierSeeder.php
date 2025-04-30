<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliersData = [
            [-6.391840572,106.8184816,"PETDKI", "Toko Pusat", "https://lh3.googleusercontent.com/p/AF1QipMR8hkECbkbQjBatwtp7UrDITJIIrN5YDuqW3sv=w408-h312-k-no"],
            [-6.576458546506537, 106.80726067731092, 'Juragan Pets Shop', "Toko Cabang", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.579276307835947, 106.81371326767726, 'Win Seventh Pet Shop' , "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.585879513046577, 106.81152911006751, 'ARTZIMAR PETSHOP', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.567705027681053, 106.80879222931223, 'Pet Kios Pajajaran', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.249666059730383, 106.8220660896049, 'Zoom Pet City Jakarta', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.171880468858619, 106.75468532251398, 'EVO Petshop Puri', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.157733798738397, 106.90166813137775, 'Petshop Indonesia 26', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.3949314951637115, 106.76870267997585, 'GIANT PET SHOP SAWANGAN BARU DEPOK', "Partner",'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.380427504429426, 106.81624701117276, 'Jangki Pet Shop', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.3879824617297105, 106.87743520200658, 'SANDYBADAWI PETSHOP', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no'],
            [-6.442849596798524, 106.85518163107818, 'PETSHOP JB', "Partner",'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no']
        ];
        $faker = Factory::create('id_ID');

        foreach ($suppliersData as $data) {
            Supplier::create([
                'name' => $data[2], // Supplier name
                'address' => $faker->address, // Random address using Faker
                'latitude' => $data[0], // Latitude from the array
                'longitude' => $data[1], // Longitude from the array
                'phone' => $faker->phoneNumber, // Random phone number using Faker
                'category' => $data[3], // Category from the array
                'description' => $faker->text(200), // Random description using Faker
                'photo_url' => $data[4], // Photo URL from the array
            ]);
        }
    }
}
