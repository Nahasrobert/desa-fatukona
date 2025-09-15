@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">{{ $title }}</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.informasi_publik.update', $informasi_publik->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @include('admin.informasi_publik.form')
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
