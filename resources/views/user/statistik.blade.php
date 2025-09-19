@extends('user.layouts.main')

@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-4 text-center">{{ $title }}</h2>

        {{-- Tabs --}}
        <ul class="nav nav-tabs mb-4" id="statistikTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#jk" role="tab">Jenis Kelamin</a>
            </li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#umur" role="tab">Umur</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#pekerjaan" role="tab">Pekerjaan</a>
            </li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#agama" role="tab">Agama</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#pendidikan" role="tab">Pendidikan</a>
            </li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#perkawinan" role="tab">Perkawinan</a>
            </li>
        </ul>

        <div class="tab-content">
            {{-- Jenis Kelamin --}}
            <div class="tab-pane fade show active" id="jk" role="tabpanel">
                <h4 class="mb-3">Statistik Jenis Kelamin</h4>
                <div class="chart-container mb-4">
                    <canvas id="jkChart"></canvas>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jk as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Umur --}}
            <div class="tab-pane fade" id="umur" role="tabpanel">
                <h4 class="mb-3">Statistik Umur</h4>
                <div class="chart-container mb-4">
                    <canvas id="umurChart"></canvas>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Umur</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umur as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pekerjaan --}}
            <div class="tab-pane fade" id="pekerjaan" role="tabpanel">
                <h4 class="mb-3">Statistik Pekerjaan</h4>
                <div class="chart-container mb-4">
                    <canvas id="pekerjaanChart"></canvas>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Pekerjaan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pekerjaan as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Agama --}}
            <div class="tab-pane fade" id="agama" role="tabpanel">
                <h4 class="mb-3">Statistik Agama</h4>
                <div class="chart-container mb-4">
                    <canvas id="agamaChart"></canvas>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Agama</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agama as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pendidikan --}}
            <div class="tab-pane fade" id="pendidikan" role="tabpanel">
                <h4 class="mb-3">Statistik Pendidikan</h4>
                <div class="chart-container mb-4">
                    <canvas id="pendidikanChart"></canvas>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Pendidikan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendidikan as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Perkawinan --}}
            <div class="tab-pane fade" id="perkawinan" role="tabpanel">
                <h4 class="mb-3">Statistik Perkawinan</h4>
                <div class="chart-container mb-4">
                    <canvas id="perkawinanChart"></canvas>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Status Perkawinan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perkawinan as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartData = {
            jk: @json($jk),
            umur: @json($umur),
            pekerjaan: @json($pekerjaan),
            agama: @json($agama),
            pendidikan: @json($pendidikan),
            perkawinan: @json($perkawinan)
        };

        function getRandomColors(length) {
            const colors = [];
            for (let i = 0; i < length; i++) {
                const r = Math.floor(Math.random() * 200) + 30; // avoid too light colors
                const g = Math.floor(Math.random() * 200) + 30;
                const b = Math.floor(Math.random() * 200) + 30;
                colors.push(`rgba(${r}, ${g}, ${b}, 0.7)`);
            }
            return colors;
        }

        function renderChart(id, labels, data, type = 'bar') {
            const ctx = document.getElementById(id).getContext('2d');

            return new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah',
                        data: data,
                        backgroundColor: getRandomColors(labels.length),
                        borderColor: 'rgba(0, 0, 0, 0.1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        duration: 800,
                        easing: 'easeOutQuart'
                    },
                    plugins: {
                        legend: {
                            display: type === 'pie',
                            position: 'bottom',
                            labels: {
                                font: {
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            enabled: true,
                            mode: 'nearest',
                            intersect: false,
                        }
                    },
                    scales: type === 'bar' ? {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    } : {}
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            renderChart('jkChart', Object.keys(chartData.jk), Object.values(chartData.jk), 'pie');
            renderChart('umurChart', Object.keys(chartData.umur), Object.values(chartData.umur));
            renderChart('pekerjaanChart', Object.keys(chartData.pekerjaan), Object.values(chartData.pekerjaan));
            renderChart('agamaChart', Object.keys(chartData.agama), Object.values(chartData.agama));
            renderChart('pendidikanChart', Object.keys(chartData.pendidikan), Object.values(chartData.pendidikan));
            renderChart('perkawinanChart', Object.keys(chartData.perkawinan), Object.values(chartData.perkawinan));
        });
    </script>

    <style>
        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
            max-width: 100%;
        }

        table {
            font-size: 14px;
        }

        h4 {
            color: #333;
        }
    </style>
@endsection
