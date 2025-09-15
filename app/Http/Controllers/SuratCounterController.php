<?php

namespace App\Http\Controllers;

use App\Models\SuratCounter;
use App\Models\SuratTemplate;
use Illuminate\Http\Request;

class SuratCounterController extends Controller
{
    public function index()
    {
        $title = 'Nomor Surat Terakhir';
        $counters = SuratCounter::with('template')->orderByDesc('tahun')->orderByDesc('bulan')->get();
        return view('admin.surat_counter.index', compact('title', 'counters'));
    }

    public function create()
    {
        $title = 'Tambah Counter Surat';
        $templates = SuratTemplate::all();
        return view('admin.surat_counter.create', compact('title', 'templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_template' => 'required|exists:surat_template,id_template',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'bulan' => 'required|integer|min:1|max:12',
            'last_no' => 'required|integer|min:0',
        ]);

        // Prevent duplicate entry
        $exists = SuratCounter::where([
            'id_template' => $request->id_template,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
        ])->first();

        if ($exists) {
            return back()->withErrors(['Data counter sudah ada untuk kombinasi tersebut.'])->withInput();
        }

        SuratCounter::create($request->only(['id_template', 'tahun', 'bulan', 'last_no']));

        return redirect()->route('admin.surat_counter.index')->with('success', 'Counter berhasil ditambahkan.');
    }

    public function edit(SuratCounter $surat_counter)
    {
        $title = 'Edit Counter Surat';
        $templates = SuratTemplate::all();
        return view('admin.surat_counter.edit', compact('title', 'surat_counter', 'templates'));
    }

    public function update(Request $request, SuratCounter $surat_counter)
    {
        $request->validate([
            'id_template' => 'required|exists:surat_template,id_template',
            'tahun' => 'required|integer|min:2000|max:' . date('Y'),
            'bulan' => 'required|integer|min:1|max:12',
            'last_no' => 'required|integer|min:0',
        ]);

        // Prevent duplicate if changed
        $exists = SuratCounter::where('id', '!=', $surat_counter->id)
            ->where('id_template', $request->id_template)
            ->where('tahun', $request->tahun)
            ->where('bulan', $request->bulan)
            ->first();

        if ($exists) {
            return back()->withErrors(['Data counter sudah ada untuk kombinasi tersebut.'])->withInput();
        }

        $surat_counter->update($request->only(['id_template', 'tahun', 'bulan', 'last_no']));

        return redirect()->route('admin.surat_counter.index')->with('success', 'Counter berhasil diperbarui.');
    }

    public function destroy(SuratCounter $surat_counter)
    {
        $surat_counter->delete();

        return redirect()->route('admin.surat_counter.index')->with('success', 'Counter berhasil dihapus.');
    }
}
