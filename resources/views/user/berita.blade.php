@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-3">Informasi Publik {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</h2>

        @if ($berita->isEmpty())
            <div class="alert alert-info">Belum ada data informasi publik.</div>
        @else
            {{-- Tabel Informasi Publik --}}
            <div class="container my-5">
                <h3 class="mb-4">📰 Berita Desa</h3>
                <div class="row g-4">
                    @foreach ($berita as $item)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0">
                                <img src="{{ asset('storage/' . $item->gambar ?? 'user/images/default.jpg') }}"
                                    class="card-img-top" alt="{{ $item->judul }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="fw-bold">{{ $item->judul }}</h5>
                                    <p>{{ Str::limit($item->isi, 100, '...') }}</p>
                                    <small class="text-muted mb-2">
                                        {{ $item->penulis ?? 'Admin' }} |
                                        {{ $item->tanggal ?? $item->created_at->format('d M Y') }}
                                    </small>
                                    <a href="{{ route('berita.show', $item->slug) }}"
                                        class="btn btn-sm btn-outline-primary mt-auto">
                                        Baca Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $berita->links() }}
                </div>
            </div>
        @endif

        {{-- <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
        </div> --}}
    </div>
@endsection
