@extends('user.layouts.main')
@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-3">{{ $berita->judul }}</h2>
        <p class="text-muted">
            {{ $berita->penulis ?? 'Admin' }} |
            {{ $berita->tanggal ?? $berita->created_at->format('d M Y') }}
        </p>

        @if ($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded mb-4" alt="{{ $berita->judul }}">
        @endif

        <div class="berita-isi">
            {!! nl2br(e($berita->isi)) !!}
        </div>

        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
@endsection
