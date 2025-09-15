<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PemerintahDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemerintahDesaController extends Controller
{
    public function index()
    {
        $title = 'Data Pemerintah Desa';
        $pemerintahDesa = PemerintahDesa::orderBy('id', 'desc')->get();
        return view('admin.pemerintahdesa.index', compact('pemerintahDesa', 'title'));
    }

    public function create()
    {
        $jabatanOptions = [
            'Kepala Desa',
            'Sekretaris Desa',
            'Kaur Pemerintahan',
            'Kaur Keuangan',
            'Kaur Umum',
            'Kadus 1',
            'Kadus 2',
            // ... jabatan lain sesuai data
        ];
        $title = 'Tambah Pemerintah Desa';
        return view('admin.pemerintahdesa.create', compact('title', 'jabatanOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'periode' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kontak' => 'nullable|string|max:50',
        ]);

        $data = $request->only('nama', 'jabatan', 'periode', 'kontak');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pemerintahdesa', 'public');
        }

        PemerintahDesa::create($data);

        return redirect()->route('admin.pemerintahdesa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(PemerintahDesa $pemerintahdesa)
    {
        $jabatanOptions = [
            'Kepala Desa',
            'Sekretaris Desa',
            'Kaur Pemerintahan',
            'Kaur Keuangan',
            'Kaur Umum',
            'Kadus 1',
            'Kadus 2',
            // ... jabatan lain sesuai data
        ];
        $title = 'Edit Pemerintah Desa';
        return view('admin.pemerintahdesa.edit', compact('pemerintahdesa', 'title', 'jabatanOptions'));
    }

    public function update(Request $request, PemerintahDesa $pemerintahdesa)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'periode' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kontak' => 'nullable|string|max:50',
        ]);

        $data = $request->only('nama', 'jabatan', 'periode', 'kontak');

        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada
            if ($pemerintahdesa->foto && Storage::disk('public')->exists($pemerintahdesa->foto)) {
                Storage::disk('public')->delete($pemerintahdesa->foto);
            }

            $data['foto'] = $request->file('foto')->store('pemerintahdesa', 'public');
        }

        $pemerintahdesa->update($data);

        return redirect()->route('admin.pemerintahdesa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(PemerintahDesa $pemerintahdesa)
    {
        // Hapus foto jika ada
        if ($pemerintahdesa->foto && Storage::disk('public')->exists($pemerintahdesa->foto)) {
            Storage::disk('public')->delete($pemerintahdesa->foto);
        }

        $pemerintahdesa->delete();

        return redirect()->route('admin.pemerintahdesa.index')->with('success', 'Data berhasil dihapus.');
    }
}
