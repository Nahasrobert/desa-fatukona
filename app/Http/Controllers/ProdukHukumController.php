<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProdukHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukHukumController extends Controller
{
    public function index()
    {
        $title = 'Data Produk Hukum';
        $produkHukum = ProdukHukum::orderBy('tanggal', 'desc')->get();
        return view('admin.produk_hukum.index', compact('produkHukum', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Produk Hukum';
        return view('admin.produk_hukum.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:100',
            'nomor' => 'nullable|string|max:100',
            'judul' => 'required|string|max:255',
            'tanggal' => 'nullable|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'ringkasan' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('produk_hukum_files', 'public');
            $data['file'] = $filePath;
        }

        ProdukHukum::create($data);

        return redirect()->route('admin.produk_hukum.index')->with('success', 'Data produk hukum berhasil ditambahkan.');
    }

    public function edit(ProdukHukum $produkHukum)
    {
        $title = 'Edit Produk Hukum';
        return view('admin.produk_hukum.edit', compact('produkHukum', 'title'));
    }

    public function update(Request $request, ProdukHukum $produkHukum)
    {
        $request->validate([
            'jenis' => 'required|string|max:100',
            'nomor' => 'nullable|string|max:100',
            'judul' => 'required|string|max:255',
            'tanggal' => 'nullable|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'ringkasan' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($produkHukum->file && Storage::disk('public')->exists($produkHukum->file)) {
                Storage::disk('public')->delete($produkHukum->file);
            }
            $filePath = $request->file('file')->store('produk_hukum_files', 'public');
            $data['file'] = $filePath;
        }

        $produkHukum->update($data);

        return redirect()->route('admin.produk_hukum.index')->with('success', 'Data produk hukum berhasil diperbarui.');
    }

    public function destroy(ProdukHukum $produkHukum)
    {
        if ($produkHukum->file && Storage::disk('public')->exists($produkHukum->file)) {
            Storage::disk('public')->delete($produkHukum->file);
        }

        $produkHukum->delete();

        return redirect()->route('admin.produk_hukum.index')->with('success', 'Data produk hukum berhasil dihapus.');
    }
}
