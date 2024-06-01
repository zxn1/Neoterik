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
                <select class="form-control select2" aria-label="Default select example" id="selection-kluster" <?= (!empty($cluster_desc))?'disabled':'' ?>>
                  <?php if(!empty($cluster_desc)) { 
                      echo "<option value=\"" . $cluster_desc['cm_id'] . "\" selected>" . $cluster_desc['cm_desc'] . "</option>";
                    } ?>                  
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-column h-100 mb-2">
            <p class="mb-1 pt-2 text-bold">Pilih Topik</p>
            <select class="form-control select2" aria-label="Default select example" id="selection-tp" <?= (!empty($topic_desc))?'disabled':'' ?>>
              <?php if(!empty($topic_desc)) { 
                    echo "<option value=\"" . $topic_desc['tm_id'] . "\" selected>" . $topic_desc['tm_desc'] . "</option>";
                } ?> 
            </select>
            </div>
        </div>
      </di>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
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
    </div>
</div>

<script>
  const subjectData = <?= json_encode(!empty($subjects) ? $subjects : []); ?>;
  const tpDatas = <?= json_encode(!empty($tp_session)?$tp_session : []); ?>
</script>
