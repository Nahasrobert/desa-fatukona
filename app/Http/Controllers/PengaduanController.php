<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $title = 'Data Pengaduan';
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();
        return view('admin.pengaduan.index', compact('pengaduan', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Pengaduan';
        $statusList = Pengaduan::statusList();
        return view('admin.pengaduan.create', compact('title', 'statusList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengadu' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'isi_pengaduan' => 'required|string',
            'status' => 'required|in:' . implode(',', Pengaduan::statusList()),
            'tanggapan' => 'nullable|string',
        ]);

        Pengaduan::create($request->all());

        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil ditambahkan.');
    }

    public function edit(Pengaduan $pengaduan)
    {
        $title = 'Edit Pengaduan';
        $statusList = Pengaduan::statusList();
        return view('admin.pengaduan.edit', compact('pengaduan', 'title', 'statusList'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'nama_pengadu' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'isi_pengaduan' => 'required|string',
            'status' => 'required|in:' . implode(',', Pengaduan::statusList()),
            'tanggapan' => 'nullable|string',
        ]);

        $pengaduan->update($request->all());

        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function show(Pengaduan $pengaduan)
    {
        $title = 'Detail Pengaduan';
        return view('admin.pengaduan.show', compact('pengaduan', 'title'));
    }
}
