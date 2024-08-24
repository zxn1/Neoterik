<style>
  .subject-title::placeholder {
    color: white !important;
    opacity: 1;
    /* Firefox */
  }

  .dropdown-item {
    color: black !important;
  }
</style>
  <div class="container-fluid py-4">
    <div class="card pb-3">
      <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
        <h6 class="my-auto text-white">STANDARD PEMBELAJARAN</h6>
      </div>
      <div class="card-body py-2">
        <div class="row pb-4" id="standard-pembelajaran">
          <?php
          if (empty($subject)) {
          ?>
            <span style="color : red;" id="hinting-no-subject">Hint : Anda masih belum menambah subjek</span>
            <?php
          } else {
            foreach ($subject as $index => $sub) {
            ?>

              <div class="col-md-4 subject-card">
                <?php foreach ($subject_list as $item_list) : ?>
                  <?php if ($item_list['sbm_id'] == $sub) : ?>
                    <div class="card mt-4">
                      <div class="card-header d-flex p-1 bg-gradient-secondary align-items-center">
                        <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required>
                          <option class="dropdown-item" value='<?= $item_list['sbm_id'] ?>' <?= (true) ? 'selected' : '' ?>><?= $item_list['sbm_desc'] ?></option>
                        </select>
                      </div>

                      <?php
                      if (!empty($subject_description) && $subject_description != "") {
                        echo "<div id=\"standard-subject-" . $item_list['sbm_id'] . "\" style=\"margin-top : 5px; margin-bottom : 5px; margin-left : 5px;\">";
                        foreach ($subject_description[$item_list['sbm_id']] as $index => $desc_item) { ?>
                            <div class="row m-1" id="standard-item-<?= $item_list['sbm_id']; ?>">
                              <div class="col-2 p-0 pe-1">
                                <input type="number" name="standard-learning-number[<?= $item_list['sbm_id']; ?>][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1" value="<?= isset($subject_standard_numbering[$item_list['sbm_id']][$index])?$subject_standard_numbering[$item_list['sbm_id']][$index]:'' ?>" disabled>
                              </div>
                              <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                                <input type="text" class="form-control p-1 me-1" name="subject_description[<?= $item_list['sbm_id']; ?>][]" placeholder="Objektif bagi Subjek ini." value="<?= $desc_item; ?>" disabled>
                              </div>
                            </div>
                        <?php
                        }
                        echo "</div>";
                      } ?>

                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
          <?php
            }
          }
          ?>
        </div>
        <div class="card">
          <div class="card-header d-flex bg-gradient-secondary objektif-prestasi">
            <h6 class="my-auto text-white ms-2">Objektif Prestasi</h6>
          </div>
          <div id="objective-prestasi" style="margin : 10px;">

            <?php
            if (!empty($objective) && $objective != "") {
              foreach($objective as $index => $item)
              { ?>
              <div class="input-group" style="margin-bottom: 10px;" id="objective-prestasi-<?= ($index + 1); ?>">
                <div class="col-md-1 pe-1">
                  <input type="number" name="objective-prestasi-number[]" step="0.01" min="0" class="form-control" placeholder="1.1" value="<?= isset($objective_number[$index])?$objective_number[$index]:'' ?>" disabled>
                </div>
                <div class="col-md-8 pe-1">
                  <input type="text" name="objective-prestasi-desc[]" class="form-control" placeholder="Objektif prestasi bagi Topik DSKPN ini." value="<?= $item ?>" disabled>
                </div>
                <?php
                  $rand = rand(100000000,1000000000);
                ?>
                <div class="col-md-3 d-flex">
                  <input type="text" name="objective-prestasi-ref[<?= $rand; ?>][]" class="form-control" placeholder="PK 8.1.1" value="<?= isset($objective_ref[$index])?$objective_ref[$index]:'' ?>" disabled>
                </div>
              </div>
              <?php }
            }
            ?>
          </div>

        </div>
        <br>
        <div style="display: flex; align-items: center;">
          <h6 for="Duration" style="margin-right: 10px;">Durasi Perlaksanaan</h6>
          <input name="duration" style="width: 200px;" class="form-control" type="number" placeholder="Sila Masukkan Durasi" value="<?= $duration; ?>" required disabled>&nbsp;<b>Minit</b>
        </div>

      </div>
    </div>
  </div>

<div style="position : absolute; top : 0px; right : 0px; width: 100%; height: 100%; z-index : 3; display : none;" id="loading-screen">
  <dotlottie-player style="position : fixed; right : -100px; top : 20px; z-index : 3;" src="https://lottie.host/82b8666a-afa5-4659-8a0e-6faedb04158f/vlZwAM82T0.json" background="transparent" speed="1" style="width: 500px; height: 500px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
  <div style="position : absolute; width : 100%; height : 100%; background-color : black; opacity : 0.2;"></div>
</div>

<script>
  var globalCheckingDSKPNCode = <?= isset($dskpn_code_init) ? 'true' : 'false' ?>;
  const subject_list = <?= json_encode($subject_list); ?>;
  const ckeditor_upload_url = '<?= route_to('store_image_ckedit'); ?>';
  let get_default_subject = JSON.parse('<?= isset($getDefaultSubject) ? json_encode($getDefaultSubject) : 'null'; ?>');
</script>