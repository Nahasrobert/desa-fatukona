@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4">Galeri {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</h2>

        @if ($galeris->isEmpty())
            <div class="alert alert-info">Belum ada data galeri.</div>
        @else
            <div class="row g-4">
                @foreach ($galeris as $item)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm position-relative overflow-hidden">
                            <div class="media-wrapper position-relative">
                                @if ($item->kategori === 'Foto')
                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $item->file) }}" class="card-img-top"
                                            alt="{{ $item->judul }}">
                                    </a>
                                @elseif ($item->kategori === 'Video')
                                    <video controls preload="metadata" class="w-100"
                                        style="max-height: 200px; object-fit: cover;">
                                        <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                        Browser tidak mendukung video.
                                    </video>
                                @endif

                                {{-- Caption Overlay --}}
                                <div class="caption-overlay p-2 text-white">
                                    <h6 class="mb-1">{{ $item->judul }}</h6>
                                    @if ($item->deskripsi)
                                        <p class="small mb-1">{{ Str::limit($item->deskripsi, 40) }}</p>
                                    @endif
                                    <small>{{ $item->tanggal ? $item->tanggal->format('d M Y') : '' }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="mt-4 d-flex justify-content-center">
            {{ $galeris->links() }}
        </div>

        {{-- <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
        </div> --}}
    </div>

    {{-- Custom CSS --}}
    <style>
        .media-wrapper {
            position: relative;
        }

        .card-img-top,
        video {
            max-height: 200px;
            object-fit: cover;
            width: 100%;
            display: block;
        }

        .caption-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            /* semi-transparent background */
            color: #fff;
            padding: 10px;
            font-size: 0.85rem;
        }

        .caption-overlay h6 {
            font-size: 0.9rem;
            font-weight: bold;
        }

        .caption-overlay p,
        .caption-overlay small {
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
@endsection
