@extends('admin.layouts.main')

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">{{ $title }}</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/apbdesa') }}">APBDesa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">Detail Data APBDesa</h6>
            <hr>

            <div class="card">
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Tahun</dt>
                        <dd class="col-sm-9">{{ $item->tahun }}</dd>

                        <dt class="col-sm-3">Bidang</dt>
                        <dd class="col-sm-9">{{ $item->bidang }}</dd>

                        <dt class="col-sm-3">Anggaran (Rp)</dt>
                        <dd class="col-sm-9">{{ number_format($item->anggaran, 0, ',', '.') }}</dd>

                        <dt class="col-sm-3">Realisasi (Rp)</dt>
                        <dd class="col-sm-9">{{ number_format($item->realisasi, 0, ',', '.') }}</dd>

                        <dt class="col-sm-3">% Realisasi</dt>
                        <dd class="col-sm-9">
                            @php $persen = $item->persen; @endphp
                            <span class="badge bg-{{ $persen < 50 ? 'danger' : ($persen < 80 ? 'warning' : 'success') }}">
                                {{ $persen }}%
                            </span>
                            <div class="progress mt-1" style="height:6px;">
                                <div class="progress-bar bg-{{ $persen < 50 ? 'danger' : ($persen < 80 ? 'warning' : 'success') }}"
                                    role="progressbar" style="width: {{ min($persen, 100) }}%;"
                                    aria-valuenow="{{ $persen }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </dd>
                    </dl>

                    <div class="mt-4">
                        <a href="{{ url('admin/apbdesa/' . $item->id . '/edit') }}" class="btn btn-primary">
                            <i data-feather="edit-3"></i> Edit
                        </a>
                        <a href="{{ url('admin/apbdesa') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
