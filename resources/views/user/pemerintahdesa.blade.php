@extends('user.layouts.main')

@section('content')
    <div class="container my-5" style="text-align: justify; line-height: 1.8; color: #333; font-size: 1rem;">
        <h2 class="fw-bold mb-4 text-center">{{ $judul }}</h2>

        <div class="row">
            @forelse ($data as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 transition-all" style="transition: 0.3s;">
                        @php
                            $fotoExists = $item->foto && file_exists(public_path('storage/' . $item->foto));
                            $initials = collect(explode(' ', $item->nama))
                                ->map(fn($word) => strtoupper(substr($word, 0, 1)))
                                ->implode('');
                        @endphp

                        @if ($fotoExists)
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="card-img-top"
                                style="height: 280px; object-fit: cover; border-radius: 0.5rem 0.5rem 0 0;">
                        @else
                            <div class="d-flex align-items-center justify-content-center text-white"
                                style="
                                height: 280px; 
                                background: linear-gradient(135deg, #6c757d, #343a40);
                                font-size: 3rem; 
                                font-weight: bold;
                                border-radius: 0.5rem 0.5rem 0 0;
                            ">
                                {{ $initials }}
                            </div>
                        @endif

                        <div class="card-body text-left p-4">
                            <h5 class="card-title mb-2 text-primary fw-bold">{{ $item->nama }}</h5>
                            <p class="text-muted mb-1"><strong>Jabatan </strong> {{ $item->jabatan }}</p>
                            @if (!empty($item->periode))
                                <p class="text-muted mb-1"><strong>Periode </strong> {{ $item->periode }}</p>
                            @endif
                            @if (!empty($item->kontak))
                                <p class="text-muted"><strong>Kontak </strong> {{ $item->kontak }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Data belum tersedia untuk kategori <strong>{{ $judul }}</strong>.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
