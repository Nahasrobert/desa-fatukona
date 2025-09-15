<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Linmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinmasController extends Controller
{
    public function index()
    {
        $title = 'Data Linmas';
        $linmas = Linmas::orderBy('id', 'desc')->get();
        return view('admin.linmas.index', compact('linmas', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Linmas';
        return view('admin.linmas.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'periode' => 'nullable|string|max:50',
            'kontak' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('linmas', 'public');
        }

        Linmas::create($validated);

        return redirect()->route('admin.linmas.index')->with('success', 'Data Linmas berhasil ditambahkan.');
    }

    public function edit(Linmas $linma)
    {
        $title = 'Edit Linmas';
        return view('admin.linmas.edit', compact('linma', 'title'));
    }

    public function update(Request $request, Linmas $linma)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'periode' => 'nullable|string|max:50',
            'kontak' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($linma->foto && Storage::disk('public')->exists($linma->foto)) {
                Storage::disk('public')->delete($linma->foto);
            }
            $validated['foto'] = $request->file('foto')->store('linmas', 'public');
        }

        $linma->update($validated);

        return redirect()->route('admin.linmas.index')->with('success', 'Data Linmas berhasil diperbarui.');
    }

    public function destroy(Linmas $linma)
    {
        if ($linma->foto && Storage::disk('public')->exists($linma->foto)) {
            Storage::disk('public')->delete($linma->foto);
        }
        $linma->delete();

        return redirect()->route('admin.linmas.index')->with('success', 'Data Linmas berhasil dihapus.');
    }
}
