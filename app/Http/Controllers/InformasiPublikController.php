<?php

namespace App\Http\Controllers;

use App\Models\InformasiPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiPublikController extends Controller
{
    public function index()
    {
        $title = 'Informasi Publik';
        $infos = InformasiPublik::orderBy('tanggal', 'desc')->get();
        return view('admin.informasi_publik.index', compact('infos', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Informasi Publik';
        $kategoriList = InformasiPublik::getKategoriList();
        return view('admin.informasi_publik.create', compact('title', 'kategoriList'));
    }

    public function store(Request $request)
    {
        $kategoriList = InformasiPublik::getKategoriList();

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|in:' . implode(',', $kategoriList),
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240', // max 10MB
            'tanggal' => 'nullable|date',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('informasi_publik', 'public');
        }

        InformasiPublik::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'file' => $filePath,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.informasi_publik.index')->with('success', 'Informasi publik berhasil ditambahkan.');
    }

    public function edit(InformasiPublik $informasi_publik)
    {
        $title = 'Edit Informasi Publik';
        $kategoriList = InformasiPublik::getKategoriList();
        return view('admin.informasi_publik.edit', compact('informasi_publik', 'title', 'kategoriList'));
    }

    public function update(Request $request, InformasiPublik $informasi_publik)
    {
        $kategoriList = InformasiPublik::getKategoriList();

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'nullable|string|in:' . implode(',', $kategoriList),
            'isi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
            'tanggal' => 'nullable|date',
        ]);

        $filePath = $informasi_publik->file;

        if ($request->hasFile('file')) {
            if ($informasi_publik->file && Storage::disk('public')->exists($informasi_publik->file)) {
                Storage::disk('public')->delete($informasi_publik->file);
            }
            $filePath = $request->file('file')->store('informasi_publik', 'public');
        }

        $informasi_publik->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'file' => $filePath,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.informasi_publik.index')->with('success', 'Informasi publik berhasil diperbarui.');
    }

    public function destroy(InformasiPublik $informasi_publik)
    {
        if ($informasi_publik->file && Storage::disk('public')->exists($informasi_publik->file)) {
            Storage::disk('public')->delete($informasi_publik->file);
        }

        $informasi_publik->delete();

        return redirect()->route('admin.informasi_publik.index')->with('success', 'Informasi publik berhasil dihapus.');
    }
}
