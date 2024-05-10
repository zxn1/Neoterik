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

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">DSKPN</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label for="kluster">KLUSTER</label>
          <input class="form-control" value="PERKEMBANGAN MANUSIA" readonly>

        </div>
      </div>
      <div class="row py-4">

        <div class="col-md-8">
          <label for="topik">TOPIK</label>
          <input class="form-control" value="Pernafasan Manusia dan Penyakit Berkaitan" readonly>
        </div>
        <div class="col-md-2">
          <label for="tema">TEMA</label>
          <input class="form-control" value="Individu" readonly>

        </div>
        <div class="col-md-2">
          <label for="subtema">SUB-TEMA</label>
          <input class="form-control" value="Tubuh dan Kesihatan" readonly>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="false">
                  STANDARD PEMBELAJARAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false" tabindex="-1">
                  TAHAP PENGUASAAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false" tabindex="-1">
                  KOMPETENSI TERAS
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false" tabindex="-1">
                  16 DOMAIN KEMENJADIAN MURID
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false" tabindex="-1">
                  7 KEMAHIRAN INSANIAH
                </a>
              </li>

              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade position-relative height-600 border-radius-lg active show" id="cam1" role="tabpanel" aria-labelledby="cam1" style="background-image: url('../../assets/img/bg-smart-home-1.jpg'); background-size:cover;">
              <div class="position-absolute d-flex top-0 w-100">
                <!-- standard Pembelajaran -->
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SAINS</h6>
                  </div>
                  <li class="list-group-item">Mengenal pasti organ yang terlibat dalam proses pernafasan</li>
                  <li class="list-group-item">Memerihalkan proses pernafasan dari aspek laluan udara dan pertukaran gas yang berlaku di peparu melalui pemerhatian menerusi pelbagai media.</li>
                  <li class="list-group-item">Membezakan kandungan oksigen dan karbon dioksida semasa menarik dan menghembus nafas.</li>
                  <li class="list-group-item">Memerihalkan pergerakan dada semasa menarik dan menghembus nafas dengan menjalankan aktiviti.</li>
                  <li class="list-group-item">Mengitlak bahawa kadar pernafasan bergantung kepada jenis aktiviti yang dilakukan.</li>
                  <li class="list-group-item">Menjelaskan pemerhatian tentang proses pernafasan manusia melalui lakaran, TMK, penulisan atau lisan secara kreatif.</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">PENDIDIKAN KESIHATAN</h6>
                  </div>
                  <li class="list-group-item">Menyatakan contoh penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Menghubungkait punca dan kesan penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Berkomunikasi mengenai cara pencegahan penyakit tidak berjangkit.</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SENI VISUAL</h6>
                  </div>
                  <li class="list-group-item">Mengenal pasti jenis peta pemikiran yang sesuai diaplikasikan untuk menghasilkan karya kreatif dalam Bidang Menggambar:(iii) Poster - Peta Minda</li>
                </ul>
              </div>

            </div>
            <div class="tab-pane fade position-relative height-400 border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2" style="background-image: url('../../assets/img/bg-smart-home-2.jpg'); background-size:cover;">
              <div class="position-absolute d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SAINS</h6>
                  </div>
                  <li class="list-group-item">Melabel organ yang terlibat semasa proses pernafasan.</li>
                  <li class="list-group-item">Menerangkan proses pernafasan dari aspek laluan udara.</li>
                  <li class="list-group-item">Mengitlak pergerakan dada semasa proses pernafasan.</li>
                  <li class="list-group-item">Membezakan kandungan oksigen dan karbon dioksida semasa proses pernafasan.</li>
                  <li class="list-group-item">Merumuskan kadar pernafasan bergantung kepada jenis aktiviti.</li>
                  <li class="list-group-item">Berkomunikasi secara kreatif dan inovatif tentang situasi yang memberi kesan baik dan kesan buruk kepada pernafasan manusia dan cadangan penjagaan kesihatan peparu.</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">PENDIDIKAN KESIHATAN</h6>
                  </div>
                  <li class="list-group-item">Menyatakan contoh penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Menghubungkait punca dan kesan penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Berkomunikasi mengenai cara pencegahan penyakit tidak berjangkit.</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SENI VISUAL</h6>
                  </div>
                  <li class="list-group-item">Mengenal pasti jenis peta pemikiran yang sesuai diaplikasikan untuk menghasilkan karya kreatif dalam Bidang Menggambar:(iii) Poster - Peta Minda</li>
                </ul>
              </div>
            </div>
            <div class="tab-pane fade position-relative height-400 border-radius-lg" id="cam3" role="tabpanel" aria-labelledby="cam3" style="background-image: url('../../assets/img/home-decor-3.jpg'); background-size:cover;">
              <div class="position-absolute d-flex top-0 w-100">
                <p class="text-white p-3 mb-0">17.05.2021 4:57PM</p>
                <div class="ms-auto p-3">
                  <span class="badge badge-secondary">
                    <i class="fas fa-dot-circle text-danger" aria-hidden="true"></i>
                    Recording</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <li class="nav-item" role="presentation">
    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false" tabindex="-1">
      Objektif Prestasi
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false" tabindex="-1">
      Pentaksiran
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab" aria-controls="cam3" aria-selected="false" tabindex="-1">
      Lain-lain
    </a>
  </li> -->
  <!-- <div class="row">
    <div class="col-md-6">
      <div class="card mt-4" id="notifications">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Pendekatan</h6>
        </div>
        <div class="card-body pt-0">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th class="ps-1" colspan="4">
                    <p class="mb-0">Butiran</p>
                  </th>
                  <th class="text-center">
                    <p class="mb-0">Tindakan</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Inkuiri</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Berasaskan Masalah</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Pembelajaran Masteri</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Konseptual</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Berasaskan Pengalaman</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card mt-4" id="notifications">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Kaedah</h6>
        </div>
        <div class="card-body pt-0">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th class="ps-1" colspan="4">
                    <p class="mb-0">Description</p>
                  </th>
                  <th class="text-center">
                    <p class="mb-0">Action</p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Simulasi</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault11">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Main Peranan</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" checked="" type="checkbox" id="flexSwitchCheckDefault14">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Nyanyian</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Bercerita</span>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="ps-1" colspan="4">
                    <div class="my-auto">
                      <span class="text-dark d-block text-sm">Lain-lain:</span>
                      <textarea></textarea>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault17">
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>