@extends('user.layouts.main')
@section('content')
    <!-- Sambutan + Statistik -->
    <div class="container my-5">
        <div class="row g-4">
            <!-- Sambutan Kepala Desa -->
            <div class="col-md-12">
                <div class="p-4 shadow-sm bg-white text-dark rounded sambutan" style="max-width: 700px; margin: 0 auto;">
                    @if ($kepala && $kepala->foto)
                        <div class="d-flex justify-content-center mb-4">
                            <a href="{{ asset('storage/' . $kepala->foto) }}" target="_blank"
                                style="box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 16px; overflow: hidden; display: inline-block;">
                                <img src="{{ asset('storage/' . $kepala->foto) }}" alt="Foto Kepala Desa"
                                    style="width: 180px; height: 180px; object-fit: cover; display: block;">
                            </a>
                        </div>
                    @else
                        <p class="text-center text-muted fst-italic">Foto Kepala Desa belum tersedia.</p>
                    @endif
                    <center>
                        <h2 class="text-muted" style="font-size: 0.9rem;">👤
                            {{ $kepala->nama ?? 'Kepala Desa' }}</h2>
                    </center>

                    <h5 class="fw-bold mb-3 text-center" style="font-size: 1.6rem;">👋 Sambutan Kepala Desa</h5>

                    <p class="text-center mb-4" style="font-style: italic; color: #555;">
                        Selamat datang di Sistem Informasi <span
                            class="fw-semibold">{{ $settings['nama_desa'] ?? 'Desa' }}</span>.
                    </p>

                    <div style="text-align: justify; line-height: 1.6; color: #333; font-size: 1rem;">
                        {!! $settings['sambutan_kepala'] ?? '<p class="text-muted">Sambutan Kepala Desa belum tersedia.</p>' !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 statistik shadow-sm bg-white rounded">
                    <h5 class="fw-bold mb-3">👥 Total Penduduk</h5>
                    <canvas id="totalChart" height="200"></canvas>
                </div>
            </div>

            <!-- Statistik Pendidikan & Total -->
            <div class="col-md-6">
                <div class="p-4 statistik shadow-sm bg-white rounded">
                    <h5 class="fw-bold mb-3">📚 Statistik Pendidikan</h5>

                    <!-- Grafik Pendidikan -->
                    <div class="mt-3">
                        <canvas id="eduChart" height="200"></canvas>
                    </div>

                    <!-- Total Penduduk -->
                    {{-- <div class="mt-4 p-3 bg-light rounded text-center">
                        <h6 class="fw-bold mb-1">👥 Total Penduduk</h6>
                        <p class="mb-0 fs-5">{{ $totalPenduduk }} Jiwa</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const laki = {{ $laki }};
        const perempuan = {{ $perempuan }};
        const totalPenduduk = {{ $totalPenduduk }};
        const pendidikanLabels = @json($pendidikan->keys());
        const pendidikanData = @json($pendidikan->values());

        // Grafik Bar Horizontal Jenis Kelamin
        new Chart(document.getElementById('genderChart'), {
            type: 'bar',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah',
                    data: [laki, perempuan],
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Grafik Pendidikan
        new Chart(document.getElementById('eduChart'), {
            type: 'bar',
            data: {
                labels: pendidikanLabels,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: pendidikanData,
                    backgroundColor: '#4BC0C0'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafik Total Penduduk - Bar Horizontal
        new Chart(document.getElementById('totalChart'), {
            type: 'bar',
            data: {
                labels: ['Laki-laki', 'Perempuan', 'Total Penduduk'],
                datasets: [{
                    label: 'Jumlah',
                    data: [laki, perempuan, totalPenduduk],
                    backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>





    <!-- Info Box -->
    <div class="container my-5">
        <div class="row g-6 justify-content-center">
            <div class="col-md-6 col-sm-6">
                <div
                    class="info-box shadow-sm p-4 text-center h-100 rounded-4 border border-light-subtle bg-white hover-effect">
                    <h6 class="fw-bold mb-3">Perkiraan Cuaca Kabupaten Kupang</h6>
                    <div class="p-3 bg-light rounded-4 border" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);">
                        <a class="weatherwidget-io" href="https://forecast7.com/en/n10d18123d61/kupang/"
                            data-label_1="Kabupaten Kupang" data-label_2="Cuaca Sekarang" data-theme="original">
                            Kabupaten Kupang Cuaca Sekarang
                        </a>
                    </div>
                    <script>
                        ! function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = 'https://weatherwidget.io/js/widget.min.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, 'script', 'weatherwidget-io-js');
                    </script>
                </div>
            </div>



            <div class="col-md-6 col-sm-6">
                <div class="info-box">
                    <h6>Jam Kerja</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Senin</td>
                                <td>08:00:00</td>
                                <td>16:00:00</td>
                            </tr>
                            <tr>
                                <td>Selasa</td>
                                <td>08:00:00</td>
                                <td>16:00:00</td>
                            </tr>
                            <tr>
                                <td>Rabu</td>
                                <td>08:00:00</td>
                                <td>16:00:00</td>
                            </tr>
                            <tr>
                                <td>Kamis</td>
                                <td>08:00:00</td>
                                <td>16:00:00</td>
                            </tr>
                            <tr>
                                <td>Jumat</td>
                                <td>08:00:00</td>
                                <td>16:00:00</td>
                            </tr>
                            <tr>
                                <td>Sabtu</td>
                                <td colspan="2"><span class="libur">Libur</span></td>
                            </tr>
                            <tr>
                                <td>Minggu</td>
                                <td colspan="2"><span class="libur">Libur</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="container my-5">
        <h3 class="mb-4">📰 Berita Desa</h3>
        <div class="row g-4">
            @foreach ($berita as $item)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $item->gambar ?? 'user/images/default.jpg') }}" class="card-img-top"
                            alt="{{ $item->judul }}">
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

    {{-- <!-- Layanan Mandiri -->
    <div class="container my-5">
        <div class="p-4 bg-light rounded shadow">
            <h5>Layanan Mandiri</h5>
            <input type="text" class="form-control mb-2" placeholder="NIK / No. KTP">
            <input type="password" class="form-control mb-2" placeholder="Kode PIN">
            <button class="btn btn-primary w-100">Masuk</button>
        </div>
    </div> --}}

    <!-- Perangkat Desa -->
    <div class="container my-5 perangkat">
        <h3 class="mb-4 text-center fw-bold">👥 Perangkat Desa</h3>

        <div id="perangkatCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                @foreach ($pemerintahDesa->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row g-4 justify-content-center">
                            @foreach ($chunk as $perangkat)
                                <div class="col-6 col-md-3">
                                    <div class="card shadow-sm border-0 text-center h-100">
                                        <img src="{{ $perangkat->foto
                                            ? asset('storage/' . $perangkat->foto)
                                            : 'https://ui-avatars.com/api/?name=' . urlencode($perangkat->nama) . '&background=random&color=fff' }}"
                                            class="card-img-top" alt="{{ $perangkat->nama }}">
                                        <div class="card-body p-2">
                                            <h6 class="fw-bold mb-0">{{ $perangkat->jabatan }}</h6>
                                            <p class="text-muted small mb-1">{{ $perangkat->nama }}</p>
                                            @if ($perangkat->periode)
                                                <p class="text-secondary small mb-0">Periode :
                                                    {{ $perangkat->periode }}
                                                </p>
                                            @endif
                                            {{-- @if ($perangkat->kontak)
                                                <p class="text-primary small mb-0">📞 {{ $perangkat->kontak }}</p>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Kontrol Carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#perangkatCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#perangkatCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Selanjutnya</span>
            </button>
        </div>
    </div>
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
