@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <!-- Breadcrumb -->
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
                        <a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Tambah
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <h6 class="mb-0 text-uppercase">Data Kartu Keluarga & Anggota</h6>
            <hr>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kkList as $index => $kk)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $kk->no_kk }}</td>
                                        <td>{{ $kk->kepala_keluarga }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-grd-primary text-white" data-bs-toggle="modal"
                                                data-bs-target="#modalKK{{ $kk->id_kk }}">
                                                <i class="bi bi-people-fill"></i> Lihat Anggota
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- MODALS --}}
                        @foreach ($kkList as $kk)
                            <div class="modal fade" id="modalKK{{ $kk->id_kk }}">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0 py-2 bg-grd-primary">
                                            <h5 class="modal-title">Kepala Keluarga {{ $kk->kepala_keluarga }}<br>
                                                NO KK {{ $kk->no_kk }}</h5>


                                            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                                <i class="material-icons-outlined">close</i>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Tempat Lahir</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th>Hubungan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($kk->penduduks as $i => $penduduk)
                                                            <tr>
                                                                <td>{{ $i + 1 }}</td>
                                                                <td>{{ $penduduk->nik }}</td>
                                                                <td>{{ $penduduk->nama }}</td>
                                                                <td>{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                                </td>
                                                                <td>{{ $penduduk->tempat_lahir ?? '-' }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y') ?? '-' }}
                                                                </td>
                                                                <td>{{ $penduduk->hubungan_keluarga ?? '-' }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.penduduk.show', $penduduk->id_penduduk) }}"
                                                                        class="btn btn-sm btn-info" title="Lihat">
                                                                        <i class="bi bi-eye"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.penduduk.edit', $penduduk->id_penduduk) }}"
                                                                        class="btn btn-sm btn-warning" title="Edit">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('admin.penduduk.destroy', $penduduk->id_penduduk) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                            onclick="return confirm('Hapus data ini?')"
                                                                            title="Hapus">
                                                                            <i class="bi bi-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="8" class="text-center">Tidak ada anggota
                                                                    keluarga.</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0">
                                            <button type="button" class="btn btn-grd-danger"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- END MODALS --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
