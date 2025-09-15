@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Edit Data KK</h6>
            <hr>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.kk.update', $kk->id_kk) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="no_kk">Nomor KK</label>
                                    <input type="text" name="no_kk" id="no_kk" class="form-control"
                                        value="{{ old('no_kk', $kk->no_kk) }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kepala_keluarga">Kepala Keluarga</label>
                                    <input type="text" name="kepala_keluarga" id="kepala_keluarga" class="form-control"
                                        value="{{ old('kepala_keluarga', $kk->kepala_keluarga) }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="4" required>{{ old('alamat', $kk->alamat) }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="rt">RT</label>
                                    <input type="text" name="rt" id="rt" class="form-control"
                                        value="{{ old('rt', $kk->rt) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="rw">RW</label>
                                    <input type="text" name="rw" id="rw" class="form-control"
                                        value="{{ old('rw', $kk->rw) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="desa">Desa</label>
                                    <input type="text" name="desa" id="desa" class="form-control"
                                        value="{{ old('desa', $kk->desa) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                        value="{{ old('kecamatan', $kk->kecamatan) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" name="kabupaten" id="kabupaten" class="form-control"
                                        value="{{ old('kabupaten', $kk->kabupaten) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" class="form-control"
                                        value="{{ old('provinsi', $kk->provinsi) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control"
                                        value="{{ old('kode_pos', $kk->kode_pos) }}">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
                        <a href="{{ route('admin.kk.index') }}" class="btn btn-secondary"> <i class="bi bi-x-circle"></i>
                            Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
