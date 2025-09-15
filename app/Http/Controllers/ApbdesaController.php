<?php

namespace App\Http\Controllers;

use App\Models\Apbdesa;
use Illuminate\Http\Request;

class ApbdesaController extends Controller
{
    public function index()
    {
        // Ambil semua data, urutkan tahun desc lalu bidang
        $data = Apbdesa::orderBy('tahun', 'desc')
            ->orderBy('bidang')
            ->get();

        // Hitung total (untuk <tfoot> di tabel)
        $totalAnggaran  = $data->sum('anggaran');
        $totalRealisasi = $data->sum('realisasi');
        $totalPersen    = $totalAnggaran > 0 ? round(($totalRealisasi / $totalAnggaran) * 100, 2) : 0;

        $totals = [
            'anggaran'  => $totalAnggaran,
            'realisasi' => $totalRealisasi,
            'persen'    => $totalPersen,
        ];

        return view('admin.apbdesa.index', [
            'title'  => 'APBDesa',
            'data'   => $data,
            'totals' => $totals,
        ]);
    }

    public function create()
    {
        return view('admin.apbdesa.create', [
            'title' => 'Tambah APBDesa',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun'     => 'required|integer|digits:4|min:2000|max:' . (date('Y') + 1),
            'bidang'    => 'required|string|max:100',
            'anggaran'  => 'required|numeric|min:0',
            'realisasi' => 'required|numeric|min:0',
        ]);

        Apbdesa::create($validated);

        return redirect('admin/apbdesa')->with('success', 'Data APBDesa berhasil ditambahkan.');
    }

    public function show(Apbdesa $apbdesa)
    {
        return view('admin.apbdesa.show', [
            'title'   => 'Detail APBDesa',
            'item'    => $apbdesa,
        ]);
    }

    public function edit(Apbdesa $apbdesa)
    {
        return view('admin.apbdesa.edit', [
            'title' => 'Edit APBDesa',
            'item'  => $apbdesa,
        ]);
    }

    public function update(Request $request, Apbdesa $apbdesa)
    {
        $validated = $request->validate([
            'tahun'     => 'required|integer|digits:4|min:2000|max:' . (date('Y') + 1),
            'bidang'    => 'required|string|max:100',
            'anggaran'  => 'required|numeric|min:0',
            'realisasi' => 'required|numeric|min:0',
        ]);

        $apbdesa->update($validated);

        return redirect('admin/apbdesa')->with('success', 'Data APBDesa berhasil diperbarui.');
    }

    public function destroy(Apbdesa $apbdesa)
    {
        $apbdesa->delete();

        return redirect('admin/apbdesa')->with('success', 'Data APBDesa berhasil dihapus.');
    }
}
