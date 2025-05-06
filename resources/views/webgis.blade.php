<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pet DKI</title>
    @vite('resources/css/app.css')

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Hash -->
    <script src="{{ asset('js/leaflet-hash.js') }}"></script>

    <!-- Coordinate -->
    <link rel="stylesheet" href="{{ asset('css/L.Control.MousePosition.css') }}"/>
    <script src="{{ asset('js/L.Control.MousePosition.js') }}"></script>

    <!-- Routing Machine -->
    <link rel="stylesheet" href="{{ asset('css/leaflet-routing-machine.css') }}" />
    <script src="{{ asset('js/leaflet-routing-machine.js') }}"></script>

    <style>
        #map {
            height: 100vh;
        }

        #routing-panel input {
            border-color: #ccc;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 10px;
            border-bottom: 1px solid #ddd;
        }

        .shop-name {
            font-weight: 500;
            color: #333;
        }

        .shop-distance {
            font-weight: bold;
            color: #000;
        }

        #searchResults {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            width: 100%;
            background: white;
            border-radius: 6px;
            z-index: 1000;
        }

        .result-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .result-item:hover {
            background-color: #f0f0f0;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
        }

        .shop-name {
            font-weight: 500;
            color: #333;
        }

        .shop-distance {
            font-weight: bold;
            color: #555;
        }



    </style>
</head>
<body class="h-screen overflow-hidden">

    <!-- Layer Switcher -->
    <div id="layer-switcher" class="absolute top-4 right-4 bg-white shadow-md p-3 rounded hidden z-[9999]">
        <button onclick="switchLayer('OpenStreetMap')" class="block w-full text-left hover:bg-gray-200 px-4 py-2">OpenStreetMap</button>
        <button onclick="switchLayer('Carto Light')" class="block w-full text-left hover:bg-gray-200 px-4 py-2">Carto Light</button>
        <button onclick="switchLayer('Carto Dark')" class="block w-full text-left hover:bg-gray-200 px-4 py-2">Carto Dark</button>
        <button onclick="switchLayer('ESRI Satellite')" class="block w-full text-left hover:bg-gray-200 px-4 py-2">ESRI Satellite</button>
    </div>

    <div class="flex h-full w-full">
        <!-- Sidebar -->
        <div class="flex flex-col w-14 bg-[#374A6E] text-white items-center py-12 space-y-12 pt-20">
            <img src="{{ asset('image/layer.svg') }}" alt="Layers" class="w-6 h-6 cursor-pointer" id="layer-icon">
            <img src="{{ asset('image/polygon.svg') }}" alt="Network" class="w-6 h-6" id="polyline-icon">
            <img src="{{ asset('image/legend.svg') }}" alt="Map" class="w-6 h-6" id="legend-icon">
            <img src="{{ asset('image/route.svg') }}" alt="Route" class="w-6 h-6" id="route-icon">
        </div>

        <!-- Info Panel -->
        <div class="w-1/3 hidden" id="info-panel"></div>

        <!-- Routing -->
        <div id="routing-panel" class="hidden overflow-auto top-0 left-[50px] w-[32%] h-full bg-white overflow-y-auto z-[9999] shadow-lg">
            <div class="p-6">
                <h2 class="text-xl font-bold text-[#374A6E] mb-4">Rute Perjalanan</h2>

                <label class="block text-gray-700 mb-1">Titik Awal</label>
                <input id="Titik_Awal" type="text" placeholder="Titik Awal" class="w-full p-2 mb-4 border rounded text-sm">

                <label class="block text-gray-700 mb-1">Tujuan</label>
                <input id="Tujuan" type="text" placeholder="Tujuan" class="w-full p-2 mb-4 border rounded text-sm">

                <div id="route-info" class="text-sm text-gray-800 mt-2 overflow-y-auto border-t pt-4"></div>
            </div>
        </div>


        <!-- Map -->
        <div id="map" class="flex-1"></div>

        <!-- Search Bar -->
        <div id="searchBarWrapper" class="absolute top-6 left-1/2 transform -translate-x-1/2 z-[9999] w-1/3 transition-all duration-300">
            <div class="relative w-full">
                <input type="text" id="searchBox" placeholder="Search" 
                    class="w-full bg-white px-5 py-3 pr-12 rounded-full border border-gray-300 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
                <img src="{{ asset('image/search.svg') }}" 
                    alt="search icon"
                    class="absolute bottom-1 right-6 transform -translate-y-1/2 w-5 h-5 opacity-70 cursor-pointer" />
            </div>
            <ul id="searchResults" class="search-dropdown hidden"></ul>
        </div>

    </div>



        <!-- Scripts -->
        <script>
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const map = L.map('map').setView([-6.39177, 106.81854], 11);

            const baseLayers = {
                "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }),
                "Carto Light": L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; Carto'
                }),
                "Carto Dark": L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; Carto'
                }),
                "ESRI Satellite": L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles &copy; Esri'
                })
            };

            baseLayers["OpenStreetMap"].addTo(map);



            // Fungsi ganti layer
            function switchLayer(type) {
                Object.values(baseLayers).forEach(layer => map.removeLayer(layer));
                baseLayers[type].addTo(map);
                document.getElementById('layer-switcher').classList.add('hidden');
            }
            document.getElementById('layer-icon').addEventListener('click', () => {
                document.getElementById('layer-switcher').classList.toggle('hidden');
            });



            // Fungsi Polyline
            let drawing = false;
            let currentPolyline = null;
            let polylinePoints = [];
            document.getElementById('polyline-icon').addEventListener('click', () => {
                drawing = !drawing;

                if (drawing) {
                    map.getContainer().style.cursor = 'crosshair';
                    alert('Klik pada peta untuk mulai menggambar polyline. Klik titik terakhir dua kali atau tekan ENTER untuk menyelesaikan.');
                } else {
                    map.getContainer().style.cursor = '';
                    if (currentPolyline) {
                        map.removeLayer(currentPolyline);
                        currentPolyline = null;
                    }
                    polylinePoints = [];
                }
            });

            map.on('click', function (e) {
                if (!drawing) return;

                const latlng = e.latlng;
                polylinePoints.push(latlng);

                if (currentPolyline) {
                    currentPolyline.setLatLngs(polylinePoints);
                } else {
                    currentPolyline = L.polyline(polylinePoints, { color: 'blue' }).addTo(map);
                }
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' && drawing && polylinePoints.length > 1) {
                    finishPolyline();
                }
            });

            map.on('dblclick', function (e) {
                if (drawing && polylinePoints.length > 1) {
                    finishPolyline();
                }
            });

            function finishPolyline() {
                drawing = false;
                map.getContainer().style.cursor = '';

                if (currentPolyline) {
                    map.removeLayer(currentPolyline);
                }

                currentPolyline = L.polyline(polylinePoints, { color: 'blue' }).addTo(map);

                polylinePoints = [];
            }

            map.on('click', (e) => {
                if (!drawing) return;

                polylinePoints.push(e.latlng);

                if (polylinePoints.length > 1) {
                    if (currentPolyline) {
                        map.removeLayer(currentPolyline);
                    }
                    currentPolyline = L.polyline(polylinePoints, { color: 'red' }).addTo(map);
                }
            });




            // Search Bar
            let allSuppliers = [];

            // Search Logic
            const searchBox = document.getElementById('searchBox');
            const searchResults = document.getElementById('searchResults');

            searchBox.addEventListener('input', function () {
                const query = this.value.toLowerCase();
                searchResults.innerHTML = '';

                if (query.length === 0) {
                    searchResults.classList.add('hidden');
                    return;
                }

                const filtered = allSuppliers.filter(s => s.name.toLowerCase().includes(query));

                filtered.forEach(supplier => {
                    const li = document.createElement('li');
                    li.textContent = supplier.name;
                    li.className = "px-4 py-2 hover:bg-gray-200 cursor-pointer";

                    li.addEventListener('click', () => {
                        showInfoPanel(supplier);
                        map.flyTo([supplier.latitude, supplier.longitude], 18, {
                            animate: true,
                            duration: 1.5,

                        });

                        searchResults.classList.add('hidden');
                        searchBox.value = supplier.name;
                        adjustSearchBarPosition();
                    });

                    searchResults.appendChild(li);
                });

                searchResults.classList.remove('hidden');
            });

            const results = document.getElementById('searchResults');
            const latRef = -6.200000; // titik pusat
            const lngRef = 106.816666;

            let tempRoutingControl = null;

            function getRouteDistance(lat1, lng1, callback) {
            const routing = L.Routing.control({
                waypoints: [
                    L.latLng(latRef, lngRef),
                    L.latLng(lat1, lng1)
                ],
                router: L.Routing.osrmv1({
                    serviceUrl: 'https://router.project-osrm.org/route/v1'
                }),
                createMarker: () => null,
                addWaypoints: false,
                fitSelectedRoutes: false,
                show: false
            })
            .on('routesfound', function (e) {
                const route = e.routes[0];
                const distanceKm = (route.summary.totalDistance / 1000).toFixed(2);
                console.log('Got distance:', distanceKm);
                callback(distanceKm);
                routing.remove(tempRoutingControl);
            })
            .on('routingerror', function () {
                console.warn('Routing error');
                callback(null);
                routing.remove(tempRoutingControl);
            })
            .addTo(map);
        }

        searchBox.addEventListener('focus', function () {
            if (this.value.trim() === '') {
                fetch('/api/nearby-suppliers')
                    .then(res => res.json())
                    .then(data => {
                        results.innerHTML = '';
                        results.classList.remove('hidden');

                        data.forEach(supplier => {
                            getRouteDistance(supplier.latitude, supplier.longitude, function (distanceKm) {
                            const li = document.createElement('li');
                                li.classList.add('result-item');
                                li.innerHTML = `
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <strong>${supplier.name}</strong><br>
                                            ${supplier.address}
                                        </div>
                                        <div style="white-space: nowrap; font-weight: bold;">
                                            ${distanceKm ? distanceKm + ' Km' : 'n/a'}
                                        </div>
                                    </div>
                                `;

                                  // 👇 Tambahkan ini agar bisa klik dan flyTo
                                    li.addEventListener('click', () => {
                                        showInfoPanel(supplier);
                                        map.flyTo([supplier.latitude, supplier.longitude], 18, {
                                            animate: true,
                                            duration: 1.5
                                        });

                                        results.classList.add('hidden');
                                        searchBox.value = supplier.name;
                                        adjustSearchBarPosition();
                                    });

                                searchResults.appendChild(li);
                            });
                            searchResults.classList.remove('hidden');
                        });
                    });
            }
        });





        
        // Ambil semua supplier sekali saja
        fetch('/api/nearby-suppliers')
            .then(res => res.json())
            .then(data => {
                allSuppliers = data;
            });

        searchBox.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();

            if (query === '') {
                results.classList.add('hidden');
                results.innerHTML = '';
                return;
            }

            const filtered = allSuppliers.filter(supplier =>
                supplier.name.toLowerCase().includes(query)
            );

            // Tunggu semua jarak selesai dihitung
            Promise.all(filtered.map(supplier => {
                return new Promise(resolve => {
                    getRouteDistance(supplier.latitude, supplier.longitude, function (distanceKm) {
                        resolve({
                            ...supplier,
                            distance: distanceKm ? parseFloat(distanceKm) : null
                        });
                    });
                });
            })).then(suppliersWithDistance => {
                // Urutkan berdasarkan jarak terdekat
                suppliersWithDistance.sort((a, b) => a.distance - b.distance);

                results.innerHTML = '';
                results.classList.remove('hidden');



                suppliersWithDistance.forEach(supplier => {
                    const li = document.createElement('li');
                    li.classList.add('result-item');
                    li.innerHTML = `
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <strong>${supplier.name}</strong><br>
                                ${supplier.address}
                            </div>
                            <div style="white-space: nowrap; font-weight: bold;">
                                ${supplier.distance !== null ? supplier.distance.toFixed(2) + ' Km' : 'n/a'}
                            </div>
                        </div>
                    `;

                    // 👇 tambahkan ini
                    li.addEventListener('click', () => {
                        showInfoPanel(supplier);
                        map.flyTo([supplier.latitude, supplier.longitude], 18, {
                            animate: true,
                            duration: 1.5
                        });

                        results.classList.add('hidden');
                        searchBox.value = supplier.name;
                        adjustSearchBarPosition();
                    });

                    results.appendChild(li);
                });
            });

        });

        document.addEventListener('click', function(event) {
            const isClickInsideSearchBox = searchBox.contains(event.target);
            const isClickInsideResults = results.contains(event.target);

            if (!isClickInsideSearchBox && !isClickInsideResults) {
                results.classList.add('hidden');
            }
        });


            // Posisi Search
            function adjustSearchBarPosition() {
            const infoPanel = document.getElementById('info-panel');
            const routingPanel = document.getElementById('routing-panel');
            const searchBarWrapper = document.getElementById('searchBarWrapper');

            const isInfoVisible = !infoPanel.classList.contains('hidden');
            const isRoutingVisible = !routingPanel.classList.contains('hidden');

            if (isInfoVisible || isRoutingVisible) {
                searchBarWrapper.className = "absolute top-6 left-[50%] z-[9999] w-1/3 transition-all duration-300";
            } else {
                searchBarWrapper.className = "absolute top-6 left-1/2 transform -translate-x-1/2 z-[9999] w-1/3 transition-all duration-300";
            }
        }

        // legend
        var legend = L.control({ position: 'bottomright' });

        legend.onAdd = function (map) {
            var div = L.DomUtil.create('div', 'bg-white p-4 rounded-lg shadow-lg text-sm space-y-2');

            div.innerHTML += `<div class="font-bold mb-2 text-gray-700">Keterangan :</div>`;

            const categories = [
                { name: 'Toko Pusat', icon: '{{ asset("image/Toko_Utama2.svg") }}' },
                { name: 'Toko Cabang', icon: '{{ asset("image/Cabang2.svg") }}' },
                { name: 'Partner', icon: '{{ asset("image/Partner2.svg") }}' },
            ];

            categories.forEach(cat => {
                div.innerHTML += `
                    <div class="flex items-center gap-2 text-gray-600">
                        <img src="${cat.icon}" width="20" height="20">
                        <span>${cat.name}</span>
                    </div>
                `;
            });

            return div;
        };


        let legendAdded = false;

        document.getElementById('legend-icon').addEventListener('click', function () {
            if (!legendAdded) {
                legend.addTo(map);
                legendAdded = true;
            } else {
                map.removeControl(legend);
                legendAdded = false;
            }
        });

        const categoryIcons = {
            "Toko Pusat": L.icon({
                iconUrl: '{{ asset("image/Toko_Utama2.svg") }}',
                iconSize: [40, 40],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            "Toko Cabang": L.icon({
                iconUrl: '{{ asset("image/Cabang2.svg") }}',
                iconSize: [40, 40],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            "Partner": L.icon({
                iconUrl: '{{ asset("image/Partner2.svg") }}',
                iconSize: [40, 40],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
            "default": L.icon({
                iconUrl: '{{ asset("image/location.svg") }}',
                iconSize: [40, 40],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            }),
        };


        // hash
        var hash = new L.Hash(map);

        // Coordinate
        L.control.mousePosition().addTo(map);

        // Routing Machine
        document.getElementById('route-icon').addEventListener('click', function () {
            const routingPanel = document.getElementById('routing-panel');
            const isHidden = routingPanel.classList.contains('hidden');

            if (isHidden) {
                togglePanel('routing');
            } else {
                routingPanel.classList.add('hidden');
                adjustSearchBarPosition();
            }
        });

        const waypoints = [
            L.latLng(-6.391840572, 106.8184816),
            L.latLng(-6.213007656, 106.7813171)
        ];

        let routeControl = L.Routing.control({
            waypoints: waypoints,
            routeWhileDragging: true,
            show: false,
            addWaypoints: true,
            draggableWaypoints: true,
            createMarker: function() { return null; },
            lineOptions: {
                styles: [{ color: 'green', opacity: 1, weight: 5 }]
            }
        }).addTo(map);

        routeControl.on('routesfound', function (e) {
            const routes = e.routes[0];
            const summary = routes.summary;

            document.getElementById("Titik_Awal").value = 
                routes.waypoints[0].latLng.lat + ',' + routes.waypoints[0].latLng.lng;

            document.getElementById("Tujuan").value = 
                routes.waypoints[1].latLng.lat + ',' + routes.waypoints[1].latLng.lng;

            const infoDiv = document.getElementById('route-info');
            infoDiv.innerHTML = `
                <div class="flex items-center justify-between text-sm text-gray-800 mb-4 px-10">
                    <div><b>Jarak:</b> ${(summary.totalDistance / 1000).toFixed(2)} km</div>
                    <div><b>Waktu:</b> ${(summary.totalTime / 60).toFixed(0)} menit</div>
                </div>
            `;

            infoDiv.innerHTML += `<div class="mt-2 space-t-4">`;

            routes.instructions.forEach(function (inst) {
                const dist = inst.distance;
                const distText = dist >= 1000 
                    ? (dist / 1000).toFixed(1) + ' km' 
                    : Math.round(dist) + ' m';

                infoDiv.innerHTML += `
                    <div class="border-b py-3">
                        <div class="flex justify-between items-start">
                            <div class="text-sm text-gray-800">${inst.text}</div>
                            <div class="text-sm font-semibold text-red-600">${distText}</div>
                        </div>
                    </div>`;
            });

            infoDiv.innerHTML += `</div>`;

                    });


        // Info Panel
        function showInfoPanel(supplier) {
        const panel = document.getElementById('info-panel');
        panel.classList.remove('hidden');
        panel.innerHTML = `
            <div class="bg-white overflow-auto" id="info-panel">
                <img src="${supplier.image_url}" class="rounded mb-2 w-full h-80" alt="${supplier.name}">
                <div class="mb-12 pb-4 mx-6">
                    <h2 class="text-xl font-bold text-[#374A6E] mt-6">${supplier.name}</h2>
                    <p class="text-[#374A6E] text-md mb-2">${supplier.description}</p>

                    <div class="w-full border-t border border-[#374A6E]-300 my-6"></div>

                    <div class="flex items-center gap-6 mt-8">
                        <img src="{{ asset('image/location.svg') }}" class="w-8 h-8 mt-1">
                        <p class="text-md text-gray-700">${supplier.address}</p>
                    </div>

                    <div class="flex items-center gap-6 mt-8">
                        <img src="{{ asset('image/coordinate.svg') }}" class="w-8 h-8 mt-1">
                        <p class="text-md text-gray-700">${supplier.latitude}, ${supplier.longitude}</p>
                    </div>

                    <div class="flex items-center gap-6 mt-8">
                        <img src="{{ asset('image/phone.svg') }}" class="w-8 h-8 mt-1">
                        <p class="text-md text-gray-700">${supplier.phone}</p>
                    </div>

                    <div class="w-full border-t border border-[#374A6E]-300 my-6"></div>
                </div>
            </div>
        `;
        adjustSearchBarPosition();
    }   

        let lastOpenedSupplierId = null;

        // Get API
        fetch('/api/suppliers')
            .then(response => response.json())
            .then(data => {
                data.forEach(supplier => {
                    const icon = categoryIcons[supplier.category] || categoryIcons["default"];
                    const marker = L.marker([supplier.latitude, supplier.longitude], { icon }).addTo(map);
                    supplier.marker = marker;

                    const popupContent = `
                        <b>${supplier.name}</b><br>
                        ${supplier.address}<br>
                        <img src="${supplier.image_url}" alt="${supplier.name}" style="width:100px; margin-top:5px;">
                        <p style="margin-top:5px">${supplier.description}</p>
                        <p>${supplier.phone}</p>
                    `;

                    marker.bindPopup(popupContent);


                    marker.on('click', () => {
                        if (lastOpenedSupplierId === supplier.id) {
                            marker.closePopup();
                            document.getElementById('info-panel').classList.add('hidden');
                            lastOpenedSupplierId = null;
                            adjustSearchBarPosition();
                        } else {
                            marker.openPopup();
                            showInfoPanel(supplier);
                            lastOpenedSupplierId = supplier.id;
                            togglePanel('info');
                        }
                    });
                });

                allSuppliers = data;
                window.allSuppliers = data;
            });


                function togglePanel(panelIdToShow) {
                    const infoPanel = document.getElementById('info-panel');
                    const routingPanel = document.getElementById('routing-panel');

                    // Sembunyikan semua panel dulu
                    infoPanel.classList.add('hidden');
                    routingPanel.classList.add('hidden');

                    // Tampilkan panel yang diminta
                    if (panelIdToShow === 'info') {
                        infoPanel.classList.remove('hidden');
                    } else if (panelIdToShow === 'routing') {
                        routingPanel.classList.remove('hidden');
                    }

                    adjustSearchBarPosition();
                }


                
        </script>



</body>
</html>
