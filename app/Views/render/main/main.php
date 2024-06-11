<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>neoterik/img/logo_srsb.png">
  <title>
    SISTEM NEOTERIK
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>assets/css/soft-ui-dashboard.css?v=1.1.1" rel="stylesheet" />
  <!-- <script>
    //if browser support service worker
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('sw.js');
    };
  </script> -->
  <?php
  if (!empty($style))
    foreach ($style as $css) { ?>
    <link href="../assets/css/<?= $css ?>.css" rel="stylesheet" />
  <?php } ?>

</head>

<body class="g-sidenav-show  bg-gray-100">

  <!-- Sidebar -->
  <?= view('render/main/sidebar'); ?>
  <!-- End Sidebar -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
    <?= view('render/main/navbar'); ?>
    <!-- End Navbar -->

    <!-- Content/pages -->
    <?= view($view, $data); ?>
    <!-- End Content/pages -->

    <!-- Footer -->
    <?= view('render/main/footer'); ?>
    <!-- End Footer -->

  </main>

  <!-- configuration -->
  <?= view('render/main/configurationbar'); ?>
  <!-- End configuration -->

  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="<?= base_url() ?>assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/jkanban/jkanban.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/chartjs.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/threejs.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/orbit-controls.js"></script>
  <script>
    var csrfToken = '<?= csrf_token(); ?>';
  </script>

  <?php
  if (!empty($script))
    foreach ($script as $js) { ?>
    <script src="../assets/js/<?= $js ?>.js"></script>
  <?php } ?>

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
  <script src="<?= base_url() ?>assets/js/soft-ui-dashboard.min.js?v=1.1.1"></script>

  <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
  <!-- success message -->
  <?php if (session('swal_success')) : ?>
    <script>
      Swal.fire({
        icon: 'success',
        text: '<?= session('swal_success') ?>',
        timer: 3000,
        showConfirmButton: false
      });
    </script>

  <?php endif; ?>
</body>

</html>