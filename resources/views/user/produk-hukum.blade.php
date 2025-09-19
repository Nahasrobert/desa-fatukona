@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-3">Produk Hukum {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</h2>

        @if ($produkHukum->isEmpty())
            <div class="alert alert-info">Belum ada data produk hukum.</div>
        @else
            {{-- Tabel Produk Hukum --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="produkHukumTable">
                    <thead class="table-warning text-center">
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Nomor</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Ringkasan</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produkHukum as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->nomor }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->tanggal->format('d M Y') }}</td>
                                <td>{{ Str::limit($item->ringkasan, 100) }}</td>
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
