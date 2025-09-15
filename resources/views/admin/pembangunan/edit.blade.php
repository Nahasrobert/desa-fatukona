@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="page-breadcrumb d-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $title }}</div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.pembangunan.update', $pembangunan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.pembangunan.form')
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
