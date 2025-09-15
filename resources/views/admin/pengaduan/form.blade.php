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
    <label for="nama_pengadu" class="form-label">Nama Pengadu</label>
    <input type="text" name="nama_pengadu" id="nama_pengadu"
        class="form-control @error('nama_pengadu') is-invalid @enderror"
        value="{{ old('nama_pengadu', $pengaduan->nama_pengadu ?? '') }}">
    @error('nama_pengadu')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kontak" class="form-label">Kontak</label>
    <input type="text" name="kontak" id="kontak" class="form-control @error('kontak') is-invalid @enderror"
        value="{{ old('kontak', $pengaduan->kontak ?? '') }}">
    @error('kontak')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
    <textarea name="isi_pengaduan" id="isi_pengaduan" rows="4"
        class="form-control @error('isi_pengaduan') is-invalid @enderror" required>{{ old('isi_pengaduan', $pengaduan->isi_pengaduan ?? '') }}</textarea>
    @error('isi_pengaduan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
        @foreach ($statusList as $status)
            <option value="{{ $status }}"
                {{ old('status', $pengaduan->status ?? '') === $status ? 'selected' : '' }}>{{ $status }}</option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tanggapan" class="form-label">Tanggapan</label>
    <textarea name="tanggapan" id="tanggapan" rows="3" class="form-control @error('tanggapan') is-invalid @enderror">{{ old('tanggapan', $pengaduan->tanggapan ?? '') }}</textarea>
    @error('tanggapan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Kembali</a>
</div>
