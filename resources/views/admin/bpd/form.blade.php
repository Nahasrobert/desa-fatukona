@csrf
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama', $bpd->nama ?? '') }}" required maxlength="100">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan"
                class="form-control @error('jabatan') is-invalid @enderror"
                value="{{ old('jabatan', $bpd->jabatan ?? '') }}" required maxlength="100">
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            <input type="text" name="periode" id="periode"
                class="form-control @error('periode') is-invalid @enderror"
                value="{{ old('periode', $bpd->periode ?? '') }}" maxlength="50" placeholder="Opsional">
            @error('periode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            @if (isset($bpd) && $bpd->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $bpd->foto) }}" alt="Foto" width="150">
                </div>
            @endif
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
                accept="image/*">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
<a href="{{ route('admin.bpd.index') }}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i>Kembali</a>
