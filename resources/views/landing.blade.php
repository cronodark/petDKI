<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    @vite('resources/css/app.css')
</head>

<body>

    @include('partials.comnavbar')

    <!-- Introduction content -->
    <section>
        <section id="home" class="flex items-center justify-center py-10 bg-white">
            <div class="max-w-5xl text-left pt-16">
                <h2 class="ml-0 text-3xl font-bold text-[#FBBC05] mb-3">Produk Anak Bangsa</h2>
                <div class="font-bold text-[#213559] text-2xl mb-2">Untuk Hewan</div>
                <div class="font-bold text-[#213559] text-2xl mb-4">Kesayangan Anda</div>
                <div> Dengan bahan lokal berkualitas, setiap produk dirancang dengan</div>
                <div>inovasi dan cinta untuk mendukung kesehatan dan kenyamanan </div>
                <div>hewan kesayangan, sekaligus memberdayakan produksi lokal</div>
                <a href="{{ route('company-profile.catalog') }}">
                    <button
                        class="ml-15 m-5 bg-[#FADE73] text-gray-900 font-semibold py-2 px-4 rounded-lg border-2 border-[#142035] hover:bg-yellow-600 transition cursor-pointer">
                        Lihat Selengkapnya
                    </button>
                </a>
            </div>

            <div class="mt-4">
                <img src="{{ asset('images/dog and cat.svg') }}" alt="Dog and Cat" class="mx-auto w-72">
        </section>





        <!-- 2nd content -->

        <section id="product"
            class="flex flex-row justify-center items-center gap-10 py-10 max-w-screen-lg mx-auto flex-wrap md:flex-col">

            <section class="flex items-center justify-between mt-7 px-10">
                <!-- Text 1 -->
                <div class="text-left mr-58">
                    <h1 class="text-[#37496A] font-extrabold text-3xl">Produk Terbaik</h1>
                    <h1 class="text-[#37496A] font-extrabold text-3xl">Dari Kami</h1>
                </div>

                <!-- Text 2 -->
                <div class="text-left">
                    <h1 class="text-[#37496A] text-1xl font-semibold">Semua kebutuhan dengan kualitas terbaik</h1>
                    <h1 class="text-[#37496A] text-1xl font-semibold">untuk kenyamanan hewan kesayanganmu</h1>
                </div>
            </section>






            <!-- Gambar Orange Cat -->
            <div class="w-12/16 flex px-">
                <img src="{{ asset('images/orange cat.svg') }}" alt="Orange Cat" class="w-70">

                <!-- Kartu Produk -->
                <div class="grid grid-cols-2 gap-16 w-2/3">
                    <!-- Kartu 1 -->
                    <div
                        class="bg-white shadow-lg rounded-xl p-5 flex flex-col items-center text-center border-lg w-full">
                        <div class="w-12 h-12 bg-[#FADE73] rounded-lg flex items-center justify-center">
                            <img src="{{ asset('images/pet food.svg') }}" alt="Aksesoris Icon" class="w-6 h-6">
                        </div>
                        <h3 class="text-lg font-bold mt-3">Makanan</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            Pilihan makanan bernutrisi tinggi untuk mendukung kesehatan hewan kesayangan.
                        </p>
                    </div>
                    <!-- Kartu 2 -->
                    <div
                        class="bg-white shadow-lg rounded-xl p-5 flex flex-col items-center text-center border-lg w-full">
                        <div class="w-12 h-12 bg-[#FADE73] rounded-lg flex items-center justify-center">
                            <img src="{{ asset('images/pet heart.svg') }}" alt="Aksesoris Icon" class="w-6 h-6">
                        </div>
                        <h3 class="text-lg font-bold mt-3">Kesehatan</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            Produk kesehatan terpercaya untuk menjaga daya tahan dan kesehatan hewan peliharaan.
                        </p>
                    </div>
                    <!-- Kartu 3 -->
                    <div
                        class="bg-white shadow-lg rounded-xl p-5 flex flex-col items-center text-center border-lg w-full">
                        <div class="w-12 h-12 bg-[#FADE73] rounded-lg flex items-center justify-center">
                            <img src="{{ asset('images/pet house.svg') }}" alt="house Icon" class="w-6 h-6">
                        </div>
                        <h3 class="text-lg font-bold mt-3">Perawatan</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            Perawatan lengkap dari bahan alami untuk kesehatan hewan kesayangan.
                        </p>
                    </div>
                    <!-- Kartu 4 -->
                    <div
                        class="bg-white shadow-lg rounded-xl p-5 flex flex-col items-center text-center border-lg w-full">
                        <div class="w-12 h-12 bg-[#FADE73] rounded-lg flex items-center justify-center">
                            <img src="{{ asset('images/pet toy.svg') }}" alt="Aksesoris Icon" class="w-6 h-6">
                        </div>
                        <h3 class="text-lg font-bold mt-3">Aksesoris</h3>
                        <p class="text-gray-600 text-sm mt-2">
                            Aksesoris stylish dan fungsional untuk menjaga kebahagiaan hewan peliharaan.
                        </p>
                    </div>
                </div>
            </div>

        </section>

        <!-- Maps -->
        <div id="maps" class="max-w-3xl shadow-xl m-auto mt-20 rounded-xl bg-[#FEF8E3] style="box-shadow: 0px 0px
            10px rgba(0,0,0,0.2);">
            <div class="grid grid-cols-1 lg:grid-cols-[60%_40%]">

                <div class="Offline p-10 flex flex-col">
                    <H2 class="text-[#37496A] font-black text-3xl bold mb-8">Offline Store</H2>
                    <div class="flex justify-center align-items-center rounded-1 mb-1">
                        {{-- <img src="{{ asset('images/maps.svg') }}" alt="Maps" class="w-full mb-4"> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.062430046005!2d106.81365894297964!3d-6.391947177143282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e9da9ada180b%3A0x3c6d4a22b77240a1!2sPet%20DKI!5e1!3m2!1sid!2sid!4v1743738745638!5m2!1sid!2sid"
                            width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <a href="https://maps.app.goo.gl/nJXfPAr1Twv9XZmV6"
                        class="w-70 mx-auto bg-[#37496A] text-white border-4 border-white font-bold py-3 px-6 text-lg text-center rounded-full shadow-lg">
                        Kunjungi Sekarang
                    </a>
                </div>

                <div class="Online p-10">
                    <H2 class="text-[#37496A] font-black text-3xl bold xl:mb-[55px] mb-8">Online Store</H2>
                    <a href="" class="w-full">
                        <div
                            class="w-full h-28 flex items-center border-4 border-yellow-500 shadow-lg rounded-2xl px-6 py-4 mb-8">
                            <img src="{{ asset('images/Shopee.svg') }}" alt="Shopee" class="w-50 h-20">
                        </div>
                    </a>
                    <a href="https://www.tokopedia.com/petdk1" class="w-full">
                        <div
                            class="w-full h-28 flex items-center  border-4 border-yellow-500 shadow-lg rounded-2xl px-6 py-4">

                            <img src="{{ asset('images/Tokopedia.svg') }}" alt="Tokopedia" class="w-50 h-12">
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <!-- tentang Kami -->
        <div id="about"
            class="mt-7 flex flex-row justify-center items-center gap-10 py-10 max-w-screen-lg mx-auto flex-wrap md:flex-coll">
            <h1 class="text-left mr-140 text-[#37496A] font-extrabold text-3xl">Tentang Kami</h1>
            <div class="container mx-auto flex items-center w-12/16 flex">
                <!-- Text Section -->
                <div class="rounded-xl flex-1 p-10 bg-[#FEF8E3] shadow-md">
                    <p class="text-[#37496A] ">
                        PET DKI adalah petshop yang menyediakan berbagai kebutuhan hewan peliharaan,
                        mulai dari makanan, aksesoris, hingga layanan konsultasi kesehatan. Kami berkomitmen
                        untuk memberikan produk berkualitas serta pelayanan terbaik agar hewan
                        kesayangan Anda selalu sehat dan bahagia.
                    </p>
                </div>

                <!-- Image Section -->
                <div class="ml-6 w-90 h-90">
                    <img src="{{ asset('images/Ellipse 50.svg') }}" class="rounded-full border-4 border-yellow-400" />
                </div>
            </div>
        </div>



        @include('partials.comfooter')

        <button id="backToTop" class="hidden fixed bottom-5 right-5 bg-[#f8f8f8] p-3 rounded-full shadow-lg hover:bg-gray-200">
            <svg class="h-6 w-6" fill="#00000F" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3.293 10.707a1 1 0 010-1.414L10 2.586l6.707 6.707a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 10.707a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <script>
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 100) { // tampilkan jika sudah discroll 100px
                    backToTop.classList.remove('hidden');
                } else {
                    backToTop.classList.add('hidden');
                }
            });

            const backToTop = document.getElementById('backToTop');
            backToTop.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>

</body>

</html>
