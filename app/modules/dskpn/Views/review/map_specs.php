<div class="container-fluid py-4">

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
              if(isset($data['Reka Bentuk Instruksi']))
              foreach($data['Reka Bentuk Instruksi'] as $item) { ?>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($specification_maplist) && in_array($item['d_id'],$specification_maplist))?'checked':''; ?> disabled>
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
              if(isset($data['Integrasi Teknologi']))
              foreach($data['Integrasi Teknologi'] as $item) { ?>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($specification_maplist) && in_array($item['d_id'],$specification_maplist))?'checked':''; ?> disabled>
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
              if(isset($data['Pendekatan']))
              foreach($data['Pendekatan'] as $item) { ?>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($specification_maplist) && in_array($item['d_id'],$specification_maplist))?'checked':''; ?> disabled>
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
              if(isset($data['Kaedah']))
              foreach($data['Kaedah'] as $item) {
                if($item['d_name'] != 'Lain-lain') {
              ?>
                  <tr>
                    <td class="ps-1" colspan="4">
                      <div class="my-auto">
                        <span class="text-dark d-block text-sm"><?= $item['d_name']; ?></span>
                      </div>
                    </td>
                    <td>
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($specification_maplist) && in_array($item['d_id'],$specification_maplist))?'checked':''; ?> disabled>
                      </div>
                    </td>
                  </tr>
                <?php
                }
              if($item['d_name'] == 'Lain-lain') { ?>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm"><?= $item['d_name']; ?>:</span>
                      <textarea name="lain-lain-input" disabled><?= empty($specification_lain_lain)?'':$specification_lain_lain; ?></textarea>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17" <?= (!empty($specification_lain_lain))?'checked':''; ?> disabled>
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
</div>