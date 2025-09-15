@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Tambah Berita</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                        @include('admin.berita.form')
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
