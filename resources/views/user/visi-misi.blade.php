@extends('user.layouts.main')

@section('content')
    <div class="container my-5" style="text-align: justify; line-height: 1.8; color: #333; font-size: 1rem;">
        <h2 class="fw-bold mb-4">Visi dan Misi</h2>

        {{-- Visi --}}
        <h4 class="fw-semibold text-primary mt-4">📌 Visi</h4>
        <p>
            {!! $settings['visi'] ?? 'Visi desa belum tersedia.' !!}
        </p>

        {{-- Misi --}}
        <h4 class="fw-semibold text-primary mt-4" style="text-align: justify; line-height: 1.6; color: #333;">🎯 Misi</h4>

        {!! $settings['misi'] ?? 'Misi desa belum tersedia.' !!}
        {{-- <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
        </div> --}}
    </div>
@endsection
