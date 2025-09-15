<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $title = 'Data Galeri';
        $galeris = Galeri::orderBy('tanggal', 'desc')->get();
        return view('admin.galeri.index', compact('galeris', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Galeri';
        return view('admin.galeri.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:10240', // max 10MB
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'nullable|date',
        ]);

        $path = $request->file('file')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $path,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show(Galeri $galeri)
    {
        return view('galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        $title = 'Edit Galeri';
        return view('admin.galeri.edit', compact('galeri', 'title'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:10240',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'nullable|date',
        ]);

        $path = $galeri->file;

        if ($request->hasFile('file')) {
            if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }
            $path = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $path,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
            Storage::disk('public')->delete($galeri->file);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
