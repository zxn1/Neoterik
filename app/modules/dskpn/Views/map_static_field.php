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
            <select class="form-control select2" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">Sahsiah dan Akhlak</option>
                <option value="2">Kesenian Manusia</option>
                <option value="3">Perkembangan Manusia</option>
            </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-column h-100 mb-2">
            <p class="mb-1 pt-2 text-bold">Pilih Topik</p>
            <select class="form-control select2" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">Sirah dan Hubungan Sosial</option>
                <option value="2">Kecerdasan dan Kecekapan</option>
                <option value="3">Pernafasan Manusia Dan Penyakit Berkaitan</option>
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
              ISI STANDARD PEMBELAJARAN
            </a>
          </li>
        </ul>
      </div>
      <!-- <h6 class="my-auto text-white">Isi Standard Pembelajaran</h6> -->
    </div>
    <div class="card-body py-2">
        <div class="row pb-4" id="standard-pembelajaran">
        </div>

        <div class="card">
          <div class="card-header d-flex bg-gradient-secondary objektif-prestasi">
              <h6 class="my-auto text-white ms-2">Objektif Prestasi</h6>
          </div>
          <textarea class="multisteps-form__textarea form-control zero-top-border objektif-prestasi-text" id="exampleFormControlTextarea1" rows="5" placeholder="Objektif yang hendak dicapai"></textarea>
        </div>
    </div>
    <div class="text-end p-3">
        <a href="<?= route_to('tp_maintenance') ?>" type="button" class="btn bg-gradient-primary mt-2">Seterusnya</a>
    </div>
  </div>
</div>

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