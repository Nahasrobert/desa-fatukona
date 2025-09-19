@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4">{{ $title }}</h2>

        <div class="row">
            @forelse ($data as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top"
                                alt="{{ $item->nama_produk }}" style="object-fit: cover; height: 200px;">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_produk }}</h5>
                            <p class="card-text text-muted">Rp {{ number_format($item->harga, 2, ',', '.') }}</p>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Stok: {{ $item->stok }}</small><br>
                            <small class="text-muted">Penjual: {{ $item->penjual ?? '-' }}</small><br>
                            @if ($item->kontak)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->kontak) }}" target="_blank"
                                    class="btn btn-sm btn-success mt-2">
                                    <i class="fab fa-whatsapp"></i> Hubungi

                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Belum ada produk yang tersedia.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
