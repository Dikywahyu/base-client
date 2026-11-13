<!DOCTYPE html>
<html lang="id" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="https://cwcu.ac.id/theme/assets/img/logo2.png" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('dist/assets/css/styles.css') }}" />

    <title>Login SSO - Aplikasi Client</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('dist/assets/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <div id="main-wrapper" class="auth-customizer-none">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-5 col-xxl-3 auth-card">
                        <div class="card mb-0 shadow-sm">
                            <div class="card-body p-4 p-sm-5">

                                <!-- Logo Aplikasi -->
                                <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                    <img src="https://cwcu.ac.id/theme/assets/img/logo.png" class="dark-logo" alt="Logo-Dark" />
                                    <img src="https://cwcu.ac.id/theme/assets/img/logo.png" class="light-logo" alt="Logo-light" />
                                </a>

                                <div class="text-center mb-4">
                                    <h5 class="fw-semibold mb-1">Selamat Datang</h5>
                                    <p class="text-muted fs-3 mb-0">Silakan masuk menggunakan akun terpusat kampus</p>
                                </div>

                                <!-- Alert Pesan Error/Sukses jika ada -->
                                @if(session('error'))
                                <div class="alert alert-danger fs-3 py-2 px-3 mb-4" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif

                                @if(session('success'))
                                <div class="alert alert-success fs-3 py-2 px-3 mb-4" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <!-- Tombol Utama Login SSO IAM -->
                                <a href="{{ route('sso.redirect') }}" class="btn btn-primary w-100 py-8 mb-3 rounded-2 d-flex align-items-center justify-content-center fw-semibold fs-4">
                                    <iconify-icon icon="solar:shield-keyhole-bold-duotone" class="fs-6 me-2"></iconify-icon>
                                    Masuk dengan Akun IAM Pusat
                                </a>



                                <div class="text-center mt-3">
                                    <p class="fs-2 text-muted mb-0">
                                        Gunakan kredensial email institusi atau akun Google yang terdaftar pada server IAM.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Js Files -->
    <script src="{{ asset('dist/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('dist/assets/js/theme/theme.js') }}"></script>
    <script src="{{ asset('dist/assets/js/theme/app.min.js') }}"></script>

    <!-- Solar Icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>