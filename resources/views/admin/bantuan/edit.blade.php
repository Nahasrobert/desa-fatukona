@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Edit Bantuan Jenis</h6>
            <hr>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.bantuan.update', $bantuan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="nama_bantuan">Nama Bantuan</label>
                            <input type="text" name="nama_bantuan" id="nama_bantuan" class="form-control"
                                value="{{ $bantuan->nama_bantuan }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="sumber_dana">Sumber Dana</label>
                            <input type="text" name="sumber_dana" id="sumber_dana" class="form-control"
                                value="{{ $bantuan->sumber_dana }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kriteria">Kriteria</label>
                            <textarea name="kriteria" id="kriteria" class="form-control">{{ $bantuan->kriteria }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control">{{ $bantuan->keterangan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.bantuan.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
