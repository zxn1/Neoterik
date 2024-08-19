<form method="POST" action="<?= route_to('store_core_competency_setup'); ?>">
<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">SUBJEK</h6>
    </div>
    <div class="card-body mb-2">
      <div class="row pb-4">
        <label>Penatapan Tahap Penguasaan (TP) dan Kompetensi Teras bagi Subjek:</label>
        <select name="subject" id="subject-dynamic-field" onchange="selectSubjectToCode(this)" class="form-control select2" aria-label="Default select example" required>
          <option disabled selected>-- Sila Pilih Subjek --</option>
          <?php
          foreach($subject_list as $subject)
            echo "<option value='". $subject['sbm_id'] ."' data-code='" . $subject['sbm_code'] . "'>" . $subject['sbm_desc'] . "</option>";
          ?>
        </select>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-3">
  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">KOMPETENSI TERAS</h6>
    </div>
    <div class="card-body py-2">
      <div class="custom row pt-3">
        <div class="row" id="core-competency" style="display: none;">
          <ul class="list-group flex-grow-1 mx-2">
              <div class="card-header d-flex p-3 bg-gradient-primary" style="border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
                  <h6 id="subject-name-one" class="my-auto text-white text-uppercase">N/A</h6>
              </div>
              <div class="list-group-item" id="collection-core-competency" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                <div class="d-flex w-100 align-items-center" id="1-collection-core-competency" style="display: flex !important;flex-direction: row !important;">
                    <div class="row w-100 p-2 pb-0">
                      <div class="col-2 p-1">
                        <input name="input-core-competency-code[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="KSN1" required>
                      </div>
                      <div class="col-10 d-flex p-1">
                        <input name="input-core-competency[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" required>
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-core-competency').remove();">
                            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                        </a>
                      </div>
                    </div>
                </div>
              </div>
              <div class="p-2 pb-1">
                  <span class="btn bg-gradient-primary mt-2" onclick="addField('core-competency')">Tambah Kompetensi Teras &nbsp;&nbsp;
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                      </svg>
                  </span>
              </div>
          </ul>
        </div>
        <div class="row" id="empty-core-competency" style="display: block;">
          <center>
            <dotlottie-player src="https://lottie.host/f14be899-0e61-4f77-aed4-79ef493631fc/yFJXcAqKcu.json" background="transparent" speed="1" style="width: 40%;" direction="1" playMode="normal" loop autoplay></dotlottie-player>
          </center>
        </div>
      </div>
      <hr class="custom">

      <div class="d-flex justify-content-end" id="reset-n-save-section" style="display : none !important;">
        <span class="btn bg-gradient-secondary me-1" onclick="resetTPForm()">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
          </svg> &nbsp;
          Set Semula
        </span>
        <button type="submit" class="btn bg-gradient-info">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
            <path d="M12 2h-2v3h2z" />
            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
          </svg> &nbsp;
          <span id="savetpchanges">Simpan</span>
        </button>
      </div>

    </div>
  </div>
</div>
</form>
<?php if (session()->has('success')) : ?>
    <script>
      $(document).ready(function() {
        Swal.fire({
            icon: "success",
            title: "Berjaya",
            text: "<?= session('success'); ?>"
        });
      });
    </script>
<?php endif; ?>
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