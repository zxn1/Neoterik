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

  .table> :not(caption)>*>* {
    padding: 0rem !important;
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<form method="POST" action="<?= route_to('store_core_map') ?>" class="container-fluid py-4" id="store-core-competency-form">

  <div class="card">
    <div class="card-header d-flex p-3 bg-primary">
      <h6 class="my-auto text-white">MAKLUMAT DSKPN</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label for="kluster">KLUSTER</label>
          <select class="form-control select2" id="kluster" name="kluster" <?= isset($topikncluster) ? 'disabled' : ''; ?>>
            <?php if (isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['ctm_id']; ?>" selected><?= $topikncluster['ctm_desc']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col">
          <label for="tahun">TOPIK</label>
          <select class="form-control select2" id="tahun" name="tahun" <?= isset($topikncluster) ? 'disabled' : ''; ?>>
            <?php if (isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['tm_id']; ?>" selected><?= $topikncluster['tm_desc']; ?></option>
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
          <h6 class="my-auto text-white">PENETAPAN KOMPETENSI TERAS</h6>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="row">

                <?php
                if (isset($subjects))
                  foreach ($subjects as $idx => $subject) { ?>
                  <div class="col-md-4">
                    <div class="card mt-4" id="notifications">
                      <div class="card-header d-flex p-3 bg-primary">
                        <h6 class="my-auto text-white"><?= $subject['sbm_desc'] ?></h6>
                      </div>
                      <div class="card-body pt-0">
                        <div class="table-responsive">
                          <table class="table mb-0 mt-3">
                            <tbody id="item-placing-<?= $subject['sbm_code'] ?>">

                              <?php
                              if (isset($core_competency_item[$idx][$subject['sbm_id']])) {
                                foreach ($core_competency_item[$idx][$subject['sbm_id']] as $core_map) {
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
                                        <input type="text" name="input-<?= $idx; ?>-<?= $subject['sbm_code'] ?>[]" value="<?= $core_map[0]; ?>" readonly hidden>
                                      </div>
                                    </td>
                                    <td width="10px">
                                      <div class="form-check form-switch mb-0 mt-2 d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="<?= $subject['sbm_code'] ?>" id="flexSwitchCheckDefault11" onchange="setCheckBox(this, '<?= $randomString . $subject['sbm_code'] ?>', this.value)" <?= $core_map[2] == 'Y' ? 'checked' : ''; ?>>
                                        <input type="text" value="<?= $core_map[2] == 'Y' ? $subject['sbm_code'] : 'off'; ?>" name="checked-<?= $idx; ?>-<?= $subject['sbm_code'] ?>[]" id="<?= $randomString . $subject['sbm_code'] ?>" hidden />
                                      </div>
                                    </td>
                                  </tr>
                                <?php }
                              } else { ?>

                                <tr id="0-item-placing-<?= $subject['sbm_code'] ?>">
                                  <td class="ps-1" colspan="4">
                                    <div class="my-auto">
                                      <input type="text" class="form-control text-dark d-block text-sm" placeholder="Menilai dan mencipta" readonly>
                                    </div>
                                  </td>
                                  <td width="10px">
                                    <div class="form-check form-switch mb-0 mt-2 d-flex align-items-center justify-content-center">
                                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" onclick="return false;">
                                    </div>
                                  </td>
                                  <td width="5px" style="display: none;">
                                    <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Item Kompetensi Teras bagi mata pelajaran <?= $subject['sbm_desc'] ?> masih belum ditetapkan!">
                                      <i class="fas fa-info-circle fa-lg me-2"></i>
                                    </a>
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
    <a href="<?= route_to('tp_maintenance'); ?>" class="btn border border-gray text-gray">
      <span>Kembali</span>
    </a>
    <div class="text-end p-3">
      <!-- <a href="domain-mapping" type="button" class="btn bg-secondary">Batal</a> -->
      <button type="submit" class="btn bg-info text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
          <path d="M12 2h-2v3h2z" />
          <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
        </svg> &nbsp;
        <span id="savetpchanges">Simpan</span>
      </button>
    </div>
  </div>

</form>