@extends('admin.layouts.main')
@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="page-breadcrumb mb-3 d-flex justify-content-between align-items-center">
                <h4>{{ $title }}</h4>
                <a href="{{ route('admin.surat_template.create') }}" class="btn btn-primary"><i
                        class="bi bi-plus-circle me-1"></i> Tambah</a>
            </div>



            <div class="card">
                <div class="card-body table-responsive">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Surat</th>
                                <th>Isi Template</th>
                                <th>Nomor Format</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($templates as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_surat }}</td>
                                    <td>{!! Str::limit($item->isi_template, 2000, '...') !!}</td>
                                    <td><code>{{ $item->nomor_format }}</code></td>
                                    <td>
                                        <a href="{{ route('admin.surat_template.edit', $item->id_template) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('admin.surat_template.destroy', $item->id_template) }}"
                                            method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($templates->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
