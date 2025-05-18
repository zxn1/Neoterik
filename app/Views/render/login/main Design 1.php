<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?= base_url() ?>neoterik/img/logo_srsb.png">
    <title>
        SEKOLAH RENDAH SERI BUDIMAN
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/b009cf6a3e.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Overwrite template css -->
    <style>
        .ms-n6 {
            margin-left: -5rem !important;
        }

        .main-content {
            background: linear-gradient(to right, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8)), 
                        url('<?= base_url('neoterik/img/assets/kabg.png') ?>');
            background-size: cover;
            background-position: center;
        }

        .login-card {
            border-radius: 15px;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .card-header-bg {
            background: linear-gradient(to right, #5e72e4, #825ee4);
            height: 8px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .school-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .school-logo:hover {
            transform: scale(1.1);
        }

        .input-group {
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .input-group:focus-within {
            box-shadow: 0 5px 15px rgba(94, 114, 228, 0.15);
        }

        .input-group-text {
            border-radius: 10px 0 0 10px !important;
            background-color: #f8f9fa !important;
            border: none;
            color: #5e72e4;
            padding-left: 15px;
            padding-right: 15px;
        }

        .form-control {
            border-radius: 0 10px 10px 0 !important;
            border: none;
            padding: 12px 15px !important;
            font-size: 14px;
            height: auto;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            background-color: #fff;
            box-shadow: none;
            border-color: transparent;
        }

        .btn-login {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(94, 114, 228, 0.3);
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(94, 114, 228, 0.4);
        }

        .footer-text {
            font-size: 10px;
            color: #8392ab;
            margin-top: 15px;
        }

        .card-separator {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.1), transparent);
            margin: 20px 0;
        }

        .login-title {
            font-size: 20px;
            font-weight: 700;
            color: #344767;
            margin-bottom: 5px;
        }

        .login-subtitle {
            font-size: 12px;
            color: #8392ab;
            margin-bottom: 25px;
        }

        .bg-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(94, 114, 228, 0.05), rgba(130, 94, 228, 0.05));
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            top: -150px;
            right: -50px;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            bottom: -100px;
            left: -50px;
        }

        .register-link {
            color: #5e72e4;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-link:hover {
            color: #825ee4;
            text-decoration: none;
        }

        .typing-effect {
            border-right: 2px solid #5e72e4;
            white-space: nowrap;
            overflow: hidden;
            animation: typing 3.5s steps(30, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #5e72e4 }
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #8392ab;
            z-index: 10;
        }

        .password-toggle:hover {
            color: #5e72e4;
        }

        .password-wrapper {
            position: relative;
        }

        .login-waves {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15%;
            min-height: 100px;
            z-index: -1;
        }

        .waves {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNDQwIDMyMCI+PHBhdGggZmlsbD0icmdiYSg5NCwgMTE0LCAyMjgsIDAuMSkiIGQ9Ik0wLDMyMEwxNDQwLDMyMEwxNDQwLDE2MEMxMDgwLDI0MCw3MjAsODAsNTQwLDgwQzM2MCw4MCwxODAsMTYwLDAsMTYwTDAsMzIwWiI+PC9wYXRoPjxwYXRoIGZpbGw9InJnYmEoOTQsIDExNCwgMjI4LCAwLjA1KSIgZD0iTTAsMzIwTDE0NDAsMzIwTDE0NDAsMjQwQzEwODAsMzIwLDcyMCwxNjAsNTQwLDE2MEMzNjAsMTYwLDE4MCwyNDAsMCwyNDBMMCwzMjBaIj48L3BhdGg+PC9zdmc+');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <main class="main-content mt-0">
        <div class="bg-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        <div class="login-waves">
            <div class="waves"></div>
        </div>
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="login-card animate__animated animate__fadeIn">
                                <div class="card-header-bg"></div>
                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        <img src="<?= base_url('neoterik/img/logo_srsb.png') ?>" class="school-logo mb-2 animate__animated animate__pulse animate__infinite animate__slower">
                                        <div class="typing-effect mx-auto" style="width: fit-content;">
                                            <h6 class="mb-0 text-secondary">SEKOLAH RENDAH SERI BUDIMAN</h6>
                                        </div>
                                    </div>
                                    
                                    <h4 class="login-title text-center">Selamat Datang</h4>
                                    <p class="login-subtitle text-center">Masukkan maklumat log masuk anda untuk teruskan</p>
                                    
                                    <form method="post" action="<?= site_url('login/attempt_login'); ?>" id="login-form" class="smart-form client-form">
                                        <?= csrf_field() ?>
                                        
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control" id="um_username" name="um_username" placeholder="Nama Pengguna" required>
                                        </div>
                                        <div class="invalid-feedback mb-3">
                                            <?= session('errors.login') ?>
                                        </div>
                                        
                                        <div class="password-wrapper">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" id="um_password" name="um_password" placeholder="Kata Laluan" required>
                                            </div>
                                            <span class="password-toggle" id="togglePassword">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </div>
                                        <div class="invalid-feedback mb-3">
                                            <?= session('errors.password') ?>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                                <label class="form-check-label text-sm" for="rememberMe">Ingat saya</label>
                                            </div>
                                            <a href="#" class="text-sm text-primary">Lupa kata laluan?</a>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-login w-100 mb-3">
                                            <span id="loginText">Log Masuk</span>
                                            <span id="loadingSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                        </button>
                                        
                                        <div class="card-separator"></div>
                                        
                                        <div class="text-center">
                                            <p class="text-sm mb-0">
                                                Tidak mempunyai akaun?
                                                <a href="<?= site_url('register') ?>" class="register-link">Daftar sekarang</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-center footer-text pb-3">
                                    <p class="mb-0">Universiti Pendidikan Sultan Idris © 2024<br>
                                    Gambar: Kompleks Akademik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        
        // Password toggle visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('um_password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Login button loading state
        document.getElementById('login-form').addEventListener('submit', function() {
            document.getElementById('loginText').textContent = 'Sedang log masuk...';
            document.getElementById('loadingSpinner').classList.remove('d-none');
        });
        
        // Form validation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
        
        // Auto focus on first input
        window.addEventListener('load', function() {
            document.getElementById('um_username').focus();
        });
    </script>

    <!-- fail message -->
    <?php if (session('swal_fail')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: "<?= session('swal_fail') ?>",
                timer: 3000,
                showConfirmButton: false,
                customClass: {
                    popup: 'animate__animated animate__fadeInDown'
                }
            });
        </script>
    <?php endif; ?>
</body>

</html>