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

<form action="<?= route_to('store_domain_map') ?>" method="POST" class="container-fluid py-4">
  <?= csrf_field() ?>

  <div class="card">
    <div class="card-header d-flex p-3 bg-primary">
      <h6 class="my-auto text-white">16 DOMAIN MAPPING</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label for="kluster">KLUSTER</label>
          <select class="form-control select2" id="kluster" name="kluster" <?= isset($topikncluster) ? 'disabled' : ''; ?>>
            <?php if (isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['ctm_id']; ?>" selected><?= $topikncluster['ctm_desc']; ?></option>
            <?php } else { ?>
              <option value="AL">Alabama</option>
              <!-- Other options here -->
              <option value="WY">Wyoming</option>
            <?php } ?>
          </select>
        </div>
        <div class="col">
          <label for="tahun">TOPIK</label>
          <select class="form-control select2" id="tahun" name="tahun" <?= isset($topikncluster) ? 'disabled' : ''; ?>>
            <?php if (isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['tm_id']; ?>" selected><?= $topikncluster['tm_desc']; ?></option>
            <?php } else { ?>
              <option value="AL">Alabama</option>
              <!-- Other options here -->
              <option value="WY">Wyoming</option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- PENGETAHUAN ASAS -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
          <h6 class="my-auto text-white">PENETAPAN 16 DOMAIN MAPPING</h6>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

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
                              <tr>
                                <th class="bg-light" colspan="5">
                                  <b>PENGETAHUAN ASAS</b>
                                </th>
                              </tr>
                              <?php foreach ($data['Pengetahuan Asas'] as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input name="input-<?= $subject['sbm_code'] ?>[]" value="<?= $item['dmn_id'] ?>" class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] . '|' . $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> onchange="mapKemahiranInsaniah(event)">
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
                              <?php foreach ($data['Kemandirian'] as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input name="input-<?= $subject['sbm_code'] ?>[]" value="<?= $item['dmn_id'] ?>" class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] . '|' . $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> onchange="mapKemahiranInsaniah(event)">
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
                              <?php foreach ($data['Kualiti Keperibadian'] as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input name="input-<?= $subject['sbm_code'] ?>[]" value="<?= $item['dmn_id'] ?>" class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] . '|' . $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> onchange="mapKemahiranInsaniah(event)">
                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>
                              <!-- 7 Kemahiran Insaniah -->
                              <tr>
                                <th class="bg-dark" colspan="5">
                                  <b style="color : white;">7 KEMAHIRAN INSANIAH</b>
                                </th>
                              </tr>
                              <?php foreach ($data['7 Kemahiran Insaniah'] as $item) { ?>
                                <tr style="background-color : #dedede;">
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input name="input-<?= $subject['sbm_code'] ?>[]" value="<?= $item['dmn_id'] ?>" class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] ?>|<?= $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> onclick="return false;" onkeydown="return false;">
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
  <br>

  <div class="d-flex justify-content-between align-items-center p-2">
    <a href="<?= route_to('mapping_core'); ?>" class="btn border border-gray text-gray mt-2">
      <span>Kembali</span>
    </a>
    <div class="text-end p-3">
      <!-- <a href="#" type="button" class="btn bg-secondary">Batal</a> -->
      <button type="submit" class="btn bg-info text-white">Seterusnya</button>
    </div>
  </div>

</form>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });

  const kemahiran_insaniah_rules = <?= json_encode($ki_rules); ?>;
  const subject_list = <?= json_encode($subjects); ?>;
</script>

<!-- <div class="text-end p-3">
    <a href="#" type="button" class="btn bg-secondary">Batal</a>
    <button type="submit" class="btn bg-info">Seterusnya</button>
  </div> -->