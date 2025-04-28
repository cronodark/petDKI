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
    public function getSuppliers()
    {
        $data = DB::table('suppliers')
            ->select(
                'id',
                'name',
                'description',
                'photo_url as image_url',
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

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
        ]);

        Supplier::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'phone' => $request->phone,
        ]);

        return redirect()->route('warehouse.suppliers.index')->with('success', 'Supplier created successfully.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('warehouse.suppliers.index')->with('success', 'Supplier deleted successfully.');
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
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'phone' => $request->phone,
        ]);

        return redirect()->route('warehouse.suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function webgis()
    {
        $suppliers = Supplier::all();
        return view('webgis', compact('suppliers'));
    }
}
