@extends('user.layouts.main')

@section('content')
    <div class="container my-5" style="text-align: justify; line-height: 1.6; color: #333; font-size: 1rem;">
        <h2 class="fw-bold mb-3">Sejarah </h2>


        {!! $settings['sejarah'] ?? '' !!}


        {{-- <div class="mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
            </div> --}}
    </div>
@endsection
