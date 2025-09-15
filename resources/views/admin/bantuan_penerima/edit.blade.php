@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Tambah Data Penduduk</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.bantuan_penerima.update', $data->id) }}" method="POST">
                        @csrf @method('PUT')
                        @include('admin.bantuan_penerima.form')

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
