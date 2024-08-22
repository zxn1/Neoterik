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


<form action="<?= route_to('store-spec-map') ?>" method="POST" class="container-fluid py-4">

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
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
    <?php foreach($allGroup as $group) { ?>
    <div class="col-md-6">
      <div class="card mt-4" style="min-height:400px;" id="notifications">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white"><?= strtoupper($group['tappc_desc']); ?></h6>
        </div>
        <div class="card-body pt-0">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th class="ps-1" colspan="4">
                    <p class="mb-0">Butiran</p>
                  </th>
                  <th class="text-center">
                    <p class="mb-0">Tindakan</p>
                  </th>
                </tr>
              </thead>
              <tbody id="method-instruction-<?= $group['tappc_id'] ?>">
                
              <?php 
              if(isset($data[$group['tappc_desc']]))
              foreach($data[$group['tappc_desc']] as $item) { ?>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm"><?= $item['tapp_desc']; ?></span>
                    </div>
                  </td>
                  <td class="justify-content-center">
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" name="input-<?= $item['tapp_id'] ?>" value="<?= $item['tapp_id'] ?>" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($specification_maplist) && in_array($item['tapp_id'],$specification_maplist))?'checked':''; ?>>
                    </div>
                  </td>
                </tr>
              <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
        <?php if($group['tappc_allow_modify'] == 'Y') { ?>
          <span class="btn bg-gradient-primary mt-2 me-2 ms-2" onclick="addField('method-instruction-<?= $group['tappc_id'] ?>', <?= $group['tappc_id'] ?>)">Tambah TP &nbsp;&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
            </svg>
          </span>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
  </div>
  <br>

  <div class="d-flex justify-content-between align-items-center p-2">
    <a href="<?= route_to('domain_mapping'); ?>" class="btn bg-gradient-danger mt-2">
      <span>Kembali</span>
    </a>
    <div class="text-end p-3">
      <!-- <a href="domain-mapping" type="button" class="btn bg-gradient-secondary">Batal</a> -->
      <button type="submit" class="btn bg-gradient-info">Semak</button>
    </div>
  </div>

</form>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>

<script>
  function addField(collectionId, id) {
    bareBoneId = collectionId;

    // Get the collection container
    var collection = $('#' + collectionId);

    // Generate a unique ID for the new field
    var newFieldId = Math.floor(Math.random() * 1000000);

    // Create the new field HTML
    var newFieldHTML = `
        <tr id="new-input-` + newFieldId + `">
          <td class="ps-1" colspan="4">
            <div class="my-auto">
              <input type="text" name="new-item[` + id + `][` + newFieldId + `]" class="form-control" placeholder="Tajuk Subjek" required>
            </div>
          </td>
          <td class="d-flex justify-content-center">
            <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
              <input class="form-check-input" name="new-item-checked[` + id + `][` + newFieldId + `]" value="`+ id +`" type="checkbox" id="flexSwitchCheckDefault11">
            </div>
            <a class="btn btn-link text-danger text-gradient mb-0" href="javascript:void(0)" onclick="$('#new-input-` + newFieldId + `').remove();">
              <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
    `;

    collection.append(newFieldHTML);
}
</script>