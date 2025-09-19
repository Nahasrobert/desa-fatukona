@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-3">Informasi Publik {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</h2>

        @if ($informasiPublik->isEmpty())
            <div class="alert alert-info">Belum ada data informasi publik.</div>
        @else
            {{-- Tabel Informasi Publik --}}
            <div class="table-responsive">
                <table id="produkHukumTable" class="table table-bordered table-hover align-middle" id="informasiPublikTable">
                    <thead class="table-warning text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Isi (Ringkasan)</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informasiPublik as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}</td>
                                <td class="text-center">
                                    @if ($item->file)
                                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                            class="btn btn-sm btn-primary">Lihat</a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
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
@endsection
