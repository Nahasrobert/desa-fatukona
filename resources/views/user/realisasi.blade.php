@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4">Galeri {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</h2>

        <div class="container my-5">
            <h3 class="mb-4 fw-bold">📊 Transparansi Anggaran Desa</h3>

            @if ($data->isEmpty())
                <div class="alert alert-info">Belum ada data anggaran yang tersedia.</div>
            @else
                <div class="row g-4">
                    @foreach ($data as $item)
                        @php
                            $persen = $item->anggaran > 0 ? round(($item->realisasi / $item->anggaran) * 100, 2) : 0;
                            $badgeClass = $persen < 50 ? 'danger' : ($persen < 80 ? 'warning' : 'success');
                        @endphp

                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="fw-bold">{{ $item->bidang }}</h5>
                                    <p class="mb-1">
                                        <strong>Tahun:</strong> {{ $item->tahun }}<br>
                                        <strong>Anggaran:</strong> Rp {{ number_format($item->anggaran, 0, ',', '.') }}<br>
                                        <strong>Realisasi:</strong> Rp {{ number_format($item->realisasi, 0, ',', '.') }}
                                    </p>

                                    <div class="mt-2">

                                        <div class="progress mt-1" style="height: 20px;">
                                            <div class="progress-bar bg-{{ $badgeClass }} animate-bar"
                                                data-value="{{ $persen }}" style="width: 0%;" role="progressbar"
                                                aria-valuenow="{{ $persen }}" aria-valuemin="0" aria-valuemax="100">
                                                {{ $persen }}%
                                            </div>
                                        </div>

                                    </div>

                                    {{-- Optional detail link --}}
                                    {{-- <a href="{{ route('anggaran.show', $item->id) }}" class="btn btn-sm btn-outline-primary mt-auto">Lihat Detail</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            @endif


        </div>

        {{-- <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
        </div> --}}
    </div>

    {{-- Custom CSS --}}
    <style>
        .hover-effect {
            transition: all 0.3s ease-in-out;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-color: #0d6efd;
            /* Bootstrap primary */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bars = document.querySelectorAll('.animate-bar');

            bars.forEach(bar => {
                const value = bar.getAttribute('data-value');
                bar.style.width = '0%';
                bar.style.transition = 'width 1.5s ease-in-out';

                setTimeout(() => {
                    bar.style.width = value + '%';
                }, 100);
            });
        });
    </script>
    <style>
        .progress-bar {
            font-weight: bold;
            font-size: 0.85rem;
            color: #fff;
            /* Warna teks putih */
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
