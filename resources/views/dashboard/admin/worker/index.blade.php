@extends('layouts.store')
@section('styles')
    @livewireScripts
@endsection
@section('content')
    @livewire('employee-list')
@endsection
@include('partials.confirmation')

@section('script')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle filter dropdown visibility
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');
            if (filterButton && filterDropdown) {
                filterButton.addEventListener('click', function() {
                    filterDropdown.classList.toggle('hidden');
                });

                window.addEventListener('click', function(e) {
                    if (!filterButton.contains(e.target)) {
                        filterDropdown.classList.add('hidden');
                    }
                });
            }

            // Handle delete button click
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productName = this.dataset.id;
                    showConfirmationModal(
                        'Hapus data karyawan',
                        `Apakah anda yakin akan menghapus data karyawan ini?`,
                        () => {
                            this.closest('form').submit();
                        }
                    );
                });
            });

            // Display selected file name
            const inputFile = document.getElementById('projectPhoto');
            const fileNameDisplay = document.getElementById('fileNameDisplay');
            if (inputFile && fileNameDisplay) {
                inputFile.addEventListener('change', function() {
                    const fileName = this.files[0] ? this.files[0].name : "No file chosen";
                    fileNameDisplay.textContent = fileName;
                });
            }
        });
    </script>
@endsection
