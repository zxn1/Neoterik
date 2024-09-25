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

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">DSKPN</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <label for="kluster">KLUSTER</label>
          <input class="form-control" value="PERKEMBANGAN MANUSIA" readonly>
        </div>
        <div class="col-md-6">
          <label for="kluster">SUB-TEMA</label>
          <input class="form-control" value="2023" readonly>
        </div>
        <div class="col-md-2">
          <label for="kluster">TAHUN</label>
          <input class="form-control" value="2023" readonly>
        </div>
      </div>
      <div class="row py-4">

        <div class="col-md-4">
          <label for="topik">TEMA</label>
          <input class="form-control" value="Pernafasan Manusia dan Penyakit Berkaitan" readonly>
        </div>
        <div class="col-md-6">
          <label for="tema">TOPIK</label>
          <input class="form-control" value="Individu" readonly>

        </div>
        <div class="col-md-2">
          <label for="subtema">DURASI PELAKSANAAN</label> (minit)
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
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#standard_pembelajaran" role="tab" aria-controls="standard_pembelajaran" aria-selected="false">
                  STANDARD PEMBELAJARAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#standard_prestasi" role="tab" aria-controls="standard_prestasi" aria-selected="false" tabindex="-1">
                  STANDARD PRESTASI
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#petaksiran" role="tab" aria-controls="petaksiran" aria-selected="false" tabindex="-1">
                  PENTAKSIRAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#objektif_prestasi" role="tab" aria-controls="objektif_prestasi" aria-selected="false" tabindex="-1">
                  OBJEKTIF PRESTASI
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#aktiviti" role="tab" aria-controls="aktiviti" aria-selected="false" tabindex="-1">
                  AKTIVITI
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#abm" role="tab" aria-controls="abm" aria-selected="false" tabindex="-1">
                  ALAT BANTU MENGAJAR
                </a>
              </li>

              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Standard Pembelajaran -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="standard_pembelajaran" role="tabpanel" aria-labelledby="standard_pembelajaran">
              <div class="d-flex top-0 w-100">
                <!-- standard Pembelajaran -->
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SAINS</h6>
                  </div>
                  <textarea class="multisteps-form__textarea form-control zero-top-border" rows="15">
2.1.1 Mengenal pasti organ yang terlibat dalam proses pernafasan.
2.1.2 Memerihalkan proses pernafasan dari aspek laluan udara dan
pertukaran gas yang berlaku di peparu melalui pemerhatian menerusi
pelbagai media.
2.1.3 Membezakan kandungan oksigen dan karbon dioksida semasa
menarik dan menghembus nafas.
2.1.4 Memerihalkan pergerakan dada semasa menarik dan menghembus
nafas dengan menjalankan aktiviti.
2.1.5 Mengitlak bahawa kadar pernafasan bergantung kepada jenis aktiviti
yang dilakukan.
2.1.6 Menjelaskan pemerhatian tentang proses pernafasan manusia
melalui lakaran, TMK, penulisan atau lisan secara kreatif.
                </textarea>
                </ul>
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">PENDIDIKAN KESIHATAN</h6>
                  </div>
                  <textarea class="multisteps-form__textarea form-control zero-top-border" rows="15">
6.1.1 Menyatakan contoh penyakit tidak berjangkit.
6.1.2 Menghubungkait punca dan kesan penyakit tidak berjangkit.
6.1.3 Berkomunikasi mengenai cara pencegahan penyakit tidak berjangkit.
                </textarea>
                </ul>
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SENI VISUAL</h6>
                  </div>
                  <textarea class="multisteps-form__textarea form-control zero-top-border" rows="15">
1.1.1 Mengenal pasti jenis peta pemikiran yang sesuai diaplikasikan untuk
menghasilkan karya kreatif dalam Bidang Menggambar:
(iii) Poster - Peta Minda
                </textarea>
                </ul>
              </div>
              <div class="text-end p-3">
                <button class="btn bg-gradient-info mt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                    <path d="M12 2h-2v3h2z"></path>
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"></path>
                  </svg> &nbsp;
                  <span id="savetpchanges">
                    Simpan
                  </span>
                </button>
              </div>
            </div>
            <!-- STANDARD PRESTASI -->
            <div class="tab-pane fade position-relative border-radius-lg" id="standard_prestasi" role="tabpanel" aria-labelledby="standard_prestasi">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <div class="card-body py-2">

                  <div class="row pt-3">
                    <div class="custom row" id="tahap-penguasaan">
                    </div>

                  </div>
                </div>

              </div>
              <div class="text-end p-3">
                <button class="btn bg-gradient-info mt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                    <path d="M12 2h-2v3h2z"></path>
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"></path>
                  </svg> &nbsp;
                  <span id="savetpchanges">
                    Simpan
                  </span>
                </button>
              </div>
            </div>
            <!-- PENTAKSIRAN -->
            <div class="tab-pane fade position-relative border-radius-lg" id="petaksiran" role="tabpanel" aria-labelledby="petaksiran">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10">
1. Kognitif
- Menguji minda dengan aktiviti padanan gambar (tarik dan hembus nafas)
2. Psikomotor
- Membuat pemerhatian terhadap imej paru-paru melalui paparan slaid.
- Melakar rupa paru-paru dan kandungan gas, Melakukan aktiviti seperti duduk, lari,
lompat
3. Afektif
- Berkomunikasi tentang punca dan kesan penyakit
                  </textarea>
                </ul>
              </div>
              <div class="text-end p-3">
                <button class="btn bg-gradient-info mt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                    <path d="M12 2h-2v3h2z"></path>
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"></path>
                  </svg> &nbsp;
                  <span id="savetpchanges">
                    Simpan
                  </span>
                </button>
              </div>
            </div>
            <!-- OBJEKTIF PRESTASI -->
            <div class="tab-pane fade position-relative border-radius-lg" id="objektif_prestasi" role="tabpanel" aria-labelledby="objektif_prestasi">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
1.1.1 Menyatakan organ yang terlibat dalam proses pernafasan (S 2.1.1)
1.1.2 Memerihalkan proses pertukaran gas yang berlaku di paru-paru (S 2.1.2)
1.1.3 Membezakan kandungan gas semasa menarik dan menghembus nafas melalui lukisan (S 2.1.3, SV1.1.1)
1.1.4 Memerihalkan pergerakan dada semasa menarik dan menghembus nafas melalui pemerhatian (S 2.1.2, S
2.1.4, S 2.1.6)
1.1.5 Merumuskan kadar pernafasan bergantung kepada jenis aktiviti yang dilakukan (S 2.1.5)
1.1.6 Mengenali contoh penyakit tidak berjangkit berkaitan sistem pernafasan manusia (PK 6.1.1)
1.1.7 Menghubungkait punca dan kesan penyakit tidak berjangkit terhadap pernafasan manusia (PK 6.1.2)
1.1.8 Berkomunikasi mengenai cara pencegahan penyakit (PK 6.1.3)
                  </textarea>
                </ul>
              </div>
              <div class="text-end p-3">
                <button class="btn bg-gradient-info mt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                    <path d="M12 2h-2v3h2z"></path>
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"></path>
                  </svg> &nbsp;
                  <span id="savetpchanges">
                    Simpan
                  </span>
                </button>
              </div>
            </div>
            <!-- AKTIVITI -->
            <div class="tab-pane fade position-relative border-radius-lg" id="aktiviti" role="tabpanel" aria-labelledby="aktiviti">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10">
Murid:
1. Memerhatikan demonstrasi guru yang menunjukkan sistem pernafasan manusia dengan menggunakan belon dalam botol sebagai
simulasi pernafasan.
2. Menyatakan organ yang terlibat dalam sistem pernafasan manusia berdasarkan demonstrasi tersebut.
3. Mengenal pasti pertukaran gas dalam paru-paru melalui tayangan video.
4. Melakar rupa paru-paru dan kandungan gas semasa menarik dan menghembus nafas.
5. Memerhatikan pergerakan dada semasa menarik dan menghembus nafas sebelum dan selepas melakukan aktiviti seperti duduk,
lari, lompat dan sebagainya.
5. Mendengar bunyi pernafasan melalui stetokop sebelum dan selepas melakukan aktiviti.
6. Merumuskan kadar pernafasan bergantung kepada aktiviti yang dilakukan melalui perbincangan.
7. Memerhatikan penyakit pernafasan yang tidak berjangkit (Asma) melalui tayangan video.
8. Melakukan Think-Pair-Share untuk membincangkan punca, kesan dan cara pencegahan bagi penyakit pernafasan yang tidak
berjangkit (Asma).
                  </textarea>
                </ul>
              </div>
              <div class="text-end p-3">
                <button class="btn bg-gradient-info mt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                    <path d="M12 2h-2v3h2z"></path>
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"></path>
                  </svg> &nbsp;
                  <span id="savetpchanges">
                    Simpan
                  </span>
                </button>
              </div>
            </div>
            <!-- ALAT BANTU MENGAJAR -->
            <div class="tab-pane fade position-relative border-radius-lg" id="abm" role="tabpanel" aria-labelledby="abm">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
1. Bahan Demonstrasi (botol, straw, belon, gam)
2. Video berkaitan pertukaran gas dalam paru-paru
3. Kertas lukisan dan pensel warna dan tablet
4. Stetoskop
5. Video berkaitan ciri penyakit pernafasan(Asma)
6. Flash-card
                  </textarea>
                </ul>
              </div>
              <div class="text-end p-3">
                <button class="btn bg-gradient-info mt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                    <path d="M12 2h-2v3h2z"></path>
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"></path>
                  </svg> &nbsp;
                  <span id="savetpchanges">
                    Simpan
                  </span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- Tab -->
  <!-- Objecktif Prestasi -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false" tabindex="-1">
                  SPESIFIKASI PENGAJARAN
                </a>
              </li>

              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

              <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex justify-content-end" style="flex-direction: row !Important;">
                <label class="form-check-label mb-0">
                  Penglibatan Ibu Bapa
                </label>
                <div class="form-check form-switch ms-2">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked="" onchange="visible()">
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">REKA BENTUK INTRUKSI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Active Learning</span>
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
                                  <span class="text-dark d-block text-sm">Collaborative Learning</span>
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
                                  <span class="text-dark d-block text-sm">Constructive Learning</span>
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
                                  <span class="text-dark d-block text-sm">Authentic Learning</span>
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
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
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
                <div class="col-md-3">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">INTEGRASI TEKNOLOGI</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <tbody>
                            <tr>
                              <td class="ps-1" colspan="4">
                                <div class="my-auto">
                                  <span class="text-dark d-block text-sm">Entry Level</span>
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
                                  <span class="text-dark d-block text-sm">Adaptation Level</span>
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
                                  <span class="text-dark d-block text-sm">Infussion Level</span>
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
                                  <span class="text-dark d-block text-sm">Transformation Level</span>
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
                                  <span class="text-dark d-block text-sm">Goal-Directed Learning</span>
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
                <div class="col-md-3">
                  <div class="card mt-4" style="min-height:360px;" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">PENDEKATAN</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
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
                                  <span class="text-dark d-block text-sm">Berasaskan Projek</span>
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
                                  <span class="text-dark d-block text-sm">Kontekstual</span>
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
                <div class="col-md-3">
                  <div class="card mt-4" id="notifications">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                      <h6 class="my-auto text-white">KAEDAH</h6>
                    </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive">
                        <table class="table mb-0">
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

                <div class="text-end p-3">
                  <button class="btn bg-gradient-info mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2-fill" viewBox="0 0 16 16">
                      <path d="M12 2h-2v3h2z"></path>
                      <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1"></path>
                    </svg> &nbsp;
                    <span id="savetpchanges">
                      Simpan
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>