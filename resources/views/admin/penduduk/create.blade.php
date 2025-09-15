@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Tambah Data Penduduk</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.penduduk.store') }}" method="POST">
                        @csrf

                        @include('admin.penduduk.form')

                        <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
                        <a href="{{ route('admin.penduduk.index') }}" class="btn btn-dark"> <i class="bi bi-x-circle"></i>
                            Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
