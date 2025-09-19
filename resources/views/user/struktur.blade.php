@extends('user.layouts.main')

@section('content')
    <div class="container my-5" style="text-align: justify; line-height: 1.8; color: #333; font-size: 1rem;">
        <h2 class="fw-bold mb-4">Struktur Organisasi</h2>


        @if (!empty($settings['struktur_organisasi']))
            <div class="text-center">
                <img src="{{ asset('storage/' . $settings['struktur_organisasi']) }}" alt="Struktur Organisasi Desa"
                    class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
            </div>
        @else
            <p>Struktur Organisasi desa belum tersedia.</p>
        @endif


    </div>
@endsection
