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
                        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Tambah
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <h6 class="mb-0 text-uppercase">Data Galeri</h6>
            <hr>

            {{-- @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>File</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galeris as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->tanggal ? $item->tanggal->format('d M Y') : '-' }}</td>

                                        <td>
                                            @if ($item->file)
                                                @if ($item->kategori == 'Foto')
                                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $item->file) }}"
                                                            alt="{{ $item->judul }}" width="100">
                                                    </a>
                                                @else
                                                    <video width="160" controls>
                                                        <source src="{{ asset('storage/' . $item->file) }}"
                                                            type="video/mp4">
                                                        Browser tidak mendukung video.
                                                    </video>
                                                @endif
                                            @else
                                                Tidak ada file
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.galeri.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data galeri.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}

                </div>
            </div>
        </div>
    </main>
@endsection
