<?php

namespace App\Http\Controllers;

use App\Models\BantuanJenis;
use Illuminate\Http\Request;

class BantuanJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BantuanJenis::all();
        $title = 'Data Jenis Bantuan';
        return view('admin.bantuan.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Jenis Bantuan';
        return view('admin.bantuan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bantuan' => 'required|string|max:100|unique:bantuan_jenis',
            'sumber_dana'  => 'nullable|string|max:100',
            'kriteria'     => 'nullable|string',
            'keterangan'   => 'nullable|string',
        ]);

        BantuanJenis::create($validated);

        return redirect()->route('admin.bantuan.index')->with('success', 'Data Bantuan Jenis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BantuanJenis $bantuan)
    {
        $title = 'Detail Jenis Bantuan';
        return view('admin.bantuan.show', compact('bantuan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BantuanJenis $bantuan)
    {
        $title = 'Edit Jenis Bantuan';
        return view('admin.bantuan.edit', compact('bantuan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BantuanJenis $bantuan)
    {
        $validated = $request->validate([
            'nama_bantuan' => 'required|string|max:100|unique:bantuan_jenis,nama_bantuan,' . $bantuan->id,
            'sumber_dana'  => 'nullable|string|max:100',
            'kriteria'     => 'nullable|string',
            'keterangan'   => 'nullable|string',
        ]);

        $bantuan->update($validated);

        return redirect()->route('admin.bantuan.index')->with('success', 'Data Bantuan Jenis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BantuanJenis $bantuan)
    {
        $bantuan->delete();
        return redirect()->route('admin.bantuan.index')->with('success', 'Data Bantuan Jenis berhasil dihapus.');
    }
}
