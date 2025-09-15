@csrf
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul', $galeri->judul ?? '') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                <option value="Foto" {{ old('kategori', $galeri->kategori ?? '') == 'Foto' ? 'selected' : '' }}>Foto
                </option>
                <option value="Video" {{ old('kategori', $galeri->kategori ?? '') == 'Video' ? 'selected' : '' }}>Video
                </option>
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal"
                class="form-control @error('tanggal') is-invalid @enderror"
                value="{{ old('tanggal', isset($galeri->tanggal) ? $galeri->tanggal->format('Y-m-d') : '') }}">
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File
                {{ isset($galeri) ? '(biarkan kosong jika tidak ingin diubah)' : '' }}</label>
            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror"
                {{ isset($galeri) ? '' : 'required' }}>
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if (isset($galeri) && $galeri->file)
                <div class="mt-2">
                    @if ($galeri->kategori == 'Foto')
                        <img src="{{ asset('storage/' . $galeri->file) }}" alt="Preview" width="150">
                    @else
                        <video width="320" controls>
                            <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                            Browser tidak mendukung video.
                        </video>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
<a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i> Kembali</a>
