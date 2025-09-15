@csrf
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul ?? '') }}"
                required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @php
                    $kategoriList = ['Umum', 'Pendidikan', 'Kesehatan', 'Pemerintahan', 'Ekonomi'];
                @endphp
                @foreach ($kategoriList as $kategori)
                    <option value="{{ $kategori }}"
                        {{ old('kategori', $berita->kategori ?? '') == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
            <input type="hidden" name="penulis" value="{{ auth()->user()->name }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="10" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                value="{{ old('tanggal', $berita->tanggal ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
            @if (!empty($berita->gambar))
                <img src="{{ asset('storage/' . $berita->gambar) }}" width="100" class="mt-2" alt="Gambar Berita">
            @endif
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success"> <i class="bi bi-save"></i> Simpan</button>
<a href="{{ route('admin.berita.index') }}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i>Kembali</a>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor.create(document.querySelector('textarea[name="isi"]'))
            .then(editor => {
                // Kalau mau set style default, bisa ditambahkan di sini
                editor.editing.view.change(writer => {
                    writer.setStyle('color', 'black', editor.editing.view.document.getRoot());
                });
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
