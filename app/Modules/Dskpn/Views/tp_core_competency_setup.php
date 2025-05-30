<?= $wysiwyg_include; ?>
<?= $wysiwyg_js; ?>
<style>
.quill-toolbar-container {
  display: flex;
  width: 100%; /* pastikan toolbar guna penuh */
  justify-content: space-between;
  align-items: center;
}

.ql-toolbar-group {
  display: flex;
  gap: 6px;
}

.ql-toolbar-actions {
  margin-left: auto; /* push ke hujung kanan */
  display: flex;
  align-items: center;
}
/* HTML: <div class="ribbon">Your text content</div> */
.ribbon {
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    position : relative;
    left : -5px;
    top : -5px;
    padding : 5px;
  }
  .ribbon {
    --r: .8em; /* control the cutout */
    
    border-block: .5em solid #0000;
    padding-inline: .5em calc(var(--r) + .25em);
    line-height: 1.8;
    clip-path: polygon(100% 0,0 0,0 100%,100% 100%,100% calc(100% - .25em),calc(100% - var(--r)) 50%,100% .25em);
    background:
    radial-gradient(.2em 50% at left,#000a,#0000) border-box,
    gray padding-box; /* the color  */
    width: fit-content;
  }
  .ql-editor ol li[data-list="bullet"]::before {
    content: "• ";
    list-style-type: disc;
    counter-reset: none;
  }
</style>
<form method="POST" action="<?= route_to('store_tp_setup'); ?>">
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header d-flex p-3 bg-primary">
        <h6 class="my-auto text-white"><b>MATA PELAJARAN</b></h6>
      </div>
      <div class="card-body mb-2">
        <div class="row pb-4">
          <label>Penetapan Tahap Penguasaan (TP) dan Kompetensi Teras bagi Mata Pelajaran:</label>
          <select name="subject" id="subject-dynamic-field" onchange="selectSubjectToCode(this)" class="form-control select2" aria-label="Default select example" required>
            <option disabled selected>-- Sila Pilih Mata Pelajaran --</option>
            <?php
            foreach ($subject_list as $subject)
              echo "<option value='" . $subject['sbm_id'] . "' data-code='" . $subject['sbm_code'] . "'>" . $subject['sbm_desc'] . "</option>";
            ?>
          </select>
        </div>
        <div class="row pt-1" id="chooseleveldropdown">
          <!-- <h6 style="position : relative; top : 10px;">Tahun</h6> -->
          <div class="mb-3 d-flex">
            <table>
              <tr>
                <td hidden>
                  <label>Kod Mata Pelajaran</label>
                  <input type="text" id="kod-rujukan" name="kod-rujukan" class="form-control" style="height: 45px; margin-right : 5px;" placeholder="Setkan Kod Rujukan" required readonly>
                </td>
                <td id="code-tp-rank-div" style="display : none;">
                  <label>Tahun</label>
                  <select id="code-tp-rank" name="code-tp-rank" class="form-control" aria-label="Default select example" onchange="getAvailableDskpCode(this.value)" required>
                    <option disabled selected>-- Sila Pilih Tahap --</option>
                    <?php
                    for ($i = 1; $i <= 6; $i++)
                      echo "<option value='" . $i . "'>" . $i . "</option>";
                    ?>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div id="dskpn-topic-numbering-div" style="display : none;">
          <label>Kod Rujukan</label>
          <select id="dskpn-topic-numbering-list" name="dskpn-topic-numbering" class="form-control" aria-label="Default select example" required disabled>
            <option disabled selected>-- Sila Pilih Nombor Identiti --</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-3">
    <div class="card">
      <div class="card-header d-flex p-3 bg-primary">
        <h6 class="my-auto text-white"><b>TAHAP PENGUASAAN</b></h6>
      </div>
      <div class="card-body py-2">
        <div class="custom row pt-3">
          <div class="row" id="tahap-penguasaan" style="display: none;">
            <ul class="list-group flex-grow-1 mx-2">
              <div class="card-header d-flex p-3 bg-primary" style="border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
                <h6 id="subject-name-one" class="my-auto text-white text-uppercase">N/A</h6>
              </div>
              <div class="list-group-item" id="collection-tahap-penguasaan" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                <div class="d-flex w-100 align-items-center mb-2" id="1-collection-tahap-penguasaan" style="display: flex !important;flex-direction: row !important;">
                  <span class="ribbon badge" style="position : relative; left : -15px;" id="tpcounter">1</span>
                  <div id="input-tahap-penguasaan-target" class="w-100"></div>
                  <!-- <input name="input-tahap-penguasaan[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" required> -->
                  <!-- <a class="btn btn-link text-danger text px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-tahap-penguasaan').remove();">
                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                  </a> -->
                </div>
              </div>
              <div class="p-2 pb-1">
                <span class="btn bg-primary mt-2 bg-primary-text-white" onclick="addField('tahap-penguasaan')">Tambah TP &nbsp;&nbsp;
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                  </svg>
                </span>
              </div>
            </ul>
          </div>
          <div class="row" id="empty-tahap-penguasaan" style="display: block;">
            <center>
              <dotlottie-player src="https://lottie.host/f14be899-0e61-4f77-aed4-79ef493631fc/yFJXcAqKcu.json" background="transparent" speed="1" style="width: 40%;" direction="1" playMode="normal" loop autoplay></dotlottie-player>
            </center>
          </div>
        </div>
        <hr class="custom">

        <div class="d-flex justify-content-end" id="reset-n-save-section" style="display : none !important;">
          <span class="btn bg-secondary me-1 bg-primary-text-white" onclick="resetTPForm()">
            <i class="fas fa-pencil-ruler"></i>&nbsp;
            Set Semula
          </span>
          <button type="submit" class="btn bg-info bg-primary-text-white">
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
<script>
  const getAvailableDskpCodeURL = "<?= route_to('get_dskp_code_available'); ?>";
</script>
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
<?php if (isset($edit_dskp_code) && !empty($edit_dskp_code)) : ?>
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
      selectByText('<?= $edit_subject_name; ?>');
      let data_tp = (<?= $edit_data; ?>).standard_performance_dskp_mapping;
      
      $('#collection-tahap-penguasaan').empty();
      data_tp.forEach(function(element, index, array) {
        addField('tahap-penguasaan', element.sp_tp_level_desc);
      });

      $('#chooseleveldropdown').hide();
      // Clear existing options
      $('#dskpn-topic-numbering-list').empty();
      // Add new options
      $('#dskpn-topic-numbering-list').append('<option value="<?= $edit_dskp_code; ?>"><?= $edit_dskp_code; ?></option>');
      $('#kod-rujukan').val('<?= $edit_dskp_code; ?>');
    });
  </script>
<?php endif; ?>