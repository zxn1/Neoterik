<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header d-flex p-3 bg-primary">
      <h6 class="my-auto text-white">MAKLUMAT DSKPN</h6>
    </div>
    <div class="card-body mb-4 py-2">
      <di class="row">
        <div class="col-md-6">
          <div class="d-flex flex-column h-100 mb-2">
            <p class="mb-1 pt-2 text-bold">Pilih Kluster</p>
            <select class="form-control select2" aria-label="Default select example" id="selection-kluster" <?= (!empty($cluster_desc)) ? 'disabled' : '' ?>>
              <?php if (!empty($cluster_desc)) {
                echo "<option value=\"" . $cluster_desc['ctm_id'] . "\" selected>" . $cluster_desc['ctm_desc'] . "</option>";
              } else { ?>
                <option selected>Open this select menu</option>
                <option value="1">Sahsiah dan Akhlak</option>
                <option value="2">Kesenian Manusia</option>
                <option value="3">Perkembangan Manusia</option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="d-flex flex-column h-100 mb-2">
            <p class="mb-1 pt-2 text-bold">Pilih Topik</p>
            <select class="form-control select2" aria-label="Default select example" id="selection-tp" <?= (!empty($topic_desc)) ? 'disabled' : '' ?>>
              <?php if (!empty($topic_desc)) {
                echo "<option value=\"" . $topic_desc['tm_id'] . "\" selected>" . $topic_desc['tm_desc'] . "</option>";
              } else { ?>
                <option selected>Open this select menu</option>
                <option value="1">Sirah dan Hubungan Sosial</option>
                <option value="2">Kecerdasan dan Kecekapan</option>
                <option value="3">Pernafasan Manusia Dan Penyakit Berkaitan</option>
              <?php } ?>
            </select>
          </div>
        </div>
      </di>
    </div>
  </div>
</div>

<form action="<?= route_to('store_std_perfm'); ?>" method="POST" class="container-fluid py-4" id="tp-maintenance-form">
  <div class="card">
    <div class="card-header d-flex p-3 bg-primary">
      <h6 class="my-auto text-white">PENETAPAN TAHAP PENGUASAAN</h6>
    </div>
    <div class="card-body py-2">
      <div class="custom row pt-3 pb-3">
        <div class="row" id="tahap-penguasaan">
        </div>
      </div>
      <hr class="custom">

      <div class="d-flex justify-content-between align-items-center p-2">
        <a href="<?= route_to('dskpn_learning_standard') . "?flag=true" ?>" class="btn border border-gray text-gray">
          <span>Kembali</span>
        </a>
        <div>
          <span class="btn bg-secondary me-1 mt-2 text-white" onclick="resetTPForm()">
            <i class="fas fa-pencil-ruler"></i>&nbsp;
            Set Semula
          </span>
          <button type="submit" class="btn bg-info mt-2 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
              <path d="M12 2h-2v3h2z" />
              <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
            </svg> &nbsp;
            <span id="savetpchanges">Simpan</span>
          </button>
        </div>
      </div>

    </div>
</form>

<script>
  const getTPListEndpoint = "<?= route_to('get_standard_performance') ?>";
  const subjectData = <?= json_encode(!empty($subjects) ? $subjects : []); ?>;
  const tpSessRefcode = <?= json_encode(!empty($tp_sess_refcode) ? $tp_sess_refcode : []); ?>;

  <?php if (session()->has('warning_message')) : ?>
    Swal.fire({
      icon: "fail",
      title: "Maaf!",
      text: "<?= session('warning_message'); ?>"
    });
  <?php endif; ?>
</script>