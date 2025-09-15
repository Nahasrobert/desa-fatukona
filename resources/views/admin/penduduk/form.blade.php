<div class="row">
    <div class="form-group mb-3 col-md-6">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control"
            value="{{ old('nik', $penduduk->nik ?? '') }}" required>
    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control"
            value="{{ old('nama', $penduduk->nama ?? '') }}" required>
    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="id_kk_text">Nomor KK</label>
        <input type="text" id="id_kk_text" class="form-control @error('id_kk') is-invalid @enderror"
            list="kkListOptions" autocomplete="off"
            value="{{ old('id_kk_text', $penduduk->kk->no_kk ?? '') ? old('id_kk_text', $penduduk->kk->no_kk . ' - ' . $penduduk->kk->kepala_keluarga) : '' }}"
            placeholder="Pilih Nomor KK">
        <input type="hidden" name="id_kk" id="id_kk" value="{{ old('id_kk', $penduduk->id_kk ?? '') }}">
        <datalist id="kkListOptions">
            @foreach ($kkList as $kk)
                <option data-id="{{ $kk->id_kk }}" value="{{ $kk->no_kk }} - {{ $kk->kepala_keluarga }}"></option>
            @endforeach
        </datalist>
        @error('id_kk')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <script>
        const inputText = document.getElementById('id_kk_text');
        const inputHidden = document.getElementById('id_kk');
        const dataList = document.getElementById('kkListOptions');

        inputText.addEventListener('input', function() {
            const val = this.value;
            let found = false;

            // Cari option yang value-nya sama dengan input user
            for (let option of dataList.options) {
                if (option.value === val) {
                    inputHidden.value = option.getAttribute('data-id');
                    found = true;
                    break;
                }
            }
            if (!found) {
                // Jika tidak cocok dengan pilihan, kosongkan id_kk
                inputHidden.value = '';
            }
        });
    </script>



    <div class="form-group mb-3 col-md-6">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
            value="{{ old('tempat_lahir', $penduduk->tempat_lahir ?? '') }}">
    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
            value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir ?? '') }}">
    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
            <option value="">-- Pilih --</option>
            <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                Perempuan</option>
        </select>
    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="jenis_kelamin">Agama</label>
        <select name="agama" id="agama" class="form-control">
            <option value="">-- Pilih Agama --</option>
            @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'] as $agama)
                <option value="{{ $agama }}"
                    {{ old('agama', $penduduk->agama ?? '') == $agama ? 'selected' : '' }}>
                    {{ $agama }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="jenis_kelamin">Pendidikan</label>

        <select name="pendidikan" id="pendidikan" class="form-control">
            <option value="">-- Pilih Pendidikan --</option>
            @foreach (['Tidak Sekolah', 'SD/Sederajat', 'SMP/Sederajat', 'SMA/Sederajat', 'Diploma', 'Sarjana', 'Magister', 'Doktor'] as $pendidikan)
                <option value="{{ $pendidikan }}"
                    {{ old('pendidikan', $penduduk->pendidikan ?? '') == $pendidikan ? 'selected' : '' }}>
                    {{ $pendidikan }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="jenis_kelamin">Pekerjaan</label>
        <select name="pekerjaan" id="pekerjaan" class="form-control">
            <option value="">-- Pilih Pekerjaan --</option>
            @foreach (['Tidak Bekerja', 'Pelajar/Mahasiswa', 'Petani', 'Nelayan', 'Buruh', 'Karyawan Swasta', 'PNS', 'TNI/Polri', 'Wiraswasta', 'Guru/Dosen', 'Dokter/Bidan/Perawat', 'Lainnya'] as $pekerjaan)
                <option value="{{ $pekerjaan }}"
                    {{ old('pekerjaan', $penduduk->pekerjaan ?? '') == $pekerjaan ? 'selected' : '' }}>
                    {{ $pekerjaan }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="form-group mb-3 col-md-6">

        <label for="status_kawin">Status Kawin</label>
        <select name="status_kawin" id="status_kawin" class="form-control">
            <option value="">-- Pilih --</option>
            @foreach (['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $status)
                <option value="{{ $status }}"
                    {{ old('status_kawin', $penduduk->status_kawin ?? '') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>

    @php
        $hubunganOptions = ['Kepala Keluarga', 'Istri', 'Anak', 'Orang Tua', 'Saudara', 'Lainnya'];
    @endphp
    <div class="form-group mb-3 col-md-6">
        <label for="jenis_kelamin">Hubungan Keluarga</label>

        <select name="hubungan_keluarga" id="hubungan_keluarga" class="form-control">
            <option value="">-- Pilih Hubungan Keluarga --</option>
            @foreach ($hubunganOptions as $option)
                <option value="{{ $option }}"
                    {{ old('hubungan_keluarga', $penduduk->hubungan_keluarga ?? '') == $option ? 'selected' : '' }}>
                    {{ $option }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group mb-3 col-md-6">
        <label for="kewarganegaraan">Kewarganegaraan</label>
        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control"
            value="{{ old('kewarganegaraan', $penduduk->kewarganegaraan ?? 'Indonesia') }}">
    </div>

    <div class="form-group mb-3 col-md-12">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $penduduk->alamat ?? '') }}</textarea>
    </div>

    <div class="form-group mb-3 col-md-4">
        <label for="disabilitas">Disabilitas</label>
        <select name="disabilitas" id="disabilitas" class="form-control">
            <option value="Tidak"
                {{ old('disabilitas', $penduduk->disabilitas ?? 'Tidak') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
            <option value="Ya" {{ old('disabilitas', $penduduk->disabilitas ?? '') == 'Ya' ? 'selected' : '' }}>Ya
            </option>
        </select>
    </div>

    <div class="form-group mb-3 col-md-4">
        <label for="vaksinasi">Vaksinasi</label>
        <select name="vaksinasi" id="vaksinasi" class="form-control">
            @foreach (['Belum', 'Dosis 1', 'Dosis 2', 'Booster'] as $v)
                <option value="{{ $v }}"
                    {{ old('vaksinasi', $penduduk->vaksinasi ?? 'Belum') == $v ? 'selected' : '' }}>
                    {{ $v }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3 col-md-4">
        <label for="no_hp">No HP</label>
        <input type="text" name="no_hp" id="no_hp" class="form-control"
            value="{{ old('no_hp', $penduduk->no_hp ?? '') }}">
    </div>

    <div class="form-group mb-3 col-md-6">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control"
            value="{{ old('email', $penduduk->email ?? '') }}">
    </div>
</div>
