<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid py-4" id="store-core-competency-form">
  <!-- PENGETAHUAN ASAS -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">PENETAPAN KOMPETENSI TERAS</h6>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="row">

                <?php
                if (isset($subjects))
                  foreach ($subjects as $subject) { ?>
                  <div class="col-md-4">
                    <div class="card mt-4" id="notifications">
                      <div class="card-header d-flex p-3 bg-gradient-primary">
                        <h6 class="my-auto text-white"><?= $subject['sbm_desc'] ?></h6>
                      </div>
                      <div class="card-body pt-0">
                        <div class="table-responsive">
                          <table class="table mb-0 mt-3">
                            <tbody id="item-placing-<?= $subject['sbm_code'] ?>">

                              <?php
                              if (isset($core_competency_item[$subject['sbm_id']])) {
                                foreach ($core_competency_item[$subject['sbm_id']] as $core_map) {
                                  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                  $charactersLength = strlen($characters);
                                  $randomString = '';
                                  for ($i = 0; $i < 10; $i++) {
                                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                                  }
                              ?>
                                  <tr id="0-item-placing-<?= $subject['sbm_code'] ?>">
                                    <td>
                                      <label class="pe-1 pt-2"><?= $core_map[0]; ?></label>
                                    </td>
                                    <td class="ps-1" colspan="4">
                                      <div class="my-auto">
                                        <input type="text" class="form-control text-dark d-block text-sm" placeholder="Menilai dan mencipta" value="<?= $core_map[1]; ?>" readonly>
                                      </div>
                                    </td>
                                    <td width="10px">
                                      <div class="form-check form-switch mb-0 mt-2 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="<?= $subject['sbm_code'] ?>" id="flexSwitchCheckDefault11" <?= $core_map[2] == 'Y' ? 'checked' : ''; ?> disabled>
                                      </div>
                                    </td>
                                  </tr>
                                <?php }
                              } ?>

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