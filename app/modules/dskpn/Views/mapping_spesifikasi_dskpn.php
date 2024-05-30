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


<form action="<?= route_to('store-spec-map') . "?dskpn=" . $dskpn_id; ?>" method="POST" class="container-fluid py-4">

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
              <option value="<?= $topikncluster['cm_id']; ?>" selected><?= $topikncluster['cm_desc']; ?></option>
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
    <!-- REKA BENTUK INSTRUKSI-->
    <div class="col-md-6">
      <div class="card mt-4" style="min-height:400px;" id="notifications">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">REKA BENTUK INSTRUKSI</h6>
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
              <tbody>

                <?php
                if (isset($data['Reka Bentuk Instruksi']))
                  foreach ($data['Reka Bentuk Instruksi'] as $item) { ?>
                  <tr>
                    <td class="ps-1" colspan="4">
                      <div class="my-auto">
                        <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" name="input-<?= $item['d_id'] ?>" value="<?= $item['d_id'] ?>" type="checkbox" id="flexSwitchCheckDefault11">
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
    <!-- INTEGRASI TEKNOLOGI -->
    <div class="col-md-6">
      <div class="card mt-4" style="min-height:400px;" id="notifications">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">INTEGRASI TEKNOLOGI</h6>
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
              <tbody>

                <?php
                if (isset($data['Integrasi Teknologi']))
                  foreach ($data['Integrasi Teknologi'] as $item) { ?>
                  <tr>
                    <td class="ps-1" colspan="4">
                      <div class="my-auto">
                        <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" name="input-<?= $item['d_id'] ?>" value="<?= $item['d_id'] ?>" type="checkbox" id="flexSwitchCheckDefault11">
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
  </div>
  <!-- KAEDAH -->
  <div class="row">
    <!-- PENDEKATAN -->
    <div class="col-md-6">
      <div class="card mt-4" style="min-height:400px;" id="notifications">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">PENDEKATAN</h6>
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
              <tbody>

                <?php
                if (isset($data['Pendekatan']))
                  foreach ($data['Pendekatan'] as $item) { ?>
                  <tr>
                    <td class="ps-1" colspan="4">
                      <div class="my-auto">
                        <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" name="input-<?= $item['d_id'] ?>" value="<?= $item['d_id'] ?>" type="checkbox" id="flexSwitchCheckDefault11">
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
    <!-- KAEDAH -->
    <div class="col-md-6">
      <div class="card mt-4" id="notifications">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">KAEDAH</h6>
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
              <tbody>

                <?php
                if (isset($data['Kaedah']))
                  foreach ($data['Kaedah'] as $item) { ?>
                  <tr>
                    <td class="ps-1" colspan="4">
                      <div class="my-auto">
                        <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" name="input-<?= $item['d_id'] ?>" value="<?= $item['d_id'] ?>" type="checkbox" id="flexSwitchCheckDefault11">
                      </div>
                    </td>
                  </tr>
                  <?php
                    if ($item['d_name'] == 'Lain-lain') { ?>
                    <tr>
                      <td class="ps-1" colspan="4">
                        <div class="my-auto">
                          <span class="text-dark d-block text-sm"><?= $item['d_name']; ?>:</span>
                          <textarea name="lain-lain-input"></textarea>
                        </div>
                      </td>
                      <td>
                        <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                          <input class="form-check-input" name="input-lain" value="<?= $item['d_id'] ?>" type="checkbox" id="flexSwitchCheckDefault17">
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
  </div>
  <br>
  <div class="text-end p-3">
    <a href="domain-mapping" type="button" class="btn bg-gradient-secondary">Batal</a>
    <button type="submit" class="btn bg-gradient-info">Seterusnya</button>
  </div>
</form>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>