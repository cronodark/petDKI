<nav id="navbar"
    class="fixed top-0 left-0 w-full flex items-center justify-between px-10 py-4 transition-all duration-300">
    <!-- Logo -->
    <div class="text-2xl font-bold text-gray-800">
        <a href="{{ route('company-profile.index') }}">
            <span class="text-[#37496A]">Pet</span>
            <span class="text-[#37496A]">DKI</span>
        </a>
    </div>

    <!-- Menu Navigasi -->
    <ul class="flex space-x-8 text-gray-800 font-semibold">
        <li><a href="#home" class="hover:text-blue-600">Home</a></li>
        <li><a href="#product" class="hover:text-blue-600">Produk</a></li>
        <li><a href="{{ route('company-profile.catalog') }}" class="hover:text-blue-600">Katalog</a></li>
        <li><a href="#maps" class="hover:text-blue-600">Pemesanan</a></li>
        <li><a href="#about" class="hover:text-blue-600">Tentang Kami</a></li>

    </ul>
</nav>

<script>
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white', 'shadow-md');
        } else {
            navbar.classList.remove('bg-white', 'shadow-md');
        }
    });
</script>
