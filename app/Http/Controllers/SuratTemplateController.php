<?php

namespace App\Http\Controllers;

use App\Models\SuratTemplate;
use Illuminate\Http\Request;

class SuratTemplateController extends Controller
{
    public function index()
    {
        $title = 'Template Surat';
        $templates = SuratTemplate::latest()->get();
        return view('admin.surat_template.index', compact('title', 'templates'));
    }

    public function create()
    {
        $title = 'Tambah Template Surat';
        return view('admin.surat_template.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_surat' => 'required|string|max:191|unique:surat_template,nama_surat',
            'isi_template' => 'required|string',
            'nomor_format' => 'nullable|string|max:255',
        ]);

        SuratTemplate::create($validated);

        return redirect()->route('admin.surat_template.index')
            ->with('success', 'Template surat berhasil ditambahkan.');
    }

    public function edit(SuratTemplate $surat_template)
    {
        $title = 'Edit Template Surat';
        return view('admin.surat_template.edit', compact('title', 'surat_template'));
    }

    public function update(Request $request, SuratTemplate $surat_template)
    {
        $validated = $request->validate([
            'nama_surat' => 'required|string|max:191|unique:surat_template,nama_surat,' . $surat_template->id_template . ',id_template',
            'isi_template' => 'required|string',
            'nomor_format' => 'nullable|string|max:255',
        ]);

        $surat_template->update($validated);

        return redirect()->route('admin.surat_template.index')
            ->with('success', 'Template surat berhasil diperbarui.');
    }

    public function destroy(SuratTemplate $surat_template)
    {
        $surat_template->delete();
        return redirect()->route('admin.surat_template.index')->with('success', 'Template surat berhasil dihapus.');
    }
}
