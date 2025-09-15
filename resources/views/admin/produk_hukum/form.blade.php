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
    <label for="jenis" class="form-label">Jenis</label>
    <input type="text" name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror"
        value="{{ old('jenis', $produkHukum->jenis ?? '') }}" required>
    @error('jenis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nomor" class="form-label">Nomor</label>
    <input type="text" name="nomor" id="nomor" class="form-control @error('nomor') is-invalid @enderror"
        value="{{ old('nomor', $produkHukum->nomor ?? '') }}">
    @error('nomor')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
        value="{{ old('judul', $produkHukum->judul ?? '') }}" required>
    @error('judul')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
        value="{{ old('tanggal', isset($produkHukum->tanggal) ? $produkHukum->tanggal->format('Y-m-d') : '') }}">
    @error('tanggal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="file" class="form-label">File (PDF, DOC, DOCX)</label>
    @if (isset($produkHukum) && $produkHukum->file)
        <div class="mb-2">
            <a href="{{ asset('storage/' . $produkHukum->file) }}" target="_blank">Lihat file saat ini</a>
        </div>
    @endif
    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror"
        accept=".pdf,.doc,.docx">
    @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ringkasan" class="form-label">Ringkasan</label>
    <textarea name="ringkasan" id="ringkasan" rows="3" class="form-control @error('ringkasan') is-invalid @enderror">{{ old('ringkasan', $produkHukum->ringkasan ?? '') }}</textarea>
    @error('ringkasan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
    <a href="{{ route('admin.produk_hukum.index') }}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i>
        Kembali</a>
</div>
