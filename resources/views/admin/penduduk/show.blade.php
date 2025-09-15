@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <h4 class="mb-3 text-uppercase fw-bold">Detail Data Penduduk</h4>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    {{-- Alert Success / Error --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        {{-- Kolom Kiri --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="text">NIK</label>
                                <div class="fw-bold">{{ $penduduk->nik ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Nama</label>
                                <div class="fw-bold">{{ $penduduk->nama ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Nomor KK</label>
                                <div class="fw-bold">
                                    {{ optional($penduduk->kk)->no_kk ?? ($kkList->firstWhere('id_kk', $penduduk->id_kk)->no_kk ?? '-') }}
                                    -
                                    {{ optional($penduduk->kk)->kepala_keluarga ?? ($kkList->firstWhere('id_kk', $penduduk->id_kk)->kepala_keluarga ?? '-') }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Tempat, Tanggal Lahir</label>
                                <div class="fw-bold">
                                    {{ $penduduk->tempat_lahir ?? '-' }},
                                    {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y') ?? '-' }}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Jenis Kelamin</label>
                                <div class="fw-bold">
                                    @if ($penduduk->jenis_kelamin == 'L')
                                        <span class="badge bg-primary">Laki-laki</span>
                                    @elseif ($penduduk->jenis_kelamin == 'P')
                                        <span class="badge bg-pink">Perempuan</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Agama</label>
                                <div class="fw-bold">{{ $penduduk->agama ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Pendidikan</label>
                                <div class="fw-bold">{{ $penduduk->pendidikan ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Pekerjaan</label>
                                <div class="fw-bold">{{ $penduduk->pekerjaan ?? '-' }}</div>
                            </div>
                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="text">Status Kawin</label>
                                <div class="fw-bold">{{ $penduduk->status_kawin ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Hubungan Keluarga</label>
                                <div class="fw-bold">{{ $penduduk->hubungan_keluarga ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Kewarganegaraan</label>
                                <div class="fw-bold">{{ $penduduk->kewarganegaraan ?? 'Indonesia' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Alamat</label>
                                <div class="fw-bold" style="white-space: pre-wrap;">{{ $penduduk->alamat ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Disabilitas</label>
                                <div class="fw-bold">
                                    @if ($penduduk->disabilitas == 'Ya')
                                        <span class="badge bg-danger">Ya</span>
                                    @else
                                        <span class="badge bg-success">Tidak</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Vaksinasi</label>
                                <div class="fw-bold">
                                    @php
                                        $vaksinBadge = [
                                            'Belum' => 'secondary',
                                            'Dosis 1' => 'warning',
                                            'Dosis 2' => 'info',
                                            'Booster' => 'success',
                                        ];
                                    @endphp
                                    <span
                                        class="badge bg-{{ $vaksinBadge[$penduduk->vaksinasi ?? 'Belum'] ?? 'secondary' }}">
                                        {{ $penduduk->vaksinasi ?? 'Belum' }}
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="text">No HP</label>
                                <div class="fw-bold">{{ $penduduk->no_hp ?? '-' }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="text">Email</label>
                                <div class="fw-bold">{{ $penduduk->email ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.penduduk.index') }}" class="btn btn-danger">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('admin.penduduk.edit', $penduduk->id_penduduk) }}" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
