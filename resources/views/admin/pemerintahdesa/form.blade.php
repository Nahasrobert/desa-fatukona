@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama', $pemerintahdesa->nama ?? '') }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatanOptions as $jabatan)
                    <option value="{{ $jabatan }}"
                        {{ old('jabatan', $pemerintahdesa->jabatan ?? '') == $jabatan ? 'selected' : '' }}>
                        {{ $jabatan }}
                    </option>
                @endforeach
            </select>
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            <input type="text" name="periode" id="periode"
                class="form-control @error('periode') is-invalid @enderror"
                value="{{ old('periode', $pemerintahdesa->periode ?? '') }}">
            @error('periode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" name="kontak" id="kontak"
                class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak', $pemerintahdesa->kontak ?? '') }}">
            @error('kontak')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            @if (isset($pemerintahdesa) && $pemerintahdesa->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $pemerintahdesa->foto) }}" alt="Foto"
                        style="width: 120px; height: auto;">
                </div>
            @endif
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
                accept="image/*">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- Tombol submit --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="{{ route('admin.pemerintahdesa.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Kembali
            </a>
        </div>
    </div>
</div>
