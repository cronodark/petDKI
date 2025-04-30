@extends('layouts.store')
@section('styles')
    @livewireScripts
@endsection
@section('content')
    @livewire('employee-list')
@endsection

@section('script')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // @if (session('success'))
            //     Swal.fire({
            //         icon: 'success',
            //         title: 'Berhasil!',
            //         text: '{{ session('success') }}',
            //         confirmButtonColor: '#37496A',
            //         customClass: {
            //             popup: 'rounded-xl'
            //         }
            //     });
            // @endif

            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // prevent default form submission

                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Aksi ini akan menghapus data karyawan?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#FF0000',
                        cancelButtonColor: '#C2C2C2',
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // proceed with deletion
                        }
                    });
                });
            });

            // Display selected file name
            const inputFile = document.getElementById('projectPhoto');
            const fileNameDisplay = document.getElementById('fileNameDisplay');
            if (inputFile) {
                inputFile.addEventListener('change', function() {
                    const fileName = this.files[0] ? this.files[0].name : "No file chosen";
                    fileNameDisplay.textContent = fileName;
                });
            }
        });
    </script>
@endsection
