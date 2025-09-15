@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Ubah Berita</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.berita.form')
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
