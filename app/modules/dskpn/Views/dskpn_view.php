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

  /* .row>* {
    padding-right: calc(var(--bs-gutter-x)* 0);
    padding-left: calc(var(--bs-gutter-x)* 0);
    margin-right: calc(var(--bs-gutter-x)* .5);
    margin-left: calc(var(--bs-gutter-x)* .5);
  } */
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/neoterik/assets/ckeditor5/ckeditor.js"></script>

<div class="container-fluid py-4">

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">DSKPN</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
          <label for="kluster">KLUSTER</label>
          <input class="form-control" value="PERKEMBANGAN MANUSIA" readonly>
        </div>
        <div class="col-md-2">
          <label for="kluster">TAHUN</label>
          <input class="form-control" value="2023" readonly>
        </div>
      </div>
      <div class="row py-4">

        <div class="col-md-8">
          <label for="topik">TOPIK</label>
          <input class="form-control" value="Pernafasan Manusia dan Penyakit Berkaitan" readonly>
        </div>
        <div class="col-md-2">
          <label for="tema">TEMA</label>
          <input class="form-control" value="Individu" readonly>

        </div>
        <div class="col-md-2">
          <label for="subtema">SUB-TEMA</label>
          <input class="form-control" value="Tubuh dan Kesihatan" readonly>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#standard_pembelajaran" role="tab" aria-controls="standard_pembelajaran" aria-selected="false">
                  STANDARD PEMBELAJARAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#tahap_penguasaan" role="tab" aria-controls="tahap_penguasaan" aria-selected="false" tabindex="-1">
                  TAHAP PENGUASAAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kompetensi_teras" role="tab" aria-controls="kompetensi_teras" aria-selected="false" tabindex="-1">
                  KOMPETENSI TERAS
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#domain" role="tab" aria-controls="domain" aria-selected="false" tabindex="-1">
                  16 DOMAIN KEMENJADIAN MURID
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kemahiran" role="tab" aria-controls="kemahiran" aria-selected="false" tabindex="-1">
                  7 KEMAHIRAN INSANIAH
                </a>
              </li>

              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
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
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white"><?= $row['sm_desc']; ?></h6>
                    </div>
                    <textarea class="multisteps-form__textarea form-control zero-top-border" rows="15" readonly><?php foreach ($learning_standard as $ls_desc) : ?><?php if ($row['sm_id'] == $ls_desc['sm_id']) : ?><?= $ls_desc['ls_details']; ?><?php endif ?><?php endforeach ?></textarea>
                  </ul>
                <?php endforeach; ?>
              </div>
            </div>
            <!-- Tahap Penguasaan -->
            <div class="tab-pane fade position-relative border-radius-lg" id="tahap_penguasaan" role="tabpanel" aria-labelledby="tahap_penguasaan">
              <div class="d-flex top-0 w-100">
                <!-- Tahap Penguasaan-->
                <!-- foreach tahap penguasaan -->
                <?php foreach ($subjects as $row) : ?>
                  <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white"><?= $row['sm_desc']; ?></h6>
                    </div>
                    <?php foreach ($standard_performance as $sp_desc) : ?>
                      <?php if ($row['sm_id'] == $sp_desc['sm_id']) : ?>
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
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white"><?= $row['sm_desc']; ?></h6>
                    </div>
                    <?php foreach ($core_competency as $cc_desc) : ?>
                      <?php if ($row['sm_id'] == $cc_desc['sm_id']) : ?>
                        <li class="list-group-item"><?= $cc_desc['d_name']; ?></li>
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
                      <div class="card-header d-flex p-3 bg-gradient-primary">
                        <h6 class="my-auto text-white"><?= $subject['sm_desc'] ?></h6>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table mb-0">
                            <tbody>
                              <!-- PENGETAHUAN ASAS -->
                              <tr>
                                <th class="bg-light" colspan="5">
                                  <b>PENGETAHUAN ASAS</b>
                                </th>
                              </tr>
                              <?php foreach ($template_domain_pengetahuan_asas as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <?php
                                        $found = false; // Initialize a flag
                                        foreach ($domain_pengetahuan_asas as $index => $dpa) :
                                          if ($subject['sm_id'] == $dpa['sm_id'] && $item['d_id'] == $dpa['d_id'] && $dpa['dm_isChecked'] == 'Y') :
                                            $found = true; // Set the flag if the condition is met
                                        ?>
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                        <?php
                                            break; // Exit the loop if the condition is met
                                          endif;
                                        endforeach;
                                        ?>

                                        <?php if (!$found) : // Check the flag after the loop 
                                        ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                        <?php endif; ?>
                                      </div>

                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>
                              <!-- KEMANDIRIAN -->
                              <tr>
                                <th class="bg-light" colspan="5">
                                  <b>KEMANDIRIAN</b>
                                </th>
                              </tr>
                              <?php foreach ($template_domain_kemandirian as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <?php
                                        $found = false; // Initialize a flag
                                        foreach ($domain_kemandirian as $index => $dkem) :
                                          if ($subject['sm_id'] == $dkem['sm_id'] && $item['d_id'] == $dkem['d_id'] && $dkem['dm_isChecked'] == 'Y') :
                                            $found = true; // Set the flag if the condition is met
                                        ?>
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                        <?php
                                            break; // Exit the loop if the condition is met
                                          endif;
                                        endforeach;
                                        ?>

                                        <?php if (!$found) : // Check the flag after the loop 
                                        ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                        <?php endif; ?>
                                      </div>

                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>
                              <!-- KUALITI KEPERIBADIAN -->
                              <tr>
                                <th class="bg-light" colspan="5">
                                  <b>KUALITI KEPERIBADIAN</b>
                                </th>
                              </tr>
                              <?php foreach ($template_domain_kualiti_keperibadian as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                        <?php
                                        $found = false; // Initialize a flag
                                        foreach ($domain_kualiti_keperibadian as $index => $dkk) :
                                          if ($subject['sm_id'] == $dkk['sm_id'] && $item['d_id'] == $dkk['d_id'] && $dkk['dm_isChecked'] == 'Y') :
                                            $found = true; // Set the flag if the condition is met
                                        ?>
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                        <?php
                                            break; // Exit the loop if the condition is met
                                          endif;
                                        endforeach;
                                        ?>

                                        <?php if (!$found) : // Check the flag after the loop 
                                        ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                        <?php endif; ?>
                                      </div>

                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>

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
                      <div class="card-header d-flex p-3 bg-gradient-primary">
                        <h6 class="my-auto text-white"><?= $subject['sm_desc'] ?></h6>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table mb-0">
                            <?php foreach ($template_kemahiran_insaniah as $item) { ?>
                              <tr>
                                <td class="ps-1" colspan="4">
                                  <div class="my-auto">
                                    <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <?php
                                      $found = false; // Initialize a flag
                                      foreach ($kemahiran_insaniah as $index => $ki) :
                                        if ($subject['sm_id'] == $ki['sm_id'] && $item['d_id'] == $ki['d_id'] && $ki['dm_isChecked'] == 'Y') :
                                          $found = true; // Set the flag if the condition is met
                                      ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                      <?php
                                          break; // Exit the loop if the condition is met
                                        endif;
                                      endforeach;
                                      ?>

                                      <?php if (!$found) : // Check the flag after the loop 
                                      ?>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                      <?php endif; ?>
                                    </div>

                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
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

  <!-- Objecktif Prestasi -->
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#objektif_prestasi" role="tab" aria-controls="objektif_prestasi" aria-selected="false">
                  OBJEKTIF PRESTASI
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#idea_pengajaran" role="tab" aria-controls="idea_pengajaran" aria-selected="false" tabindex="-1">
                  IDEA PENGAJARAN (AKTIVITI)
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#abm" role="tab" aria-controls="abm" aria-selected="false" tabindex="-1">
                  ALAT BANTU MENGAJAR
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#pentaksiran" role="tab" aria-controls="pentaksiran" aria-selected="false" tabindex="-1">
                  PENTAKSIRAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false" tabindex="-1">
                  SPESIFIKASI PENGAJARAN
                </a>
              </li>

              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- OBJEKTIF PRESTASI -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="objektif_prestasi" role="tabpanel" aria-labelledby="objektif_prestasi">
              <div class="d-flex top-0 w-100">
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly><?= $objective_performance['op_desc']; ?></textarea>
                  <br>
                  <div class="alert alert-dark text-white" role="alert">
                    DURASI PERLAKSANAAN (MINIT): &nbsp; <strong><span class="badge badge-primary text-dark" style="background-color: #d2d6da;">300</span></strong>
                  </div>
                </ul>
              </div>
            </div>
            <!-- idea_pengajaran -->
            <div class="tab-pane fade position-relative border-radius-lg" id="idea_pengajaran" role="tabpanel" aria-labelledby="idea_pengajaran">
              <div class="d-flex top-0 w-100">
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly><?= isset($activity_assessment['aa_activity_desc']) ? htmlspecialchars($activity_assessment['aa_activity_desc'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                  <br>
                  <div class="alert alert-dark text-white" role="alert">
                    <strong>CATATAN:</strong>
                    Idea pengajaran adalah panduan kepada guru sahaja, sebarang penambahbaikan adalah amat dialukan
                  </div>
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
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly><?= isset($activity_assessment['aa_assessment_desc']) ? htmlspecialchars($activity_assessment['aa_assessment_desc'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                </ul>
              </div>
            </div>
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex justify-content-end" style="flex-direction: row !Important;">
                <label class="form-check-label mb-0">
                  Penglibatan Ibu Bapa
                </label>
                <div class="form-check form-switch ms-2">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" <?php echo (isset($activity_assessment['aa_is_parental_involved']) && $activity_assessment['aa_is_parental_involved'] == 'Y') ? 'checked' : ''; ?> disabled>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">REKA BENTUK INTRUKSI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <?php foreach ($template_rekabentuk_instruksi as $item) { ?>
                              <tr>
                                <td class="ps-1" colspan="4">
                                  <div class="my-auto">
                                    <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <?php
                                      $found = false; // Initialize a flag
                                      foreach ($rekabentuk_instruksi as $index => $rbi) :
                                        if ($item['d_id'] == $rbi['d_id'] && $rbi['dm_isChecked'] == 'Y') :
                                          $found = true; // Set the flag if the condition is met
                                      ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                      <?php
                                          break; // Exit the loop if the condition is met
                                        endif;
                                      endforeach;
                                      ?>
                                      <?php if (!$found) : // Check the flag after the loop 
                                      ?>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">INTEGRASI TEKNOLOGI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <?php foreach ($template_integrasi_teknologi as $item) { ?>
                              <tr>
                                <td class="ps-1" colspan="4">
                                  <div class="my-auto">
                                    <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <?php
                                      $found = false; // Initialize a flag
                                      foreach ($integrasi_teknologi as $index => $it) :
                                        if ($item['d_id'] == $it['d_id'] && $it['dm_isChecked'] == 'Y') :
                                          $found = true; // Set the flag if the condition is met
                                      ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                      <?php
                                          break; // Exit the loop if the condition is met
                                        endif;
                                      endforeach;
                                      ?>
                                      <?php if (!$found) : // Check the flag after the loop 
                                      ?>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">PENDEKATAN</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <?php foreach ($template_pendekatan as $item) { ?>
                              <tr>
                                <td class="ps-1" colspan="4">
                                  <div class="my-auto">
                                    <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <?php
                                      $found = false; // Initialize a flag
                                      foreach ($pendekatan as $index => $pdktn) :
                                        if ($item['d_id'] == $pdktn['d_id'] && $pdktn['dm_isChecked'] == 'Y') :
                                          $found = true; // Set the flag if the condition is met
                                      ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                      <?php
                                          break; // Exit the loop if the condition is met
                                        endif;
                                      endforeach;
                                      ?>
                                      <?php if (!$found) : // Check the flag after the loop 
                                      ?>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card mt-4" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">KAEDAH</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <?php foreach ($template_kaedah as $item) { ?>
                              <tr>
                                <td class="ps-1" colspan="4">
                                  <div class="my-auto">
                                    <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <?php
                                      $found = false; // Initialize a flag
                                      foreach ($kaedah as $index => $method) :
                                        if ($item['d_id'] == $method['d_id'] && $method['dm_isChecked'] == 'Y') :
                                          $found = true; // Set the flag if the condition is met
                                      ?>
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault<?php echo $index; ?>" checked disabled>
                                      <?php
                                          break; // Exit the loop if the condition is met
                                        endif;
                                      endforeach;
                                      ?>
                                      <?php if (!$found) : // Check the flag after the loop 
                                      ?>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" disabled>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>

                        <?php foreach ($kaedah as $index => $method) :
                          if ($method['d_id'] == '140') :
                            if (!function_exists('get_lain_lain')) {
                              helper('dskpn_helper');
                            }
                            // Call the helper function and get the data
                            $extra_additional_field = get_lain_lain($method['dm_id']);
                        ?>
                        <?php
                            break; // Exit the loop if the condition is met
                          endif;
                        endforeach; ?>

                        <?php if (!empty($extra_additional_field)) : ?>
                          <textarea class="multisteps-form__textarea form-control" rows="2" readonly><?= htmlspecialchars($extra_additional_field['eaf_desc']) ?></textarea>
                        <?php else : ?>
                        <?php endif; ?>
                      </div>
                    </div>
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
    ?>
    <?php if (get_user_role() == 'PENYELARAS') : ?>
      <div class="text-end p-3">
        <?php if (!in_array($dskpn_details['dskpn_status'], [1,2,3,4])) : ?>
          <!-- Reject Button -->
          <button class="btn bg-gradient-danger mt-2" type="button" data-bs-toggle="modal" data-bs-target="#rejectModal">Tolak&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zM4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
          <!-- Approve Button -->
          <a href="<?= route_to('approve_dskpn', $dskpn_details['dskpn_id']) ?>" class="btn bg-gradient-info mt-2">Lulus&nbsp;
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
        <p class="badge badge-sm bg-gradient-info">Approved By: <?= get_user_name($dskpn_details['approved_by']) ?></p>
      <?php endif; ?>
      <?php if ($dskpn_details['dskpn_status'] == 2) : ?>
        <!-- Display Approved By -->
        <p class="badge badge-sm bg-gradient-danger">Rejected By: <?= get_user_name($dskpn_details['approved_by']) ?></p><br>
        <div class="card-body" style="height: auto;">
          <textarea class="multisteps-form__textarea form-control" rows="1" readonly><?= $dskpn_details['dskpn_remarks'] ?></textarea>
        </div>
      <?php endif; ?>
    </div>
  </div>




</div>
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
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
            <button class="btn bg-gradient-info mt-2" type="submit">Simpan&nbsp;
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
  $(document).ready(function() {
    $('.select2').select2();
  });

  const ckeditor_upload_url = '<?= route_to('store_image_ckedit'); ?>';
</script>