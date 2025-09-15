<?php
// app/Http/Controllers/LapakController.php
namespace App\Http\Controllers;

use App\Models\Lapak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LapakController extends Controller
{
    public function index()
    {
        $title = 'Data Produk';
        $lapak = Lapak::latest()->get();
        return view('admin.lapak.index', compact('lapak', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Produk';
        return view('admin.lapak.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:191',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'penjual' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('lapak', 'public');
        }

        Lapak::create($data);

        return redirect()->route('admin.lapak.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Lapak $lapak)
    {
        $title = 'Edit Produk';
        return view('admin.lapak.edit', compact('lapak', 'title'));
    }

    public function update(Request $request, Lapak $lapak)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:191',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'penjual' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($lapak->foto && \Storage::disk('public')->exists($lapak->foto)) {
                \Storage::disk('public')->delete($lapak->foto);
            }

            $data['foto'] = $request->file('foto')->store('lapak', 'public');
        }

        $lapak->update($data);

        return redirect()->route('admin.lapak.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Lapak $lapak)
    {
        if ($lapak->foto && \Storage::disk('public')->exists($lapak->foto)) {
            \Storage::disk('public')->delete($lapak->foto);
        }

        $lapak->delete();

        return redirect()->route('admin.lapak.index')->with('success', 'Produk berhasil dihapus.');
    }
}
