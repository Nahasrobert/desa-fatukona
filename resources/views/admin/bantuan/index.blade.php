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
                        <a href="{{ route('admin.bantuan.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Tambah
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <h6 class="mb-0 text-uppercase">Data Bantuan</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bantuan</th>
                                    <th>Sumber Dana</th>
                                    <th>Kriteria</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_bantuan }}</td>
                                        <td>{{ $item->sumber_dana }}</td>
                                        <td>{{ $item->kriteria }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <a href="{{ route('admin.bantuan.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.bantuan.destroy', $item->id) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
