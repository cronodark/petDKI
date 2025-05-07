<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StockAdjustments;
use App\Models\Product;
use App\Models\User;

class StockAdjustController extends Controller
{
    public function index()
    {
        $stockAdjustments = StockAdjustments::with(['product', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.warehouse.stockadj.main', compact('stockAdjustments'));
    }

    public function edit($id)
    {
        $adjustment = StockAdjustments::findOrFail($id);
        $products = Product::all();

        return view('dashboard.warehouse.stockadj.edit', compact('adjustment', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'adjustment_type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        $adjustment = StockAdjustments::findOrFail($id);
        $adjustment->update($request->all());

        return redirect()->route('warehouse.stockadj.index')
            ->with('success', 'Penyesuaian stok berhasil diperbarui');
    }

    public function destroy($id)
    {
        $adjustment = StockAdjustments::findOrFail($id);
        $adjustment->delete();

        return redirect()->route('warehouse.stockadj.index')
            ->with('success', 'Penyesuaian stok berhasil dihapus');
    }

    public function create()
    {
        $products = Product::all();
        return view('dashboard.warehouse.stockadj.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'adjustment_type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($request->adjustment_type == 'in') {
            $product->increment('stock', $request->quantity);
        } else {
            $product->decrement('stock', $request->quantity);
        }

        // Add the current user ID to the request
        $data = $request->all();
        $data['user_id'] = auth()->id();

        StockAdjustments::create($data);

        return redirect()->route('warehouse.stockadj.index')
            ->with('success', 'Penyesuaian stok berhasil ditambahkan');
    }
}
