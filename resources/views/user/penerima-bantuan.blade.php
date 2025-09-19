@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-3">Data Penerima Bantuan {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</h2>

        @if ($data->isEmpty())
            <div class="alert alert-info">Belum ada data penerima bantuan.</div>
        @else
            <div class="table-responsive">
                <table id="produkHukumTable" class="table table-bordered table-hover align-middle" id="bantuanPenerimaTable">
                    <thead class="table-warning text-left">
                        <tr>
                            <th>No</th>
                            <th>Nama Penerima</th>
                            <th>Jenis Bantuan</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            @php
                                $color =
                                    $item->status == 'Diajukan'
                                        ? 'secondary'
                                        : ($item->status == 'Disetujui'
                                            ? 'warning'
                                            : 'success');
                            @endphp
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->penduduk->nama }}</td>
                                <td>{{ $item->jenis->nama_bantuan }}</td>
                                <td class="text-center">{{ $item->periode }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $color }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="text-end">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $item->jenis->keterangan }}</td>
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
