<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
  .zero-top-border {
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
  }
</style>

<div class="container-fluid">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../../../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-primary opacity-6"></span>
  </div>
  <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            Amna binti Abdul Hafiz
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            No 12,
            Jalan Bukit Wangsa 2,
            Bukit Wangsa Setia,
            35900 Tanjong Malim, Perak.
          </p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
          <script>
            document.write(new Date())
          </script>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex pb-0 p-3">
          <div class="nav-wrapper position-relative w-100">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#keseluruhan" role="tab" aria-controls="keseluruhan" aria-selected="false">
                  KESELURUHAN
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kluster_1" role="tab" aria-controls="kluster_1" aria-selected="false" tabindex="-1">
                  KLUSTER 1
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kluster_2" role="tab" aria-controls="kluster_2" aria-selected="false" tabindex="-1">
                  KLUSTER 2
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kluster_3" role="tab" aria-controls="kluster_3" aria-selected="false" tabindex="-1">
                  KLUSTER 3
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kluster_4" role="tab" aria-controls="kluster_4" aria-selected="false" tabindex="-1">
                  KLUSTER 4
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#kluster_5" role="tab" aria-controls="kluster_5" aria-selected="false" tabindex="-1">
                  KLUSTER 5
                </a>
              </li>

              <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 155px;"><a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">-</a></div>
            </ul>
          </div>
        </div>
        <div class="card-body p-3 mt-2" style="height: auto;">
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Standard Pembelajaran -->
            <div class="tab-pane fade position-relative border-radius-lg active show" id="keseluruhan" role="tabpanel" aria-labelledby="keseluruhan">
              <div class="d-flex top-0 w-100">
                <!-- standard Pembelajaran -->
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">Kompetensi Teras</h6>
                  </div>
                  <canvas class="form-control zero-top-border" id="kes_kt_chart" width="400" height="400"></canvas>
                </ul>
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">16 Domain</h6>
                  </div>
                  <canvas class="form-control zero-top-border" id="kes_16domain_chart" width="400" height="400"></canvas>
                </ul>
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white">7 Kemahiran Insaniah</h6>
                  </div>
                  <canvas class="form-control zero-top-border" id="kes_7kemahiran_chart" width="400" height="400"></canvas>
                </ul>
              </div>
              <br>
              <div class="card mt-4" id="accounts">
                <div class="card-header">
                  <h5>Rumusan</h5>
                </div>
                <div class="card-body pt-0">
                  <div class="d-sm-flex bg-gray-100 border-radius-lg my-4">
                    <p class="text-sm font-weight-bold my-auto ps-sm-2">Murid menunjukkan sikap yang baik di dalam kelas. Kerjasama yang diberi dalam kelas membantu murid memahami pengajaran di dalam kelas. Kompetensi murid di dalam kelas berada pada tahap cemerlang.</p>
                  </div>
                </div>
              </div>
              <br>
              <div class="d-flex top-0 w-100">
                <!-- standard Pembelajaran -->
                <div class="card card-body" id="profile">
                  <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto col-4">
                      <div class="avatar avatar-xl position-relative">
                        <img src="../../../assets/img/bruce-mars.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                      </div>
                    </div>
                    <div class="col-sm-auto col-8 my-auto">
                      <div class="h-100">
                        <p class="mb-0 font-weight-bold text-sm">
                          Disediakan Oleh:
                        </p>
                        <h5 class="mb-1 font-weight-bolder">
                          Alec Thompson
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                          Guru Kelas
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-body" id="profile">
                  <div class="row justify-content-center align-items-center">
                    <div class="col-sm-auto col-4">
                      <div class="avatar avatar-xl position-relative">
                        <img src="../../../assets/img/bruce-mars.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                      </div>
                    </div>
                    <div class="col-sm-auto col-8 my-auto">
                      <div class="h-100">
                        <p class="mb-0 font-weight-bold text-sm">
                          Disahkan Oleh:
                        </p>
                        <h5 class="mb-1 font-weight-bolder">
                          Alec Thompson
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                          Penyelaras Kluster
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- STANDARD PRESTASI -->
            <div class="tab-pane fade position-relative border-radius-lg" id="kluster_1" role="tabpanel" aria-labelledby="kluster_1">
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
            <div class="tab-pane fade position-relative border-radius-lg" id="kluster_2" role="tabpanel" aria-labelledby="kluster_2">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10">

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
            <div class="tab-pane fade position-relative border-radius-lg" id="kluster_3" role="tabpanel" aria-labelledby="kluster_3">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2" style="flex-basis: 0; flex-grow: 1;">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>
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
            <!-- kluster_4 -->
            <div class="tab-pane fade position-relative border-radius-lg" id="kluster_4" role="tabpanel" aria-labelledby="kluster_4">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10">

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
            <div class="tab-pane fade position-relative border-radius-lg" id="kluster_5" role="tabpanel" aria-labelledby="kluster_5">
              <div class="d-flex top-0 w-100">
                <!-- standard Prestasi (Tahap Penguasaan) -->
                <ul class="list-group flex-grow-1 mx-2">
                  <textarea class="multisteps-form__textarea form-control" rows="10" readonly>

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
</div>

<script>
  // Get the canvas element
  var ctx = document.getElementById('kes_kt_chart').getContext('2d');
  var cty = document.getElementById('kes_16domain_chart').getContext('2d');
  var ctz = document.getElementById('kes_7kemahiran_chart').getContext('2d');

  // Define the data for the radar chart
  var data = {
    labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
    datasets: [{
      label: 'Dataset 1',
      data: [12, 19, 3, 5, 2],
      backgroundColor: 'rgba(255, 99, 132, 0.2)', // Background color
      borderColor: 'rgba(255, 99, 132, 1)', // Border color
      borderWidth: 1 // Border width
    }]
  };

  // Define chart options
  var options = {
    scale: {
      angleLines: {
        display: true // Show lines radiating from the center
      },
      ticks: {
        beginAtZero: true // Start scale from zero
      }
    }
  };

  // Create the radar chart
  var kes_kt_chart = new Chart(ctx, {
    type: 'radar',
    data: data,
    options: options
  });
  var kes_16domain_chart = new Chart(cty, {
    type: 'radar',
    data: data,
    options: options
  });
  var kes_7kemahiran_chart = new Chart(ctz, {
    type: 'radar',
    data: data,
    options: options
  });
</script>