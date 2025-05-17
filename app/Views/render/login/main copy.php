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
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <!-- <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->

    <!-- Overwrite template css -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .main-content {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7)), 
                        url('<?= base_url('neoterik/img/assets/kabg.png') ?>');
            background-size: cover;
            background-position: center;
        }
        
        .login-card {
            width: 400px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.95);
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
            background: linear-gradient(135deg, #5e72e4, #825ee4);
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

        .input-group {
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
            transition: all 0.3s ease;
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

        /* Dark mode toggle */
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

        /* Floating elements animation */
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

        @keyframes float1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(20px, 20px) rotate(10deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-20px, -10px) rotate(-10deg); }
        }

        /* Typing indicator for wow effect */
        .typing-indicator {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 5px;
            font-size: 12px;
            color: #5e72e4;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .dot-typing {
            position: relative;
            margin-left: 5px;
            margin-right: 5px;
        }

        .dot-typing::after {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #5e72e4;
            display: inline-block;
            margin-right: 3px;
            animation: loadingDots 1.5s infinite ease-in-out;
        }

        .dot-typing::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #5e72e4;
            display: inline-block;
            animation: loadingDots 1.5s infinite ease-in-out 0.5s;
            margin-right: 3px;
        }

        .dot-typing span {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: #5e72e4;
            display: inline-block;
            animation: loadingDots 1.5s infinite ease-in-out 1s;
        }

        @keyframes loadingDots {
            0%, 100% { opacity: 0.2; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Show typing indicator on username focus */
        #um_username:focus ~ .typing-indicator {
            opacity: 1;
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
                                <button class="dark-mode-toggle" id="darkModeToggle">
                                    <i class="fas fa-moon"></i>
                                </button>
                                
                                <div class="card-header pb-0 text-center bg-transparent">
                                    <div class="login-card-header-bg"></div>
                                    <img src="<?= base_url('neoterik/img/logo_srsb.png') ?>" class="school-logo">
                                    <p class="school-name">SEKOLAH RENDAH SERI BUDIMAN</p>
                                </div>
                                
                                <div class="card-body p-4">
                                    <h3 class="login-title">Log Masuk</h3>
                                    
                                    <form method="post" action="<?= site_url('login/attempt_login'); ?>" id="login-form" class="smart-form client-form">
                                        <?= csrf_field() ?>
                                        
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                            <input type="text" class="form-control" id="um_username" name="um_username" placeholder="Username" required>
                                            <div class="typing-indicator">
                                                <small>Authenticating</small>
                                                <div class="dot-typing">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                        
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input type="password" class="form-control" id="um_password" name="um_password" placeholder="Password" required>
                                            <span class="input-group-text bg-transparent border-0 password-toggle" id="togglePassword" style="cursor: pointer;">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                        
                                        <div class="form-check form-switch ms-1 mb-4">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
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
        
        // Password toggle visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
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
        
        // Dark mode toggle
        document.getElementById('darkModeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            const icon = this.querySelector('i');
            
            if (icon.classList.contains('fa-moon')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                
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
                
                document.querySelectorAll('.register-link, .footer-text').forEach(el => {
                    el.style.color = '#8392ab';
                });
                
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                
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
                
                document.querySelectorAll('.register-link, .footer-text').forEach(el => {
                    el.style.color = '';
                });
            }
        });
        
        // Add animated login button effect
        const loginBtn = document.querySelector('.login-btn');
        loginBtn.addEventListener('mouseenter', function() {
            this.innerHTML = 'Selamat Datang <i class="fas fa-arrow-right ms-1"></i>';
        });
        
        loginBtn.addEventListener('mouseleave', function() {
            this.innerHTML = 'Log Masuk <i class="fas fa-arrow-right ms-1"></i>';
        });
        
        // Add typing effect for username field
        document.getElementById('um_username').addEventListener('input', function() {
            if (this.value.length > 0) {
                document.querySelector('.typing-indicator').style.opacity = '1';
            } else {
                document.querySelector('.typing-indicator').style.opacity = '0';
            }
        });
    </script>
    
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
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