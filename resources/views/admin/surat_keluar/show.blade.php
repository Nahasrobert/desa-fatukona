@extends('admin.layouts.main')

@section('content')
    <h1>Detail Surat Keluar</h1>

    <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
    <p><strong>Data JSON:</strong> {{ json_encode($surat->data_json) }}</p>
    <!-- tampilkan data lain sesuai kebutuhan -->

    {{-- <a href="{{ route('surat_keluar.index') }}">Kembali ke daftar</a> --}}
@endsection
