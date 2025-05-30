<form method="POST" action="<?= route_to('store_core_competency_setup'); ?>">
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header d-flex p-3 bg-primary">
        <h6 class="my-auto text-white">MATA PELAJARAN</h6>
      </div>
      <div class="card-body mb-2">
        <div class="row pb-4">
          <label>Penatapan Tahap Penguasaan (TP) dan Kompetensi Teras bagi Mata Pelajaran:</label>
          <select name="subject" id="subject-dynamic-field" onchange="selectSubjectToCode(this)" class="form-control select2" aria-label="Default select example" required>
            <option disabled selected>-- Sila Pilih Mata Pelajaran --</option>
            <?php
            foreach ($subject_list as $subject)
            if(!core_competency_exist($subject['sbm_id']))
              echo "<option value='" . $subject['sbm_id'] . "' data-code='" . $subject['sbm_code'] . "'>" . $subject['sbm_desc'] . "</option>";
            ?>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-3">
    <div class="card">
      <div class="card-header d-flex p-3 bg-primary">
        <h6 class="my-auto text-white">KOMPETENSI TERAS</h6>
      </div>
      <div class="card-body py-2">
        <div class="custom row pt-3">
          <div class="row" id="core-competency" style="display: none;">
            <ul class="list-group flex-grow-1 mx-2">
              <div class="card-header d-flex p-3 bg-primary" style="border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
                <h6 id="subject-name-one" class="my-auto text-white text-uppercase">N/A</h6>
              </div>
              <div class="list-group-item" id="collection-core-competency" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                <div class="d-flex w-100 align-items-center" id="1-collection-core-competency" style="display: flex !important;flex-direction: row !important;">
                  <div class="row w-100 p-2 pb-0">
                    <div class="col-2 p-1">
                      <input name="input-core-competency-code[]" type="text" class="form-control me-2" id="input-core-competency-code" placeholder="KSN1" required>
                    </div>
                    <div class="col-10 d-flex p-1">
                      <input name="input-core-competency[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" required>
                      <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-core-competency').remove(); recalculateCoreCompetencyCode();">
                        <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-2 pb-1">
                <span class="btn bg-primary mt-2 text-white" onclick="addField('core-competency')">Tambah Kompetensi Teras &nbsp;&nbsp;
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
          <span class="btn bg-secondary me-1 text-white" onclick="resetTPForm()">
            <i class="fas fa-pencil-ruler"></i>&nbsp;
            Set Semula
          </span>
          <button type="submit" class="btn bg-info text-white">
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
<script src="<?= base_url('assets/js/AutoTitleCase.js') ?>"></script>
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


<?php if (isset($edit_data) && !empty($edit_data)) : ?>
  <script>
    function selectByText(text) {
        // Find the option that matches the text
        var option = $('#subject-dynamic-field option').filter(function() {
            return $(this).text() === text;
        });

        // If the option is found, set the value and trigger change
        if (option.length) {
            $('#subject-dynamic-field').val(option.val()).trigger('change');
            //$('#subject-dynamic-field').prop('disabled', true).trigger('change');
            let currentValue = option.val();

            $('#subject-dynamic-field').on('change', function(e) {
                $(this).val(currentValue).trigger('change'); // Revert to the original value
            });
        }
    }

    $(document).ready(function() {
      //need to get subject sbm_id, sbm_name, sbm_code first.
      $.get("<?= route_to('get_subject_by_id') . "?sbm_id=" . $edit_sbm_id; ?>", function(data, status){

        let subject = data.subject;
        const newOptionHtml = "<option value='" + subject.sbm_id + "' data-code='" + subject.sbm_code + "'>" + subject.sbm_desc + "</option>";
        $('#subject-dynamic-field').select2('destroy');
        //append the new option using HTML
        $('#subject-dynamic-field').append(newOptionHtml);
        $('#subject-dynamic-field').select2();

        //then only this
        selectByText('<?= $edit_subject_name; ?>');
        let data_tp = JSON.parse('<?= $edit_data; ?>');
        
        $('#collection-core-competency').empty();
        data_tp.forEach(function(element, index, array) {
          addField('core-competency', element.cc_desc);
        });
      });
    });
  </script>
<?php endif; ?>