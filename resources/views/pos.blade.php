<!DOCTYPE html>
<html>

<head>
    <title>POS Dinamis</title>
    <style>
        .product-card {
            border: 1px solid #ccc;
            display: inline-block;
            width: 120px;
            margin: 8px;
            padding: 8px;
            text-align: center;
            cursor: pointer;
        }

        .product-card:hover {
            background-color: #f9f9f9;
        }

        .product-list {
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
            border-collapse: collapse;
            padding: 8px;
        }

        .sku-search {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>POS Dinamis</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Bagian Pencarian SKU -->
    <div class="sku-search">
        <label for="sku">Cari SKU:</label>
        <input type="text" id="sku" placeholder="Masukkan SKU">
        <button onclick="searchSKU()">Cari</button>
    </div>

    <!-- Bagian Menampilkan Produk dalam Bentuk Card -->
    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-card"
                onclick="addToCart({{ $product->id }}, '{{ $product->product_name }}', {{ $product->price }})">
                <strong>{{ $product->product_name }}</strong><br>
                SKU: {{ $product->sku }}<br>
                Rp {{ number_format($product->price, 0, ',', '.') }}
                <br>
                <button type="button"
                    onclick="event.stopPropagation(); addToCart({{ $product->id }}, '{{ $product->product_name }}', {{ $product->price }})">
                    Tambah
                </button>
            </div>
        @endforeach
    </div>

    <!-- Daftar Item yang Dipilih -->
    <h2>Daftar Item</h2>
    <form id="checkoutForm" action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <table id="cartTable">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris item akan ditambahkan via JavaScript -->
            </tbody>
        </table>
        <br>
        <!-- Tampilan total harga -->
        <h2>Total Harga: <span id="totalPriceDisplay">Rp 0</span></h2>
        <!-- Input hidden untuk total harga agar bisa diterima di controller -->
        <input type="hidden" name="total_price" id="totalPriceInput" value="0">
        <br>
        <button type="submit">Checkout</button>
    </form>

    <script>
        // Array untuk menyimpan item {product_id, name, price, quantity}
        let cartItems = [];
        let products = @json($products);

        // Fungsi menambahkan produk ke cartItems
        function addToCart(productId, productName, productPrice) {
            // Cek apakah item sudah ada di cart
            let existingItem = cartItems.find(item => item.product_id === productId);
            if (existingItem) {
                // Jika sudah ada, tambahkan quantity
                existingItem.quantity += 1;
            } else {
                // Jika belum ada, tambahkan item baru
                cartItems.push({
                    product_id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: 1
                });
            }
            renderCart();
        }

        // Fungsi merender cart ke tabel dan menghitung total harga
        function renderCart() {
            let cartTableBody = document.querySelector('#cartTable tbody');
            cartTableBody.innerHTML = ''; // Kosongkan isi tabel

            // Render setiap item di dalam cart
            cartItems.forEach((item, index) => {
                let subtotal = item.price * item.quantity;
                let row = `
                    <tr>
                        <td>${item.name}</td>
                        <td>Rp ${item.price.toLocaleString('id-ID')}</td>
                        <td>
                            <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)">
                        </td>
                        <td>Rp ${subtotal.toLocaleString('id-ID')}</td>
                        <td>
                            <button type="button" onclick="removeItem(${index})">Hapus</button>
                        </td>
                    </tr>
                `;
                cartTableBody.insertAdjacentHTML('beforeend', row);
            });

            // Hitung total harga dan update tampilan serta input hidden
            let total = cartItems.reduce((acc, item) => acc + (item.price * item.quantity), 0);
            document.getElementById('totalPriceDisplay').innerText = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('totalPriceInput').value = total;

            // Bersihkan input hidden untuk cart item sebelumnya
            document.querySelectorAll('.cartItemInput').forEach(el => el.remove());

            // Tambahkan input hidden untuk setiap item agar terkirim ke controller
            cartItems.forEach((item, index) => {
                let inputProduct = document.createElement('input');
                inputProduct.type = 'hidden';
                inputProduct.name = `items[${index}][product_id]`;
                inputProduct.value = item.product_id;
                inputProduct.classList.add('cartItemInput');
                document.getElementById('checkoutForm').appendChild(inputProduct);

                let inputQty = document.createElement('input');
                inputQty.type = 'hidden';
                inputQty.name = `items[${index}][quantity]`;
                inputQty.value = item.quantity;
                inputQty.classList.add('cartItemInput');
                document.getElementById('checkoutForm').appendChild(inputQty);

                let inputPrice = document.createElement('input');
                inputPrice.type = 'hidden';
                inputPrice.name = `items[${index}][price]`;
                inputPrice.value = item.price;
                inputPrice.classList.add('cartItemInput');
                document.getElementById('checkoutForm').appendChild(inputPrice);
            });
        }

        // Fungsi memperbarui kuantitas item di cart
        function updateQuantity(index, newQty) {
            cartItems[index].quantity = parseInt(newQty);
            renderCart();
        }

        // Fungsi menghapus item dari cart
        function removeItem(index) {
            cartItems.splice(index, 1);
            renderCart();
        }

        // Fungsi pencarian SKU (mencari langsung di array products)
        function searchSKU() {
            let skuInput = document.getElementById('sku').value.trim();
            if (!skuInput) return;

            // Cari produk berdasarkan SKU (case-insensitive)
            let product = products.find(p => p.sku.toLowerCase() === skuInput.toLowerCase());
            if (!product) {
                alert('Produk tidak ditemukan');
                return;
            }

            // Tambahkan produk ke cart
            addToCart(product.id, product.product_name, product.price);
            document.getElementById('sku').value = ''; // Reset input
        }
    </script>
</body>

</html>
