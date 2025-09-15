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
                <div class="p-4 sambutan shadow-sm bg-white rounded">
                    <h5 class="fw-bold mb-3">👨👩 Statistik Jenis Kelamin</h5>
                    <canvas id="genderChart" height="200"></canvas>
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
                    <div class="mt-4 p-3 bg-light rounded text-center">
                        <h6 class="fw-bold mb-1">👥 Total Penduduk</h6>
                        <p class="mb-0 fs-5">{{ $totalPenduduk }} Jiwa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const laki = {{ $laki }};
        const perempuan = {{ $perempuan }};
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
    </script>




    <!-- Info Box -->
    <div class="container my-5">
        <div class="row g-6 justify-content-center">
            <div class="col-md-6 col-sm-6">
                <div
                    class="info-box shadow-sm p-4 text-center h-100 rounded-4 border border-light-subtle bg-white hover-effect">
                    <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" alt="Lokasi" style="width: 60px;"
                        class="mb-3">
                    <div
                        style="border: 1px solid #ccc; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62887.38470542476!2d123.93466946829376!3d-9.89546293588814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c55c557c4f63aef%3A0x57d6ff73dfd2a943!2sFatukona%2C%20Kec.%20Takari%2C%20Kabupaten%20Kupang%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1757946287108!5m2!1sid!2sid"
                            width="100%" height="100" style="border: 0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    {{-- <p class="mb-0 text-muted">Jl. Andi Makkasau No.12, Bone Bone, Luwu Utara</p> --}}
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div
                    class="info-box shadow-sm p-4 text-center h-100 rounded-4 border border-light-subtle bg-white hover-effect">
                    <img src="https://cdn-icons-png.flaticon.com/512/2921/2921222.png" alt="Jam Kerja" style="width: 60px;"
                        class="mb-3">
                    <h6 class="fw-bold mb-2">Jam Kerja</h6>
                    <p class="mb-0 text-muted">Senin - Jumat: 08.00 - 16.00 <br>Sabtu - Minggu: Libur</p>
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
                                                <p class="text-secondary small mb-0">Periode: {{ $perangkat->periode }}</p>
                                            @endif
                                            @if ($perangkat->kontak)
                                                <p class="text-primary small mb-0">📞 {{ $perangkat->kontak }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Kontrol Carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#perangkatCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#perangkatCarousel" data-bs-slide="next">
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
@endsection
