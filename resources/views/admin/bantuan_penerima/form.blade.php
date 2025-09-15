<div class="row">
    <!-- KIRI -->
    <div class="col-md-6">
        {{-- Jenis Bantuan --}}
        <div class="mb-3">
            <label>Jenis Bantuan</label>
            <select name="id_jenis" class="form-control" required>
                <option value="">-- Pilih --</option>
                @foreach ($jenisList as $jenis)
                    <option value="{{ $jenis->id }}"
                        {{ old('id_jenis', $data->id_jenis ?? '') == $jenis->id ? 'selected' : '' }}>
                        {{ $jenis->nama_bantuan }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Penduduk --}}
        <div class="mb-3">
            <label for="penduduk_input">Penduduk</label>

            @if (old('id_penduduk', $data->id_penduduk ?? null))
                {{-- Mode edit: gunakan <select> --}}
                <select name="id_penduduk" id="id_penduduk" class="form-control" required>
                    <option value="">-- Pilih Penduduk --</option>
                    @foreach ($pendudukList as $penduduk)
                        <option value="{{ $penduduk->id_penduduk }}"
                            {{ old('id_penduduk', $data->id_penduduk ?? '') == $penduduk->id_penduduk ? 'selected' : '' }}>
                            {{ $penduduk->nama }} - {{ $penduduk->nik }}
                        </option>
                    @endforeach
                </select>
            @else
                {{-- Mode tambah: gunakan <input list=""> --}}
                <input list="pendudukList" id="penduduk_input" class="form-control" placeholder="Ketik nama atau NIK"
                    autocomplete="off" required>

                <datalist id="pendudukList">
                    @foreach ($pendudukList as $penduduk)
                        <option data-id="{{ $penduduk->id_penduduk }}"
                            value="{{ $penduduk->nama }} - {{ $penduduk->nik }}">
                        </option>
                    @endforeach
                </datalist>

                {{-- Hidden input untuk menyimpan ID penduduk --}}
                <input type="hidden" name="id_penduduk" id="id_penduduk"
                    value="{{ old('id_penduduk', $data->id_penduduk ?? '') }}">
            @endif
        </div>

        {{-- Periode --}}
        <div class="mb-3">
            <label>Periode</label>
            <input type="text" name="periode" class="form-control"
                value="{{ old('periode', $data->periode ?? '') }}" required>
        </div>
    </div>

    <!-- KANAN -->
    <div class="col-md-6">
        {{-- Jumlah --}}
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $data->jumlah ?? '') }}"
                required>
        </div>

        {{-- Keterangan --}}
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="5">{{ old('keterangan', $data->keterangan ?? '') }}</textarea>
        </div>

        {{-- Tombol --}}
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="{{ route('admin.bantuan.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </div>
</div>

@if (!old('id_penduduk', $data->id_penduduk ?? null))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('penduduk_input');
            const hiddenInput = document.getElementById('id_penduduk');
            const options = document.getElementById('pendudukList').options;

            // Ketika user mengetik dan memilih dari datalist
            input.addEventListener('input', function() {
                const val = this.value;
                let foundId = '';

                for (let i = 0; i < options.length; i++) {
                    if (options[i].value === val) {
                        foundId = options[i].dataset.id;
                        break;
                    }
                }

                hiddenInput.value = foundId;
            });

            // Saat halaman dimuat (untuk mengisi kembali input dari hidden jika sudah ada)
            const existingId = hiddenInput.value;
            if (existingId) {
                for (let i = 0; i < options.length; i++) {
                    if (options[i].dataset.id === existingId) {
                        input.value = options[i].value;
                        break;
                    }
                }
            }
        });
    </script>
@endif
