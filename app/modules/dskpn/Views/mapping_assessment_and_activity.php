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
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">Petaan Aktiviti dan Pentaksiran</h6>
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
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Idea Pengajaran (Aktiviti)</h6>
        </div>
        <div id="teaching-idea-and-activity" class="row p-3">
          <?php for($i = 0; $i < 3; $i++) { ?>
          <div class="row m-1" id="activity-idea-item-<?= $i; ?>">
            <div class="col-2 p-0 pe-1">
              <input type="number" name="activity-idea-number[]" step="0.01" min="0" class="form-control p-1" placeholder="1.1" style="height : 45px;">
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
          <?php } ?>
        </div>
        <div class="p-3 pt-0 pb-2">
          <span class="btn bg-gradient-primary mt-1" onclick="addActivityItemField('method-instruction-ID', 'ID')">Tambah Aktiviti &nbsp;&nbsp;
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
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Pentaksiran</h6>
        </div>
        <?php foreach($assessment_category as $index => $category) { ?>
        <div id="assessment-part-<?= $category['asc_id']; ?>" class="row p-2">
          <h6 class="m-1"><?= ($index + 1) . ". " . $category['asc_desc']; ?></h6>
          <div class="p-0 pe-3 ps-3" id="assessment-div-<?= $category['asc_id']; ?>">
            <div class="row m-1" id="assessment-<?= $category['asc_id']; ?>-item-0">
              <div class="col-2 p-0 pe-1">
                <input type="number" name="assessment-number[<?= $category['asc_id']; ?>][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1" style="height : 45px;">
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
          </div>
          <div class="p-3 pt-0 pb-1">
            <span class="btn bg-gradient-primary mt-1" onclick="addAsessmentItemField('<?= $category['asc_id']; ?>')">Tambah Item <?= $category['asc_desc']; ?>&nbsp;&nbsp;
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
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Alat Bantu Mengajar (ABM)</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="table-responsive">
              <table class="table mb-0">
                <tbody id="item-abm">

                  <?php
                  if (!empty($act_assess_abm)) {
                    foreach ($act_assess_abm as $abm) {
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
              <span class="btn bg-gradient-primary mt-2" onclick="addField()">Tambah Item&nbsp;&nbsp;
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
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Keperluan Pengilabatan Ibu Bapa</h6>
        </div>
        <div class="card-body">
          <table class="mt-2 card" style="border-style : solid; border-width : 2px;">
            <tr>
              <td>
                <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                  <input class="form-check-input" value="Y" name="parent-involvement" type="checkbox" id="flexSwitchCheckDefault11" <?= (!empty($act_assess_parent_involve) && $act_assess_parent_involve == 'Y') ? 'checked' : ''; ?>>
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

  <div class="d-flex justify-content-between align-items-center p-2">
    <a href="<?= route_to('mapping_dynamic_dskpn'); ?>" class="btn bg-gradient-danger mt-2">
      <span>Kembali</span>
    </a>
    <div class="text-end p-3">
      <!-- <a href="domain-mapping" type="button" class="btn bg-gradient-secondary">Batal</a> -->
      <button type="submit" class="btn bg-gradient-info">Seterusnya</button>
    </div>
  </div>

  <?php
  if ($review) { ?>

    <div class="modal" id="review-dskpn" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Semakan dan Konfirmasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#review-dskpn').modal('hide');">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <iframe src="<?= route_to('review_dskpn') . "?page=1"; ?>" style="height: 70vh; width : 100%;">
            </iframe>
          </div>
          <div class="modal-footer">
            <a href="<?= route_to("tp_maintenance") ?>" class="btn btn-secondary">Betulkan Semula</a>
            <a href="<?= route_to('dskpn_complete') ?>" type="button" class="btn btn-primary" data-dismiss="modal">Selesai</a>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $('#review-dskpn').modal('show');
      });
    </script>

  <?php }
  ?>

</form>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });

  const ckeditor_upload_url = '<?= route_to('store_image_ckedit'); ?>';
</script>