<!-- Load c3.css -->
<link href="/assets/css/assessment/c3.css" rel="stylesheet">
<link href="/assets/css/assessment/c3.min.css" rel="stylesheet">

<!-- Load d3.js and c3.js -->
<script src="/assets/js/assessment/d3-5.8.2.min.js" charset="utf-8"></script>
<script src="/assets/js/assessment/c3.min.js"></script>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-6">
      <div class="d-flex flex-column h-100">
        <h4 class="font-weight-bolder mb-0">Guru 1: Puan Herlina Binti Basiran</h4>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-4 col-12">
      <div class="card card-background card-background-mask-info h-100 tilt" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
        <div class="full-background" style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')"></div>
        <div class="card-body pt-4 text-center">
          <h2 class="text-white mb-0 mt-2 up">Pelajar Terdaftar</h2>
          <h1 class="text-white mb-0 up">67</h1>
          <a href="javascript:;" class="btn btn-outline-white mb-2 px-5 up">Lihat Lagi</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-12">
      <div class="card card-background card-background-mask-primary h-100 tilt" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
        <div class="full-background" style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')"></div>
        <div class="card-body pt-4 text-center">
          <h2 class="text-white mb-0 mt-2 up">Subjek</h2>
          <h1 class="text-white mb-0 up">1</h1>
          <a href="javascript:;" class="btn btn-outline-white mb-2 px-5 up">Lihat Lagi</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-12">
      <div class="card card-background card-background-mask-success h-100 tilt" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
        <div class="full-background" style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')"></div>
        <div class="card-body pt-4 text-center">
          <h2 class="text-white mb-0 mt-2 up">Kelas</h2>
          <h1 class="text-white mb-0 up">4</h1>
          <a href="javascript:;" class="btn btn-outline-white mb-2 px-5 up">Lihat Lagi</a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-6">
      <div class="d-flex flex-column h-100">
        <h4 class="font-weight-bolder mb-0">Status Pentaksiran</h4>
      </div>
    </div>
  </div>
  <br>
  <div class="text-end dropdown">
    <button class="btn bg-gradient-info dropdown-toggle" style="width:150px;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      Tahun
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <li><a class="dropdown-item" href="javascript:;">2024</a></li>
      <li><a class="dropdown-item" href="javascript:;">2023</a></li>
      <li><a class="dropdown-item" href="javascript:;">2022</a></li>
      <li><a class="dropdown-item" href="javascript:;">2021</a></li>
    </ul>
  </div>
  <div id="chart"></div>
</div>

<script>
  var chart = c3.generate({
    bindto: '#chart',
    data: {
      columns: [
        ['Selesai', 7, 20, 17, 50],
        ['Dalam Proses', 30, 30, 20, 10],
        ['Belum Bermula', 30, 17, 30, 7]
      ],
      type: 'bar'
    },
    bar: {
      width: {
        ratio: 0.5 // this makes bar width 50% of length between ticks
      }
      // or
      // width: 100 // this makes bar width 100px
    },
    axis: {
      x: {
        type: 'category',
        categories: ['Kelas Bestari', 'Kelas Bijak', 'Kelas Pintar', 'Kelas Cerdik']
      }
    }
  });
</script>