@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h4>{{ $title }}</h4>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.surat_template.update', $surat_template->id_template) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.surat_template.form')
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
