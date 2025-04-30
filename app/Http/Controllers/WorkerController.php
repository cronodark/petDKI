<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = User::where('role', '!=', 'manager')->paginate(5);
        return view('dashboard.admin.worker.index', compact('workers'));
    }

    public function create()
    {

        return view('dashboard.admin.worker.create');
    }

    public function store(Request $request)
    {
        $worker = $request->validate([
            'name' => 'required|string',
            'role' => 'required',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ], [
            'name.required'     => 'Nama harus diisi.',
            'name.string'       => 'Nama harus berupa teks.',
            'role.required'     => 'Role harus diisi.',
            'username.required' => 'Username harus diisi.',
            'username.string'   => 'Username harus berupa teks.',
            'username.unique'   => 'Username sudah digunakan.',
            'email.required'    => 'Email harus diisi.',
            'email.email'       => 'Email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.string'   => 'Password harus berupa teks.',
            'photo.image'       => 'Photo harus berupa gambar.',
            'photo.mimes'       => 'Photo harus berformat jpeg, png, jpg, gif, atau svg.',
            'photo.max'         => 'Photo maksimal berukuran 20MB.'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('profile', 'public');
            $worker['photo'] = $photo;
        }

        try {
            User::create($worker);
            return redirect()->route('manager.worker.index')->with('success', 'Pegawai berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('worker.create')->with('error', 'Pegawai gagal ditambahkan');
        }
    }

    public function show($id)
    {
        $worker = User::findOrFail($id);
        return view('dashboard.admin.worker.edit', compact('worker'));
    }

    public function update(Request $request, $id)
    {
        $worker = User::findOrFail($id);
        $worker->update($request->except('photo', 'password'));
        if ($request->hasFile('photo')) {
            if ($worker->photo != null) {
                Storage::delete('public/' . $worker->photo);
            }
            $photo = $request->file('photo')->store('profile', 'public');
            $worker->photo = $photo;
        }
        try {
            $worker->save();
            return redirect()->route('manager.worker.index')->with('success', 'Pegawai berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('manager.worker.index')->with('error', 'Pegawai gagal diubah');
        }
    }

    public function destroy($id)
    {
        $worker = User::findOrFail($id);
        try {
            $worker->delete();
            return redirect()->route('manager.worker.index')->with('success', 'Pegawai berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('manager.worker.index')->with('error', 'Pegawai gagal dihapus');
        }
    }
}
