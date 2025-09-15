<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\KK;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $title = 'Data Kartu Keluarga';
        $kkList = KK::with('penduduks')->get();

        return view('admin.penduduk.index', compact('kkList', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Data Penduduk';
        $kkList = KK::all();
        return view('admin.penduduk.create', compact('kkList', 'title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:penduduk,nik|max:20',
            'nama' => 'required|string|max:100',
            'id_kk' => 'nullable|exists:kk,id_kk',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable|string|max:50',
            'pendidikan' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:100',
            'status_kawin' => 'nullable|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'hubungan_keluarga' => 'nullable|string|max:50',
            'kewarganegaraan' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'disabilitas' => 'nullable|in:Ya,Tidak',
            'vaksinasi' => 'nullable|in:Belum,Dosis 1,Dosis 2,Booster',
            'no_hp' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:120',
        ]);

        Penduduk::create($validated);
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    public function show(Penduduk $penduduk)
    {
        $title = 'Detail Penduduk';
        return view('admin.penduduk.show', compact('penduduk', 'title'));
    }

    public function edit(Penduduk $penduduk)
    {
        $title = 'Edit Data Penduduk';
        $kkList = KK::all();
        return view('admin.penduduk.edit', compact('penduduk', 'kkList', 'title'));
    }


    public function update(Request $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            'nik' => 'required|max:20|unique:penduduk,nik,' . $penduduk->id_penduduk . ',id_penduduk',
            'nama' => 'required|string|max:100',
            'id_kk' => 'nullable|exists:kk,id_kk',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'agama' => 'nullable|string|max:50',
            'pendidikan' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:100',
            'status_kawin' => 'nullable|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'hubungan_keluarga' => 'nullable|string|max:50',
            'kewarganegaraan' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'disabilitas' => 'nullable|in:Ya,Tidak',
            'vaksinasi' => 'nullable|in:Belum,Dosis 1,Dosis 2,Booster',
            'no_hp' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:120',
        ]);

        $penduduk->update($validated);
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('admin.penduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
    }
}
