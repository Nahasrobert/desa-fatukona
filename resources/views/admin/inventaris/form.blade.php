@csrf
@if (isset($inventari))
    @method('PUT')
@endif

<div class="row">
    <div class="col-md-6">
        {{-- Nama Barang --}}
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang"
                name="nama_barang" value="{{ old('nama_barang', $inventari->nama_barang ?? '') }}" required>
            @error('nama_barang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoriList as $kategori)
                    <option value="{{ $kategori }}"
                        {{ old('kategori', $inventari->kategori ?? '') == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jumlah --}}
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror"
                id="jumlah" name="jumlah" value="{{ old('jumlah', $inventari->jumlah ?? 0) }}" required>
            @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kondisi --}}
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <select class="form-select @error('kondisi') is-invalid @enderror" id="kondisi" name="kondisi" required>
                <option value="">-- Pilih Kondisi --</option>
                @foreach ($kondisiList as $kondisi)
                    <option value="{{ $kondisi }}"
                        {{ old('kondisi', $inventari->kondisi ?? '') == $kondisi ? 'selected' : '' }}>
                        {{ $kondisi }}
                    </option>
                @endforeach
            </select>
            @error('kondisi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        {{-- Lokasi --}}
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                name="lokasi" value="{{ old('lokasi', $inventari->lokasi ?? '') }}" required>
            @error('lokasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tahun Pengadaan --}}
        <div class="mb-3">
            <label for="tahun_pengadaan" class="form-label">Tahun Pengadaan</label>
            <input type="number" min="1900" max="{{ date('Y') }}"
                class="form-control @error('tahun_pengadaan') is-invalid @enderror" id="tahun_pengadaan"
                name="tahun_pengadaan" value="{{ old('tahun_pengadaan', $inventari->tahun_pengadaan ?? '') }}">
            @error('tahun_pengadaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Sumber Dana --}}
        <div class="mb-3">
            <label for="sumber_dana" class="form-label">Sumber Dana</label>
            <input type="text" class="form-control @error('sumber_dana') is-invalid @enderror" id="sumber_dana"
                name="sumber_dana" value="{{ old('sumber_dana', $inventari->sumber_dana ?? '') }}">
            @error('sumber_dana')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
            <a href="{{ route('admin.inventaris.index') }}" class="btn btn-secondary"> <i
                    class="bi bi-x-circle"></i>Kembali</a>
        </div>
    </div>
</div>
