{{-- resources/views/apbdesa/index.blade.php --}}
@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $title }}</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ url('admin/apbdesa/create') }}" class="btn btn-primary"> <i
                                class="bi bi-plus-circle me-1"></i> Tambah</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">Data APBDesa</h6>
            <hr>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th style="width:50px">No</th>
                                    <th style="width:90px">Tahun</th>
                                    <th>Bidang</th>
                                    <th class="text-end">Anggaran (Rp)</th>
                                    <th class="text-end">Realisasi (Rp)</th>
                                    <th class="text-center">% Realisasi</th>
                                    <th style="width:150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    @php
                                        $persen =
                                            $row->anggaran > 0 ? round(($row->realisasi / $row->anggaran) * 100, 2) : 0;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->tahun }}</td>
                                        <td>{{ $row->bidang }}</td>
                                        <td class="text-end">{{ number_format($row->anggaran, 0, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($row->realisasi, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            {{-- tampilkan badge & progress bar --}}
                                            <span
                                                class="badge bg-{{ $persen < 50 ? 'danger' : ($persen < 80 ? 'warning' : 'success') }}">
                                                {{ $persen }}%
                                            </span>
                                            <div class="progress mt-1" style="height:6px;">
                                                <div class="progress-bar bg-{{ $persen < 50 ? 'danger' : ($persen < 80 ? 'warning' : 'success') }}"
                                                    role="progressbar" style="width: {{ $persen }}%;"
                                                    aria-valuenow="{{ $persen }}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            {{-- Detail --}}
                                            <a href="{{ url('admin/apbdesa/' . $row->id) }}"
                                                class="btn btn-grd-primary btn-sm">
                                                <i class="bi bi-info-circle"></i>

                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ url('admin/apbdesa/' . $row->id . '/edit') }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            {{-- Hapus --}}
                                            <form action="{{ url('admin/apbdesa/' . $row->id) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Hapus data ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>

                                            </form>



                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if (isset($totals))
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">TOTAL</th>
                                        <th class="text-end">{{ number_format($totals['anggaran'], 0, ',', '.') }}</th>
                                        <th class="text-end">{{ number_format($totals['realisasi'], 0, ',', '.') }}</th>
                                        <th class="text-center">{{ $totals['persen'] }}%</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
