<style>
  /* Custom Css to overwrite select2 style */
  .select2-container .select2-selection__rendered {
    display: flex;
    align-items: center;
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: #344767;
    white-space: nowrap;
    background-color: #fff;
    border: 1px solid #d2d6da;
    border-radius: 0.5rem;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 38px !important;
  }

  .select2-container--open .select2-selection__rendered {
    border-bottom: none;
    border-bottom-right-radius: 0;
  }

  .select2-container--open .select2-dropdown--below {
    border-top: none;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border: 1px solid #d2d6da;

  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    /* color: #444; */
    line-height: inherit !important;
  }

  .select2-container--default .select2-selection--single {
    /* background-color: #fff; */
    border: 0 !important;
    /* border-radius: 4px; */
  }

  /* CSS for desktop screens */
  .list-group {
    flex-basis: 0;
    flex-grow: 1;
  }


  /* Media query for screens smaller than a certain width (e.g., phones) */
  @media (max-width: 768px) {
    .d-flex {
      flex-direction: column;
      /* Change flex direction to column for smaller screens */
    }

    .list-group {
      flex-basis: auto;
      /* Reset flex-basis to auto for stacked layout */
      flex-grow: 0;
      width: 100%;
      margin-bottom: 5%;
      /* Ensure each ul takes up the full width */
    }

  }

  .zero-top-border {
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
  }

  /* .row>* {
    padding-right: calc(var(--bs-gutter-x)* 0);
    padding-left: calc(var(--bs-gutter-x)* 0);
    margin-right: calc(var(--bs-gutter-x)* .5);
    margin-left: calc(var(--bs-gutter-x)* .5);
  } */
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<div class="container-fluid py-4">
        <form class="card" action="<?= route_to('create_topic'); ?>" method="POST">
            <div class="card-header d-flex p-3 bg-gradient-primary">
                <h6 class="my-auto text-white">Daftar Topik dalam Kluster</h6>
            </div>
            <div class="card-body p-3" >
                <div class="row align-items-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clusterSelect" >Select your cluster</label>
                                <select name="cluster" class="form-control select2" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <?php foreach($cluster as $item) { ?>
                                    <option value="<?= $item['cm_id']; ?>"><?= $item['cm_desc']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="subtemaInput">Subtema</label>
                                <input type="text" name="subtema" class="form-control" id="subtemaInput">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="yearInput">Year</label>
                                <input type="text" name="year" class="form-control" id="yearInput">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subtemaInput">Tema</label>
                                <input type="text" name="tema" class="form-control" id="subtemaInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="yearInput">Topik</label>
                                <input type="text" name="topik" class="form-control" id="yearInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end p-3">
                <input type="submit" class="btn bg-gradient-info" value="Tambah"/>
            </div>
        </form>
</div>
<div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex p-3 bg-gradient-primary">
                <h6 class="my-auto text-white">Senarai Topik Dalam Kluster</h6>
            </div>
            <div class="card-body p-3">
                <div class="accordion" id="accordionRental">
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                Cluster 1
                            </button>
                        </h5>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental">
                            <div class="accordion-body" class="custom row" id="tahap-penguasaan">
                                <ul class="list-group">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header" id="headingTwo">
                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                Cluster 2
                            </button>
                        </h5>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                        <div class="accordion-body" class="custom row" id="tahap-penguasaan2">
                                <ul class="list-group">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header" id="headingThree">
                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                Cluster 3
                            </button>
                        </h5>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRental">
                        <div class="accordion-body" class="custom row" id="tahap-penguasaan3">
                                <ul class="list-group">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="text-end p-3">
    <a href="list-registered-dskpn" class="btn bg-gradient-primary btn-sm mb-0 me-1">Seterusnya</a>
</div>

<!-- alert part -->
<?php if (session()->has('success')): ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Berjaya",
            text: "<?= session('success'); ?>"
          });
    </script>
<?php endif; ?>

<?php if (session()->has('fail')): ?>
    <script>
        Swal.fire({
            icon: "danger",
            title: "Maaf",
            text: "<?= session('fail'); ?>"
          });
    </script>
<?php endif; ?>