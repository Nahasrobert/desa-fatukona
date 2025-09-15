@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="page-breadcrumb d-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $title }}</div>
                <div class="ms-auto">
                    <a href="{{ route('admin.pembangunan.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Tambah
                    </a>
                </div>
            </div>

            {{-- Flash message --}}


            <div class="card mt-3">
                <div class="card-body table-responsive">
                    <table id="example" class="table  table-striped align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Lokasi</th>
                                <th>Anggaran</th>
                                <th>Tahun</th>
                                <th>Progres</th>
                                <th>Foto</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pembangunan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td>{{ $item->lokasi ?? '-' }}</td>
                                    <td>Rp{{ number_format($item->anggaran, 0, ',', '.') }}</td>
                                    <td>{{ $item->tahun ?? '-' }}</td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $item->progres }}%;" aria-valuenow="{{ $item->progres }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ $item->progres }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($item->foto)
                                            <a href="{{ asset('storage/' . $item->foto) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto"
                                                    style="width: 80px; height: auto;">
                                            </a>
                                        @else
                                            -
                                        @endif
                                    <td>
                                        <a href="{{ route('admin.pembangunan.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.pembangunan.destroy', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data pembangunan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
