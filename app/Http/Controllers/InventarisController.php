<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $title = 'Data Inventaris';
        $inventaris = Inventaris::orderBy('id', 'desc')->get();
        return view('admin.inventaris.index', compact('inventaris', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Inventaris';
        $kategoriList = Inventaris::kategoriList();
        $kondisiList = Inventaris::kondisiList();
        return view('admin.inventaris.create', compact('title', 'kondisiList', 'kategoriList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:' . implode(',', Inventaris::kondisiList()),
            'lokasi' => 'required|string|max:191',
            'tahun_pengadaan' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'sumber_dana' => 'nullable|string|max:100',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('admin.inventaris.index')->with('success', 'Data inventaris berhasil ditambahkan.');
    }

    public function edit(Inventaris $inventari)
    {
        $title = 'Edit Inventaris';
        $kondisiList = Inventaris::kondisiList();
        $kategoriList = Inventaris::kategoriList(); // ✅ Tambahkan ini
        return view('admin.inventaris.edit', compact('inventari', 'title', 'kondisiList', 'kategoriList'));
    }

    public function update(Request $request, Inventaris $inventari)
    {
        // dd($request->all());
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:' . implode(',', Inventaris::kondisiList()),
            'lokasi' => 'required|string|max:191',
            'tahun_pengadaan' => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'sumber_dana' => 'nullable|string|max:100',
        ]);

        $inventari->update($request->all());

        return redirect()->route('admin.inventaris.index')->with('success', 'Data inventaris berhasil diperbarui.');
    }

    public function destroy(Inventaris $inventari)
    {
        $inventari->delete();

        return redirect()->route('admin.inventaris.index')->with('success', 'Data inventaris berhasil dihapus.');
    }
}
