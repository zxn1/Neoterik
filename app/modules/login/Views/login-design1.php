<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    SEKOLAH RENDAH SERI BUDIMAN
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
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
  </style>
</head>

<body>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column">
              <!-- <div class="card card-plain mt-0"> -->
              <div class="card z-index-1 mt-0">
                <div class="card-header pb-0 text-left bg-transparent">
                  <div class="text-center"><img src="<?= base_url('neoterik/img/logo_srsb.png') ?>" width="150"><br><br>
                    <span>SEKOLAH RENDAH SERI BUDIMAN </span><br><span class="h5">
                      <!-- <b>eSchool System</b> -->
                    </span>
                  </div><br><br>
                  <h3 class="font-weight-bolder text-info text-gradient">Log Masuk</h3>
                  <p class="mb-0">Masukkan 'Nama Pengguna' dan 'Kata laluan' anda untuk log masuk </p>
                </div>
                <div class="card-body">
                  <form method="post" action="<?php echo site_url('login'); ?>" id="login-form" class="smart-form client-form" data-gtm-form-interact-id="0">
                    <?= csrf_field() ?>
                    <label>Nama Pengguna</label>
                    <div class="mb-3">
                      <input id="um_username" name="login" type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                    <label>Kata Laluan</label>
                    <div class="mb-3">
                      <input id="um_password" name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                      <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                      </div>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Tidak mempunyai akaun?
                    <a href="<?= site_url('register') ?>" class="text-info text-gradient font-weight-bold">Daftar</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8" style="box-shadow: 1px 2px 4px 9px rgba(0, 0, 0, 0.2);">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('https://www.upsi.edu.my/wp-content/uploads/2022/01/Bangunan-Suluh-Budiman2.jpg')"></div>
              </div>
            </div>
          </div>
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
</body>

</html>