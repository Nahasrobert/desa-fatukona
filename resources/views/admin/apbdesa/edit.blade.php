@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $title }}</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/apbdesa') }}">APBDesa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">Edit Data APBDesa</h6>
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali inputan Anda.</strong>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/apbdesa/' . $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.apbdesa._form', ['item' => $item])
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
