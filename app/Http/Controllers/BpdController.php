<?php

namespace App\Http\Controllers;

use App\Models\Bpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BpdController extends Controller
{
    public function index()
    {
        $title = 'Data BPD';
        $bpd = Bpd::all();
        return view('admin.bpd.index', compact('bpd', 'title'));
    }

    public function create()
    {
        $title = 'Tambah BPD';
        return view('admin.bpd.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'jabatan' => 'required|max:100',
            'periode' => 'nullable|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('foto-bpd', 'public');
        }

        Bpd::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'periode' => $request->periode,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.bpd.index')->with('success', 'Data BPD berhasil ditambahkan.');
    }

    public function edit(Bpd $bpd)
    {
        $title = 'Edit BPD';
        return view('admin.bpd.edit', compact('bpd', 'title'));
    }

    public function update(Request $request, Bpd $bpd)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'jabatan' => 'required|max:100',
            'periode' => 'nullable|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($bpd->foto && Storage::disk('public')->exists($bpd->foto)) {
                Storage::disk('public')->delete($bpd->foto);
            }

            $foto = $request->file('foto')->store('foto-bpd', 'public');
        } else {
            $foto = $bpd->foto;
        }

        $bpd->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'periode' => $request->periode,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.bpd.index')->with('success', 'Data BPD berhasil diperbarui.');
    }

    public function destroy(Bpd $bpd)
    {
        if ($bpd->foto && Storage::disk('public')->exists($bpd->foto)) {
            Storage::disk('public')->delete($bpd->foto);
        }

        $bpd->delete();

        return redirect()->route('admin.bpd.index')->with('success', 'Data BPD berhasil dihapus.');
    }
}
