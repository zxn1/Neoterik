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
        <div class="col-md-10">
          <label for="kluster">KLUSTER</label>
          <input class="form-control" value="PERKEMBANGAN MANUSIA" readonly>
        </div>
        <div class="col-md-2">
          <label for="kluster">TAHUN</label>
          <input class="form-control" value="2023" readonly>
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
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#standard_pembelajaran" role="tab" aria-controls="standard_pembelajaran" aria-selected="false">
                  STANDARD PEMBELAJARAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#tahap_penguasaan" role="tab" aria-controls="tahap_penguasaan" aria-selected="false" tabindex="-1">
                  TAHAP PENGUASAAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kompetensi_teras" role="tab" aria-controls="kompetensi_teras" aria-selected="false" tabindex="-1">
                  KOMPETENSI TERAS
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#domain" role="tab" aria-controls="domain" aria-selected="false" tabindex="-1">
                  16 DOMAIN KEMENJADIAN MURID
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kemahiran" role="tab" aria-controls="kemahiran" aria-selected="false" tabindex="-1">
                  7 KEMAHIRAN INSANIAH
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
            </div>
            <!-- Tahap Penguasaan -->
            <div class="tab-pane fade position-relative border-radius-lg" id="tahap_penguasaan" role="tabpanel" aria-labelledby="tahap_penguasaan">
              <div class="d-flex top-0 w-100">
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
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">PENDIDIKAN KESIHATAN</h6>
                  </div>
                  <li class="list-group-item">Menyatakan punca penyakit tidak berjangkit seperti penyakit jantung, asma, penyakit buah pinggang dan diabetes.</li>
                  <li class="list-group-item">Menerangkan punca penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Membezakan kesan setiap penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Menjelaskan melalui contoh cara mengurangkan risiko penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Mengesyorkan gaya hidup yang boleh diamalkan untuk mencegah risiko penyakit tidak berjangkit.</li>
                  <li class="list-group-item">Merancang aktiviti harian yang boleh dilakukan untuk mengelakkan penyakit tidak berjangkit.</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SENI VISUAL</h6>
                  </div>
                  <li class="list-group-item">Mengenal bahasa seni visual pada karya.</li>
                  <li class="list-group-item">Menerangkan penggunaan bahasa seni visual yang terdapat pada karya.</li>
                  <li class="list-group-item">Mengaplikasi kemahiran dan pengetahuan bahasa seni dalam aktiviti penerokaan.</li>
                  <li class="list-group-item">Menganalisis karya seni menggunakan pengetahuan dan kemahiran seni dalam aktiviti penerokaan.</li>
                  <li class="list-group-item">Menentukan penggunaan bahasa seni visual, media, teknik dan proses yang sesuai dalam aktiviti penerokaan.</li>
                  <li class="list-group-item">Menjana idea kreatif dalam aktiviti penerokaan.</li>
                </ul>
              </div>
            </div>
            <!-- Kompetensi Teras -->
            <div class="tab-pane fade position-relative border-radius-lg" id="kompetensi_teras" role="tabpanel" aria-labelledby="kompetensi_teras">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SAINS</h6>
                  </div>
                  <li class="list-group-item">(KSN1) Memerhati</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">PENDIDIKAN KESIHATAN</h6>
                  </div>
                  <li class="list-group-item">(KPK3) Pendidikan Kesihatan Reproduktif dan Sosial (PEERS)</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SENI VISUAL</h6>
                  </div>
                  <li class="list-group-item">(KSV1) Bahasa Seni Visual</li>
                  <li class="list-group-item">(KSV2) Kemahiran Seni Visual</li>
                </ul>
              </div>
            </div>
            <!-- 16 Domain kemenjadian murid -->
            <div class="tab-pane fade position-relative border-radius-lg" id="domain" role="tabpanel" aria-labelledby="16_domain">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SAINS</h6>
                  </div>
                  <li class="list-group-item bg-light"><b>PENGETAHUAN ASAS</b></li>
                  <li class="list-group-item">(DKM2) Numerasi (N)</li>
                  <li class="list-group-item">(DKM3) Literasi Saintifik (LS)</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">PENDIDIKAN KESIHATAN</h6>
                  </div>
                  <li class="list-group-item bg-light"><b>KEMANDIRIAN</b></li>
                  <li class="list-group-item">(DKM9) Komunikasi (Kom)</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SENI VISUAL</h6>
                  </div>
                  <li class="list-group-item bg-light"><b>KEMANDIRIAN</b></li>
                  <li class="list-group-item">(DKM8) Kreativiti (Kr)</li>
                </ul>
              </div>
            </div>
            <!-- 7 Kemahiran Insaniah -->
            <div class="tab-pane fade position-relative border-radius-lg" id="kemahiran" role="tabpanel" aria-labelledby="7_kemahiran">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SAINS</h6>
                  </div>
                  <li class="list-group-item">(KI1) Pemikiran Kritis & Kemahiran Penyelesaian Masalah</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">PENDIDIKAN KESIHATAN</h6>
                  </div>
                  <li class="list-group-item">(KI1) Pemikiran Kritis & Kemahiran Penyelesaian Masalah</li>
                </ul>
                <ul class="list-group flex-grow-1 mx-2">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">SENI VISUAL</h6>
                  </div>
                  <li class="list-group-item">(KI1) Pemikiran Kritis & Kemahiran Penyelesaian Masalah</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Objecktif Prestasi -->
  <br>
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#objektif_prestasi" role="tab" aria-controls="objektif_prestasi" aria-selected="false">
                  OBJEKTIF PRESTASI
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#idea_pengajaran" role="tab" aria-controls="idea_pengajaran" aria-selected="false" tabindex="-1">
                  IDEA PENGAJARAN (AKTIVITI)
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#abm" role="tab" aria-controls="abm" aria-selected="false" tabindex="-1">
                  ALAT BANTU MENGAJAR
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#pentaksiran" role="tab" aria-controls="pentaksiran" aria-selected="false" tabindex="-1">
                  PENTAKSIRAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#spesifikasi_pengajaran" role="tab" aria-controls="spesifikasi_pengajaran" aria-selected="false" tabindex="-1">
                  SPESIFIKASI PENGAJARAN
                </a>
              </li>

              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- OBJEKTIF PRESTASI -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="objektif_prestasi" role="tabpanel" aria-labelledby="objektif_prestasi">
              <div class="d-flex top-0 w-100">
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
                  <br>
                  <div class="alert alert-dark text-white" role="alert">
                    DURASI PERLAKSANAAN (MINIT): &nbsp; <strong><span class="badge badge-primary text-dark" style="background-color: #d2d6da;">300</span></strong>
                  </div>
                </ul>
              </div>
            </div>
            <!-- idea_pengajaran -->
            <div class="tab-pane fade position-relative border-radius-lg" id="idea_pengajaran" role="tabpanel" aria-labelledby="idea_pengajaran">
              <div class="d-flex top-0 w-100">
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>

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

                  <br>
                  <div class="alert alert-dark text-white" role="alert">
                    <strong>CATATAN:</strong>
                    Idea pengajaran adalah panduan kepada guru sahaja, sebarang penambahbaikan adalah amat dialukan
                  </div>
                </ul>
              </div>
            </div>
            <!-- Kompetensi Teras -->
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
            </div>
            <!-- Pentaksiran -->
            <div class="tab-pane fade position-relative border-radius-lg" id="pentaksiran" role="tabpanel" aria-labelledby="pentaksiran">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
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
            </div>
            <!-- Spesifikasi -->
            <div class="tab-pane fade position-relative border-radius-lg" id="spesifikasi_pengajaran" role="tabpanel" aria-labelledby="spesifikasi_pengajaran">

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