<?php

namespace App\Http\Controllers;

use App\Models\KK;
use Illuminate\Http\Request;

class KKController extends Controller
{
    public function index()
    {
        $data = KK::all();
        $title = 'Data Kartu Keluarga';
        return view('admin.kk.index', compact('data', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Data KK';
        return view('admin.kk.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kk' => 'required|string|max:20|unique:kk,no_kk',
            'kepala_keluarga' => 'required|string|max:100',
            'alamat' => 'required|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'desa' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        KK::create($validated);

        return redirect()->route('admin.kk.index')->with('success', 'Data KK berhasil ditambahkan.');
    }

    public function edit(KK $kk)
    {
        $title = 'Edit Data KK';
        return view('admin.kk.edit', compact('kk', 'title'));
    }

    public function update(Request $request, KK $kk)
    {
        $validated = $request->validate([
            'no_kk' => 'required|string|max:20|unique:kk,no_kk,' . $kk->id_kk . ',id_kk',
            'kepala_keluarga' => 'required|string|max:100',
            'alamat' => 'required|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'desa' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        $kk->update($validated);

        return redirect()->route('admin.kk.index')->with('success', 'Data KK berhasil diperbarui.');
    }

    public function destroy(KK $kk)
    {
        $kk->delete();
        return redirect()->route('admin.kk.index')->with('success', 'Data KK berhasil dihapus.');
    }
}
