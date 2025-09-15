@extends('admin.layouts.main')
@section('title', 'Dashboard')
@section('content')
    <main class="main-wrapper">
        <div class="main-content">

            <!-- Statistik Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-2">
                    <div class="card rounded-4 p-3 text-center bg-primary text-white shadow">
                        <h6>Penduduk</h6>
                        <h3>{{ $totalPenduduk }}</h3>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card rounded-4 p-3 text-center bg-success text-white shadow">
                        <h6>KK</h6>
                        <h3>{{ $totalKK }}</h3>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card rounded-4 p-3 text-center bg-warning text-dark shadow">
                        <h6>Berita</h6>
                        <h3>{{ $totalBerita }}</h3>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card rounded-4 p-3 text-center bg-info text-white shadow">
                        <h6>Pembangunan</h6>
                        <h3>{{ $totalPembangunan }}</h3>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card rounded-4 p-3 text-center bg-danger text-white shadow">
                        <h6>Pengaduan</h6>
                        <h3>{{ $totalPengaduan }}</h3>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card rounded-4 p-3 text-center bg-secondary text-white shadow">
                        <h6>Produk Hukum</h6>
                        <h3>{{ $totalProdukHukum }}</h3>
                    </div>
                </div>
            </div>

            <!-- Dana Tahun Ini -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card rounded-4 p-4 shadow">
                        <h5>Dana Desa Tahun {{ $tahun }}</h5>
                        <h2 class="text-primary fw-bold">Rp {{ number_format($totalDanaTahunIni, 0, ',', '.') }}</h2>
                        <p class="mb-0 text-white">Total alokasi dana desa pada tahun ini</p>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <!-- Campaign Stats (Pegawai Desa Penerima Bantuan) -->
                <div class="col-md-6">
                    <div class="card rounded-4 shadow">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Penerima Bantuan Desa</h5>

                            @forelse($pegawaiPenerima as $p)
                                <div class="d-flex align-items-center mb-3 pb-2 border-bottom border-secondary">
                                    <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                        style="width:45px;height:45px;">
                                        <i class="bx bx-user"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 text-white">{{ $p->penduduk->nama ?? '-' }}</h6>
                                        <small class="text-white-50">NIK: {{ $p->penduduk->nik ?? '-' }}</small><br>
                                        <small class="text-white-50">Bantuan:
                                            {{ $p->jenis->nama_bantuan ?? '-' }}</small>
                                    </div>
                                    <span class="text-white-50 small">{{ $p->created_at->format('d-m-Y') }}</span>
                                </div>
                            @empty
                                <p class="text-white-50 text-center">Tidak ada data penerima</p>
                            @endforelse

                        </div>
                    </div>
                </div>

                <!-- Social Leads (Bantuan Dicairkan) -->
                <div class="col-md-6">
                    <div class="card rounded-4 shadow">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Bantuan Dicairkan</h5>

                            @forelse($bantuanDicairkan as $b)
                                <div class="d-flex align-items-center mb-3 pb-2 border-bottom border-secondary">
                                    <div class="avatar rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-3"
                                        style="width:45px;height:45px;">
                                        <i class="bx bx-gift"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 text-white">{{ $b->penerima->penduduk->nama ?? '-' }}</h6>
                                        <small class="text-white-50">Bantuan:
                                            {{ $b->penerima->jenis->nama_bantuan ?? '-' }}</small><br>
                                        <small class="text-white-50">Tanggal Cair:
                                            {{ \Carbon\Carbon::parse($b->tanggal)->format('d-m-Y') }}</small>
                                    </div>
                                    <span class="badge bg-success">{{ $b->penerima->status ?? '-' }}</span>
                                </div>
                            @empty
                                <p class="text-white-50 text-center">Belum ada bantuan dicairkan</p>
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
