<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (!empty($settings['logo']))
        <link rel="icon" href="{{ asset('storage/' . $settings['logo']) }}" type="image/png">
    @else
        <link rel="icon" href="{{ asset('user/images/logo.png') }}" type="image/png">
    @endif

    <title>Sistem Informasi Desa Fatukona</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">

    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <! </head>

<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="left">
            <span><i class="fa fa-phone"></i> 0471563410</span>
            <span><i class="fa fa-envelope"></i> pengaduan@sukaraya.luwuutarakab.go.id</span>
        </div>
        <div class="right">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-telegram"></i>
            <i class="fab fa-x-twitter"></i>
            <i class="fab fa-whatsapp"></i>
            <i class="fab fa-youtube"></i>
        </div>
    </div>

    <!-- Header -->
    <div class="header container-fluid">
        <div class="header-left">
            @if (!empty($settings['logo']))
                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" style="height: 60px;">
            @else
                <img src="{{ asset('user/images/logo.png') }}" alt="Logo Default" style="height: 60px;">
            @endif

            <div>
                <h1><span class="typing-header">SISTEM INFORMASI
                        {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}</span></h1>
                <p style="font-size: 10px">{{ $settings['alamat_desa'] ?? 'Kec. Takari Kab. Kupang' }}</p>
            </div>
        </div>


    </div>

    <!-- Navbar (desktop) -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="/"> <i class="fas fa-home me-1"></i> </a></li>


                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/sejarah">Sejarah</a></li>
                            <li><a class="dropdown-item" href="/visimisi">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="/struktur">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown">Pemerintah Desa</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pemerintah-desa/bpd">BPD</a></li>
                            <li><a class="dropdown-item" href="/pemerintah-desa/linmas">Linmas</a></li>
                            <li><a class="dropdown-item" href="/pemerintah-desa/pegawai">Pegawai Desa</a></li>
                            <li><a class="dropdown-item" href="/pemerintah-desa/pkk">PKK</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/apbd">APBD Desa</a></li>

                    <li class="nav-item"><a class="nav-link" href="/statistik">Statistik</a></li>

                    <li class="nav-item"><a class="nav-link" href="/lapak">Lapak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="container">
            @if (!empty($settings['logo']))
                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" style="max-height: 80px;">
            @else
                <img src="{{ asset('user/images/logo.png') }}" alt="Logo Default" style="max-height: 80px;">
            @endif

            <h3>
                <span class="typing-hero">
                    SISTEM INFORMASI {{ strtoupper($settings['nama_desa'] ?? 'DESA') }}
                </span>
            </h3>
            <p>{{ $settings['alamat_desa'] ?? 'Alamat belum diatur' }}</p>

            {{-- <div class="input-group w-75 mx-auto mt-4">
                <input type="text" class="form-control" placeholder="Cari...">
                <button class="btn btn-warning">Cari</button>
            </div> --}}

            <!-- Quick Menu -->
            <div class="row mt-4 g-3 justify-content-center quick-menu">
                <a href="/peta" class="col-4 col-md-1 text-decoration-none text-dark">
                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/marker.png" alt="Peta Desa" />
                            <div class="small mt-2" style="font-size: 11px;">Peta Desa</div>
                        </div>
                    </div>
                </a>
                <a href="/produk-hukum" class="col-4 col-md-1 text-decoration-none text-dark">

                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/scales.png" alt="Produk Hukum" />
                            <div class="small mt-2" style="font-size: 11px;">Produk Hukum</div>
                        </div>
                    </div>
                </a>
                <a href="/informasi-publik" class="col-4 col-md-1 text-decoration-none text-dark">
                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/megaphone.png" alt="Informasi Publik" />
                            <div class="small mt-2" style="font-size: 11px;">Informasi Publik</div>
                        </div>
                    </div>
                </a>
                <a href="/berita" class="col-4 col-md-1 text-decoration-none text-dark">
                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/news.png" alt="Berita" />
                            <div class="small mt-2" style="font-size: 11px;">Berita</div>
                        </div>
                    </div>
                </a>
                <a href="/galeri" class="col-4 col-md-1 text-decoration-none text-dark">

                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/picture.png" alt="Galeri" />
                            <div class="small mt-2" style="font-size: 11px;">Galeri</div>
                        </div>
                    </div>
                </a>
                <a href="/pengaduan" class="col-4 col-md-1 text-decoration-none text-dark">

                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/complaint.png" alt="Pengaduan" />
                            <div class="small mt-2" style="font-size: 11px;">Pengaduan</div>
                        </div>
                    </div>
                </a>
                <a href="/pembangunan" class="col-4 col-md-1 text-decoration-none text-dark">

                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/info--v1.png" alt="Pembangunan" />
                            <div class="small mt-2" style="font-size: 11px;">Pembangunan</div>
                        </div>
                    </div>
                </a>
                <a href="/bantuan" class="col-4 col-md-1 text-decoration-none text-dark">

                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/money-bag.png" alt="Penerima Bantuan" />
                            <div class="small mt-2" style="font-size: 11px;">Penerima Bantuan</div>
                        </div>
                    </div>
                </a>
                <a href="/realisasi" class="col-4 col-md-1 text-decoration-none text-dark">

                    <div class="col-4 col-md-1">
                        <div class="card p-2 text-center">
                            <img src="https://img.icons8.com/color/32/000000/budget.png" alt="APBD Desa" />
                            <div class="small mt-2" style="font-size: 11px;">APBD Desa</div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>


    @yield('content')



    <!-- Footer -->
    <footer class="footer bg-dark text-light pt-5 pb-3">
        <div class="container">
            <div class="row">
                <!-- Info Desa -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold text-warning">{{ $settings['nama_desa'] ?? 'Nama Desa' }}</h5>
                    <p class="mb-1">{{ $settings['alamat_desa'] ?? 'Jl. Andi Makkasau No.12' }}</p>
                    {{-- <p class="mb-0">{{ $settings['kecamatan'] ?? 'Takari, Kabupaten Kupang' }}</p> --}}
                </div>

                <!-- Kontak -->
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold text-warning">Hubungi Kami</h6>
                    <p class="mb-1"><i class="bi bi-telephone-fill"></i> 047536140</p>
                    <p class="mb-0"><i class="bi bi-envelope-fill"></i> desa@mail.com</p>
                </div>

                <!-- Sosial Media -->
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold text-warning">Ikuti Kami</h6>
                    <div class="d-flex gap-3 mb-3">
                        <a href="#" class="text-light fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-light fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-light fs-5"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold text-warning">Lokasi Kami</h6>
                    <div class="ratio ratio-4x3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.3142549009794!2d123.97260837229051!3d-9.907763384072986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c55db7327c0e933%3A0x81f31f05ebc40dfa!2sKantor%20Desa%20Fatukona!5e0!3m2!1sid!2sid!4v1757939554472!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <hr class="border-light mt-4 mb-2">

            <div class="text-center small">
                © <?php echo date('Y'); ?> <span class="text-warning">Sistem Informasi Desa Fatukona</span> | All Rights
                Reserved
            </div>
        </div>
    </footer>


    <!-- Tambahkan Bootstrap Icons (kalau belum ada) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Bottom Nav (mobile only) -->
    <!-- Bottom Navigation with Flowing Animation -->
    <div class="bottom-nav d-lg-none">
        <div class="nav-indicator"></div> <!-- indikator mengalir -->
        <a href="/" class="nav-item active" data-index="0">
            <i class="fa fa-home"></i><span>Beranda</span>
        </a>
        <a href="/peta" class="nav-item" data-index="1">
            <i class="fa fa-map"></i><span>Peta</span>
        </a>
        <a href="#" class="nav-item" data-index="2" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
            <i class="fa fa-bars"></i><span>Menu</span>
        </a>
        <a href="/login" class="nav-item" data-index="3">
            <i class="fa fa-sign-in-alt"></i><span>Login</span>
        </a>
        <a href="/galeri" class="nav-item" data-index="4">
            <i class="fa fa-image"></i><span>Galeri</span>
        </a>
    </div>

    <!-- Offcanvas Sidebar for Mobile Menu (tetap sama) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header bg-success text-white">
            <h5 class="offcanvas-title">Menu Desa</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="/sejarah">Sejarah</a></li>
                        <li><a class="dropdown-item" href="/visimisi">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="/struktur">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pemerintah Desa</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/pemerintah-desa/bpd">BPD</a></li>
                        <li><a class="dropdown-item" href="/pemerintah-desa/linmas">Linmas</a></li>
                        <li><a class="dropdown-item" href="/pemerintah-desa/pegawai">Pegawai Desa</a></li>
                        <li><a class="dropdown-item" href="/pemerintah-desa/pkk">PKK</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="/apbd">APBD Desa</a></li>
                <li class="nav-item"><a class="nav-link" href="/statistik">Statistik</a></li>
                <li class="nav-item"><a class="nav-link" href="/lapak">Lapak</a></li>
                <li class="nav-item"><a class="nav-link" href="/galeri">Galeri</a></li>
            </ul>
        </div>
    </div>

    <!-- CSS -->
    <style>
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #fff;
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.1);
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 5px 0;
            z-index: 1030;
        }

        .bottom-nav a {
            text-align: center;
            flex: 1;
            position: relative;
            text-decoration: none;
            color: #555;
            transition: color 0.3s;
            font-weight: 500;
            padding: 10px 0;
        }

        .bottom-nav a i {
            display: block;
            font-size: 22px;
            transition: transform 0.3s, color 0.3s;
        }

        .bottom-nav a span {
            font-size: 12px;
            display: block;
            transition: color 0.3s;
        }

        .bottom-nav a:hover i {
            transform: translateY(-5px);
            color: #ffffff;
        }

        .bottom-nav a:hover span {
            color: #ffffff;
        }

        /* Indicator for Flowing Animation */
        .nav-indicator {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 20%;
            height: 4px;
            background: #075c6d;
            border-radius: 4px 4px 0 0;
            transition: left 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }
    </style>

    <!-- JS for Flow Animation -->
    <script>
        const navItems = document.querySelectorAll('.bottom-nav .nav-item');
        const indicator = document.querySelector('.nav-indicator');

        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                navItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');

                // hitung posisi indikator
                const index = item.dataset.index;
                indicator.style.left = `${index * 20}%`;
            });
        });
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle navbar from bottom menu (mobile)
        document.getElementById("menuBtn").addEventListener("click", function(e) {
            e.preventDefault();
            document.querySelector("nav.navbar-custom").style.display =
                document.querySelector("nav.navbar-custom").style.display === "block" ? "none" : "block";
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#produkHukumTable').DataTable({
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "→",
                        previous: "←"
                    },
                    emptyTable: "Tidak ada data tersedia"
                }
            });
        });
    </script>
</body>

</html>
