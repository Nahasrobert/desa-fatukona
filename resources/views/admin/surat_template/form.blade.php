<div class="mb-3">
    <label>Nama Surat</label>
    <input type="text" name="nama_surat" value="{{ old('nama_surat', $surat_template->nama_surat ?? '') }}"
        placeholder="Contoh: Surat Keterangan Usaha" class="form-control @error('nama_surat') is-invalid @enderror">
    @error('nama_surat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Isi Template</label>
    <textarea name="isi_template" rows="8" placeholder="Gunakan placeholder seperti [NAMA], [ALAMAT], dll."
        class="form-control monospace @error('isi_template') is-invalid @enderror">{{ old('isi_template', $surat_template->isi_template ?? '') }}</textarea>
    @error('isi_template')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-white">
        Gunakan placeholder dengan format <code>[NAMA]</code>, <code>[ALAMAT]</code>, <code>[TANGGAL]</code>, dll. Ini
        akan diganti saat generate surat.
    </small>
</div>

<div class="mb-3">
    <label>Nomor Format</label>
    <input type="text" name="nomor_format"
        value="{{ old('nomor_format', $surat_template->nomor_format ?? '{NO}/DS-NB/{BULAN_ROMAWI}/{TAHUN}') }}"
        placeholder="{NO}/DS-NB/{BULAN_ROMAWI}/{TAHUN}"
        class="form-control @error('nomor_format') is-invalid @enderror">
    @error('nomor_format')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text  text-white">
        Gunakan placeholder dengan format <code>{NO}</code>, <code>{BULAN}</code>, <code>{BULAN_ROMAWI}</code>,
        <code>{TAHUN}</code>.
    </small>
</div>

<button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
<a href="{{ route('admin.surat_template.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Kembali</a>

<style>
    /* Agar textarea isi_template pakai font monospace */
    .monospace {
        font-family: monospace;
    }
</style>
