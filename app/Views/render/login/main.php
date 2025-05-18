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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/b009cf6a3e.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />

    <!-- Overwrite template css -->
    <style>
        /* ======= IMPORTS ======= */
        @import url('https://fonts.googleapis.com/css?family=Lato:300,400');
        @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700');

        /* ======= GENERAL STYLES ======= */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        /* ======= TYPOGRAPHY ======= */
        h1 {
            font-family: 'Lato', sans-serif;
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 48px;
        }

        p {
            font-family: 'Lato', sans-serif;
            letter-spacing: 1px;
            font-size: 14px;
            color: #333333;
        }

        .school-name {
            color: white;
            font-weight: 600;
            font-size: 14px;
            margin-top: 10px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .login-title {
            color: #344767;
            font-size: 20px;
            font-weight: 700;
            margin-top: 10px;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .login-title:after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #5e72e4, #825ee4);
            border-radius: 3px;
        }

        .register-link {
            font-size: 13px;
            margin-top: 15px;
            color: #67748e;
        }

        .register-link a {
            font-weight: 600;
            color: #5e72e4;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            color: #825ee4;
            text-decoration: none;
        }

        .footer-text {
            font-size: 10px;
            color: #67748e;
            padding: 15px 0;
            border-top: 1px solid #eee;
            margin-top: 15px;
        }

        .form-feedback {
            font-size: 12px;
            margin-top: -15px;
            margin-bottom: 15px;
            color: #f5365c;
        }

        .form-check-label {
            color: #67748e;
        }

        /* ======= LAYOUT & CONTAINERS ======= */
        .main-content {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)),
                url('<?= base_url('neoterik/img/assets/kabg.png') ?>');
            background-size: cover;
            background-position: center;
        }

        .header {
            position: relative;
            text-align: center;
            background: linear-gradient(60deg, rgba(84, 58, 183, 1) 0%, rgb(228 0 255) 100%);
            color: white;
        }

        .inner-header {
            height: 65vh;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .flex {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content {
            position: relative;
            height: 20vh;
            text-align: center;
            background-color: white;
        }

        .logo {
            width: 50px;
            fill: white;
            padding-right: 15px;
            display: inline-block;
            vertical-align: middle;
        }

        /* ======= LOGIN CARD ======= */
        .login-card {
            width: 400px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.95);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15), 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .login-card .card-header {
            position: relative;
            padding-top: 25px;
            padding-bottom: 15px;
            z-index: 1;
        }

        .login-card-header-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 130px;
            z-index: -1;
            border-radius: 15px 15px 50% 50% / 15px 15px 30px 30px;
        }

        .school-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            background: white;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 4px solid rgba(255, 255, 255, 0.7);
            animation: pulse 2s infinite;
        }

        /* ======= FORM ELEMENTS ======= */
        .input-group {
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
            transition: all 0.3s ease;
            position: relative;
        }

        .input-group:focus-within {
            box-shadow: 0 5px 15px rgba(94, 114, 228, 0.15);
            border-color: #5e72e4;
        }

        .input-group-text {
            background-color: white;
            border: none;
            color: #8392ab;
            padding-left: 15px;
        }

        .form-control {
            border: none;
            padding: 12px 15px;
            font-size: 14px;
            height: auto;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-control:focus+.input-group-text i {
            color: #5e72e4;
            transform: scale(1.1);
            transition: all 0.3s ease;
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #8392ab;
            z-index: 5;
            cursor: pointer;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
        }

        .login-btn {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #5e72e4, #825ee4);
            box-shadow: 0 5px 15px rgba(94, 114, 228, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(94, 114, 228, 0.4);
        }

        .login-btn:active {
            transform: translateY(1px);
        }

        .input-group .form-control:not(:first-child) {
            padding-left: 10px !important;
        }

        .btn {
            color: #fff !important;
        }

        .btn:hover {
            color: #fff !important;
        }

        /* Add this CSS to your stylesheet */
        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 10;
            color: #6c757d;
        }

        .password-toggle:hover {
            color: #5e72e4;
        }

        /* If you're using a dark mode, add this to handle toggle color in dark mode */
        body.dark-mode .password-toggle {
            color: #8392ab;
        }

        body.dark-mode .password-toggle:hover {
            color: #adbdcc;
        }

        .form-check-input:checked {
            background-color: #5e72e4;
            border-color: #5e72e4;
        }

        /* ======= UTILITY COMPONENTS ======= */
        .dark-mode-toggle {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 20px;
            color: #fff;
            cursor: pointer;
            z-index: 5;
            transition: all 0.3s ease;
        }

        .dark-mode-toggle:hover {
            transform: rotate(30deg);
        }

        .login-status {
            position: absolute;
            bottom: -18px;
            right: 0;
            font-size: 12px;
            color: #5e72e4;
            display: flex;
            align-items: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .login-status .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            margin-right: 5px;
            background-color: #5e72e4;
            position: relative;
        }

        .login-status .status-dot::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #5e72e4;
            animation: pulse-status 1.5s infinite;
        }

        /* ======= DECORATIVE ELEMENTS ======= */
        .floating-element {
            position: absolute;
            opacity: 0.5;
            pointer-events: none;
            z-index: 0;
        }

        .floating-1 {
            top: 10%;
            left: 10%;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #5e72e4, transparent);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: float1 8s infinite ease-in-out;
        }

        .floating-2 {
            bottom: 10%;
            right: 10%;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #825ee4, transparent);
            border-radius: 30% 70% 39% 61% / 53% 30% 70% 47%;
            animation: float2 10s infinite ease-in-out;
        }

        .waves {
            position: relative;
            width: 100%;
            height: 15vh;
            margin-bottom: -7px;
            /* Fix for safari gap */
            min-height: 100px;
            max-height: 150px;
        }

        .parallax>use {
            animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
        }

        .parallax>use:nth-child(1) {
            animation-delay: -2s;
            animation-duration: 7s;
        }

        .parallax>use:nth-child(2) {
            animation-delay: -3s;
            animation-duration: 10s;
        }

        .parallax>use:nth-child(3) {
            animation-delay: -4s;
            animation-duration: 13s;
        }

        .parallax>use:nth-child(4) {
            animation-delay: -5s;
            animation-duration: 20s;
        }

        /* ======= ANIMATIONS ======= */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(94, 114, 228, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(94, 114, 228, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(94, 114, 228, 0);
            }
        }

        @keyframes pulse-status {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(3);
                opacity: 0;
            }
        }

        @keyframes float1 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            50% {
                transform: translate(20px, 20px) rotate(10deg);
            }
        }

        @keyframes float2 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            50% {
                transform: translate(-20px, -10px) rotate(-10deg);
            }
        }

        @keyframes move-forever {
            0% {
                transform: translate3d(-90px, 0, 0);
            }

            100% {
                transform: translate3d(85px, 0, 0);
            }
        }

        /* ======= RESPONSIVE DESIGN ======= */
        @media (max-width: 768px) {
            .waves {
                height: 40px;
                min-height: 40px;
            }

            .content {
                height: 30vh;
            }

            h1 {
                font-size: 24px;
            }

            .login-card {
                width: 90%;
                max-width: 400px;
            }
        }
    </style>
</head>

<body>
    <main class="main-content mt-0">
        <div class="floating-element floating-1"></div>
        <div class="floating-element floating-2"></div>
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column">
                            <div class="card login-card mt-4">

                                <!--Hey! This is the original version of Simple CSS Waves-->
                                <div class="header">
                                    <button class="dark-mode-toggle" id="darkModeToggle">
                                        <i class="fas fa-moon"></i>
                                    </button>
                                    <div class="card-header pb-0 text-center bg-transparent">


                                        <div class="login-card-header-bg"></div>
                                        <img src="<?= base_url('neoterik/img/logo_srsb.png') ?>" class="school-logo">
                                        <p class="school-name">SEKOLAH RENDAH SERI BUDIMAN</p>
                                    </div>
                                    <!--Waves Container-->
                                    <div>
                                        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                                            <defs>
                                                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                                            </defs>
                                            <g class="parallax">
                                                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                                                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                                                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                                                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fdfdfd" />
                                            </g>
                                        </svg>
                                    </div>
                                    <!--Waves end-->

                                </div>
                                <!--Header ends-->
                                <div class="card-body p-4">
                                    <h3 class="login-title">Log Masuk</h3>

                                    <form method="post" action="<?= site_url('login/attempt_login'); ?>" id="login-form" class="smart-form client-form">
                                        <?= csrf_field() ?>

                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                            <input type="text" class="form-control" id="um_username" name="um_username" placeholder="Username" required>
                                            <div class="login-status" id="usernameStatus">
                                                <span class="status-dot"></span>
                                                <span>Menyemak...</span>
                                            </div>
                                        </div>
                                        <?php if (session('errors.login')) : ?>
                                            <div class="form-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        <?php endif; ?>

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

                                        <div class="form-check form-switch ms-1 mb-4">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                            <label class="form-check-label small" for="rememberMe">Ingat saya</label>
                                        </div>

                                        <button type="submit" class="btn login-btn w-100">
                                            Log Masuk
                                            <i class="fas fa-arrow-right ms-1"></i>
                                        </button>

                                        <p class="register-link text-center">
                                            Tidak mempunyai akaun?
                                            <a href="<?= site_url('register') ?>">Daftar</a>
                                        </p>
                                    </form>
                                </div>

                                <div class="text-center footer-text">
                                    <small>Universiti Pendidikan Sultan Idris © 2024<br>
                                        Gambar: Kompleks Akademik</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core JS Files -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        // Smooth Scrollbar initialization
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        // Password toggle visibility - Fixed positioning
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form submission
            const password = document.getElementById('um_password');
            const toggleIcon = this.querySelector('i');

            if (password.type === 'password') {
                password.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });

        // Dark mode toggle with enhanced styles
        // Dark mode toggle with enhanced styles and wave color changes
        document.getElementById('darkModeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            const icon = this.querySelector('i');

            if (icon.classList.contains('fa-moon')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');

                // Dark mode styles
                document.documentElement.style.setProperty('--bs-body-bg', '#1a2035');
                document.documentElement.style.setProperty('--bs-body-color', '#fff');

                // Change card styles for dark mode
                document.querySelector('.login-card').style.background = 'rgba(26, 32, 53, 0.95)';
                document.querySelector('.login-card').style.borderColor = 'rgba(255, 255, 255, 0.1)';
                document.querySelector('.login-title').style.color = '#fff';

                // Change input styles for dark mode
                document.querySelectorAll('.input-group-text, .form-control').forEach(el => {
                    el.style.backgroundColor = '#2a3551';
                    el.style.color = '#fff';
                });

                document.querySelectorAll('.input-group').forEach(el => {
                    el.style.borderColor = '#364156';
                });

                document.querySelectorAll('.register-link, .footer-text, .form-check-label').forEach(el => {
                    el.style.color = '#8392ab';
                });

                // Password toggle icon in dark mode
                document.querySelector('.password-toggle i').style.color = '#8392ab';

                // Change wave colors for dark mode
                document.querySelector('use:nth-child(1)').setAttribute('fill', 'rgba(40, 45, 60, 0.7)');
                document.querySelector('use:nth-child(2)').setAttribute('fill', 'rgba(40, 45, 60, 0.5)');
                document.querySelector('use:nth-child(3)').setAttribute('fill', 'rgba(40, 45, 60, 0.3)');
                document.querySelector('use:nth-child(4)').setAttribute('fill', '#252a3e');

            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');

                // Reset to light mode
                document.documentElement.style.setProperty('--bs-body-bg', '');
                document.documentElement.style.setProperty('--bs-body-color', '');

                // Reset card styles
                document.querySelector('.login-card').style.background = 'rgba(255, 255, 255, 0.95)';
                document.querySelector('.login-card').style.borderColor = 'rgba(255, 255, 255, 0.3)';
                document.querySelector('.login-title').style.color = '#344767';

                // Reset input styles
                document.querySelectorAll('.input-group-text, .form-control').forEach(el => {
                    el.style.backgroundColor = '';
                    el.style.color = '';
                });

                document.querySelectorAll('.input-group').forEach(el => {
                    el.style.borderColor = '#eee';
                });

                document.querySelectorAll('.register-link, .footer-text, .form-check-label').forEach(el => {
                    el.style.color = '';
                });

                // Reset password toggle icon in light mode
                document.querySelector('.password-toggle i').style.color = '';

                // Reset wave colors to original light mode
                document.querySelector('use:nth-child(1)').setAttribute('fill', 'rgba(255,255,255,0.7)');
                document.querySelector('use:nth-child(2)').setAttribute('fill', 'rgba(255,255,255,0.5)');
                document.querySelector('use:nth-child(3)').setAttribute('fill', 'rgba(255,255,255,0.3)');
                document.querySelector('use:nth-child(4)').setAttribute('fill', '#fff');
            }
        });

        // Enhanced animated login button effect
        const loginBtn = document.querySelector('.login-btn');
        loginBtn.addEventListener('mouseenter', function() {
            this.innerHTML = 'Selamat Datang <i class="fas fa-arrow-right ms-1"></i>';
            this.style.background = 'linear-gradient(135deg, #825ee4, #5e72e4)';
        });

        loginBtn.addEventListener('mouseleave', function() {
            this.innerHTML = 'Log Masuk <i class="fas fa-arrow-right ms-1"></i>';
            this.style.background = 'linear-gradient(135deg, #5e72e4, #825ee4)';
        });

        // Improved username field interaction
        const usernameField = document.getElementById('um_username');
        const usernameStatus = document.getElementById('usernameStatus');

        usernameField.addEventListener('focus', function() {
            if (this.value.length > 0) {
                usernameStatus.style.opacity = '1';
            }
        });

        usernameField.addEventListener('blur', function() {
            usernameStatus.style.opacity = '0';
        });

        usernameField.addEventListener('input', function() {
            if (this.value.length > 0) {
                usernameStatus.style.opacity = '1';
            } else {
                usernameStatus.style.opacity = '0';
            }
        });

        // Form validation enhancement
        document.getElementById('login-form').addEventListener('submit', function(event) {
            const username = document.getElementById('um_username').value;
            const password = document.getElementById('um_password').value;

            if (!username || !password) {
                event.preventDefault();

                // Show validation feedback with SweetAlert
                Swal.fire({
                    icon: 'warning',
                    title: 'Perhatian',
                    text: 'Sila masukkan nama pengguna dan kata laluan anda.',
                    confirmButtonColor: '#5e72e4'
                });
            } else {
                // Show loading state when submitting
                loginBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang Masuk...';
                loginBtn.disabled = true;
            }
        });
    </script>

    <!-- SweetAlert2 for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- fail message -->
    <?php if (session('swal_fail')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: "<?= session('swal_fail') ?>",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>
</body>

</html>