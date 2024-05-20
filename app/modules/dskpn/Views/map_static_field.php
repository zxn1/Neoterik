<form action="<?= route_to('store_std_learn'); ?>" method="POST">
<?= csrf_field() ?>
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
            <select name="kluster" id="kluster-selection" class="form-control select2" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <?php foreach($kluster as $item) { ?>
                  <option value="<?= $item['cm_id']; ?>"><?= $item['cm_desc']; ?></option>
                <?php } ?>
            </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-column h-100 mb-2">
            <p class="mb-1 pt-2 text-bold">Pilih Topik</p>
            <select name="topik" id="topik-dynamic-field" class="form-control select2" aria-label="Default select example">
                <option selected>Sila pilih Kluster dahulu.</option>
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
      <div class="text-end">
        <span id="add-subject-button" class="btn bg-gradient-info">Tambah Subjek&nbsp;&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
          </svg>
        </span>
      </div>

      <div class="row pb-4" id="standard-pembelajaran">
        <span style="color : red;" id="hinting-no-subject">Hint : Anda masih belum menambah subjek</span>
      </div>

      <div class="card">
        <div class="card-header d-flex bg-gradient-secondary objektif-prestasi">
          <h6 class="my-auto text-white ms-2">Objektif Prestasi</h6>
        </div>
        <textarea name="objective" class="multisteps-form__textarea form-control zero-top-border objektif-prestasi-text" id="exampleFormControlTextarea1" rows="5" placeholder="Objektif yang hendak dicapai"></textarea>
      </div>

      <div class="text-end p-3">
        <button class="btn bg-gradient-info mt-2" type="submit">Simpan&nbsp;
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
            <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"/>
            <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"/>
          </svg>
        </button>
        <a href="<?= route_to('tp_maintenance') ?>" type="button" class="btn bg-gradient-primary mt-2">Seterusnya</a>
      </div>
    </div>
  </div>
</div>
</form>

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


<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<div style="position : absolute; top : 0px; right : 0px; width: 100%; height: 100%; z-index : 3; display : none;" id="loading-screen">
  <dotlottie-player style="position : fixed; right : -100px; top : 20px; z-index : 3;" src="https://lottie.host/82b8666a-afa5-4659-8a0e-6faedb04158f/vlZwAM82T0.json" background="transparent" speed="1" style="width: 500px; height: 500px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
  <div style="position : absolute; width : 100%; height : 100%; background-color : black; opacity : 0.2;"></div>
</div>