<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\KK;
use App\Models\Berita;
use App\Models\Pembangunan;
use App\Models\Pengaduan;
use App\Models\ProdukHukum;
use App\Models\BantuanCair;

class ControllerAdmin extends Controller
{
    // ControllerAdmin.php

    public function index()
    {
        $pagetitle = 'Admin';
        $title = 'Dashboard Admin';

        // data ringkasan
        $totalPenduduk     = Penduduk::count();
        $totalKK           = KK::count();
        $totalBerita       = Berita::count();
        $totalPembangunan  = Pembangunan::count();
        $totalPengaduan    = Pengaduan::count();
        $totalProdukHukum  = ProdukHukum::count();

        // contoh dana tahun ini (2025)
        $tahun = \App\Models\Apbdesa::max('tahun');
        // total dana sesuai tahun tersebut
        $totalDanaTahunIni = \App\Models\Apbdesa::where('tahun', $tahun)
            ->sum('anggaran');

        // list pegawai desa penerima bantuan (ambil penduduk + nama bantuan)
        $pegawaiPenerima = \App\Models\BantuanPenerima::with(['penduduk', 'jenis'])
            ->latest()
            ->take(5)
            ->get();

        // daftar bantuan dengan status Dicairkan (status ada di bantuan_penerima)
        $bantuanDicairkan = \App\Models\BantuanCair::with(['penerima.penduduk', 'penerima.jenis'])
            ->whereHas('penerima', function ($q) {
                $q->where('status', 'Dicairkan');
            })
            ->latest('tanggal')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'pagetitle',
            'title',
            'totalPenduduk',
            'totalKK',
            'totalBerita',
            'totalPembangunan',
            'totalPengaduan',
            'totalProdukHukum',
            'totalDanaTahunIni',
            'pegawaiPenerima',
            'bantuanDicairkan',
            'tahun'
        ));
    }




    public function create()
    {
        $pagetitle = 'Tambah Admin';
        $title = 'Form Tambah Admin';
        return view('admin.create', compact('pagetitle', 'title'));
    }

    public function store(Request $request)
    {
        // Simpan data admin
    }

    public function show($id)
    {
        $pagetitle = 'Detail Admin';
        $title = 'Detail Admin';
        return view('admin.show', compact('pagetitle', 'title'));
    }

    public function edit($id)
    {
        $pagetitle = 'Edit Admin';
        $title = 'Form Edit Admin';
        return view('admin.edit', compact('pagetitle', 'title'));
    }

    public function update(Request $request, $id)
    {
        // Update data admin
    }

    public function destroy($id)
    {
        // Hapus data
    }
}
