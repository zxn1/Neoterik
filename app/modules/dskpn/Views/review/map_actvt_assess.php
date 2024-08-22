<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid py-4">
  <div class="row">
    <div class="py-1">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Idea Pengajaran (Aktiviti)</h6>
        </div>
        <div id="teaching-idea-and-activity" class="row p-3">
          <?php 
          if(isset($activity_number) && !empty($activity_number) && isset($activity_input) && !empty($activity_input))
          {
            foreach($activity_number as $index => $numb)
            { ?>
            <div class="row m-1" id="activity-idea-item-<?= ($index + 1); ?>">
              <div class="col-2 p-0 pe-1">
                <input type="number" class="form-control p-1" placeholder="1.1" style="height : 45px;" value="<?= $numb; ?>" disabled>
              </div>
              <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                <input type="text" class="form-control p-1 me-1" style="height : 45px;" value="<?= isset($activity_input[$index])?$activity_input[$index]:'' ?>" disabled>
              </div>
            </div>
            <?php } 
          } ?>
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

            <?php 
            if((isset($assessment_number_session) && !empty($assessment_number_session)) && (isset($assessment_input_session) && !empty($assessment_input_session)))
            {
            foreach($assessment_number_session[$category['asc_id']] as $i => $assess) { ?>
            <div class="row m-1" id="assessment-<?= $category['asc_id']; ?>-item-<?= ($i + 1) ?>">
              <div class="col-2 p-0 pe-1">
                <input type="number" class="form-control p-1" placeholder="1.1" style="height : 45px;" value="<?= $assess; ?>" disabled>
              </div>
              <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                <input type="text" class="form-control p-1 me-1" placeholder="Idea pentaksiran bagi <?= strtolower($category['asc_desc']); ?>" style="height : 45px;" value="<?= $assessment_input_session[$category['asc_id']][$i]; ?>" disabled>
              </div>
            </div>
            <?php }
            } ?>

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
                  if (!empty($abm_session)) {
                    foreach ($abm_session as $abm) {
                      $random_number = rand(100000, 999999);
                  ?>
                      <tr id="<?= $random_number; ?>-item-abm">
                        <td class="ps-1" colspan="4">
                          <div class="my-auto">
                            <input type="text" class="form-control text-dark d-block text-sm" placeholder="Alat Bantu Mengajar (ABM)" value="<?= $abm; ?>" disabled>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                  } ?>

                </tbody>
              </table>
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
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (isset($parent_involve) && !empty($parent_involve) && $parent_involve == 'Y') ? 'checked' : ''; ?> disabled>
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
</div>