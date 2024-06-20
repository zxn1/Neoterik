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


<form method="POST" action="<?= route_to('store_core_map') ?>" class="container-fluid py-4">

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">16 DOMAIN MAPPING</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label for="kluster">KLUSTER</label>
          <select class="form-control select2" id="kluster" name="kluster" <?= isset($topikncluster)?'disabled':''; ?>>
            <?php if(isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['cm_id']; ?>" selected><?= $topikncluster['cm_desc']; ?></option>
            <?php } else { ?>
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
            <?php } ?>
          </select>
        </div>
        <div class="col">
          <label for="tahun">TOPIK</label>
          <select class="form-control select2" id="tahun" name="tahun" <?= isset($topikncluster)?'disabled':''; ?>>
            <?php if(isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['tm_id']; ?>" selected><?= $topikncluster['tm_desc']; ?></option>
            <?php } else { ?>
            <option value="AL">Alabama</option>
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
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false" tabindex="-1">
                  KOMPETENSI TERAS
                </a>
              </li>
              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="row">

              <?php 
              if(isset($subjects))
              foreach($subjects as $subject) { ?>
                <div class="col-md-4">
                  <div class="card mt-4" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white"><?= $subject['sm_desc'] ?></h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0 mt-3">
                          <tbody id="item-placing-<?= $subject['sm_code'] ?>">

                          <?php 
                          if(isset($core_map_sess[$subject['sm_code']]))
                          {
                          foreach($core_map_sess[$subject['sm_code']] as $core_map)
                          {
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $charactersLength = strlen($characters);
                            $randomString = '';
                            for ($i = 0; $i < 10; $i++) {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            ?>
                            <tr id="0-item-placing-<?= $subject['sm_code'] ?>">
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <input type="text" class="form-control text-dark d-block text-sm" placeholder="Menilai dan mencinpta" name="input-<?= $subject['sm_code'] ?>[]" value="<?= $core_map[0]; ?>">
                                </div>
                              </td>
                              <td width="10px">
                                <div class="form-check form-switch mb-0 mt-2 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" value="<?= $subject['sm_code'] ?>" id="flexSwitchCheckDefault11" onchange="setCheckBox(this, '<?= $randomString . $subject['sm_code'] ?>', this.value)" <?= $core_map[1]=='Y'?'checked':''; ?>>
                                  <input type="text" value="<?= $core_map[1]=='Y'?$subject['sm_code']:'off'; ?>" name="checked-<?= $subject['sm_code'] ?>[]" id="<?= $randomString . $subject['sm_code'] ?>" hidden/>
                                </div>
                              </td>
                              <td width="5px">
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#0-item-placing-<?= $subject['sm_code'] ?>').remove();">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                              </td>
                            </tr>
                          <?php }} else { ?>
                            
                            <tr id="0-item-placing-<?= $subject['sm_code'] ?>">
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <input type="text" class="form-control text-dark d-block text-sm" placeholder="Menilai dan mencinpta" name="input-<?= $subject['sm_code'] ?>[]">
                                </div>
                              </td>
                              <td width="10px">
                                <div class="form-check form-switch mb-0 mt-2 d-flex align-items-center justify-content-center">
                                  <input class="form-check-input" type="checkbox" value="<?= $subject['sm_code'] ?>" id="flexSwitchCheckDefault11" onchange="setCheckBox(this, '000<?= $subject['sm_code'] ?>', this.value)">
                                  <input type="text" value="off" name="checked-<?= $subject['sm_code'] ?>[]" id="000<?= $subject['sm_code'] ?>" hidden/>
                                </div>
                              </td>
                              <td width="5px">
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#0-item-placing-<?= $subject['sm_code'] ?>').remove();">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                              </td>
                            </tr>

                          <?php } ?>

                          </tbody>
                        </table>
                        <span class="btn bg-gradient-primary mt-2" onclick="addField('<?= $subject['sm_code'] ?>')">Tambah Item&nbsp;&nbsp;
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                            <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13m.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0"/>
                          </svg>
                        </span>
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
    <a href="<?= route_to('tp_maintenance'); ?>" class="btn bg-gradient-danger mt-2">
      <span>Kembali</span>
    </a>
    <div class="text-end p-3">
      <!-- <a href="domain-mapping" type="button" class="btn bg-gradient-secondary">Batal</a> -->
      <button type="submit" class="btn bg-gradient-info">Seterusnya</button>
    </div>
  </div>

</form>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>