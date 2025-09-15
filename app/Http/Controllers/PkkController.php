<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PkkController extends Controller
{
    public function index()
    {
        $title = 'Data PKK';
        $pkk = Pkk::orderBy('id', 'desc')->get();
        return view('admin.pkk.index', compact('pkk', 'title'));
    }

    public function create()
    {
        $title = 'Tambah PKK';
        return view('admin.pkk.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'periode' => 'nullable|string|max:50',
            'foto' => 'nullable|image|max:2048', // max 2MB
        ]);

        $data = $request->only('nama', 'jabatan', 'periode');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pkk', 'public');
        }

        Pkk::create($data);

        return redirect()->route('admin.pkk.index')->with('success', 'Data PKK berhasil ditambahkan.');
    }

    public function edit(Pkk $pkk)
    {
        $title = 'Edit PKK';
        return view('admin.pkk.edit', compact('pkk', 'title'));
    }

    public function update(Request $request, Pkk $pkk)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'periode' => 'nullable|string|max:50',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('nama', 'jabatan', 'periode');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pkk->foto && Storage::disk('public')->exists($pkk->foto)) {
                Storage::disk('public')->delete($pkk->foto);
            }
            $data['foto'] = $request->file('foto')->store('pkk', 'public');
        }

        $pkk->update($data);

        return redirect()->route('admin.pkk.index')->with('success', 'Data PKK berhasil diperbarui.');
    }

    public function destroy(Pkk $pkk)
    {
        // Hapus file foto jika ada
        if ($pkk->foto && Storage::disk('public')->exists($pkk->foto)) {
            Storage::disk('public')->delete($pkk->foto);
        }
        $pkk->delete();

        return redirect()->route('admin.pkk.index')->with('success', 'Data PKK berhasil dihapus.');
    }
}
