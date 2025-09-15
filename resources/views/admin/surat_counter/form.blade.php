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
    {{-- Kolom Kiri --}}
    <div class="col-md-6">
        {{-- Nama Produk --}}
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk"
                class="form-control @error('nama_produk') is-invalid @enderror"
                value="{{ old('nama_produk', $lapak->nama_produk ?? '') }}" required>
            @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $lapak->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Harga --}}
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" min="0" step="0.01" name="harga" id="harga"
                class="form-control @error('harga') is-invalid @enderror"
                value="{{ old('harga', isset($lapak) ? number_format($lapak->harga, 2, '.', '') : '') }}" required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Stok --}}
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" min="0" name="stok" id="stok"
                class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $lapak->stok ?? 0) }}"
                required>
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    {{-- Kolom Kanan --}}
    <div class="col-md-6">
        {{-- Penjual --}}
        <div class="mb-3">
            <label for="penjual" class="form-label">Penjual</label>
            <input type="text" name="penjual" id="penjual"
                class="form-control @error('penjual') is-invalid @enderror"
                value="{{ old('penjual', $lapak->penjual ?? '') }}">
            @error('penjual')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kontak --}}
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" name="kontak" id="kontak"
                class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak', $lapak->kontak ?? '') }}">
            @error('kontak')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Foto Produk --}}
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Produk</label>
            @if (isset($lapak) && $lapak->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $lapak->foto) }}" alt="Foto Produk"
                        style="width: 120px; height: auto;">
                </div>
            @endif
            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
                accept="image/*">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
            <a href="{{ route('admin.lapak.index') }}" class="btn btn-secondary"> <i
                    class="bi bi-x-circle"></i>Kembali</a>
        </div>
    </div>
</div>
