@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Tambah Data KK</h6>
            <hr>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.kk.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="no_kk">Nomor KK</label>
                                    <input type="text" name="no_kk" id="no_kk" class="form-control" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kepala_keluarga">Kepala Keluarga</label>
                                    <input type="text" name="kepala_keluarga" id="kepala_keluarga" class="form-control"
                                        required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="4" required></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="rt">RT</label>
                                    <input type="text" name="rt" id="rt" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="rw">RW</label>
                                    <input type="text" name="rw" id="rw" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="desa">Desa</label>
                                    <input type="text" name="desa" id="desa" class="form-control"
                                        value="Fatukona">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                        value="Takari">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" name="kabupaten" id="kabupaten" class="form-control"
                                        value="Kupang">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" class="form-control"
                                        value="Nusa Tenggara Timur">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" name="kode_pos" id="kode_pos" class="form-control">
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
