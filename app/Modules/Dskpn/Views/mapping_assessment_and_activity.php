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

  .modal-dialog {
    max-width: 80%;
    width: 80%;
  }

  @media (max-width: 900px) {
    .modal-dialog {
      max-width: 100%;
      width: 100%;
    }
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


<form action="<?= route_to('store_actv_asses') ?>" method="POST" class="container-fluid py-4">

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
            <?php } else { ?>
              <option value="AL">Alabama</option>
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
              <option value="WY">Wyoming</option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="py-1">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
          <h6 class="my-auto text-white">PENETAPAN IDEA PENGAJARAN (AKTIVITI)</h6>
        </div>
        <div id="teaching-idea-and-activity" class="row p-3">
          <?php
          if (isset($activity_number) && !empty($activity_number) && isset($activity_input) && !empty($activity_input)) {
            foreach ($activity_number as $index => $numb) { ?>
              <div class="row m-1" id="activity-idea-item-<?= ($index + 1); ?>">
                <div class="col-2 p-0 pe-1">
                  <input type="text" name="activity-idea-number[]" pattern="^\d+(\.\d+)*$" 
                    title="Sila masukkan format nombor yang sah (contoh: 1.1.1 atau 1.2.3.4). Hanya angka dan titik dibenarkan."  class="form-control p-1" placeholder="1.1" style="height : 45px;" value="<?= $numb; ?>" required>
                </div>
                <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                  <input type="text" class="form-control p-1 me-1" name="activity-idea-input[]" placeholder="Idea pengajaran bagi topik DSKPN ini" style="height : 45px;" value="<?= isset($activity_input[$index]) ? $activity_input[$index] : '' ?>">
                  <div class="input-group-prepend me-1" style="margin-right : 5px;" onclick="$('#activity-idea-item-<?= ($index + 1); ?>').remove();">
                    <button class="input-group-text justify-content-center" id="btnGroupAddon" style="height : 45px; width : 50px;">
                      <i class="fas fa-trash-alt" style="color:red;"></i>
                    </button>
                  </div>
                </div>
              </div>
            <?php }
          } else {
            for ($i = 0; $i < 3; $i++) { ?>
              <div class="row m-1" id="activity-idea-item-<?= $i; ?>">
                <div class="col-2 p-0 pe-1">
                  <input type="text" name="activity-idea-number[]" pattern="^\d+(\.\d+)*$" 
                    title="Sila masukkan format nombor yang sah (contoh: 1.1.1 atau 1.2.3.4). Hanya angka dan titik dibenarkan."  class="form-control p-1" placeholder="1.1" style="height : 45px;" required>
                </div>
                <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                  <input type="text" class="form-control p-1 me-1" name="activity-idea-input[]" placeholder="Idea pengajaran bagi topik DSKPN ini" style="height : 45px;">
                  <div class="input-group-prepend me-1" style="margin-right : 5px;" onclick="$('#activity-idea-item-<?= $i; ?>').remove();">
                    <button class="input-group-text justify-content-center" id="btnGroupAddon" style="height : 45px; width : 50px;">
                      <i class="fas fa-trash-alt" style="color:red;"></i>
                    </button>
                  </div>
                </div>
              </div>
          <?php }
          } ?>
        </div>
        <div class="p-3 pt-0 pb-2">
          <span class="btn bg-primary mt-1 text-white" onclick="addActivityItemField('method-instruction-ID', 'ID')">Tambah Aktiviti &nbsp;&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
            </svg>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="py-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
          <h6 class="my-auto text-white">PENETAPAN PENTAKSIRAN</h6>
        </div>
        <?php foreach ($assessment_category as $index => $category) { ?>
          <div id="assessment-part-<?= $category['asc_id']; ?>" class="row p-2">
            <h6 class="m-1"><?= ($index + 1) . ". " . $category['asc_desc']; ?></h6>
            <div class="p-0 pe-3 ps-3" id="assessment-div-<?= $category['asc_id']; ?>">

              <?php
              if ((isset($assessment_number_session) && !empty($assessment_number_session)) && (isset($assessment_input_session) && !empty($assessment_input_session))) {
                if(isset($assessment_number_session[$category['asc_id']]))
                {
                  foreach ($assessment_number_session[$category['asc_id']] as $i => $assess) { ?>
                    <div class="row m-1" id="assessment-<?= $category['asc_id']; ?>-item-<?= ($i + 1) ?>">
                      <div class="col-2 p-0 pe-1">
                        <input type="text" name="assessment-number[<?= $category['asc_id']; ?>][]" pattern="^\d+(\.\d+)*$" 
                          title="Sila masukkan format nombor yang sah (contoh: 1.1.1 atau 1.2.3.4). Hanya angka dan titik dibenarkan."  class="form-control p-1" placeholder="1.1" style="height : 45px;" value="<?= $assess; ?>" required>
                      </div>
                      <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                        <input type="text" class="form-control p-1 me-1" name="assessment-input[<?= $category['asc_id']; ?>][]" placeholder="Idea pentaksiran bagi <?= strtolower($category['asc_desc']); ?>" style="height : 45px;" value="<?= $assessment_input_session[$category['asc_id']][$i]; ?>">
                        <div class="input-group-prepend me-1" style="margin-right : 5px;" onclick="$('#assessment-<?= $category['asc_id']; ?>-item-<?= ($i + 1) ?>').remove();">
                          <button class="input-group-text justify-content-center" id="btnGroupAddon" style="height : 45px; width : 50px;">
                            <i class="fas fa-trash-alt" style="color:red;"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  <?php }
                }
              } else { ?>
                <div class="row m-1" id="assessment-<?= $category['asc_id']; ?>-item-0">
                  <div class="col-2 p-0 pe-1">
                    <input type="text" name="assessment-number[<?= $category['asc_id']; ?>][]" pattern="^\d+(\.\d+)*$" 
                      title="Sila masukkan format nombor yang sah (contoh: 1.1.1 atau 1.2.3.4). Hanya angka dan titik dibenarkan."  class="form-control p-1" placeholder="1.1" style="height : 45px;" required>
                  </div>
                  <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                    <input type="text" class="form-control p-1 me-1" name="assessment-input[<?= $category['asc_id']; ?>][]" placeholder="Idea pentaksiran bagi <?= strtolower($category['asc_desc']); ?>" style="height : 45px;">
                    <div class="input-group-prepend me-1" style="margin-right : 5px;" onclick="$('#assessment-<?= $category['asc_id']; ?>-item-0').remove();">
                      <button class="input-group-text justify-content-center" id="btnGroupAddon" style="height : 45px; width : 50px;">
                        <i class="fas fa-trash-alt" style="color:red;"></i>
                      </button>
                    </div>
                  </div>
                </div>
              <?php } ?>

            </div>
            <div class="p-3 pt-0 pb-1">
              <span class="btn bg-primary mt-1 text-white" onclick="addAsessmentItemField('<?= $category['asc_id']; ?>')">Tambah Item <?= $category['asc_desc']; ?>&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                </svg>
              </span>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
          <h6 class="my-auto text-white">PENETAPAN ALAT BANTU MENGAJAR (ABM)</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="table-responsive">
              <table class="table mb-0">
                <tbody id="item-abm">

                  <?php
                  if (!empty($abm_session)) {
                    foreach ($abm_session as $abm) {
                      $random_number = rand(100000, 999999);
                  ?>
                      <tr id="<?= $random_number; ?>-item-abm">
                        <td class="ps-1" colspan="4">
                          <div class="my-auto">
                            <input type="text" class="form-control text-dark d-block text-sm" placeholder="Alat Bantu Mengajar (ABM)" name="abm[]" value="<?= $abm; ?>">
                          </div>
                        </td>
                        <td width="5px">
                          <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#<?= $random_number; ?>-item-abm').remove();">
                            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                          </a>
                        </td>
                      </tr>
                    <?php
                    }
                  } else { ?>
                    <tr id="0-item-abm">
                      <td class="ps-1" colspan="4">
                        <div class="my-auto">
                          <input type="text" class="form-control text-dark d-block text-sm" placeholder="Alat Bantu Mengajar (ABM)" name="abm[]" value="">
                        </div>
                      </td>
                      <td width="5px">
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#0-item-abm').remove();">
                          <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
              <span class="btn bg-primary mt-2 text-white" onclick="addField()">Tambah Item&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">

      <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
          <h6 class="my-auto text-white">KEPERLUAN PENGLIBATAN IBU BAPA</h6>
        </div>
        <div class="card-body">
          <table class="mt-2 card" style="border-style : solid; border-width : 2px;">
            <tr>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                  <input class="form-check-input" value="Y" name="parent-involvement" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($parent_involve) && !empty($parent_involve) && $parent_involve == 'Y') ? 'checked' : ''; ?>>
                </div>
              </td>
              <td>
                Ya, melibatkan ibu-bapa
              </td>
            </tr>
          </table>
        </div>
      </div>

    </div>
  </div>
  <hr class="horizontal dark mb-1 d-xl-block d-none">

  <div class="d-flex justify-content-between align-items-center p-2">
    <a href="<?= route_to('domain_mapping'); ?>" class="btn border border-gray text-gray">
      <span>Kembali</span>
    </a>
    <div class="text-end p-3">
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
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });

  const ckeditor_upload_url = '<?= route_to('store_image_ckedit'); ?>';
</script>