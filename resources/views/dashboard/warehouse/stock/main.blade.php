@extends('layouts.store')

@section('styles')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Paytone+One&display=swap");

        .font-paytone {
            font-family: "Paytone One", -apple-system, Roboto, Helvetica, sans-serif;
        }

        .nav-link {
            transition: all 0.2s ease-in-out;
        }

        .nav-link:hover {
            transform: translateX(5px);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .search-input {
            transition: all 0.2s ease-in-out;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(55, 73, 106, 0.2);
        }

        .table-row {
            transition: all 0.2s ease-in-out;
        }

        .table-row:hover {
            background-color: rgba(241, 245, 249, 0.5);
        }

        .btn-hover {
            transition: all 0.2s ease-in-out;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow:
                0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
    @livewireStyles
@endsection

@section('content')
    <!-- Main Content -->
    @include('partials.flash-messages')
        <!-- Komponen Livewire -->
        @livewire('product-list')
    </main>
@endsection


@section('script')
    @livewireScripts
    <script>
        function toggleExportDropdown() {
            const dropdown = document.getElementById('exportDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Optional: Tutup dropdown jika klik di luar
        window.addEventListener('click', function(e) {
            const exportButton = document.getElementById('exportButton');
            const exportDropdown = document.getElementById('exportDropdown');
            if (!exportButton.contains(e.target)) {
                exportDropdown.classList.add('hidden');
            }
        });
    </script>
    <script>
        function toggleFilterDropdown() {
            const dropdown = document.getElementById('filterDropdown');
            dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function(e) {
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');
            if (!filterButton.contains(e.target)) {
                filterDropdown.classList.add('hidden');
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('partials.confirmation')
    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                const productName = $(this).data('id');
                showConfirmationModal(
                    'Hapus Produk',
                    `Apakah kamu yakin akan menghapus produk dengan nama: ${productName}?`,
                    () => {
                        $(this).closest('form').submit();
                    }
                );
            });
        });
    </script>

@endsection
