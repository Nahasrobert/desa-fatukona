<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembangunanController extends Controller
{
    public function index()
    {
        $title = 'Data Pembangunan';
        $pembangunan = Pembangunan::orderBy('tahun', 'desc')->get();
        return view('admin.pembangunan.index', compact('pembangunan', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Pembangunan';
        return view('admin.pembangunan.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'anggaran' => 'required|numeric|min:0',
            'sumber_dana' => 'nullable|string|max:100',
            'tahun' => 'nullable|digits:4|integer|min:2000',
            'progres' => 'required|integer|min:0|max:100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pembangunan', 'public');
        }

        Pembangunan::create($validated);

        return redirect()->route('admin.pembangunan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Pembangunan $pembangunan)
    {
        $title = 'Edit Pembangunan';
        return view('admin.pembangunan.edit', compact('pembangunan', 'title'));
    }

    public function update(Request $request, Pembangunan $pembangunan)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'anggaran' => 'required|numeric|min:0',
            'sumber_dana' => 'nullable|string|max:100',
            'tahun' => 'nullable|digits:4|integer|min:2000',
            'progres' => 'required|integer|min:0|max:100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($pembangunan->foto && Storage::disk('public')->exists($pembangunan->foto)) {
                Storage::disk('public')->delete($pembangunan->foto);
            }

            $validated['foto'] = $request->file('foto')->store('pembangunan', 'public');
        }

        $pembangunan->update($validated);

        return redirect()->route('admin.pembangunan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Pembangunan $pembangunan)
    {
        if ($pembangunan->foto && Storage::disk('public')->exists($pembangunan->foto)) {
            Storage::disk('public')->delete($pembangunan->foto);
        }

        $pembangunan->delete();

        return redirect()->route('admin.pembangunan.index')->with('success', 'Data berhasil dihapus.');
    }
}
