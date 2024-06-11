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
<script src="/neoterik/assets/ckeditor5/ckeditor.js"></script>

<form action="<?= route_to('store_std_learn'); ?>" method="POST">
  <?= csrf_field() ?>
  <?php if ($flag) { ?>
    <input name="kluster" class="form-control" value="<?= $topic['cm_id'] ?>" hidden>
    <input name="topik" class="form-control" value="<?= $topic['tm_id'] ?>" hidden>
  <?php } ?>

  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header d-flex p-3 bg-gradient-primary">
        <h6 class="my-auto text-white">MAKLUMAT DSKPN</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-10">
            <label for="kluster">KLUSTER</label>
            <?php if ($flag) { ?>
              <input name="kluster_desc" class="form-control" value="<?= $topic['cm_desc'] ?>" readonly>
            <?php } else { ?>
              <select name="kluster" id="kluster-selection" class="form-control select2" aria-label="Default select example" required>
                <option selected>-- Sila Pilih Kluster --</option>
                <?php foreach ($kluster as $item) { ?>
                  <option value="<?= $item['cm_id']; ?>"><?= $item['cm_desc']; ?></option>
                <?php } ?>
              </select>
            <?php } ?>
          </div>
          <div class="col-md-2">
            <label for="kluster">TAHUN</label>
            <?php
            if ($flag) {
              $year_map = [
                1 => 'Satu',
                2 => 'Dua',
                3 => 'Tiga',
                4 => 'Empat',
                5 => 'Lima',
                6 => 'Enam'
              ];
              $tm_year_display = isset($year_map[$topic['tm_year']]) ? $year_map[$topic['tm_year']] : $topic['tm_year'];
            }
            ?>
            <input id="tahun-to-display" class="form-control" value="<?= (empty($flag)) ? '' : $tm_year_display ?>" readonly>
          </div>
        </div>
        <div class="row py-4">
          <div class="col-md-8">
            <label for="topik">TOPIK</label>
            <?php if ($flag) { ?>
              <input name="topik_desc" class="form-control" value="<?= $topic['tm_desc'] ?>" readonly>
            <?php } else { ?>
              <select name="topik" id="topik-dynamic-field" class="form-control select2" aria-label="Default select example" required>
                <option disabled selected>-- Sila Pilih Topik --</option>
              </select>
            <?php } ?>
          </div>
          <div class="col-md-2">
            <label for="tema">TEMA</label>
            <select name="tema" id="tema-selection" class="form-control select2" aria-label="Default select example" required>
              <option disabled selected>-- Sila Pilih Tema --</option>
              <?php
              $arrS = [
                'Individu',
                'Keluarga',
                'Masyarakat'
              ];

              foreach($arrS as $itemz)
              { ?>
                <option value="<?= $itemz; ?>" <?= ($itemz == $tema)?'selected':''; ?>><?= $itemz; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="subtema">SUB-TEMA</label>
            <input name="subtema" class="form-control" placeholder="Sila Masukkan Sub-Tema" value="<?= $subtema; ?>" required>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-4">
    <div class="card pb-3">
      <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
        <h6 class="my-auto text-white">STANDARD PEMBELAJARAN</h6>
        <span id="add-subject-button" class="btn bg-gradient-info" style="margin-bottom:0 !important">Tambah Subjek&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </div>
      <div class="card-body py-2">
        <div class="row pb-4" id="standard-pembelajaran">
          <?php
          if(empty($subject))
          {
          ?>
            <span style="color : red;" id="hinting-no-subject">Hint : Anda masih belum menambah subjek</span>
          <?php
          } else { 
            foreach($subject as $index => $sub)
            {
            ?>
            <div class="col-md-4 subject-card">
                <div class="card mt-4">
                    <div class="card-header d-flex p-1 bg-gradient-secondary align-items-center">
                      <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required>
                        <?php foreach($subject_list as $item_list)
                          {
                            $flag = false;
                            if($item_list['sm_id'] == $sub)
                            {
                              $flag = true;
                            }
                            ?>
                            <option class="dropdown-item" value='<?= $item_list['sm_id'] ?>' <?= ($flag)?'selected':'' ?>><?= $item_list['sm_desc'] ?></option>
                          <?php } ?>
                      </select>
                      <!-- <input type="text" name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required value="<?= $sub; ?>"> -->
                      <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                          <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                    <textarea class="multisteps-form__textarea form-control zero-top-border" name="subject_description[]" rows="5" placeholder="1. Objektif bagi Subjek ini.\n2. Objektif 2.."><?= $subject_description[$index]; ?></textarea>
                </div>
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
          <textarea id="editor-objectif-pentaksiran" name="objective" class="multisteps-form__textarea form-control zero-top-border" id="exampleFormControlTextarea1" rows="5" placeholder="Objektif yang hendak dicapai"><?= $objective; ?></textarea>
        </div>
      </div>
    </div>
    <div class="text-end p-3">
      <button class="btn bg-gradient-info mt-2" type="submit">Simpan&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
          <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
          <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
        </svg>
      </button>
    </div>
  </div>
</form>

<div style="position : absolute; top : 0px; right : 0px; width: 100%; height: 100%; z-index : 3; display : none;" id="loading-screen">
  <dotlottie-player style="position : fixed; right : -100px; top : 20px; z-index : 3;" src="https://lottie.host/82b8666a-afa5-4659-8a0e-6faedb04158f/vlZwAM82T0.json" background="transparent" speed="1" style="width: 500px; height: 500px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
  <div style="position : absolute; width : 100%; height : 100%; background-color : black; opacity : 0.2;"></div>
</div>

<script>
  const subject_list = <?= json_encode($subject_list); ?>;
  const ckeditor_upload_url = '<?= route_to('store_image_ckedit'); ?>';
</script>

<!-- <div class="row pt-5">

      <div class="card pt-5">
          <div class="card-header d-flex bg-gradient-secondary">
              <h6 class="my-auto text-white">Objektif Prestasi</h6>
          </div>
          <textarea class="multisteps-form__textarea form-control zero-top-border" id="exampleFormControlTextarea1" rows="5" placeholder="Objektif yang hendak dicapai"></textarea>
      </div> -->

<!-- <div class="col border-0 d-flex p-3 bg-gray-100 border-radius-lg">
            <div class="d-flex flex-column w-100">
            <p class="mb-1 text-bold">Objektif Prestasi</p>
              <textarea class="form-control w-100" id="exampleFormControlTextarea1" rows="5" placeholder="Objectif yang hendak dicapai"></textarea>
            </div>
        </div> -->
<!-- </div> -->