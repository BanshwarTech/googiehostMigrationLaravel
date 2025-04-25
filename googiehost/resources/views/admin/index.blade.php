<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('images/favicon.png') }}" rel="icon">
    <link href="{{ asset('images/favicon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('login-background-img.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-floating .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .card {
            backdrop-filter: blur(5px) brightness(0.8) contrast(1.2);
            background-color: rgba(65, 48, 30, 0.5);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .message {
            font-size: 12px;
            margin-bottom: -13px;
            color: red;
            font-weight: bold;
        }
    </style>


</head>

<body>

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="{{ route('admin.index') }}" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('images/logo.png') }}" alt="" style="max-height: 35px;">
                        </a>
                    </div>

                    <div class="card">
                        <div class="card-body m-2">
                            <div class=" pb-2">
                                <h5 class="card-title fs-4 text-light"><span>Welcome Back
                                        &#128075;</span><br>Continue to Your Account</h5>

                            </div>
                            <form method="post" action="" class="row g-3 pb-2">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating ">
                                        <input type="email" class="form-control form-control-sm" id="floatingInput"
                                            name="email" placeholder="name@example.com">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    @error('email')
                                        <div class=" message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <input type="password" class="form-control form-control-sm" id="passwordInput"
                                            placeholder="Password" name="password">
                                        <label for="passwordInput">Password</label>
                                        <span class="eye-icon" onclick="togglePassword()">
                                            <i id="toggleIcon" class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <div class=" message pb-0 ">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                            name="remember" checked>
                                        <label class="form-check-label text-light" for="flexSwitchCheckChecked">Remember
                                            me</label>
                                    </div>

                                    @error('remember')
                                        <div class=" message" style="font-size: 12px;">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn-md w-100" type="submit"
                                        style="background-color:#6b46f2;">CONTINUE <i
                                            class="bx bxs-chevron-right"></i></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Toast Container -->
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <!-- Position the toast at the top right of the screen -->
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <!-- Success Toast -->
            @if (session('success'))
                <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-delay="3000">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Error Toast -->
            @if (session('error'))
                <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-delay="3000">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="{{ asset('public/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('public/assets/js/main.js') }}"></script>

    <!-- JavaScript to Auto-Show Toasts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElements = document.querySelectorAll('.toast');
            toastElements.forEach(function(toastElement) {
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            });
        });

        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('toggleIcon');
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            toggleIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
        }
    </script>
</body>

</html>
