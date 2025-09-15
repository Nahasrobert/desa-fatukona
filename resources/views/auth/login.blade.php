<!doctype html>
<html lang="id" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Admin</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('adminx/assets/images/favicon-32x32.png') }}" type="image/png">

    <!-- loader -->
    <link href="{{ asset('adminx/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('adminx/assets/js/pace.min.js') }}"></script>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/notifications/css/lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminx/assets/plugins/metismenu/mm-vertical.css') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminx/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('adminx/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('adminx/sass/responsive.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Authentication Wrapper -->
    <div class="auth-basic-wrapper d-flex align-items-center justify-content-left">
        <div class="container-fluid my-5 my-lg-0">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                    <div class="card rounded-4 mb-0 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-5 text-left">
                            {{-- <img src="{{ asset('adminx/assets/images/logo1.png') }}" class="mb-4" width="145"
                                alt="Logo"> --}}
                            <h4 class="fw-bold mb-2">Masuk</h4>
                            <p class="mb-4">Silakan login untuk mengakses adminx</p>

                            <!-- Login Form -->
                            <form class="row g-3" method="POST" action="{{ route('login.attempt') }}" novalidate>
                                @csrf
                                <div class="col-12">
                                    <label for="inputLogin" class="form-label">Email / Username</label>
                                    <input type="text" name="login"
                                        class="form-control @error('login') is-invalid @enderror" id="inputLogin"
                                        placeholder="email atau username" value="{{ old('login') }}" required
                                        autocomplete="username" autofocus>
                                    @error('login')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password"
                                            class="form-control border-end-0 @error('password') is-invalid @enderror"
                                            id="inputChoosePassword" placeholder="Masukkan password" required
                                            autocomplete="current-password">
                                        <button type="button" class="input-group-text bg-transparent">
                                            <i class="bi bi-eye-slash-fill"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Ingat Saya</label>
                                    </div>
                                </div>

                                <div class="col-md-6 text-end">
                                    {{-- Jika menggunakan reset password --}}
                                    {{-- <a href="{{ route('password.request') }}">Lupa Password?</a> --}}
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-grd-primary">Login</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Optional Social Login -->
                            <div class="separator section-padding d-none">
                                <div class="line"></div>
                                <p class="mb-0 fw-bold">ATAU MASUK DENGAN</p>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- end row -->
        </div>
    </div>

    <!-- Plugins JS -->
    <script src="{{ asset('adminx/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('adminx/assets/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminx/assets/js/main.js') }}"></script>

    <!-- Custom Script -->
    <script>
        // Show Lobibox notifications if there is error or success message
        @if ($errors->any())
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bi bi-x-circle',
                position: 'top right',
                msg: '{{ $errors->first() }}'
            });
        @endif

        @if (session('success'))
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bi bi-check-circle',
                position: 'top right',
                msg: '{{ session('success') }}'
            });
        @endif

        // Toggle show/hide password
        (function() {
            const wrapper = document.getElementById('show_hide_password');
            if (!wrapper) return;
            const input = wrapper.querySelector('input');
            const btn = wrapper.querySelector('button');
            const icon = wrapper.querySelector('i');

            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const isPass = input.getAttribute('type') === 'password';
                input.setAttribute('type', isPass ? 'text' : 'password');
                icon.classList.toggle('bi-eye-slash-fill', !isPass);
                icon.classList.toggle('bi-eye-fill', isPass);
            });
        })();
    </script>
</body>

</html>
