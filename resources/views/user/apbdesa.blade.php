@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4 text-center">{{ $title }}</h2>

        <div class="row">
            {{-- Sidebar Tab (Tahun) --}}
            <div class="col-md-3 mb-3">
                <div class="nav flex-column nav-pills shadow-sm p-2 bg-light rounded" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    @foreach ($tahunList as $index => $tahun)
                        <a class="nav-link {{ $index === 0 ? 'active' : '' }}" id="tab-{{ $tahun->tahun }}"
                            data-bs-toggle="pill" href="#content-{{ $tahun->tahun }}" role="tab">
                            <strong>{{ $tahun->tahun }}</strong>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Content Tab --}}
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach ($dataPerTahun as $tahun => $items)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ $tahun }}"
                            role="tabpanel">
                            <h4 class="mb-4 text-info">Tahun {{ $tahun }}</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>Bidang</th>
                                            <th>Anggaran (Rp)</th>
                                            <th>Realisasi (Rp)</th>
                                            <th>Persentase (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalAnggaran = 0;
                                            $totalRealisasi = 0;
                                        @endphp

                                        @foreach ($items as $item)
                                            @php
                                                $persentase =
                                                    $item->anggaran > 0
                                                        ? round(($item->realisasi / $item->anggaran) * 100, 2)
                                                        : 0;
                                                $totalAnggaran += $item->anggaran;
                                                $totalRealisasi += $item->realisasi;
                                            @endphp
                                            <tr>
                                                <td>{{ $item->bidang }}</td>
                                                <td class="text-end">{{ number_format($item->anggaran, 2, ',', '.') }}</td>
                                                <td class="text-end">{{ number_format($item->realisasi, 2, ',', '.') }}
                                                </td>
                                                <td class="text-center">{{ $persentase }}%</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="fw-bold bg-light">
                                        @php
                                            $totalPersentase =
                                                $totalAnggaran > 0
                                                    ? round(($totalRealisasi / $totalAnggaran) * 100, 2)
                                                    : 0;
                                        @endphp
                                        <tr>
                                            <td class="text-center">TOTAL</td>
                                            <td class="text-end text-success">
                                                {{ number_format($totalAnggaran, 2, ',', '.') }}</td>
                                            <td class="text-end text-success">
                                                {{ number_format($totalRealisasi, 2, ',', '.') }}</td>
                                            <td class="text-center text-success">{{ $totalPersentase }}%</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <style>
        .nav-pills .nav-link {
            margin-bottom: 5px;
            font-size: 16px;
            border-radius: 0.3rem;
            transition: all 0.2s ease-in-out;
        }

        .nav-pills .nav-link.active {
            background-color: #1c3a67;
            color: #fff;
            font-weight: bold;
        }

        h4 {
            border-bottom: 2px solid #1c3a67;
            padding-bottom: 5px;
        }

        table th,
        table td {
            vertical-align: middle !important;
        }
    </style>
@endsection
