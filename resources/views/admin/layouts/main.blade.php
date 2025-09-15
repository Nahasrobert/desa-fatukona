<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- favicon -->
    @if (!empty($settings['logo']))
        <link rel="icon" href="{{ asset('storage/' . $settings['logo']) }}" type="image/png">
    @else
        <link rel="icon" href="{{ asset('user/images/logo.png') }}" type="image/png">
    @endif


    <!-- loader -->
    <link href="{{ asset('adminx/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('adminx/assets/js/pace.min.js') }}"></script>

    <!-- plugins -->
    <link href="{{ asset('adminx/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/assets/plugins/metismenu/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/assets/plugins/metismenu/mm-vertical.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">

    <!-- bootstrap css -->
    <link href="{{ asset('adminx/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- main css -->
    <link href="{{ asset('adminx/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/responsive.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/metismenu/metisMenu.min.css') }}">

    <!-- JS -->
    <script src="{{ asset('adminx/assets/plugins/metismenu/metisMenu.min.js') }}"></script>


</head>

<body>

    <!--start header-->
    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand align-items-center gap-4">
            <div class="btn-toggle">
                <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative">

                    <div class="search-popup p-3">
                        <div class="card rounded-4 overflow-hidden">
                            <div class="card-header d-lg-none">
                                <div class="position-relative">
                                    <input class="form-control rounded-5 px-5 mobile-search-control" type="text"
                                        placeholder="Search">
                                    <span
                                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                    <span
                                        class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                                </div>
                            </div>
                            <div class="card-body search-content">
                                <p class="search-title">Recent Searches</p>
                                <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                    <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>Sass</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                    <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                                            class="material-icons-outlined fs-6">search</i></a>
                                </div>
                                <hr>
                                <p class="search-title">Tutorials</p>
                                <div class="search-list d-flex flex-column gap-2">
                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="list-icon">
                                            <i class="material-icons-outlined fs-5">play_circle</i>
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                                        </div>
                                    </div>
                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="list-icon">
                                            <i class="material-icons-outlined fs-5">shopping_basket</i>
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="list-icon">
                                            <i class="material-icons-outlined fs-5">laptop</i>
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title">Responsive Design</h5>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <p class="search-title">Members</p>

                                <div class="search-list d-flex flex-column gap-2">
                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="assets/images/avatars/01.png" width="32" height="32"
                                                class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="assets/images/avatars/02.png" width="32" height="32"
                                                class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                                        </div>
                                    </div>

                                    <div class="search-list-item d-flex align-items-center gap-3">
                                        <div class="memmber-img">
                                            <img src="assets/images/avatars/03.png" width="32" height="32"
                                                class="rounded-circle" alt="">
                                        </div>
                                        <div class="">
                                            <h5 class="mb-0 search-list-title">Michle Clark</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-center bg-transparent">
                                <a href="javascript:;" class="btn w-100">See All Search Results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                        data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;">
                        <i class="material-icons-outlined">notifications</i>
                        @if ($notifCount > 0)
                            <span class="badge-notify">{{ $notifCount }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                        <div class="notify-list">
                            @forelse($notifications as $notif)
                                <a class="dropdown-item border-bottom py-2"
                                    href="{{ route('admin.surat_keluar.show', $notif->id_surat) }}"
                                    onclick="markAsRead({{ $notif->id_surat }})">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="user-wrapper bg-primary text-primary bg-opacity-10">
                                            <span><i class="material-icons-outlined">mail</i></span>
                                        </div>
                                        <div>
                                            <h5 class="notify-title">
                                                {{ $notif->data_json['NAMA'] ?? 'Nama Tidak Diketahui' }}</h5>
                                            <p class="mb-0 notify-desc">{{ $notif->nomor_surat }}</p>
                                            <p class="mb-0 notify-time">{{ $notif->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="notify-close position-absolute end-0 me-3">
                                            <i class="material-icons-outlined fs-6">close</i>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="dropdown-item text-center text-white">Tidak ada notifikasi baru</p>
                            @endforelse
                        </div>
                    </div>
                </li>

                <script>
                    function markAsRead(id) {
                        fetch(`admin/notifications/mark-read/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                            }
                        }).then(response => {
                            if (response.ok) {
                                location.reload(); // refresh agar badge notifCount berkurang
                            }
                        });
                    }
                </script>

                @auth
                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                            <img src="{{ asset('adminx/assets/images/avatars/01.png') }}"
                                class="rounded-circle p-1 border" width="45" height="45" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                            <a class="dropdown-item gap-2 py-2" href="javascript:;">
                                <div class="text-center">
                                    <img src="{{ asset('adminx/assets/images/avatars/01.png') }}"
                                        class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                                        alt="">
                                    <h5 class="user-name mb-0 fw-bold">
                                        {{ Auth::user()->nama_lengkap ?? Auth::user()->name }}</h5>
                                    <small class="text-muted">{{ Str::ucfirst(Auth::user()->role) }}</small>
                                </div>
                            </a>
                            <hr class="dropdown-divider">

                            <form action="{{ route('logout') }}" method="POST" class="px-3">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2">
                                    <i class="material-icons-outlined">power_settings_new</i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>

        </nav>
    </header>
    <!--end top header-->
    <!--start sidebar-->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <!-- Sidebar Header -->
        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div class="logo-icon">

                    @if (!empty($settings['logo']))
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" style="height: 60px;">
                    @else
                        <img src="{{ asset('user/images/logo.png') }}" alt="Logo Default" style="height: 60px;">
                    @endif
                </div>
                <div class="logo-name ms-2">
                    <h5 class="mb-0">{{ $settings['nama_desa'] ?? 'Nama Desa' }}</h5>
                </div>
            </div>
            <div class="sidebar-close">
                <span class="material-icons-outlined">close</span>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <div class="sidebar-nav">
            <ul class="metismenu" id="sidenavV">

                <!-- Dashboard -->
                <li>
                    <a href="{{ url('admin') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <!-- Data -->
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="material-icons-outlined">widgets</i></div>
                        <div class="menu-title">Data</div>
                    </a>
                    <ul>
                        <li><a href="{{ url('admin/apbdesa') }}"><i
                                    class="material-icons-outlined">arrow_right</i>APBDesa</a></li>
                        <li><a href="{{ url('admin/bantuan') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Jenis Bantuan</a></li>
                        <li><a href="{{ url('admin/bantuan_penerima') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Penerima Bantuan</a></li>
                        <li><a href="{{ url('admin/berita') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Berita</a></li>
                        <li><a href="{{ url('admin/galeri') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Galeri</a></li>
                        <li><a href="{{ url('admin/informasi_publik') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Informasi Publik</a></li>
                        <li><a href="{{ url('admin/inventaris') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Inventaris</a></li>
                        <li><a href="{{ url('admin/lapak') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Lapak</a></li>
                        <li><a href="{{ url('admin/pembangunan') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Pembangunan</a></li>
                        <li><a href="{{ url('admin/pengaduan') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Pengaduan</a></li>
                        <li><a href="{{ url('admin/produk_hukum') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Produk Hukum</a></li>
                        <li><a href="{{ url('admin/surat_template') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Template Surat</a></li>
                        <li><a href="{{ url('admin/settings') }}"><i
                                    class="material-icons-outlined">arrow_right</i>Setting</a></li>
                    </ul>
                </li>

                <!-- Data Penduduk -->
                <li class="menu-label">Data Penduduk</li>
                <li>
                    <a href="{{ url('admin/kk') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">assignment</i></div>
                        <div class="menu-title">Kartu Keluarga</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/penduduk') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">people</i></div>
                        <div class="menu-title">Penduduk</div>
                    </a>
                </li>

                <!-- Data Pegawai -->
                <li class="menu-label">Data Pegawai</li>
                <li>
                    <a href="{{ url('admin/bpd') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">account_balance</i></div>
                        <div class="menu-title">BPD</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/linmas') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">security</i></div>
                        <div class="menu-title">Linmas</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/pemerintahdesa') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">domain</i></div>
                        <div class="menu-title">Pemerintah Desa</div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/pkk') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">group_work</i></div>
                        <div class="menu-title">PKK</div>
                    </a>
                </li>

                <!-- Surat Menyurat -->
                <li class="menu-label">Surat Menyurat</li>
                <li>
                    <a href="{{ url('admin/surat_keluar') }}">
                        <div class="parent-icon"><i class="material-icons-outlined">send</i></div>
                        <div class="menu-title">Surat Keluar</div>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
    <!--end sidebar-->

    <!--start main wrapper-->







    <!--end sidebar-->

    <!--start main wrapper-->

    <!--end breadcrumb-->

    @yield('content')



    <!--end main wrapper-->

    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    <!--start footer-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © <?php echo date('Y'); ?>.{{ $settings['nama_desa'] ?? 'Nama Desa' }} .</p>
    </footer>
    <!--end footer-->

    <!--start cart-->

    <!--end cart-->



    <!--start switcher-->
    <button class="btn btn-grd btn-grd-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
        <i class="material-icons-outlined">tune</i>Customize
    </button>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
        <div class="offcanvas-header border-bottom h-70">
            <div class="">
                <h5 class="mb-0">Theme Customizer</h5>
                <p class="mb-0">Customize your theme</p>
            </div>
            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
                <i class="material-icons-outlined">close</i>
            </a>
        </div>
        <div class="offcanvas-body">
            <div>
                <p>Theme variation</p>

                <div class="row g-3">
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BlueTheme">
                            <span class="material-icons-outlined">contactless</span>
                            <span>Blue</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="LightTheme">
                            <span class="material-icons-outlined">light_mode</span>
                            <span>Light</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="DarkTheme">
                            <span class="material-icons-outlined">dark_mode</span>
                            <span>Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="SemiDarkTheme">
                            <span class="material-icons-outlined">contrast</span>
                            <span>Semi Dark</span>
                        </label>
                    </div>
                    <div class="col-12 col-xl-6">
                        <input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
                        <label
                            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4"
                            for="BoderedTheme">
                            <span class="material-icons-outlined">border_style</span>
                            <span>Bordered</span>
                        </label>
                    </div>
                </div><!--end row-->

            </div>
        </div>
    </div>
    <!--start switcher-->

    <!--bootstrap js-->
    {{-- JS (load jQuery first, then plugins, then app code) --}}
    {{-- jQuery first --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
    <script src="{{ asset('adminx/assets/js/jquery.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="{{ asset('adminx/assets/js/bootstrap.bundle.min.js') }}"></script>

    {{-- DataTables core + Bootstrap 5 integration --}}
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}">
    <script src="{{ asset('adminx/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

    {{-- DataTables Buttons dependencies --}}
    <script src="{{ asset('adminx/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>

    {{-- Other plugins --}}
    <script src="{{ asset('adminx/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>

    {{-- App scripts --}}
    <script src="{{ asset('adminx/assets/js/main.js') }}"></script>


    {{-- Init --}}
    <script>
        $(function() {
            // Basic table
            if ($('#example').length) {
                $('#example').DataTable();
            }

            // Table with Buttons
            if ($('#example2').length) {
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });

                table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            }

            // Optional: init custom scrollbars (pick ONE: Simplebar OR PerfectScrollbar)
            if (typeof PerfectScrollbar !== 'undefined') {
                new PerfectScrollbar('.user-list');
            }
        });
    </script>
    {{-- SweetAlert untuk session sukses --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: @json(session('success')),
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

    {{-- SweetAlert untuk session error --}}
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: @json(session('error')),
                confirmButtonColor: '#d33',
            });
        </script>
    @endif

    {{-- SweetAlert untuk error validasi --}}
    @if ($errors->any())
        <script>
            let errorList = `
            <ul class="text-start" style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `;
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: errorList,
                confirmButtonColor: '#d33',
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#sidenav').metisMenu();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#sidenavV').metisMenu();
        });
    </script>


</body>

</html>
