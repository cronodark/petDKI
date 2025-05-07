@extends('layouts.store')

@section('styles')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Paytone+One&display=swap");

        .font-paytone {
            font-family: "Paytone One", -apple-system, Roboto, Helvetica, sans-serif;
        }

        .form-input {
            transition: all 0.2s ease-in-out;
            border: 1px solid #D1D5DB;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            width: 100%;
        }

        .form-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(55, 73, 106, 0.2);
            border-color: #64748B;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
            display: block;
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

@include('layouts.app')
@section('content')
    <section class="py-2 ml-5 max-md:ml-0 max-md:w-full">
        <div class="w-full font-medium max-md:max-w-full">
            @include('partials.flash-messages')

            <div class="flex flex-wrap gap-5 justify-between w-full font-bold max-md:max-w-full">
                <h2 class="my-auto text-4xl text-blue-950">Tambah Penyesuaian Stok</h2>
                <div class="flex gap-8 text-xl max-md:max-w-full">
                    <a href="{{ route('warehouse.stockadj.index') }}"
                        class="flex gap-4 px-6 py-3 text-white rounded-2xl bg-slate-600 max-md:px-5 transition-all hover:brightness-110">
                        <span class="basis-auto">Kembali</span>
                    </a>
                </div>
            </div>

            <div class="flex flex-col p-8 mt-10 w-full text-xl rounded-2xl bg-slate-100 max-md:max-w-full">
                <form action="{{ route('warehouse.stockadj.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="product_id" class="form-label">Produk</label>
                        <select name="product_id" id="product_id" class="form-input" required>
                            <option value="" selected disabled hidden>-- Pilih Produk --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="adjustment_type" class="form-label">Tipe Penyesuaian</label>
                        <select name="adjustment_type" id="adjustment_type" class="form-input" required>
                            <option value="" selected disabled hidden>-- Pilih Tipe --</option>
                            <option value="in">Penambahan</option>
                            <option value="out">Pengurangan</option>
                        </select>
                        @error('adjustment_type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" name="quantity" id="quantity" class="form-input" min="1" required>
                        @error('quantity')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="reason" class="form-label">Alasan</label>
                        <textarea name="reason" id="reason" rows="3" class="form-input" required></textarea>
                        @error('reason')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-3 text-white bg-slate-600 rounded-xl btn-hover">
                            Simpan Penyesuaian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
