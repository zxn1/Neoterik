<style>
  .subject-title::placeholder {
    color: white !important;
    opacity: 1;
    /* Firefox */
  }

  .dropdown-item {
    color: black !important;
  }

  div.col-md-3.d-flex>div.ms-parent {
    width: 100% !important;
    padding: 0px !important;
  }

  div.col-md-3.d-flex>div.ms-parent>button {
    height: 40px !important;
    border-radius: 7.5px;
  }

  div.col-md-3.d-flex>div.ms-parent>button>span {
    background-color: white !important;
    margin-top: 5px !important;
    margin-left: 5px !important;
  }

  div.col-md-3.d-flex>div.ms-parent>div>ul>li>label>span {
    font-size: 14px !important;
  }

  div.col-md-2.d-flex > select.select2adjustheight + span > span.selection > span {
    height: 40px;
    margin-left : 5px;
  }
</style>
<script src="/neoterik/assets/ckeditor5/ckeditor.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.7.0/dist/multiple-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://unpkg.com/multiple-select@1.7.0/dist/multiple-select.min.js"></script>

<form action="<?= route_to('store_std_learn'); ?>" method="POST" id="submit_learning">
  <?= csrf_field() ?>
  <?php if ($flag) { ?>
    <input name="kluster" class="form-control" value="<?= $topic['tm_ctm_id'] ?>" hidden>
    <input name="topik" class="form-control" value="<?= $topic['tm_id'] ?>" hidden>
  <?php } ?>

  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header d-flex p-3 bg-primary">
        <h6 class="my-auto text-white"><b>MAKLUMAT DSKPN</b></h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-10">
            <label for="kluster">KLUSTER</label>
            <?php if ($flag) { ?>
              <input name="kluster_desc" class="form-control" value="<?= $topic['tm_desc'] ?>" readonly>
            <?php } else { ?>
              <select name="kluster" id="kluster-selection" class="form-control select2" aria-label="Default select example" required>
                <option selected>-- Sila Pilih Kluster --</option>
                <?php foreach ($kluster as $item) { ?>
                  <option value="<?= $item['ctm_id']; ?>"><?= $item['ctm_desc']; ?></option>
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
            <input id="tahun-to-display" name="tahun" class="form-control" value="<?= (empty($flag)) ? '' : $tm_year_display ?>" readonly>
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
                'Masyarakat',
                'Negara',
                'Dunia'
              ];

              foreach ($arrS as $itemz) { ?>
                <option value="<?= $itemz; ?>" <?= ($itemz == $tema) ? 'selected' : ''; ?>><?= $itemz; ?></option>
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
      <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
        <h6 class="my-auto text-white"><b>STANDARD PEMBELAJARAN</b></h6>
        <span id="add-subject-button" class="btn bg-info text-white" style="margin-bottom:0 !important">Tambah Subjek&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
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
                      <div class="card-header d-flex p-1 bg-secondary align-items-center">
                        <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required>
                          <option class="dropdown-item" value='<?= $item_list['sbm_id'] ?>' <?= ($flag) ? 'selected' : '' ?>><?= $item_list['sbm_desc'] ?></option>
                        </select>
                        <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>

                      <?php
                      if (!empty($subject_description) && $subject_description != "") {
                        echo "<div id=\"standard-subject-" . $item_list['sbm_id'] . "\" style=\"margin-top : 5px; margin-bottom : 5px; margin-left : 5px;\">";
                        foreach ($subject_description[$item_list['sbm_id']] as $index => $desc_item) { ?>
                          <div class="row m-1" id="standard-item-<?= $item_list['sbm_id']; ?>">
                            <div class="col-2 p-0 pe-1">
                              <input type="number" onchange="selectionPopulateBasedOnNumbering()" id="standard-learning-number" data-subject="<?= $item_list['sbm_code']; ?>" name="standard-learning-number[<?= $item_list['sbm_id']; ?>][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1" value="<?= isset($subject_standard_numbering[$item_list['sbm_id']][$index]) ? $subject_standard_numbering[$item_list['sbm_id']][$index] : '' ?>">
                            </div>
                            <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                              <input type="text" class="form-control p-1 me-1" name="subject_description[<?= $item_list['sbm_id']; ?>][]" placeholder="Objektif bagi Subjek ini." value="<?= $desc_item; ?>">
                              <div class="input-group-prepend me-1" style="margin-right : 5px;" onclick="$('#standard-item-<?= $item_list['sbm_id']; ?>').remove();selectionPopulateBasedOnNumbering();">
                                <button class="input-group-text" id="btnGroupAddon">
                                  <i class="fas fa-trash-alt" style="color:red;"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        <?php
                        }
                        echo "</div>";
                      } else { ?>
                        <div id="standard-subject-<?= $item_list['sbm_id']; ?>" style="margin-top : 5px; margin-bottom : 5px; margin-left : 5px;">
                          <div class="row m-1" id="standard-item-<?= $item_list['sbm_id']; ?>">
                            <div class="col-2 p-0 pe-1">
                              <input type="number" onchange="selectionPopulateBasedOnNumbering()" id="standard-learning-number" data-subject="<?= $item_list['sbm_code']; ?>" name="standard-learning-number[<?= $item_list['sbm_id']; ?>][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1">
                            </div>
                            <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
                              <input type="text" class="form-control p-1 me-1" name="subject_description[<?= $item_list['sbm_id']; ?>][]" placeholder="Objektif bagi Subjek ini.">
                              <div class="input-group-prepend me-1" onclick="$('#standard-item-<?= $item_list['sbm_id']; ?>').remove();selectionPopulateBasedOnNumbering();">
                                <button class="input-group-text" id="btnGroupAddon">
                                  <i class="fas fa-trash-alt" style="color:red;"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php
                      } ?>

                      <div class="p-1">
                        <span class="btn bg-primary mt-2 text-white" onclick="addStandardPembelajaran('<?= $item_list['sbm_id']; ?>', '<?= $item_list['sbm_code']; ?>')">Tambah &nbsp;&nbsp;
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                          </svg>
                        </span>
                      </div>

                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
        <h6 class="my-auto text-white"><b>OBJEKTIF PRESTASI</b></h6>
      </div>
      <div id="objective-prestasi" style="margin : 10px;">

        <?php
        if (!empty($objective) && $objective != "") {
          $op_pentaksiran_counter = 0;
          foreach ($objective as $index => $item) { ?>
            <div class="input-group" style="margin-bottom: 10px;" id="objective-prestasi-<?= ($index + 1); ?>">
              <div class="col pe-1">
                <input type="number" name="objective-prestasi-number[]" step="0.01" min="0" class="form-control" placeholder="1.1" value="<?= isset($objective_number[$index]) ? $objective_number[$index] : '' ?>">
              </div>
              <div class="col-md-6 pe-1">
                <input type="text" name="objective-prestasi-desc[]" class="form-control" placeholder="Objektif prestasi bagi Topik DSKPN ini." value="<?= $item ?>">
              </div>
              <div class="col-md-3 d-flex">

                <?php
                $rand = rand(100000000, 1000000000);
                $selectedValues = isset($selected_by_selected[$index]) ? $selected_by_selected[$index] : [];
                ?>
                <select id="objective-prestasi-ref-<?= $rand; ?>" name="objective-prestasi-ref[<?= $rand; ?>][]" multiple="multiple">
                  <?php
                  if (isset($list_selection_to_populate) && !empty(json_decode($list_selection_to_populate, true))) {
                    foreach (json_decode($list_selection_to_populate, true) as $populate_select) { ?>
                      <option value="<?= $populate_select; ?>" <?= in_array($populate_select, $selectedValues) ? 'selected' : '' ?>><?= $populate_select; ?></option>
                    <?php
                    }
                  } else {
                    ?>
                    <option disabled>-- Sila pilih Kod --</option>
                  <?php } 
                  $selectedValues = isset($selected_assessment_code[$index]) ? $selected_assessment_code[$index] : []; //used for pentaksiran code
                  ?>
                </select>
                <script>
                  $(document).ready(function() {
                    initializeEachOne('<?= $rand; ?>');
                  });
                </script>
              </div>
              <div class="col-md-2 d-flex">
                <select name="objective-prestasi-pentaksiran[<?= $rand; ?>][]" id="dynamic-select2-<?= $op_pentaksiran_counter; ?>" class="select2adjustheight dynamic-select2 form-control" multiple="multiple">
                  <optgroup label="Kognitif">
                    <option value="C1" <?= in_array('C1', $selectedValues) ? 'selected' : '' ?>>C1</option>
                    <option value="C2" <?= in_array('C2', $selectedValues) ? 'selected' : '' ?>>C2</option>
                    <option value="C3" <?= in_array('C3', $selectedValues) ? 'selected' : '' ?>>C3</option>
                    <option value="C4" <?= in_array('C4', $selectedValues) ? 'selected' : '' ?>>C4</option>
                    <option value="C5" <?= in_array('C5', $selectedValues) ? 'selected' : '' ?>>C5</option>
                    <option value="C6" <?= in_array('C6', $selectedValues) ? 'selected' : '' ?>>C6</option>
                    <option value="C7" <?= in_array('C7', $selectedValues) ? 'selected' : '' ?>>C7</option>
                    <option value="C8" <?= in_array('C8', $selectedValues) ? 'selected' : '' ?>>C8</option>
                  </optgroup>
                  <optgroup label="Psikomotor">
                    <option value="P1" <?= in_array('P1', $selectedValues) ? 'selected' : '' ?>>P1</option>
                    <option value="P2" <?= in_array('P2', $selectedValues) ? 'selected' : '' ?>>P2</option>
                    <option value="P3" <?= in_array('P3', $selectedValues) ? 'selected' : '' ?>>P3</option>
                    <option value="P4" <?= in_array('P4', $selectedValues) ? 'selected' : '' ?>>P4</option>
                    <option value="P5" <?= in_array('P5', $selectedValues) ? 'selected' : '' ?>>P5</option>
                    <option value="P6" <?= in_array('P6', $selectedValues) ? 'selected' : '' ?>>P6</option>
                    <option value="P7" <?= in_array('P7', $selectedValues) ? 'selected' : '' ?>>P7</option>
                    <option value="P8" <?= in_array('P8', $selectedValues) ? 'selected' : '' ?>>P8</option>
                  </optgroup>
                  <optgroup label="Afektif">
                    <option value="A1" <?= in_array('A1', $selectedValues) ? 'selected' : '' ?>>A1</option>
                    <option value="A2" <?= in_array('A2', $selectedValues) ? 'selected' : '' ?>>A2</option>
                    <option value="A3" <?= in_array('A3', $selectedValues) ? 'selected' : '' ?>>A3</option>
                    <option value="A4" <?= in_array('A4', $selectedValues) ? 'selected' : '' ?>>A4</option>
                    <option value="A5" <?= in_array('A5', $selectedValues) ? 'selected' : '' ?>>A5</option>
                    <option value="A6" <?= in_array('A6', $selectedValues) ? 'selected' : '' ?>>A6</option>
                    <option value="A7" <?= in_array('A7', $selectedValues) ? 'selected' : '' ?>>A7</option>
                    <option value="A8" <?= in_array('A8', $selectedValues) ? 'selected' : '' ?>>A8</option>
                  </optgroup>
                </select>
                <?php $op_pentaksiran_counter++; ?>
                <div class="input-group-prepend ms-2" onclick="$('#objective-prestasi-<?= ($index + 1); ?>').remove();">
                  <button class="input-group-text" id="btnGroupAddon">
                    <i class="fas fa-trash-alt" style="color: red;"></i>
                  </button>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php
        } else {
          $op_pentaksiran_counter = 0;
          for ($i = 0; $i < 3; $i++) { ?>
            <div class="input-group" style="margin-bottom: 10px;" id="objective-prestasi-<?= $i; ?>">
              <div class="col pe-1">
                <input type="number" name="objective-prestasi-number[]" step="0.01" min="0" class="form-control" placeholder="1.1">
              </div>
              <div class="col-md-6 pe-1">
                <input type="text" name="objective-prestasi-desc[]" class="form-control" placeholder="Objektif prestasi bagi Topik DSKPN ini.">
              </div>
              <div class="col-md-3 d-flex">

                <?php
                $rand = rand(100000000, 1000000000);
                ?>

                <select id="objective-prestasi-ref" name="objective-prestasi-ref[<?= $rand; ?>][]" multiple="multiple">
                  <option disabled>-- Sila pilih Kod --</option>
                </select>
              </div>

              <div class="col-md-2 d-flex" id="select2-container">
                <!-- Initially displaying 3 select2 elements -->
                <select name="objective-prestasi-pentaksiran[<?= $rand; ?>][]" id="dynamic-select2-<?= $op_pentaksiran_counter; ?>" class="select2adjustheight dynamic-select2 form-control" multiple="multiple">
                  <optgroup label="Kognitif">
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                    <option value="C8">C8</option>
                  </optgroup>
                  <optgroup label="Psikomotor">
                    <option value="P1">P1</option>
                    <option value="P2">P2</option>
                    <option value="P3">P3</option>
                    <option value="P4">P4</option>
                    <option value="P5">P5</option>
                    <option value="P6">P6</option>
                    <option value="P7">P7</option>
                    <option value="P8">P8</option>
                  </optgroup>
                  <optgroup label="Afektif">
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="A3">A3</option>
                    <option value="A4">A4</option>
                    <option value="A5">A5</option>
                    <option value="A6">A6</option>
                    <option value="A7">A7</option>
                    <option value="A8">A8</option>
                  </optgroup>
                </select>
                <?php $op_pentaksiran_counter++; ?>
                <div class="input-group-prepend ms-2" onclick="$('#objective-prestasi-<?= $op_pentaksiran_counter; ?>').remove();">
                  <button class="input-group-text" id="btnGroupAddon">
                    <i class="fas fa-trash-alt" style="color: red;"></i>
                  </button>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>

      </div>

      <div style="margin-left : 10px;">
        <span class="btn bg-primary mt-2 text-white" onclick="addObjectivePrestasi()">Tambah &nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
          </svg>
        </span>
      </div>

    </div>
    <br>
    <div style="display: flex; align-items: center;">
      <h6 for="Duration" style="margin-right: 10px;">Durasi Perlaksanaan</h6>
      <input name="duration" style="width: 200px;" class="form-control" type="number" placeholder="Sila Masukkan Durasi" value="<?= $duration; ?>" required>&nbsp;<b>Minit</b>
    </div>
    <div class="text-end p-3">
      <span class="btn bg-info mt-2 text-white" onclick="validateAndSubmit()">Simpan&nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
          <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z" />
          <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z" />
        </svg>
      </span>
    </div>
  </div>
  <input type="text" name="objective-performance-selection-listing" id="objective-performance-selection-listing" value='<?= (isset($list_selection_to_populate) && !empty($list_selection_to_populate)) ? $list_selection_to_populate : ''; ?>' hidden />
</form>

<div style="position : absolute; top : 0px; right : 0px; width: 100%; height: 100%; z-index : 3; display : none;" id="loading-screen">
  <dotlottie-player style="position : fixed; right : -100px; top : 20px; z-index : 3;" src="https://lottie.host/82b8666a-afa5-4659-8a0e-6faedb04158f/vlZwAM82T0.json" background="transparent" speed="1" style="width: 500px; height: 500px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
  <div style="position : absolute; width : 100%; height : 100%; background-color : black; opacity : 0.2;"></div>
</div>

<div class="modal fade" id="setDSKPNIC" tabindex="-1" aria-labelledby="setDSKPNIC" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="rejectModalLabel">Sila Daftarkan KOD DSKPN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="checkDuplicateKODDSKPN" action="<?= route_to('checkstore_dskpn_code') ?>" method="post">
          <div class="row pb-4" id="set-dskpn-ic">
            <span class="ps-3" style="color : red;" id="hinting-no-subject">Sila masukkan KOD DSKPN bagi <?= isset($ex_dskpn_code_init) ? 'versi' : '' ?> topik DSKPN ini:</span>
            <div class="ps-3">
              <div class="row">
                <?php $part1_ex_dskpn = "";
                $part2_ex_dskpn = ""; ?>
                <div class="col-md-8">
                  <label for="dskpncode" class="form-label">KOD DSKPN</label>
                  <input type="text" style='text-transform:uppercase' class="form-control text-dark text-sm" placeholder="K1T4-001-" name="dskpncode"
                    value="<?php
                            if (!isset($ex_dskpn_code_init)) {
                              if (isset($dskpn_code)) {
                                echo $dskpn_code;
                              } else {
                                echo '';
                              }
                            } else {
                              // Separate the string into two parts
                              if (substr_count($ex_dskpn_code_init, '-') > 1) {
                                $lastHyphenPos = strrpos($ex_dskpn_code_init, '-');
                                $part1_ex_dskpn = substr($ex_dskpn_code_init, 0, $lastHyphenPos);
                                $part2_ex_dskpn = substr($ex_dskpn_code_init, $lastHyphenPos + 1);
                              } else {
                                $part1_ex_dskpn = $ex_dskpn_code_init;
                                $part2_ex_dskpn = date("Y");
                              }
                              echo $part1_ex_dskpn . '-';
                            }
                            ?>">
                </div>
                <div class="col-md-4">
                  <?php
                  if (empty($part2_ex_dskpn)) { ?>
                    <input type="checkbox" value="" id="year-dskpn-checkbox" onchange="yearDSKPNChecked(event)">
                  <?php } ?>
                  <label for="dskpnyear" class="form-label">Tahun DSKPN</label>
                  <input type="number" id="year-dskpn-input" name="dskpnyear" class="form-control text-dark" min="1900" max="9999" step="1" value="<?= empty($part2_ex_dskpn) ? date("Y") : $part2_ex_dskpn; ?>" <?= !empty($part2_ex_dskpn) ? '' : 'disabled'; ?> />
                </div>
              </div>
            </div>
          </div>
          <div class="text-end">
            <a href="<?= route_to('list_dskpn'); ?>" class="btn bg-secondary m-0 text-white">Kembali</a>
            <button id="submit-btn" class="btn bg-info m-0 text-white" type="submit">Simpan&nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"></path>
                <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"></path>
              </svg>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var globalCheckingDSKPNCode = <?= isset($dskpn_code_init) ? 'true' : 'false' ?>;
  const subject_list = <?= json_encode($subject_list); ?>;
  const ckeditor_upload_url = '<?= route_to('store_image_ckedit'); ?>';
  let get_default_subject = JSON.parse('<?= isset($getDefaultSubject) ? json_encode($getDefaultSubject) : 'null'; ?>');

  $(document).ready(function() {
    $('select#objective-prestasi-ref').multipleSelect();
  });
</script>

<?php if (session()->has('fail')) : ?>
  <script>
    $(document).ready(function() {
      Swal.fire({
        icon: "error",
        title: "Maaf",
        text: "<?= session('fail'); ?>"
      });
    });
  </script>
<?php endif; ?>