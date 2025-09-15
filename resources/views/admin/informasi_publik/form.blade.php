@csrf
<div class="row">
    <div class="col-md-6">
        {{-- Judul --}}
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul', $informasi_publik->judul ?? '') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoriList as $kategori)
                    <option value="{{ $kategori }}"
                        {{ old('kategori', $informasi_publik->kategori ?? '') == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tanggal --}}
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal', isset($informasi_publik->tanggal) ? $informasi_publik->tanggal->format('Y-m-d') : '') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        {{-- Isi --}}
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" rows="5">{{ old('isi', $informasi_publik->isi ?? '') }}</textarea>
            @error('isi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- File --}}
        <div class="mb-3">
            <label for="file" class="form-label">File
                {{ isset($informasi_publik) ? '(biarkan kosong jika tidak ingin diubah)' : '' }}</label>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror"
                {{ isset($informasi_publik) ? '' : 'required' }}>
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if (isset($informasi_publik) && $informasi_publik->file)
                <div class="mt-2">
                    <a href="{{ asset('storage/' . $informasi_publik->file) }}" target="_blank">Lihat/Download file
                        saat ini</a>
                </div>
            @endif
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
<a href="{{ route('admin.informasi_publik.index') }}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i>
    Kembali</a>
