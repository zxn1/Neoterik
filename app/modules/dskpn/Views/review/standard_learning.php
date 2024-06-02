<div>
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header d-flex p-3 bg-gradient-primary">
        <h6 class="my-auto text-white">MAKLUMAT DSKPN</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-10">
            <label for="kluster">KLUSTER</label>
            <select class="form-control select2" id="kluster" name="kluster" <?= isset($topikncluster) ? 'disabled' : ''; ?>>
                <?php if (isset($topikncluster)) { ?>
                <option value="<?= $topikncluster['cm_id']; ?>" selected><?= $topikncluster['cm_desc']; ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="kluster">TAHUN</label>
            <?php
            $year_map = [
            1 => 'Satu',
            2 => 'Dua',
            3 => 'Tiga',
            4 => 'Empat',
            5 => 'Lima',
            6 => 'Enam'
            ];
            $tm_year_display = isset($year_map[$topic['tm_year']]) ? $year_map[$topic['tm_year']] : $topic['tm_year'];
            ?>
            <input class="form-control" value="<?= (empty($tm_year_display)) ? '' : $tm_year_display ?>" disabled>
          </div>
        </div>
        <div class="row py-4">
          <div class="col-md-8">
            <label for="topik">TOPIK</label>
            <select class="form-control select2" id="tahun" name="tahun" <?= isset($topikncluster) ? 'disabled' : ''; ?>>
                <?php if (isset($topikncluster)) { ?>
                <option value="<?= $topikncluster['tm_id']; ?>" selected><?= $topikncluster['tm_desc']; ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="tema">TEMA</label>
            <select name="tema" id="tema-selection" class="form-control select2" aria-label="Default select example" disabled>
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
            <input name="subtema" class="form-control" placeholder="Sila Masukkan Sub-Tema" value="<?= $subtema; ?>" disabled>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-4">
    <div class="card pb-3">
      <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
        <h6 class="my-auto text-white">STANDARD PEMBELAJARAN</h6>
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
                      <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" disabled>
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
                    </div>
                    <textarea class="multisteps-form__textarea form-control zero-top-border" name="subject_description[]" rows="5" placeholder="1. Objektif bagi Subjek ini.\n2. Objektif 2.." disabled><?= $subject_description[$index]; ?></textarea>
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
          <textarea name="objective" class="multisteps-form__textarea form-control zero-top-border objektif-prestasi-text" id="exampleFormControlTextarea1" rows="5" placeholder="Objektif yang hendak dicapai" disabled><?= $objective; ?></textarea>
        </div>
      </div>
    </div>
  </div>
</div>