<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid py-4">
  <br>
  <!-- PENGETAHUAN ASAS -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
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
                      <div class="card-header d-flex p-3 bg-gradient-primary">
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
                              <?php foreach ($data['data']['Pengetahuan Asas'] as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] . '|' . $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> disabled>
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
                              <?php foreach ($data['data']['Kemandirian'] as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] . '|' . $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> disabled>
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
                              <?php foreach ($data['data']['Kualiti Keperibadian'] as $item) { ?>
                                <tr>
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] . '|' . $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> disabled>
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
                              <?php foreach ($data['data']['7 Kemahiran Insaniah'] as $item) { ?>
                                <tr style="background-color : #dedede;">
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <span class="text-dark d-block text-sm"><?= $item['dmn_desc'] . $item['dmn_id']; ?></span>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                                      <input class="form-check-input" type="checkbox" id="<?= $subject['sbm_id'] ?>|<?= $item['dmn_id'] ?>" <?= (isset($domain_map_session["'" . $subject['sbm_code'] . "'"]) && in_array($item['dmn_id'], $domain_map_session["'" . $subject['sbm_code'] . "'"])) ? 'checked' : ''; ?> disabled>
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
</div>
<script>
  const kemahiran_insaniah_rules = <?= json_encode($ki_rules); ?>;
  const subject_list = <?= json_encode($subjects); ?>;
</script>