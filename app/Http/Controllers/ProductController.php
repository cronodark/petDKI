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
        return view('dashboard.admin.stock', compact('products')); // ganti nama view dan kirim data products
    }

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

    /**
     * Tampilkan form buat produk baru.
     */
    public function create(): View
    {
        $categories = Category::all(); // ambil data kategori buat dropdown
        return view('products.create', compact('categories'));
    }

    public function show($id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Tampilkan form edit produk.
     */
    public function edit($id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // ambil data kategori buat dropdown
        return view('products.edit', compact('product', 'categories'));
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

        return response()->json([
            'success' => 'Produk berhasil dibuat',
            'product' => $product
        ]);
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

        return response()->json([
            'success' => 'Produk berhasil diupdate',
            'product' => $product
        ]);
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

        return response()->json(['success' => 'Produk berhasil dihapus']);
    }

    /**
     * Generate laporan rekap PDF
     */
    public function generatePdfRecap(Request $request)
    {
        $type = $request->input('type', 'monthly'); // monthly, weekly, daily

        // ambil filter tanggal
        $startDate = $request->input('start_date')
            ? Carbon::parse($request->input('start_date'))->startOfDay()
            : Carbon::now()->startOfMonth();

        $endDate = $request->input('end_date')
            ? Carbon::parse($request->input('end_date'))->endOfDay()
            : Carbon::now();

        // ambil produk yang dibuat dalam rentang tanggal
        $query = Product::whereBetween('created_at', [$startDate, $endDate])
            ->with('category');

        // grup berdasarkan periode waktu sesuai tipe
        if ($type == 'monthly') {
            $products = $query->get()->groupBy(function($item) {
                return Carbon::parse($item->created_at)->format('Y-m');
            });
            $title = 'Rekap Produk Bulanan';
        } elseif ($type == 'weekly') {
            $products = $query->get()->groupBy(function($item) {
                return Carbon::parse($item->created_at)->format('o-W');
            });
            $title = 'Rekap Produk Mingguan';
        } else {
            $products = $query->get()->groupBy(function($item) {
                return Carbon::parse($item->created_at)->format('Y-m-d');
            });
            $title = 'Rekap Produk Harian';
        }

        // proses data buat laporan
        $reportData = [];
        foreach ($products as $period => $items) {
            $totalValue = $items->sum(function($item) {
                return $item->price * $item->stock;
            });

            $reportData[] = [
                'period' => $period,
                'total_products' => $items->count(),
                'total_stock' => $items->sum('stock'),
                'total_value' => $totalValue,
                'products' => $items
            ];
        }

        // generate PDF
        $pdf = PDF::loadView('products.recap_pdf', [
            'data' => $reportData,
            'title' => $title,
            'type' => $type,
            'generated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return $pdf->download('rekap_produk_' . $type . '_' . now()->format('YmdHis') . '.pdf');
    }
}
