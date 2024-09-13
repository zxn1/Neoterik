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
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <!-- <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->

    <!-- Overwrite template css -->
    <style>
        .ms-n6 {
            margin-left: -5rem !important;
        }

        /* .oblique-image {
            background: linear-gradient(45deg, rgba(128, 0, 128, 0), rgba(128, 0, 128, 0)), url('<?= base_url('neoterik/img/assets/kabg.png') ?>');
            background-size: cover;
            background-position: center;
            animation: fadeIn 1.5s ease-in-out;
        } */

        .card {
            box-shadow: 0 4px 8px rgba(128, 0, 128, 0.3);
        }

        .card.card-plain {
            background-color: #ffffffeb;
            box-shadow: none;
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .main-content {
            background: url('<?= base_url('neoterik/img/assets/kabg.png') ?>');
            background-size: cover;
        }
    </style>
</head>

<body>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container" style="margin-left: 5%; margin-right: 5%;">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-6 d-flex flex-column">
                            <div class="card card-plain mt-4" style="width : 350px; box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.3);">
                                <!-- <div class="card z-index-1 mt-0"> -->
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <div class="text-center"><img src="<?= base_url('neoterik/img/logo_srsb.png') ?>" width="70"><br>
                                        <span class="text-sm">SEKOLAH RENDAH SERI BUDIMAN </span><br><span class="h5">
                                            <!-- <b>eSchool System</b> -->
                                        </span>
                                    </div>
                                    <h3 class="font-weight-bolder text-primary" style="font-size : 15px; position : relative; top : 15px; padding-top : 15px;">Log Masuk</h3>
                                    <!-- <p class="mb-0" style="font-size : 12px;">Masukkan 'Nama Pengguna' dan 'Kata laluan' anda untuk log masuk </p> -->
                                </div>
                                <div class="card-body pb-1">
                                    <form method="post" action="<?= site_url('login/attempt_login'); ?>" id="login-form" class="smart-form client-form" data-gtm-form-interact-id="0">
                                        <?= csrf_field() ?>
                                        <!-- <label>Nama Pengguna</label> -->
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="border-radius : 8px 0px 0px 8px; background-color:#41414121;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="um_username" name="um_username" placeholder="&nbsp;&nbsp;Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>

                                        <!-- <div class="mb-3">
                                            <input id="um_username" name="um_username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="email-addon" required>
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div> -->
                                        <!-- <label>Kata Laluan</label> -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="border-radius : 8px 0px 0px 8px; background-color:#41414121;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" id="um_password" name="um_password" placeholder="&nbsp;&nbsp;Password" aria-label="Password" aria-describedby="password-addon1" required>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <input id="um_password" name="um_password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                                            <div class="invalid-feedback">
                                                <?= session('errors.password') ?>
                                            </div>
                                        </div> -->

                                        <!-- <div class="form-check form-switch" style="transform : scale(0.75); position : relative; left : -32px; top : -5px;">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                                            <label class="form-check-label" for="rememberMe">Ingat saya</label>
                                        </div> -->
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-primary w-100 mt-1 mb-0 text-white" style="height : 35px;"><span style="position : relative; top : -2.5px;">Log Masuk</span></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 pb-0" style="transform : scale(0.75);">
                                    <p class="text-sm mx-auto pt-0 pb-0">
                                        Tidak mempunyai akaun?
                                        <a href="<?= site_url('register') ?>" class="text-primary font-weight-bold">Daftar</a>
                                    </p>
                                </div>

                                <div style="font-size : 9px; text-align : center; padding-bottom : 10px;">
                                <span>Universiti Pendidikan Sultan Idris © 2024<br>
                                Gambar : Dewan Tuanku Canselor</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"></div>
                            </div>
                        </div> -->
                    </div>
                </div>
        </section>
    </main>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
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