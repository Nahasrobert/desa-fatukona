@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <!-- Breadcrumb Section -->
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
                        <a href="{{ route('admin.bantuan_penerima.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Tambah
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <h6 class="mb-0 text-uppercase">Data Penerima Bantuan</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penerima Bantuan</th>
                                    <th>Nama Bantuan</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $item)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $item->penduduk->nama }}</td>
                                        <td>{{ $item->jenis->nama_bantuan }}</td>
                                        <td>{{ $item->periode }}</td>
                                        <td>
                                            @php
                                                $color =
                                                    $item->status == 'Diajukan'
                                                        ? 'secondary'
                                                        : ($item->status == 'Disetujui'
                                                            ? 'warning'
                                                            : 'success');
                                            @endphp

                                            <span class="badge bg-{{ $color }}" role="button" data-bs-toggle="modal"
                                                data-bs-target="#verifModal{{ $item->id }}">
                                                {{ $item->status }}
                                            </span>

                                            @if ($item->status === 'Dicairkan' && $item->pencairan)
                                                <div class="text-white small">({{ $item->pencairan->tanggal }})</div>
                                            @endif
                                        </td>

                                        <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                        <td>
                                            <!-- Button Modal -->
                                            <button class="btn btn-grd-primary  btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#ketModal{{ $item->id }}">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                            <div class="modal fade" id="ketModal{{ $item->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-bottom-0 py-2">
                                                            <h5 class="modal-title">Keterangan</h5>
                                                            <a href="javascript:;" class="primaery-menu-close"
                                                                data-bs-dismiss="modal">
                                                                <i class="material-icons-outlined">close</i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $item->keterangan ?? 'Tidak ada keterangan.' }}
                                                        </div>
                                                        <div class="modal-footer border-top-0">
                                                            <button type="button" class="btn btn-grd-danger"
                                                                data-bs-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('admin.bantuan_penerima.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            @if ($item->status !== 'Dicairkan')
                                                <form action="{{ route('admin.bantuan_penerima.destroy', $item->id) }}"
                                                    method="POST" style="display:inline;"
                                                    onsubmit="return confirm('Hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            @else
                                                <button class="btn btn-sm btn-secondary" disabled>
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Modal Verifikasi Status -->
                                    <div class="modal fade" id="verifModal{{ $item->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0 py-2">
                                                    <h5 class="modal-title">Keterangan</h5>
                                                    <a href="javascript:;" class="primaery-menu-close"
                                                        data-bs-dismiss="modal">
                                                        <i class="material-icons-outlined">close</i>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('admin.bantuan_penerima.verifikasi', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header border-bottom-0 py-2">
                                                            <h5 class="modal-title">Verifikasi Status</h5>

                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($item->status === 'Dicairkan')
                                                                <p class="text-white">Data sudah dicairkan dan tidak bisa
                                                                    diverifikasi ulang.</p>
                                                            @else
                                                                <div class="mb-3">
                                                                    <label for="status">Ubah Status</label>
                                                                    <select name="status" class="form-control" required>
                                                                        @foreach (['Diajukan', 'Disetujui', 'Dicairkan'] as $s)
                                                                            <option value="{{ $s }}"
                                                                                {{ $item->status === $s ? 'selected' : '' }}>
                                                                                {{ $s }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="modal-footer border-top-0">
                                                            @if ($item->status !== 'Dicairkan')
                                                                <button type="submit"
                                                                    class="btn btn-success">Simpan</button>
                                                            @endif
                                                            <button type="button" class="btn btn-grd-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Modal Keterangan -->
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
    </main>
@endsection
