<style>
  .form-check-input:disabled {
    opacity: 1 !important;
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

  /* CSS for desktop screens */
  .list-group {
    flex-basis: 0;
    flex-grow: 1;
  }

  /* Media query for screens smaller than a certain width (e.g., phones) */
  @media (max-width: 768px) {
    .d-flex {
      flex-direction: column;
      /* Change flex direction to column for smaller screens */
    }

    .list-group {
      flex-basis: auto;
      /* Reset flex-basis to auto for stacked layout */
      flex-grow: 0;
      width: 100%;
      margin-bottom: 5%;
      /* Ensure each ul takes up the full width */
    }
  }


  .zero-top-border {
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/neoterik/assets/ckeditor5/ckeditor.js"></script>

<div class="container-fluid py-4">

  <div class="card">
    <div class="card-header d-flex p-3 bg-primary">
      <h6 class="my-auto text-white">DSKPN</h6>
      <div class="ms-auto d-flex align-items-center">
        <a href="<?= route_to('generate_dskpn'); ?>" class="btn bg-info text-white me-2" style="margin-bottom:0 !important">
          Unduh DSKPN&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
          </svg>
        </a>
        <button onclick="printPDF()" class="btn bg-info text-white me-2" style="margin-bottom:0 !important">
          Cetak Borang Plan Pengajaran&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
            <path d="M2 7a1 1 0 0 0-1 1v4a2 2 0 0 0 2 2h1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2h1a2 2 0 0 0 2-2V8a1 1 0 0 0-1-1H2zm11 1v3h-1v-2H4v2H3V8h10zM5 12v3h6v-3H5zM1 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1H1V5z" />
          </svg>
        </button>
        <!-- <a href="<?= base_url('dskpn/print_bpp/'); ?>" class="btn bg-info text-white me-2" style="margin-bottom:0 !important">
          Cetak Borang Plan Pengajaran&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
            <path d="M2 7a1 1 0 0 0-1 1v4a2 2 0 0 0 2 2h1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2h1a2 2 0 0 0 2-2V8a1 1 0 0 0-1-1H2zm11 1v3h-1v-2H4v2H3V8h10zM5 12v3h6v-3H5zM1 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1H1V5z" />
          </svg>
        </a> -->
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
          <label for="kluster">KLUSTER</label>
          <input class="form-control" value="<?= $cluster_details['ctm_desc'] ?>" readonly>
        </div>
        <div class="col-md-2">
          <label for="kluster">TAHUN</label>
          <input class="form-control" value="<?= $tm_details['tm_year'] ?>" readonly>
        </div>
      </div>
      <div class="row py-4">

        <div class="col-md-8">
          <label for="topik">TOPIK</label>
          <input class="form-control" value="<?= $tm_details['tm_desc'] ?>" readonly>
        </div>
        <div class="col-md-2">
          <label for="tema">TEMA</label>
          <input class="form-control" value="<?= $dskpn_details['dskpn_theme'] ?>" readonly>

        </div>
        <div class="col-md-2">
          <label for="subtema">SUB-TEMA</label>
          <input class="form-control" value="<?= $dskpn_details['dskpn_sub_theme'] ?>" readonly>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- Layer 1 (SP/OP)-->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#standard_pembelajaran" role="tab" aria-controls="standard_pembelajaran" aria-selected="true">
                  STANDARD PEMBELAJARAN
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#objektif_prestasi" role="tab" aria-controls="objektif_prestasi" aria-selected="false">
                  OBJEKTIF PRESTASI
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Standard Pembelajaran -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="standard_pembelajaran" role="tabpanel" aria-labelledby="standard_pembelajaran">
              <div class="d-flex top-0 w-100">
                <!-- foreach subjek -->
                <?php foreach ($subjects as $row) : ?>
                  <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                    <div class="card-header d-flex p-3 bg-primary">
                      <h6 class="my-auto text-white"><?= $row['sbm_desc']; ?></h6>
                    </div>
                    <textarea class="multisteps-form__textarea form-control zero-top-border" rows="15" readonly><?php foreach ($learning_standard as $ls_desc) : ?><?php if ($row['sbm_id'] == $ls_desc['ls_sbm_id'] && $ls_desc['lsi_desc'] != NULL) : ?><?= $ls_desc['lsi_number'] . ' ' . $ls_desc['lsi_desc'] . "\n"; ?> <?php endif ?><?php endforeach ?></textarea>
                  </ul>
                <?php endforeach; ?>
              </div>
            </div>
            <!-- OBJEKTIF PRESTASI -->
            <div class="tab-pane fade position-relative border-radius-lg" id="objektif_prestasi" role="tabpanel" aria-labelledby="objektif_prestasi">
              <div class="d-flex top-0 w-100">
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <textarea class="multisteps-form__textarea form-control zero-top-border" rows="15" readonly><?php foreach ($objective_performance as $op) : ?><?php if ($op != NULL) : ?><?= $op['opm_number'] . ' ' . $op['opm_desc'] . "\n" ?><?php endif ?><?php endforeach ?></textarea>
                  <br>
                  <div class="alert alert-dark text-white" role="alert">
                    DURASI PERLAKSANAAN (MINIT): &nbsp; <strong><span class="badge badge-primary text-dark" style="background-color: #d2d6da;"><?= $dskpn_details['dskpn_duration']; ?></span></strong>
                  </div>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- Layer 2 (TP/KT/16DOMAIN/7KI)-->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#tahap_penguasaan" role="tab" aria-controls="tahap_penguasaan" aria-selected="false">
                  TAHAP PENGUASAAN
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kompetensi_teras" role="tab" aria-controls="kompetensi_teras" aria-selected="false">
                  KOMPETENSI TERAS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#domain" role="tab" aria-controls="domain" aria-selected="false">
                  16 DOMAIN KEMENJADIAN MURID
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kemahiran" role="tab" aria-controls="kemahiran" aria-selected="false">
                  7 KEMAHIRAN INSANIAH
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Tahap Penguasaan -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="tahap_penguasaan" role="tabpanel" aria-labelledby="tahap_penguasaan">
              <div class="d-flex top-0 w-100">
                <!-- Tahap Penguasaan-->
                <?php foreach ($subjects as $row) : ?>
                  <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                    <div class="card-header d-flex p-3 bg-primary" style="border-top-right-radius: 1rem;border-top-left-radius: 1rem;">
                      <h6 class="my-auto text-white"><?= $row['sbm_desc']; ?></h6>
                    </div>
                    <?php foreach ($standard_performance as $sp_desc) : ?>
                      <?php if ($row['sbm_id'] == $sp_desc['sbm_id']) : ?>
                        <li class="list-group-item"><?= $sp_desc['sp_tp_level'] . ' ' . $sp_desc['sp_tp_level_desc']; ?></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                <?php endforeach; ?>
              </div>
            </div>
            <!-- Kompetensi Teras -->
            <div class="tab-pane fade position-relative border-radius-lg" id="kompetensi_teras" role="tabpanel" aria-labelledby="kompetensi_teras">
              <div class="d-flex top-0 w-100">
                <!-- kompetensi teras -->
                <!-- foreach kompetensi teras -->
                <?php foreach ($subjects as $row) : ?>
                  <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                    <div class="card-header d-flex p-3 bg-primary">
                      <h6 class="my-auto text-white"><?= $row['sbm_desc']; ?></h6>
                    </div>
                    <?php foreach ($core_competency as $cc_desc) : ?>
                      <?php if ($row['sbm_id'] == $cc_desc['sbm_id']) : ?>
                        <li class="list-group-item"><?= $cc_desc['cc_desc']; ?></li>
                      <?php endif ?>
                    <?php endforeach ?>
                  </ul>
                <?php endforeach; ?>
              </div>
            </div>
            <!-- 16 Domain kemenjadian murid -->
            <div class="tab-pane fade position-relative border-radius-lg" id="domain" role="tabpanel" aria-labelledby="16_domain">
              <div class="row">
                <?php foreach ($subjects as $subject) { ?>
                  <div class="col-md-4">
                    <div class="card mt-4" id="notifications">
                      <div class="card-header d-flex p-3 bg-primary">
                        <h6 class="my-auto text-white"><?= $subject['sbm_desc'] ?></h6>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table mb-0">
                            <tbody>
                              <!-- PENGETAHUAN ASAS -->
                              <?php
                              $dpa_flag = false;
                              foreach ($domain_pengetahuan_asas as $dpa) :
                                if ($subject['sbm_id'] == $dpa['dm_sbm_id']) : ?>
                                  <?php if ($dpa != NULL && $dpa_flag == false) : ?>
                                    <tr>
                                      <th class="bg-light" colspan="5">
                                        <b>PENGETAHUAN ASAS</b>
                                      </th>
                                    </tr>
                                  <?php $dpa_flag = true;
                                  endif; ?>
                                  <tr>
                                    <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                        <span class="text-dark d-block text-sm"><?= $dpa['dmn_desc']; ?></span>
                                      </div>
                                    </td>
                                  </tr>
                              <?php
                                endif;
                              endforeach;
                              ?>
                              <!-- KEMANDIRIAN -->
                              <?php $dkem_flag = false;
                              foreach ($domain_kemandirian as $dkem) :
                                if ($subject['sbm_id'] == $dkem['dm_sbm_id']) :
                              ?>
                                  <?php if ($dkem != NULL && $dkem_flag == false) : ?>
                                    <tr>
                                      <th class="bg-light" colspan="5">
                                        <b>KEMANDIRIAN</b>
                                      </th>
                                    </tr>
                                  <?php $dkem_flag = true;
                                  endif; ?>
                                  <tr>
                                    <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                        <span class="text-dark d-block text-sm"><?= $dkem['dmn_desc']; ?></span>
                                      </div>
                                    </td>
                                  </tr>
                              <?php
                                endif;
                              endforeach;
                              ?>


                              <!-- KUALITI KEPERIBADIAN -->
                              <?php $dkk_flag = false;
                              foreach ($domain_kualiti_keperibadian as $dkk) :
                                if ($subject['sbm_id'] == $dkk['dm_sbm_id']) :
                                  $found = true; // Set the flag if the condition is met
                              ?>
                                  <?php if ($dkk != NULL && $dkk_flag == false) : ?>
                                    <tr>
                                      <th class="bg-light" colspan="5">
                                        <b>KUALITI KEPERIBADIAN</b>
                                      </th>
                                    </tr>
                                  <?php $dkk_flag = true;
                                  endif; ?>
                                  <tr>
                                    <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                        <span class="text-dark d-block text-sm"><?= $dkk['dmn_desc']; ?></span>
                                      </div>
                                    </td>

                                  </tr>
                              <?php
                                endif;
                              endforeach;
                              ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <!-- 7 Kemahiran Insaniah -->
            <div class="tab-pane fade position-relative border-radius-lg" id="kemahiran" role="tabpanel" aria-labelledby="7_kemahiran">
              <div class="row">
                <?php foreach ($subjects as $subject) { ?>
                  <div class="col-md-4">
                    <div class="card mt-4" id="notifications">
                      <div class="card-header d-flex p-3 bg-primary">
                        <h6 class="my-auto text-white"><?= $subject['sbm_desc'] ?></h6>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table mb-0">
                            <?php
                            $found = false; // Initialize a flag
                            foreach ($kemahiran_insaniah as $ki) :
                              if ($subject['sbm_id'] == $ki['dm_sbm_id']) : ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $ki['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                </tr>
                            <?php
                              endif;
                            endforeach;
                            ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Layer 3 -->
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#idea_pengajaran" role="tab" aria-controls="idea_pengajaran" aria-selected="false">
                  IDEA PENGAJARAN (AKTIVITI)
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#abm" role="tab" aria-controls="abm" aria-selected="false">
                  ALAT BANTU MENGAJAR
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#pentaksiran" role="tab" aria-controls="pentaksiran" aria-selected="false">
                  PENTAKSIRAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false">
                  SPESIFIKASI PENGAJARAN
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- idea_pengajaran -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="idea_pengajaran" role="tabpanel" aria-labelledby="idea_pengajaran">
              <div class="d-flex top-0 w-100">
                <ul class="list-group flex-grow-1 mx-2">
                  <ul class="list-group mt-3">
                    <?php foreach ($activity as $actvt) : ?>
                      <?php if ($actvt != NULL) : ?>
                        <li class="list-group-item"><?= $actvt['aci_number'] . '. ' . $actvt['aci_desc']; ?></li>
                      <?php endif ?>
                    <?php endforeach ?>
                    <br>
                    <div class="alert alert-dark text-white" role="alert">
                      <strong>CATATAN:</strong>
                      Idea pengajaran adalah panduan kepada guru sahaja, sebarang penambahbaikan adalah amat dialukan
                    </div>
                  </ul>
                </ul>
              </div>
            </div>
            <!-- Kompetensi Teras -->
            <div class="tab-pane fade position-relative border-radius-lg" id="abm" role="tabpanel" aria-labelledby="abm">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <?php if (!empty($abm)) : ?>
                    <ul class="list-group mt-3">
                      <?php foreach ($abm as $item) : ?>
                        <li class="list-group-item"><?= htmlspecialchars($item['la_desc']) ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                  <!-- <textarea class="multisteps-form__textarea form-control" rows="10" readonly><?php if (!empty($abm)) : ?><?php foreach ($abm as $abm) : ?><?= $abm['la_desc'] ?><?php endforeach ?><?php endif; ?></textarea> -->
                </ul>
              </div>
            </div>
            <!-- Pentaksiran -->
            <div class="tab-pane fade position-relative border-radius-lg" id="pentaksiran" role="tabpanel" aria-labelledby="pentaksiran">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <?php
                  $kognitif_flag = false;
                  $psikomotor_flag = false;
                  $afektif_flag = false;
                  foreach ($assessment as $assmt) : ?>
                    <?php if ($assmt != NULL) : ?>

                      <?php if ($assmt['asc_desc'] == 'Kognitif' && $assmt['asc_desc'] != NULL) : ?>
                        <?php if ($kognitif_flag == false) : ?>
                          <h5 class="mt-3">Kognitif</h5>
                        <?php $kognitif_flag = true;
                        endif ?>
                        <li class="list-group-item"><?= $assmt['asi_desc_number'] . '. ' . $assmt['asi_desc']; ?></li>
                      <?php endif ?>

                      <?php if ($assmt['asc_desc'] == 'Psikomotor'  && $assmt['asc_desc'] != NULL) : ?>
                        <?php if ($psikomotor_flag == false) : ?>
                          <h5 class="mt-3">Psikomotor</h5>
                        <?php $psikomotor_flag = true;
                        endif ?>
                        <li class="list-group-item"><?= $assmt['asi_desc_number'] . '. ' . $assmt['asi_desc']; ?></li>
                      <?php endif ?>

                      <?php if ($assmt['asc_desc'] == 'Afektif'  && $assmt['asc_desc'] != NULL) : ?>
                        <?php if ($afektif_flag == false) : ?>
                          <h5 class="mt-3">Afektif</h5>
                        <?php $afektif_flag = true;
                        endif ?>
                        <li class="list-group-item"><?= $assmt['asi_desc_number'] . '. ' . $assmt['asi_desc']; ?></li>
                      <?php endif ?>
                    <?php endif ?>

                  <?php endforeach ?>
                </ul>
              </div>
            </div>
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <?php if (isset($dskpn_details['dskpn_parent_involvement']) && $dskpn_details['dskpn_parent_involvement'] != NULL) : ?>
                <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex justify-content-end" style="flex-direction: row !important;">
                  <label class="form-check-label mb-0">
                    Penglibatan Ibu Bapa
                  </label>
                  <div class="form-check form-switch ms-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked disabled>
                  </div>
                </div>
              <?php endif; ?>


              <div class="row">
                <div class="col-md-3">
                  <div class="d-flex top-0 w-100">
                    <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                      <div class="card-header d-flex p-3 bg-primary" style="border-top-right-radius: 1rem;border-top-left-radius: 1rem;">
                        <h6 class="my-auto text-white">REKA BENTUK INTRUKSI</h6>
                      </div>
                      <?php
                      foreach ($rekabentuk_instruksi as $rbi) :
                        if ($rbi['tappc_desc'] == 'Reka Bentuk Instruksi') :
                      ?>
                          <li class="list-group-item"><?= $rbi['tapp_desc']; ?></li>
                      <?php
                        endif;
                      endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="d-flex top-0 w-100">
                    <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                      <div class="card-header d-flex p-3 bg-primary" style="border-top-right-radius: 1rem;border-top-left-radius: 1rem;">
                        <h6 class="my-auto text-white">INTEGRASI TEKNOLOGI</h6>
                      </div>
                      <?php
                      foreach ($integrasi_teknologi as $it) :
                        if ($it['tappc_desc'] == 'Integrasi Teknologi') :
                      ?>
                          <li class="list-group-item"><?= $it['tapp_desc']; ?></li>
                      <?php
                        endif;
                      endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="d-flex top-0 w-100">
                    <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                      <div class="card-header d-flex p-3 bg-primary" style="border-top-right-radius: 1rem;border-top-left-radius: 1rem;">
                        <h6 class="my-auto text-white">PENDEKATAN</h6>
                      </div>
                      <?php
                      foreach ($pendekatan as $pdkt) :
                        if ($pdkt['tappc_desc'] == 'Pendekatan') :
                      ?>
                          <li class="list-group-item"><?= $pdkt['tapp_desc']; ?></li>
                      <?php
                        endif;
                      endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="d-flex top-0 w-100">
                    <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                      <div class="card-header d-flex p-3 bg-primary" style="border-top-right-radius: 1rem;border-top-left-radius: 1rem;">
                        <h6 class="my-auto text-white">KAEDAH</h6>
                      </div>
                      <?php
                      foreach ($kaedah as $kdh) :
                        if ($kdh['tappc_desc'] == 'Kaedah') :
                      ?>
                          <li class="list-group-item"><?= $kdh['tapp_desc']; ?></li>
                      <?php
                        endif;
                      endforeach;
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Check if user ada role pentadbir (guna helper)-->
    <?php if (!function_exists('get_user_role')) {
      helper('dskpn_helper');
    }

    $both_roles = [
      'GURU_BESAR',
      'PENYELARAS'
    ];
    ?>
    <?php if (in_array($both_roles[0], get_user_role())) : ?>
      <div class="text-end p-3">
        <?php if (!in_array($dskpn_details['dskpn_status'], [1, 2, 3, 4])) : ?>
          <!-- Reject Button -->
          <button class="btn bg-danger mt-2" type="button" data-bs-toggle="modal" data-bs-target="#rejectModal">Tolak&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zM4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
          <!-- Approve Button -->
          <a href="<?= route_to('approve_dskpn', $dskpn_details['dskpn_id']) ?>" class="btn bg-info mt-2">Lulus&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zM6.97 10.97a.75.75 0 0 1-1.07 0L3.75 8.8a.75.75 0 1 1 1.07-1.05l1.65 1.65 3.58-3.58a.75.75 0 0 1 1.07 1.06l-4.24 4.24z" />
            </svg>
          </a>
        <?php endif; ?>
      </div>
    <?php endif ?>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <?php if ($dskpn_details['dskpn_status'] == 1) : ?>
        <!-- Display Approved By -->
        <p class="badge badge-sm bg-info">Approved By: <?= get_user_name($dskpn_details['approved_by']) ?></p>
      <?php endif; ?>
      <?php if ($dskpn_details['dskpn_status'] == 2) : ?>
        <!-- Display Approved By -->
        <p class="badge badge-sm bg-danger">Rejected By: <?= get_user_name($dskpn_details['approved_by']) ?></p><br>
        <div class="card-body" style="height: auto;">
          <textarea class="multisteps-form__textarea form-control" rows="1" readonly><?= $dskpn_details['dskpn_remarks'] ?></textarea>
        </div>
      <?php endif; ?>
    </div>
  </div>




</div>
<div class="modal fade" id="rejectModal" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Alasan penolakan DSKPN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="rejectForm" action="<?= route_to('reject_dskpn') ?>" method="post">
          <input type="hidden" name="dskpn_id" value="<?= $dskpn_details['dskpn_id'] ?>">
          <div class="mb-3">
            <label for="remarks" class="form-label">Catatan</label>
            <textarea id="catatan" class="form-control" id="remarks" name="remarks" rows="3" required></textarea>
          </div>
          <div class="text-end">
            <button class="btn bg-info mt-2" type="submit">Simpan&nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"></path>
                <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"></path>
              </svg>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="custom-freetext-id"><!-- nothing here --></div>


<script>
  function printPDF() {
    // Create an iframe to load the document
    var iframe = document.createElement('iframe');
    iframe.style.position = 'absolute';
    iframe.style.width = '0px';
    iframe.style.height = '0px';
    iframe.style.border = 'none';
    iframe.src = '<?= base_url('dskpn/print_bpp/') ?>'; // Adjust URL as needed

    document.body.appendChild(iframe);

    iframe.onload = function() {
      // Ensure the iframe content is focused and print dialog is triggered
      iframe.contentWindow.focus();
      iframe.contentWindow.print();

      // Clean up iframe after printing
      setTimeout(function() {
        document.body.removeChild(iframe);
      }, 1000); // Wait a second to ensure print dialog is processed
    };
  }
</script>


<script>
  $(document).ready(function() {
    $('.select2').select2();
  });

  const ckeditor_upload_url = '<?= route_to('store_image_ckedit'); ?>';
</script>