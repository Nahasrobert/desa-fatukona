@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">{{ $title }}</h6>
                <a href="{{ route('admin.kk.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Tambah
                </a>
            </div>
            <h6 class="mb-0 text-uppercase">Data Kartu Keluarga</h6>
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
                                    <th>Alamat</th>
                                    <th>Wilayah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->no_kk }}</td>
                                        <td>{{ $item->kepala_keluarga }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            RT {{ $item->rt }}/RW {{ $item->rw }}<br>
                                            {{ $item->desa }}, {{ $item->kecamatan }}<br>
                                            {{ $item->kabupaten }}, {{ $item->provinsi }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.kk.edit', $item->id_kk) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.kk.destroy', $item->id_kk) }}" method="POST"
                                                style="display:inline-block;" onsubmit="return confirm('Hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if ($data->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
