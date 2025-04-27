<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\StockAdjustments;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PosSystem extends Component
{
    public $searchSku = '';
    public $products = [];
    public $cart = [];
    public $totalPrice = 0;

    public function mount()
    {
        $this->products = Product::all();
    }

    public function updatedSearchSku()
    {
        $product = Product::where('sku', $this->searchSku)->first();
        if ($product) {
            $this->addToCart($product->id);
            $this->searchSku = '';
        }
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if (!$product) return;
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
        } else {
            $this->cart[$productId] = [
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        $this->calculateTotal();
    }

    public function increaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
            $this->calculateTotal();
        }
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cart[$productId]) && $this->cart[$productId]['quantity'] > 1) {
            $this->cart[$productId]['quantity']--;
            $this->calculateTotal();
        }
    }

    public function calculateTotal()
    {
        $this->totalPrice = collect($this->cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function payNow()
    {
        if (empty($this->cart)) {
            return; // Tidak bisa bayar kalau keranjang kosong
        }

        DB::beginTransaction();

        try {
            $transaction = Transaction::create([
                'transaction_date' => date('Y-m-d'),
                'user_id' => Auth::id(),
                'total_price' => $this->totalPrice,
            ]);

            foreach ($this->cart as $productId => $item) {
                $transaction->transactionDetails()->create([
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                $product = Product::find($productId);
                if ($product) {
                    $product->decrement('stock', $item['quantity']);
                }

                StockAdjustments::create([
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'adjustment_type' => 'out',
                    'reason' => 'Penjualan produk',
                    'user_id' => Auth::id(),
                ]);
            }

            DB::commit();

            // Reset cart
            $this->reset(['cart', 'totalPrice', 'searchSku']);

            // Trigger print
            $this->dispatch('print-receipt');

            session()->flash('success', 'Transaksi berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Gagal menyimpan transaksi.');
        }

        //trigger event print
        $this->dispatch('print-receipt');
        // Here you would typically save the order to the database
        $this->reset(['cart', 'totalPrice']);
    }

    public function removeItem($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            $this->calculateTotal();
        }
    }

    public function render()
    {
        return view('livewire.pos-system');
    }
}
