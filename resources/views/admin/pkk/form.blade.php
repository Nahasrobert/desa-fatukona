@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
        value="{{ old('nama', $pkk->nama ?? '') }}" required>
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
        value="{{ old('jabatan', $pkk->jabatan ?? '') }}" required>
    @error('jabatan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="periode" class="form-label">Periode</label>
    <input type="text" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror"
        value="{{ old('periode', $pkk->periode ?? '') }}">
    @error('periode')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    @if (isset($pkk) && $pkk->foto)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $pkk->foto) }}" alt="Foto" style="width: 120px; height: auto;">
        </div>
    @endif
    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
        accept="image/*">
    @error('foto')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
<a href="{{ route('admin.pkk.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Kembali</a>
