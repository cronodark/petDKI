<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <!-- stylesheet dan script Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>

<body>
    <!-- <p class="text-5xl font-bold">TEST</p>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1> -->

    <div class="w-4/5 shadow-xl m-auto mt-20 rounded-xl bg-amber-100" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.2);">
        <div class="grid grid-cols-1 lg:grid-cols-[60%_40%]">

            <div class="Offline p-10 flex flex-col">
                <H2 class="text-[#37496A] font-black text-3xl bold mb-8">Offline Store</H2>
                <div class="flex items-center">
                    <div id="map" class="w-full h-64 mb-4 rounded-xl shadow-inner"></div>
                </div>
                <a href="{{ route('webgis') }}" class="w-70 mx-auto bg-[#37496A] text-white border-4 border-white font-bold py-3 px-6 text-lg text-center rounded-full shadow-lg">
                    Kunjungi Sekarang
                </a>
            </div>

            <div class="Online p-10">
                <H2 class="text-[#37496A] font-black text-3xl bold xl:mb-[83px] mb-8">Online Store</H2>
                <div class="w-full h-28 flex items-center border-4 border-yellow-500 shadow-lg rounded-2xl px-6 py-4 mb-8">
                    <a href="" class="w-full">
                        <img src="{{ asset('image/Shopee.svg') }}" alt="Shopee" class="w-50 h-20">
                    </a>    
                </div>
                <div class="w-full h-28 flex items-center  border-4 border-yellow-500 shadow-lg rounded-2xl px-6 py-4">
                    <a href="" class="w-full">
                        <img src="{{ asset('image/Tokopedia.svg') }}" alt="Tokopedia" class="w-50 h-12">
                    </a> 
                </div>
            </div>
            
        </div>
    </div>
    

    <!-- Script Leaflet -->
    <script>
        var map = L.map('map').setView([-6.200000, 106.816666], 13); // Jakarta example

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([-6.200000, 106.816666]).addTo(map)
            .bindPopup('Pet DKI')
            .openPopup();


        fetch('/api/suppliers')
            .then(response => response.json())
            .then(data => {
                data.forEach(supplier => {
                    L.marker([supplier.latitude, supplier.longitude])
                        .addTo(map)
                        .bindPopup(`
                            <b>${supplier.name}</b><br>
                            ${supplier.address}<br>
                            <img src="${supplier.image_url}" alt="${supplier.name}" style="width:100px; margin-top:5px;">
                            <p style="margin-top:5px">${supplier.description}</p>
                            <p">${supplier.phone}</p>
                        `);
                });
            });

            
    </script>

    
</body>

</html>
