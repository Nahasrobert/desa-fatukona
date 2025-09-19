@extends('user.layouts.main')

@section('content')
    <style>
        /* ... semua style yang sudah ada sebelumnya ... */

        .progress-bar {
            transition: width 1.5s ease-in-out;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <div class="container my-5">
        <h2 class="fw-bold mb-4">{{ $title ?? 'Pembangunan Desa' }}</h2>

        @if ($pembangunan->isEmpty())
            <div class="alert alert-info">Belum ada data pembangunan.</div>
        @else
            <div class="table-responsive">
                <table id="informasiPublikTable" class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Kegiatan</th>
                            <th>Lokasi</th>
                            <th>Tahun</th>
                            <th>Anggaran</th>
                            <th>Progres</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembangunan as $item)
                            @php
                                $progressClass = 'bg-danger';
                                if ($item->progres >= 80) {
                                    $progressClass = 'bg-success';
                                } elseif ($item->progres >= 50) {
                                    $progressClass = 'bg-warning';
                                }
                            @endphp
                            <tr>
                                <td style="width: 100px;">
                                    <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('user/images/default.jpg') }}"
                                        alt="{{ $item->nama_kegiatan }}" class="img-thumbnail"
                                        style="width: 80px; height: auto;">
                                </td>
                                <td>{{ $item->nama_kegiatan }}</td>
                                <td>{{ $item->lokasi ?? '-' }}</td>
                                <td>{{ $item->tahun ?? '-' }}</td>
                                <td>Rp {{ number_format($item->anggaran, 0, ',', '.') }}</td>
                                <td style="min-width: 150px;">
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar {{ $progressClass }}" role="progressbar" style="width: 0%;"
                                            data-progres="{{ $item->progres }}" aria-valuenow="{{ $item->progres }}"
                                            aria-valuemin="0" aria-valuemax="100">
                                            {{ $item->progres }}%
                                        </div>
                                    </div>
                                </td>

                                <td>{{ Str::limit($item->deskripsi, 100, '...') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
        </div> --}}
    </div>

    <!-- JQuery dan DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#informasiPublikTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#informasiPublikTable').DataTable();

            function animateProgressBars() {
                $('.progress-bar').each(function() {
                    const bar = $(this);
                    const progressValue = bar.data('progres');
                    bar.css('width', '0%');
                    setTimeout(() => {
                        bar.css('width', progressValue + '%');
                    }, 100);
                });
            }

            animateProgressBars(); // animate awal

            // Animate ulang tiap kali table redraw (misal paging)
            table.on('draw', function() {
                animateProgressBars();
            });
        });
    </script>
@endsection
