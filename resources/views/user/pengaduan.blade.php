@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4 text-teal">📩 Pengaduan</h2>

        {{-- Pesan sukses --}}
        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Error message --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3" role="alert">
                <i class="bi bi-x-circle-fill"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Validasi error detail --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Terdapat kesalahan input:
                <ul class="mt-2 mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        {{-- Info layanan --}}
        <div class="alert shadow-sm border-0 rounded-3" style="background-color:#0E6A77; color:white;">
            Layanan Pengaduan bagi warga Desa Fatukona, Kecamatan Takari, Kabupaten Kupang
            yang ingin menyampaikan keluhan dan laporan terkait penyelenggaraan pemerintahan desa
            dan pelaksanaan pembangunan.
        </div>

        {{-- Tombol Ajukan Pengaduan + Search --}}
        <div class="d-flex flex-wrap gap-2 mb-4 align-items-center">
            <button class="btn btn-teal shadow-sm" data-bs-toggle="modal" data-bs-target="#pengaduanModal">
                <i class="bi bi-plus-circle"></i> Ajukan Pengaduan
            </button>

            <form method="GET" action="{{ route('pengaduan') }}" class="d-flex flex-wrap gap-2 ms-auto">
                <div class="input-group shadow-sm">
                    <input type="text" name="q" class="form-control" placeholder="Cari pengaduan disini..."
                        value="{{ request('q') }}">
                    <button class="btn btn-teal" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>


        </div>

        {{-- List Data Pengaduan --}}
        @if ($pengaduan->isEmpty())
            <div class="alert alert-secondary text-center rounded-3 shadow-sm">
                <i class="bi bi-info-circle"></i> Belum ada pengaduan.
            </div>
        @else
            <div class="row g-4">
                @foreach ($pengaduan as $item)
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 hover-effect h-100 rounded-3">
                            <div class="card-body">
                                <h5 class="fw-bold text-teal">{{ $item->nama_pengadu ?? 'Anonim' }}</h5>
                                <p class="mb-2 text-muted small">
                                    <i class="bi bi-calendar-event"></i> {{ $item->created_at->format('d M Y H:i') }}
                                </p>
                                <p>{{ Str::limit($item->isi_pengaduan, 120, '...') }}</p>

                                {{-- Badge Status bisa diklik --}}
                                <span class="badge px-3 py-2 rounded-pill shadow-sm" style="cursor:pointer"
                                    data-bs-toggle="modal" data-bs-target="#detailPengaduan{{ $item->id }}">
                                    @if ($item->status == 'Baru')
                                        <span class="badge bg-danger px-3 py-2 rounded-pill">Baru</span>
                                    @elseif($item->status == 'Diproses')
                                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Diproses</span>
                                    @else
                                        <span class="badge bg-success px-3 py-2 rounded-pill">Selesai</span>
                                    @endif
                                </span>

                                @if ($item->tanggapan)
                                    <p class="mt-3 small text-muted bg-light p-2 rounded">
                                        <i class="bi bi-reply-fill text-success"></i>
                                        <strong>Tanggapan:</strong> {{ Str::limit($item->tanggapan, 100, '...') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Modal Detail Pengaduan --}}
                    <div class="modal fade" id="detailPengaduan{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content shadow-lg border-0 rounded-3">
                                <div class="modal-header" style="background-color:#0E6A77; color:white;">
                                    <h5 class="modal-title"><i class="bi bi-info-circle"></i> Detail Pengaduan</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nama:</strong> {{ $item->nama_pengadu ?? 'Anonim' }}</p>
                                    <p><strong>Kontak:</strong> {{ $item->kontak ?? '-' }}</p>
                                    <p><strong>Judul:</strong> {{ $item->judul ?? '-' }}</p>
                                    <p><strong>Tanggal:</strong> {{ $item->created_at->format('d M Y H:i') }}</p>
                                    <hr>
                                    <p><strong>Isi Pengaduan:</strong></p>
                                    <p class="text-muted">{{ $item->isi_pengaduan }}</p>

                                    <p><strong>Status:</strong>
                                        <span
                                            class="badge
                                            @if ($item->status == 'Baru') bg-danger
                                            @elseif($item->status == 'Diproses') bg-warning text-dark
                                            @else bg-success @endif">
                                            {{ $item->status }}
                                        </span>
                                    </p>

                                    <p><strong>Tanggapan:</strong></p>
                                    @if ($item->tanggapan)
                                        <div class="alert alert-success rounded-3 shadow-sm">
                                            {{ $item->tanggapan }}
                                        </div>
                                    @else
                                        <div class="alert alert-secondary rounded-3 shadow-sm">
                                            <i class="bi bi-info-circle"></i> Belum ada tanggapan dari admin.
                                        </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $pengaduan->links() }}
            </div>
        @endif
    </div>

    {{-- Modal Ajukan Pengaduan --}}
    <div class="modal fade" id="pengaduanModal" tabindex="-1" aria-labelledby="pengaduanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-3">
                <div class="modal-header" style="background-color:#0E6A77; color:white;">
                    <h5 class="modal-title" id="pengaduanModalLabel"><i class="bi bi-envelope-fill"></i> Ajukan Pengaduan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('pengaduan.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_pengadu" class="form-label">Nama (opsional)</label>
                            <input type="text" class="form-control" id="nama_pengadu" name="nama_pengadu"
                                value="{{ old('nama_pengadu') }}">
                        </div>

                        <div class="mb-3">
                            <label for="kontak" class="form-label">Kontak (opsional)</label>
                            <input type="text" class="form-control" id="kontak" name="kontak"
                                value="{{ old('kontak') }}">
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ old('judul') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="isi_pengaduan" class="form-label">Isi Pengaduan <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="5" required>{{ old('isi_pengaduan') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-teal">Kirim Pengaduan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Style tambahan --}}
    <style>
        .hover-effect {
            transition: all 0.3s ease-in-out;
        }

        .hover-effect:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            border-color: #0E6A77;
        }

        /* Custom warna teal */
        .btn-teal {
            background-color: #0E6A77;
            color: #fff;
            border: none;
        }

        .btn-teal:hover {
            background-color: #0c5862;
            color: #fff;
        }

        .text-teal {
            color: #0E6A77 !important;
        }
    </style>
@endsection
