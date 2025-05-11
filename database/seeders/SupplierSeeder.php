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
            [-6.391840572, 106.8184816, "PETDKI", "Toko Pusat", "https://lh3.googleusercontent.com/p/AF1QipMR8hkECbkbQjBatwtp7UrDITJIIrN5YDuqW3sv=w408-h312-k-no", "Jl. Kembang Lio No.12, RT.04/RW.019, Depok, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16431"],
            [-6.576458546506537, 106.80726067731092, 'Juragan Pets Shop', "Toko Cabang", 'https://lh3.googleusercontent.com/p/AF1QipNXhiXC7qsLb7wUDtC0zPSYUaU6kA4B_LXOah68=w408-h544-k-no', "Jl. Raya Pajajaran No.99, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153"],
            [-6.580944140350725, 106.81316579661244, 'Win Seventh Pet Shop' , "Partner", 'https://lh4.googleusercontent.com/Yx8ZMDSMZDIKDtVU-5EFkGpeW22e0yVe-KWA7Cl4AjJ1sBAAOyFFH3q8ibnFTfs=w408-h306-k-no', "Jalan Palupuh Raya Kios C2 Bantarjati, RT.01/RW.02, Tegal Gundil, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153"],
            [-6.585879513046577, 106.81152911006751, 'ARTZIMAR PETSHOP', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipOOcViTTAvCL33eYUXs8VC0nUyWIWeVr249zCoS=w408-h544-k-no', 'Perumahan Babakan Sari V No.7, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16153'],
            [-6.569454942142803, 106.8091095632173, 'Pet Kios Pajajaran', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipMre2nCare5r8YekfJ7J3SPnrGr9u0m3bNQs67Y=w408-h544-k-no', "Jl. Raya Pajajaran No.1A, RT.02/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153"],
            [-6.2605529974427965, 106.82374757159762, 'Zoom Pet City Jakarta', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipOziNw8iDxqAN1qDi8OcijQcVEsPpTWPC2_YSuA=w408-h272-k-no', "Jalan Kemang Timur 3A No.2 Mampang Prapatan, RT.6/RW.4, Bangka, Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12730"],
            [-6.171880468858619, 106.75468532251398, 'EVO Petshop Puri', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipPqUNEvu_jswAb6dzTAE-RoiCQlJRDv_Zn-68M4=w408-h544-k-no', "Jl. Kembang Abadi Utama No.B6 No. 17 B6 No. 17, RT.6/RW.8, Kembangan Sel., Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610"],
            [-6.170007318138885, 106.89935569692466, 'Petshop Indonesia 26', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipOfxD--ccU5PyAluMqQa2LW31HXPwh7rI93PB6N=w408-h725-k-no', "RVHX+XJ3, Jl. Boulevard Raya No.29 Blok TB2, RT.1/RW.12, Klp. Gading Tim., Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14240"],
            [-6.3949314951637115, 106.76870267997585, 'GIANT PET SHOP SAWANGAN BARU DEPOK', "Partner",'https://lh3.googleusercontent.com/p/AF1QipOTzJgbFnKla4RkxT7U2WWKGZ5UokiCQku0Clar=w426-h240-k-no', "warkop berkah, Jalan raya Muchtar, Sebrang Jl. Jati ruko no.2 (samping, Sawangan Baru, depok, Kota Depok, Jawa Barat 16511"],
            [-6.389021358383851, 106.81533534609682, 'Jangki Pet Shop', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipPFtma4QOkVvpx5bEQORqbth3NeoRtRG4kw0mCE=w408-h306-k-no', "Jl. Arif Rahman Hakim No.17, Depok Jaya, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16432"],
            [-6.398020455067534, 106.87574092838246, 'SANDYBADAWI PETSHOP', "Partner", 'https://lh3.googleusercontent.com/p/AF1QipNrs5hWl7U6ehy_amA8gaNFrTa87EoSs3qtcdQm=w408-h544-k-no', "Jl. Pekapuran No.RT.002, Sukatani, Kec. Tapos, Kota Depok, Jawa Barat"],
            [-6.447348551223928, 106.85413761310485, 'PETSHOP JB', "Partner",'https://lh3.googleusercontent.com/p/AF1QipPtulIgpWFj23O8X1PGOCglOqLIDzMEAuNW2RXp=w408-h725-k-no', "Palm Residence, Jl. Cilangkap, Cilangkap, Kec. Tapos, Kota Depok, Jawa Barat 16458"]
        ];
        $faker = Factory::create('id_ID');

        foreach ($suppliersData as $data) {
            Supplier::create([
                'name' => $data[2], // Supplier name
                'address' => $data[5], // Random address using Faker
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
