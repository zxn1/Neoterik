<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid py-4">
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
              if(isset($data['data'][$group['tappc_desc']]))
              foreach($data['data'][$group['tappc_desc']] as $item) { ?>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm"><?= $item['tapp_desc']; ?></span>
                    </div>
                  </td>
                  <td class="justify-content-center">
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($specification_maplist) && in_array($item['tapp_id'],$specification_maplist))?'checked':''; ?> disabled>
                    </div>
                  </td>
                </tr>
              <?php } 
              if(isset($new_specification_input[$group['tappc_id']]) && !empty($new_specification_input[$group['tappc_id']]))
              {
                foreach($new_specification_input[$group['tappc_id']] as $new_input)
                { ?>
                  <tr id="new-input-<?= $new_input[1]; ?>">
                    <td class="ps-1" colspan="4">
                      <div class="my-auto">
                        <input type="text" class="form-control" placeholder="Tajuk Subjek" required value="<?= $new_input[0]; ?>" disabled>
                      </div>
                    </td>
                    <td class="justify-content-center">
                      <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($specification_maplist) && in_array($new_input[1],$specification_maplist))?'checked':''; ?> disabled>
                      </div>
                    </td>
                  </tr>
                <?php }
              }
              ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <br>
</div>