<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">Petaan Input Statik</h6>
    </div>
    <div class="card-body mb-4 py-2">
      <di class="row">
        <div class="col-md-6">
          <div class="d-flex flex-column h-100 mb-2">
            <p class="mb-1 pt-2 text-bold">Pilih Kluster</p>
            <select class="form-control select2" aria-label="Default select example" id="selection-kluster" <?= (!empty($cluster_desc)) ? 'disabled' : '' ?>>
              <?php if (!empty($cluster_desc)) {
                echo "<option value=\"" . $cluster_desc['cm_id'] . "\" selected>" . $cluster_desc['cm_desc'] . "</option>";
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

<form action="<?= route_to('store_std_perfm'); ?>" method="POST" class="container-fluid py-4">
  <div class="card">
    <div class="card-header d-flex pb-0 p-3">
      <div class="nav-wrapper position-relative w-100">
        <ul class="nav nav-pills nav-fill p-1" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#penyelenggaraan_tahap_penguasaan" role="tab" aria-controls="penyelenggaraan_tahap_penguasaan" aria-selected="true" tabindex="-1">
              PENYELENGGARAAN TAHAP PENGUASAAN
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="card-body py-2">
      <div class="custom row pt-3">
        <div class="row" id="tahap-penguasaan">
        </div>
      </div>
      <hr class="custom">

      <div class="d-flex justify-content-between align-items-center p-2">
        <a href="<?= route_to('dskpn_learning_standard') . "?flag=true" ?>" class="btn bg-gradient-danger mt-2">
          <span>Kembali</span>
        </a>
        <div>
          <span class="btn bg-gradient-secondary me-1 mt-2" onclick="clearDynamicInputs()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
              <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
            </svg> &nbsp;
            Set Semula
          </span>
          <button type="submit" class="btn bg-gradient-info mt-2">
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
  const subjectData = <?= json_encode(!empty($subjects) ? $subjects : []); ?>;
  const tpDatas = <?= json_encode(!empty($tp_session) ? $tp_session : []); ?>

  <?php if (session()->has('warning_message')) : ?>
    Swal.fire({
      icon: "fail",
      title: "Maaf!",
      text: "<?= session('warning_message'); ?>"
    });
  <?php endif; ?>
</script>

<!-- <div class="card-header d-flex p-3 bg-gradient-primary">
    <h6 class="my-auto text-white flex-grow-1">Penyelenggaraan Tahap Penguasaan</h6>
    <button class="btn text-white btn-sm mb-0 ms-auto" onclick="clearDynamicInputs()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
        </svg> &nbsp;
        Set Semula
    </button>
  </div> -->

<?php
/*if(!empty($subjects))
  foreach($subjects as $subject) { ?>

    <ul class="list-group flex-grow-1 mx-2">
      <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white text-uppercase"><?= $subject[0]->sm_desc; ?></h6>
      </div>
      <div class="list-group-item" id="collection-<?= $subject[0]->sm_code; ?>" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
          <div class="d-flex w-100 align-items-center mb-2" id="1-collection-<?= $subject[0]->sm_code; ?>" style="display: flex !important;flex-direction: row !important;">
              <input type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencinpta">
              <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-<?= $subject[0]->sm_code; ?>').remove();">
                  <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
              </a>
          </div>
      </div>
      <div class="p-2 pb-3">
      <button class="btn bg-gradient-primary mt-2" onclick="addField('collection-<?= $subject[0]->sm_code; ?>')">Tambah TP</button>
      </div>
    </ul>

  <?php } */
?>

<!-- <div>
        <button type="submit" class="btn bg-gradient-danger mt-2">
          <span>
            Ke Belakang
          </span>
        </button>
      </div>
      <div class="d-flex justify-content-end p-2 pb-3">
        <span class="btn bg-gradient-secondary me-1 mt-2" onclick="clearDynamicInputs()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
            </svg> &nbsp;
            Set Semula
        </span>
        <button type="submit" class="btn bg-gradient-info mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
            <path d="M12 2h-2v3h2z"/>
            <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"/>
          </svg> &nbsp;
          <span id="savetpchanges">
            Simpan
          </span>
        </button>
      </div> -->