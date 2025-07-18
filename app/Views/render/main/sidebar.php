<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 overflow-hidden " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="dashboard" target="_blank">
      <img src="<?= base_url() ?>neoterik/img/logo_srsb.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white" style="font-size: 1.2rem;">Sistem Budiman</span>

    </a>
  </div>
  <center>
    <hr class="hr-lightbit mt-0">
  </center>
  <div class="collapse navbar-collapse  w-auto h-auto overflow-hidden " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <?php
      $list_of_roles = [
        'ADMIN', //0
        'GURU', //1
        'GURU_BESAR', //2
        'PENYELARAS' //3
      ];

      if (!function_exists('get_user_role')) {
        helper('dskpn_helper');
      }

      $tempArrA = get_user_role();
      $conditionA = sort($tempArrA);
      $conditionB = sort($list_of_roles);
      if ($conditionA == $conditionB) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (url_is(route_to('dashboard'))) ? 'active' : ''; ?>" href="<?= route_to('dashboard'); ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg class="text-dark" width="16px" height="16px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Utama</title>
                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Rounded-Icons" transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                      <g id="shop-" transform="translate(0.000000, 148.000000)">
                        <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" id="Path" opacity="0.598981585"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z" id="Path"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Utama</span>
          </a>
        </li>
      <?php endif; ?>
      <!-- Penyelaras -->
      <?php if (in_array($list_of_roles[3], get_user_role())) : ?>
        <?php
        $in_main_configuration = url_is(route_to('view_subject')) || url_is(route_to('view_cluster')) || url_is(route_to('view_topic')) || url_is(route_to('view_teacher_cluster')) || url_is(route_to('view_tp_core_setup')) || url_is(route_to('view_core_competency_setup')) || url_is(route_to('view_standard_performance')) || url_is(route_to('view_core_competency_list'));
        ?>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dskpn-configuration" class="nav-link " aria-controls="dskpn-configuration" role="button" aria-expanded="<?= $in_main_configuration ? 'true' : 'false' ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Tetapan</title>
                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                      <g id="document" transform="translate(154.000000, 300.000000)">
                        <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" id="Path" opacity="0.603585379"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z" id="Shape"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>

            </div>
            <span class="nav-link-text ms-1">Konfigurasi Utama</span>
          </a>
          <div class="collapse <?= $in_main_configuration ? 'show' : ''; ?>" id="dskpn-configuration">
            <ul class="nav ms-1 ps-1">
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('view_topic'))) ? 'active' : ''; ?>" href="<?= route_to('view_topic'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-bookmark" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Topik</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('view_teacher_cluster'))) ? 'active' : ''; ?>" href="<?= route_to('view_teacher_cluster'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-chalkboard-teacher" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Guru & Kluster</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('view_tp_core_setup')) || url_is(route_to('view_standard_performance'))) ? 'active' : ''; ?>" href="<?= route_to('view_standard_performance'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-brain" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Tahap Penguasaan</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('view_core_competency_setup')) || url_is(route_to('view_core_competency_list'))) ? 'active' : ''; ?>" href="<?= route_to('view_core_competency_list'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-project-diagram" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Kompetensi Teras</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      <?php endif; ?>

      <!-- Super Admin -->
      <?php if (in_array($list_of_roles[0], get_user_role())) : ?>
        <?php
        $in_main_configuration = url_is(route_to('view_user_access'));
        ?>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#admin-setting" class="nav-link " aria-controls="admin-setting" role="button" aria-expanded="<?= $in_main_configuration ? 'true' : 'false' ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>settings</title>
                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                      <g id="settings" transform="translate(304.000000, 151.000000)">
                        <polygon class="color-background" id="Path" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                        <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" id="Path" opacity="0.596981957"></path>
                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z" id="Path"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Tetapan Admin</span>
          </a>
          <div class="collapse <?= $in_main_configuration ? 'show' : ''; ?>" id="admin-setting">
            <ul class="nav ms-1 ps-1">
              <li class="nav-item ">
                <a class="nav-link  <?= (url_is(route_to('view_user_access'))) ? 'active' : ''; ?>" href="<?= route_to('view_user_access'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-tie" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Akses Pengguna</span>
                </a>
              </li>
            </ul>
            <ul class="nav ms-1 ps-1">
              <li class="nav-item ">
                <a class="nav-link" href="#" style="overflow : hidden;" id="openVersioningModal">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-tie" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">DSKPN Versioning</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dskpn-configuration" class="nav-link " aria-controls="dskpn-configuration" role="button" aria-expanded="<?= $in_main_configuration ? 'true' : 'false' ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Tetapan</title>
                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                      <g id="document" transform="translate(154.000000, 300.000000)">
                        <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" id="Path" opacity="0.603585379"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z" id="Shape"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>

            </div>
            <span class="nav-link-text ms-1">Konfigurasi Utama</span>
          </a>
          <div class="collapse <?= $in_main_configuration ? 'show' : ''; ?>" id="dskpn-configuration">
            <ul class="nav ms-1 ps-1">
              <li class="nav-item ">
                <a class="nav-link  <?= (url_is(route_to('view_subject'))) ? 'active' : ''; ?>" href="<?= route_to('view_subject'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-book" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Mata Pelajaran</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link  <?= (url_is(route_to('view_cluster'))) ? 'active' : ''; ?>" href="<?= route_to('view_cluster'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-book-reader" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Kluster</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('view_topic'))) ? 'active' : ''; ?>" href="<?= route_to('view_topic'); ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-bookmark" style="color : #3c4242; height : 16px; width : 16px;"></i>
                  </div>
                  <span class="nav-link-text ms-1">Topik</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      <?php endif; ?>

      <!-- End Super Admin -->

      <?php
      //if (in_array($list_of_roles[1], get_user_role())) :
      $arrTempA = get_user_role();
      if (sort($arrTempA) == sort($list_of_roles)) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (url_is(route_to('cluster_topic')) || url_is(route_to('dskpn_by_topic_list'))) ? 'active' : ''; ?>" href="<?= route_to('cluster_topic'); ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Kluster & Topik</span>
          </a>
        </li>
      <?php endif; ?>
      <?php /*if (get_user_role() == $list_of_roles[1]) : ?>
        <!-- <li class="nav-item">
          <a class="nav-link <?= (url_is(route_to('view_tp_core_setup'))) ? 'active' : ''; ?>" href="<?= route_to('view_tp_core_setup'); ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Tahap Penguasaan</span>
          </a>
        </li>
      <?php endif; ?>
      <?php if (get_user_role() == $list_of_roles[1]) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (url_is(route_to('view_core_competency_setup'))) ? 'active' : ''; ?>" href="<?= route_to('view_core_competency_setup'); ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Kompetensi Teras</span>
          </a>
        </li> -->
      <?php endif; */ ?>
      <?php
      //$arrTempA = get_user_role();
      if (sort($arrTempA) == sort($list_of_roles)) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (url_is(route_to('list_dskpn')) || url_is(route_to('dskpn_details'))) ? 'active' : ''; ?>" href="<?= route_to('list_dskpn'); ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Senarai DSKPN</span>
          </a>
        </li>
      <?php endif; ?>

      <!-- Penyelaras -->
      <?php if (in_array($list_of_roles[3], get_user_role())) : ?>
        <?php
        $in_dskpn_list = url_is(route_to('dskpn_learning_standard')) || url_is(route_to('tp_maintenance')) || url_is(route_to('mapping_core')) || url_is(route_to('domain_mapping')) || url_is(route_to('mapping_dynamic_dskpn')) || url_is(route_to('activity_n_assessment')) || url_is(route_to('dskpn_complete'));
        ?>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#standardPembelajaran" class="nav-link " aria-controls="standardPembelajaran" role="button" aria-expanded="<?= $in_dskpn_list ? 'true' : 'false' ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
              <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>DSKPN</title>
                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                      <g id="document" transform="translate(154.000000, 300.000000)">
                        <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" id="Path" opacity="0.603585379"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z" id="Shape"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>

            </div>
            <span class="nav-link-text ms-1">DSKPN</span>
          </a>
          <?php
          // $stylish = "background-color : #cbefd3b8; border-radius : 10px; margin-bottom : 1px;";
          $stylish = "background-color : #aa89d9; border-radius : 10px; margin-bottom : 1px;";
          ?>
          <div class="collapse <?= $in_dskpn_list ? 'show' : ''; ?>" id="standardPembelajaran">
            <ul class="nav ms-1 ps-1">
              <li class="nav-item active">
                <a class="nav-link <?= (url_is(route_to('dskpn_learning_standard'))) ? 'active' : ''; ?>" href="<?= route_to('dskpn_learning_standard'); ?>" style="overflow : hidden;<?= (!empty(session('is_update')) && !url_is(route_to('dskpn_learning_standard'))) || url_is(route_to('dskpn_complete')) ? $stylish : ''; ?>">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <dotlottie-player src="https://lottie.host/191170f4-0773-4212-908c-b52bcd890dfe/i27diFhRER.json" background="transparent" speed="1" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                  </div>
                  <span class="nav-link-text ms-1" style="line-height : 1.2;">Penetapan<br>Standard<br>Pembelajaran</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link  <?= (url_is(route_to('tp_maintenance'))) ? 'active' : ''; ?>" style="overflow : hidden;<?= (!empty(session('is_update_TP')) && !url_is(route_to('tp_maintenance'))) || url_is(route_to('dskpn_complete')) ? $stylish : ''; ?>">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <dotlottie-player src="https://lottie.host/191170f4-0773-4212-908c-b52bcd890dfe/i27diFhRER.json" background="transparent" speed="1" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                  </div>
                  <span class="nav-link-text ms-1" style="line-height : 1.2;">Penetapan<br>Tahap Penguasaan</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('mapping_core'))) ? 'active' : ''; ?>" style="overflow : hidden;<?= (!empty(session('is_update_core')) && !url_is(route_to('mapping_core'))) || url_is(route_to('dskpn_complete')) ? $stylish : ''; ?>">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <dotlottie-player src="https://lottie.host/191170f4-0773-4212-908c-b52bcd890dfe/i27diFhRER.json" background="transparent" speed="1" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                  </div>
                  <span class="nav-link-text ms-1" style="line-height : 1.2;">Penetapan<br>Pemetaan Teras</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('domain_mapping'))) ? 'active' : ''; ?>" style="overflow : hidden;<?= (!empty(session('is_update_domain')) && !url_is(route_to('domain_mapping'))) || url_is(route_to('dskpn_complete')) ? $stylish : ''; ?>">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <dotlottie-player src="https://lottie.host/191170f4-0773-4212-908c-b52bcd890dfe/i27diFhRER.json" background="transparent" speed="1" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                  </div>
                  <span class="nav-link-text ms-1" style="line-height : 1.2;">Penetapan<br>Pemetaan Domain</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('activity_n_assessment'))) ? 'active' : ''; ?>" style="overflow : hidden;<?= (!empty(session('is_update_activity_assessment')) && !url_is(route_to('activity_n_assessment'))) || url_is(route_to('dskpn_complete')) ? $stylish : ''; ?>">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <dotlottie-player src="https://lottie.host/191170f4-0773-4212-908c-b52bcd890dfe/i27diFhRER.json" background="transparent" speed="1" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                  </div>
                  <span class="nav-link-text ms-1" style="line-height : 1.2;">Penetapan<br>Pemetaan Aktiviti <br>& Pentaksiran</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('mapping_dynamic_dskpn'))) ? 'active' : ''; ?>" style="overflow : hidden;<?= (!empty(session('is_update_specs')) && !url_is(route_to('mapping_dynamic_dskpn'))) || url_is(route_to('dskpn_complete')) ? $stylish : ''; ?>">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <dotlottie-player src="https://lottie.host/191170f4-0773-4212-908c-b52bcd890dfe/i27diFhRER.json" background="transparent" speed="1" direction="1" playMode="normal" loop autoplay style="width : 31px;"></dotlottie-player>
                  </div>
                  <span class="nav-link-text ms-1" style="line-height : 1.2;">Penetapan<br>Pemetaan Spesifikasi</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link <?= (url_is(route_to('dskpn_complete'))) ? 'active' : ''; ?>" style="overflow : hidden;">
                  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <?php if (url_is(route_to('dskpn_complete'))) { ?>
                      <dotlottie-player src="https://lottie.host/d117b2d6-3c35-4bc4-8038-324d215e9c4c/gpXLLNRqqP.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                    <?php } else { ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-bottom" viewBox="0 0 16 16">
                        <path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5m2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702s.18.149.5.149.5-.15.5-.15v-.7c0-.701.478-1.236 1.011-1.492A3.5 3.5 0 0 0 11.5 3V2z" />
                      </svg>
                    <?php } ?>
                  </div>
                  <span class="nav-link-text ms-1">Selesai</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      <?php endif; ?>
      <!-- <?php if (in_array($list_of_roles[3], get_user_role())) : ?>
        <li class="nav-item">
          <a class="nav-link <?= (url_is(route_to('view_teacher_cluster'))) ? 'active' : ''; ?>" href="<?= route_to('view_teacher_cluster'); ?>">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Penetapan Guru-Kluster</span>
          </a>
        </li>
      <?php endif; ?> -->
      <center>
        <hr class="hr-lightbit">
      </center>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('login/logout') ?>">
          <div class="icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center" style="min-width : 32px;">
            <!-- Font Awesome icon for Sign Out -->
            <i class="fa fa-sign-out-alt" style="font-size:0.8rem;"></i>
          </div>
          <span class="nav-link-text ms-1 d-flex">Log Keluar</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- <div class="sidenav-footer mx-3 mt-3 pt-3">
    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
      <div class="full-background" style="background-image: url('<?= base_url() ?>assets/img/curved-images/white-curved.jpg')"></div>
      <div class="card-body text-start p-3 w-100">
        <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
          <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
        </div>
        <div class="docs-info">
          <h6 class="text-white up mb-0">Need help?</h6>
          <p class="text-xs font-weight-bold">Please check our docs</p>
          <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
        </div>
      </div>
    </div>
  </div> -->
</aside>