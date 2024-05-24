<style>
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
                <?php foreach ($learning_standard_subject as $row) : ?>
                  <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white"><?= $row['sm_desc']; ?></h6>
                    </div>
                    <textarea class="multisteps-form__textarea form-control zero-top-border" rows="15">
                    <?php foreach ($learning_standard as $ls_desc) : ?>
                      <?php if ($row['sm_id'] == $ls_desc['ls_id']) : ?>
                        <?= $ls_desc['ls_details']; ?>
                      <?php endif ?>
                    <?php endforeach ?>
                </textarea>
                  </ul>
                <?php endforeach; ?>
              </div>
            </div>
            <!-- Tahap Penguasaan -->
            <div class="tab-pane fade position-relative border-radius-lg" id="tahap_penguasaan" role="tabpanel" aria-labelledby="tahap_penguasaan">
              <div class="d-flex top-0 w-100">
                <!-- Tahap Penguasaan-->
                <!-- foreach tahap penguasaan -->
                <?php foreach ($learning_standard_subject as $row) : ?>
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
                <?php foreach ($learning_standard_subject as $row) : ?>
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
              <div class="d-flex top-0 w-100">
                <?php foreach ($learning_standard_subject as $row) : ?>
                  <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white"><?= $row['sm_desc']; ?></h6>
                    </div>

                    <li class="list-group-item bg-light"><b>PENGETAHUAN ASAS</b></li>
                    <?php if (!empty($domain_pengetahuan_asas)) : ?>
                      <?php foreach ($domain_pengetahuan_asas as $dpa) : ?>
                        <?php if ($row['sm_id'] == $dpa['sm_id']) : ?>
                          <li class="list-group-item"><?= $dpa['d_name'] ?></li>
                        <?php endif; ?>
                      <?php endforeach ?>
                    <?php endif; ?>
                    <!-- call helper -->
                    <li class="list-group-item bg-light"><b>KEMANDIRIAN</b></li>
                    <?php if (!empty($domain_pengetahuan_asas)) : ?>
                      <?php foreach ($domain_kemandirian as $dk) : ?>
                        <?php if ($row['sm_id'] == $dk['sm_id']) : ?>
                          <li class="list-group-item"><?= $dk['d_name'] ?></li>
                        <?php endif; ?>
                      <?php endforeach ?>
                    <?php endif; ?>

                    <!-- call helper -->
                    <li class="list-group-item bg-light"><b>KUALITI KEPERIBADIAN</b></li>
                    <!-- Call helper -->
                    <?php if (!empty($domain_pengetahuan_asas)) : ?>
                      <?php foreach ($domain_kualiti_keperibadian as $dkk) : ?>
                        <?php if ($row['sm_id'] == $dkk['sm_id']) : ?>
                          <li class="list-group-item"><?= $dkk['d_name'] ?></li>
                        <?php endif; ?>
                      <?php endforeach ?>
                    <?php endif; ?>
                  </ul>
                <?php endforeach; ?>
              </div>
            </div>
            <!-- 7 Kemahiran Insaniah -->
            <div class="tab-pane fade position-relative border-radius-lg" id="kemahiran" role="tabpanel" aria-labelledby="7_kemahiran">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <?php foreach ($learning_standard_subject as $row) : ?>
                  <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white"><?= $row['sm_desc']; ?></h6>
                    </div>
                    <!-- Call helper -->
                    <?php if (!empty($kemahiran_insaniah)) : ?>
                      <?php foreach ($kemahiran_insaniah as $ki) : ?>
                        <?php if ($row['sm_id'] == $ki['sm_id']) : ?>
                          <li class="list-group-item"><?= $ki['d_name'] ?></li>
                        <?php endif; ?>
                      <?php endforeach ?>
                    <?php endif; ?>
                  </ul>
                <?php endforeach; ?>
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
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
                        <?= $objective_performance['op_desc']; ?>
                  </textarea>
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
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
                    <?= isset($activity_assessment['aa_activity_desc']) ? htmlspecialchars($activity_assessment['aa_activity_desc'], ENT_QUOTES, 'UTF-8') : ''; ?>
                  </textarea>


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
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
1. Bahan Demonstrasi (botol, straw, belon, gam)
2. Video berkaitan pertukaran gas dalam paru-paru
3. Kertas lukisan dan pensel warna dan tablet
4. Stetoskop
5. Video berkaitan ciri penyakit pernafasan(Asma)
6. Flash-card
                  </textarea>
                </ul>
              </div>
            </div>
            <!-- Pentaksiran -->
            <div class="tab-pane fade position-relative border-radius-lg" id="pentaksiran" role="tabpanel" aria-labelledby="pentaksiran">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
                    <?= isset($activity_assessment['aa_aasessment_desc']) ? htmlspecialchars($activity_assessment['aa_aasessment_desc'], ENT_QUOTES, 'UTF-8') : ''; ?>
                  </textarea>
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
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" <?php echo (isset($activity_assessment['aa_is_parental_involved']) && $activity_assessment['aa_is_parental_involved'] == 'Y') ? 'checked' : ''; ?> readonly>
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
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Active Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Collaborative Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Constructive Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Authentic Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
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
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Entry Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Adaptation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Infussion Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Transformation Level</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
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
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Inkuiri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Masalah</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Projek</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Pembelajaran Masteri</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Kontekstual</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Berasaskan Pengalaman</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
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
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Simulasi</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Main Peranan</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Nyanyian</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Bercerita</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Lain-lain:</span>
                                </div>
                              </td>
                              <td>
                                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
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
</div>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>