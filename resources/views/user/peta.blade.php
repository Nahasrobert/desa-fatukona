@extends('user.layouts.main')
@section('content')
    <div class="container my-5">
        <h2 class="fw-bold mb-3">Peta {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</h2>

        <div id="map" style="height: 500px; width: 100%;"></div>

        {{-- <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Kembali</a>
        </div> --}}
    </div>

    {{-- Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fatukonaLatLng = [-9.909579, 123.991667]; // ganti sesuai koordinat asli

            const map = L.map('map').setView(fatukonaLatLng, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker(fatukonaLatLng).addTo(map)
                .bindPopup('<b>Fatukona</b><br>Lokasi Desa Fatukona.')
                .openPopup();
        });
    </script>
@endsection
