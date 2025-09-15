<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control"
                value="{{ old('nama_kegiatan', $pembangunan->nama_kegiatan ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control"
                value="{{ old('lokasi', $pembangunan->lokasi ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="anggaran" class="form-label">Anggaran</label>
            <input type="number" step="0.01" name="anggaran" id="anggaran" class="form-control"
                value="{{ old('anggaran', $pembangunan->anggaran ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="sumber_dana" class="form-label">Sumber Dana</label>
            <input type="text" name="sumber_dana" id="sumber_dana" class="form-control"
                value="{{ old('sumber_dana', $pembangunan->sumber_dana ?? '') }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control"
                value="{{ old('tahun', $pembangunan->tahun ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="progres" class="form-label">Progres (%)</label>
            <input type="number" name="progres" id="progres" class="form-control"
                value="{{ old('progres', $pembangunan->progres ?? 0) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $pembangunan->deskripsi ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto (opsional)</label>
            @if (!empty($pembangunan->foto))
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $pembangunan->foto) }}" alt="Foto" width="120">
                </div>
            @endif
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
    </div>
</div>

<div class="mt-3">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-save"></i> Simpan
    </button>
    <a href="{{ route('admin.pembangunan.index') }}" class="btn btn-secondary">
        <i class="bi bi-x-circle"></i> Batal
    </a>
</div>
