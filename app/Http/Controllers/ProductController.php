<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk.
     */
    public function index(): View
    {
        $products = Product::with('category')->paginate(5);;
        $categories = Category::all(); 
        return view('dashboard.warehouse.stock.main', compact('products')); // ganti nama view dan kirim data products
    }

    /**
     * Tampilkan form buat produk baru.
     */
    public function create(): View
    {
        $categories = Category::all(); // ambil data kategori buat dropdown
        return view('dashboard.warehouse.stock.add', compact('categories'));
    }

    /**
     * Tampilkan form edit produk.
     */
    public function edit($id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // ambil data kategori buat dropdown
        return view('dashboard.warehouse.stock.edit', compact('product', 'categories'));
    }

    /**
     * Simpan produk baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|max:100|unique:products',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        // handle upload file
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('products', $filename, 'public');
            $validated['photo'] = $path;
        }

        $product = Product::create($validated);

        return redirect()->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Update produk.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|max:100|unique:products,sku,' . $id,
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        // handle upload file
        if ($request->hasFile('photo')) {
            // hapus file lama kalo ada
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                Storage::disk('public')->delete($product->photo);
            }

            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('products', $filename, 'public');
            $validated['photo'] = $path;
        }

        $product->update($validated);

        return redirect()->route('products.index')
        ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Hapus produk.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // hapus foto produk kalo ada
        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();
        return redirect()->route('products.index')
        ->with('success', 'Produk berhasil dihapus');
    }

    /**
     * Generate laporan rekap PDF
     */
    public function exportPdf()
    {
        $products = Product::with('category')->get();

        $pdf = Pdf::loadView('exports.products-pdf', compact('products'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('products.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
