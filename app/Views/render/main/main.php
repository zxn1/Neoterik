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

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- DataTables CSS and JS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>


  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url() ?>assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/dskpn/dataTable.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/b009cf6a3e.js" crossorigin="anonymous"></script>
  <link href="<?= base_url() ?>assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url() ?>assets/css/soft-ui-dashboard.css?v=1.1.1" rel="stylesheet" />

  <!-- select 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

  <style>
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
      background-color: #fff !important;
    }

    /* Custom Css to overwrite select2 style */
    .select2-container .select2-selection__rendered {
      display: flex;
      align-items: center;
      padding: 0.5rem 0.75rem;
      font-size: 0.875rem;
      font-weight: 400;
      line-height: 1.4rem;
      color: #344767;
      white-space: nowrap;
      background-color: #fff;
      border: 1px solid #d2d6da;
      border-radius: 0.5rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 38px !important;
    }

    .select2-container--open .select2-selection__rendered {
      border-bottom: none;
      border-bottom-right-radius: 0;
    }

    .select2-container--open .select2-dropdown--below {
      border-top: none;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      border: 1px solid #d2d6da;

    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      /* color: #444; */
      line-height: inherit !important;
    }

    .select2-container--default .select2-selection--single {
      /* background-color: #fff; */
      border: 0 !important;
      /* border-radius: 4px; */
    }
  </style>

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
  <script src="<?= base_url() ?>assets/js/plugins/datatables.js"></script>
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
  <?php if (session('success')) : ?>
    <script>
      Swal.fire({
        icon: 'success',
        text: '<?= session('success') ?>',
        timer: 3000,
        showConfirmButton: false
      });
    </script>

  <?php endif; ?>

  <!-- fail message -->
  <?php if (session('fail')) : ?>
    <script>
      Swal.fire({
        icon: 'error',
        text: '<?= session('fail') ?>',
        timer: 3000,
        showConfirmButton: false
      });
    </script>
  <?php endif; ?>

</body>

</html>