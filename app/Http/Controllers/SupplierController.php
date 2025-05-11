<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;


class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(5);
        return view('dashboard.warehouse.supplier.main', compact('suppliers'));
    }

    public function exportGeoJSON()
    {
        $features = DB::table('suppliers')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get()
            ->map(function ($supplier) {
                return [
                    "type" => "Feature",
                    "geometry" => [
                        "type" => "Point",
                        "coordinates" => [(float) $supplier->longitude, (float) $supplier->latitude],
                    ],
                    "properties" => [
                        "id" => $supplier->id,
                        "name" => $supplier->name,
                        "address" => $supplier->address,
                        "phone" => $supplier->phone,
                        "description" => $supplier->description,
                        "category" => $supplier->category,
                    ],
                ];
            });

        $geojson = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];

        return response()->json($geojson, 200, [
            'Content-Type' => 'application/geo+json',
            'Content-Disposition' => 'attachment; filename="suppliers.geojson"',
        ]);
    }
    public function getSuppliers()
    {
        $data = DB::table('suppliers')
            ->select(
                'id',
                'name',
                'description',
                'photo_url',
                'address',
                'latitude',
                'longitude',
                'phone',
                'category'
            )
            ->get();

        return response()->json($data);
    }

    public function create()
    {
        return view('dashboard.warehouse.supplier.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'category' => 'required|in:Toko Utama,Toko Cabang,Partner',
        ]);

        Supplier::create($request->except('photo_url') + [
            'photo_url' => $request->file('photo_url')->store('supplier', 'public'),
        ]);

        return redirect()->route('warehouse.suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('warehouse.suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('dashboard.warehouse.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'photo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'category' => 'required|in:Toko Pusat,Toko Cabang,Partner',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->except('photo_url'));
        if ($request->hasFile('photo_url')) {
            $supplier->update([
                'photo_url' => $request->file('photo_url')->store('supplier', 'public'),
            ]);
        }

        return redirect()->route('warehouse.suppliers.index')->with('success', 'Supplier berhasil diedit.');
    }

    public function webgis()
    {
        $suppliers = Supplier::all();
        return view('webgis', compact('suppliers'));
    }

    public function getNearbySuppliers()
    {
        $refLat = request()->query('lat', -6.39071031765324);
        $refLng = request()->query('lng', 106.81636083041856);

        $suppliers = DB::table('suppliers')
            ->select(
                'id',
                'name',
                'address',
                'latitude',
                'longitude',
                'phone',
                'description',
                'photo_url',
                'category',
                DB::raw("ST_DistanceSphere(
                ST_MakePoint(longitude::float, latitude::float),
                ST_MakePoint(?, ?)
            ) as distance")
            )
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->orderBy('distance')
            ->setBindings([$refLng, $refLat])
            ->get();

        return response()->json($suppliers);
    }
}
