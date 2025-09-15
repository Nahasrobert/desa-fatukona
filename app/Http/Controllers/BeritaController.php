<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\PemerintahDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $title = 'Data Berita';
        $berita = Berita::orderby('created_at', 'desc')->get();
        return view('admin.berita.index', compact('berita', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Berita';
        return view('admin.berita.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'kategori' => 'nullable|max:100',
            'penulis' => 'nullable|max:100',
            'tanggal' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar-berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar,
            'slug' => Berita::generateUniqueSlug($request->judul), // 👈 generate unik
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = 'Edit Berita';
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita', 'title'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            // ...
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar-berita', 'public');
        } else {
            $gambar = $berita->gambar;
        }

        // Jika judul berubah, buat slug baru (unik)
        $slug = $berita->judul !== $request->judul
            ? Berita::generateUniqueSlug($request->judul)
            : $berita->slug;

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'gambar' => $gambar,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar jika ada
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus data berita dari database
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
