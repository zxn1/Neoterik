<!DOCTYPE html>
<html lang="en">

<head>
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
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <?php
  if (!empty($style))
    foreach ($style as $css) { ?>
    <link href="../assets/css/dskpn/<?= $css ?>.css" rel="stylesheet" />
  <?php } ?>
</head>

<?= view($data['load_page'], $data['data']) ?>


<nav aria-label="semakan">
  <ul class="pagination pagination-sm justify-content-center mt-5">
  <li class="page-item <?= ($data['page'] > 1)?'':'disabled' ?>"><a class="page-link" href="<?= route_to('review_dskpn') . "?page=" . ($data['page']-1); ?>"><<</a></li>
    <?php for($i = 0; $i < 5; $i++)
    { ?>
        <li class="page-item <?= ($data['page'] == ($i+1))?'active':''; ?>"><a class="page-link" href="<?= route_to('review_dskpn') . "?page=" . ($i+1); ?>"><?= ($i+1) ?></a></li>
    <?php }?>
    <li class="page-item <?= ($data['page'] < 5)?'':'disabled' ?>"><a class="page-link" href="<?= route_to('review_dskpn') . "?page=" . ($data['page']+1); ?>">>></a></li>
  </ul>
</nav>

<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<?php
  if (!empty($script))
    foreach ($script as $js) { ?>
    <script src="../assets/js/dskpn/<?= $js ?>.js"></script>
<?php } ?>

</html>