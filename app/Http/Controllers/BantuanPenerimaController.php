<?php

namespace App\Http\Controllers;

use App\Models\BantuanPenerima;
use App\Models\BantuanJenis;
use App\Models\Penduduk;
use App\Models\BantuanCair;
use Illuminate\Http\Request;

class BantuanPenerimaController extends Controller
{
    public function index()
    {
        $title = 'Data Penerima Bantuan';
        $data = BantuanPenerima::with(['jenis', 'penduduk'])->latest()->get();
        return view('admin.bantuan_penerima.index', compact('data', 'title'));
    }

    public function create()

    {
        $title = 'Tambah Penerima Bantuan';
        $jenisList = BantuanJenis::all();
        $pendudukList = Penduduk::all();
        return view('admin.bantuan_penerima.create', compact('jenisList', 'pendudukList', 'title'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        // die();
        $request->validate([
            'id_jenis' => 'required',
            'id_penduduk' => 'required',
            'periode' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        BantuanPenerima::create($request->all());

        return redirect()->route('admin.bantuan_penerima.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Edit Penerima Bantuan';
        $data = BantuanPenerima::findOrFail($id);
        $jenisList = BantuanJenis::all();
        $pendudukList = Penduduk::all();
        return view('admin.bantuan_penerima.edit', compact('data', 'jenisList', 'pendudukList', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data = BantuanPenerima::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.bantuan_penerima.index')->with('success', 'Data berhasil diperbarui');
    }
    public function verifikasi(Request $request, $id)
    {
        $data = BantuanPenerima::findOrFail($id);

        if ($data->status === 'Dicairkan') {
            return back()->with('error', 'Data sudah dicairkan dan tidak bisa diverifikasi ulang.');
        }

        $request->validate([
            'status' => 'required|in:Diajukan,Disetujui,Dicairkan',
        ]);

        $data->status = $request->status;
        $data->save();

        // Jika status dicairkan, insert ke bantuan_cair jika belum ada
        if ($request->status === 'Dicairkan' && !$data->pencairan) {
            BantuanCair::create([
                'id_penerima' => $data->id,
                'tanggal' => $data->tanggal ?? now(),
                'jumlah' => $data->jumlah,
                'keterangan' => $data->keterangan,
            ]);
        }

        return redirect()->route('admin.bantuan_penerima.index')->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        BantuanPenerima::destroy($id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
