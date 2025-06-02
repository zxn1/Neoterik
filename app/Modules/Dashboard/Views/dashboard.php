<head>
  <meta charset="UTF-8" />
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-color: #f0f2f5;
      padding: 20px;
    }

    .containerz {
      margin: 0 auto;
      padding: 0 20px;
      padding-top: 20px;
      padding-bottom: 35px;
    }

    .mac-card {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial,
        sans-serif;
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      position: relative;
      transition: transform 0.3s ease;
    }

    .mac-card:hover {
      transform: translateY(-5px);
    }

    .mac-card-header {
      background: #dfdfdf;
      height: 32px;
      padding: 6px 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .mac-dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
    }

    .mac-dot.red {
      background-color: #ff5f57;
    }

    .mac-dot.yellow {
      background-color: #ffbd2e;
    }

    .mac-dot.green {
      background-color: #28c840;
    }

    .mac-card-body {
      padding: 25px 20px;
      text-align: center;
      position: relative;
      overflow: hidden;
      color: white;
    }

    .mac-card h2,
    .mac-card h1 {
      margin-bottom: 10px;
      font-weight: bold;
      position: relative;
      z-index: 2;
    }

    .btn {
      border: 1px solid #fff;
      background: transparent;
      color: #fff;
      padding: 6px 16px;
      border-radius: 20px;
      text-decoration: none;
      transition: 0.3s;
      display: inline-block;
      position: relative;
      z-index: 2;
    }

    .btn:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .col-lg-4,
    .col-lg-12 {
      flex: 1;
      min-width: 280px;
    }

    .mt-4 {
      margin-top: 2rem;
    }

    #statusChart {
      max-width: 100%;
      height: 400px;
    }

    /* Div fixed bawah: invisible tapi full width dan tinggi 17px */
    .fixed-bottom {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 17px;
      pointer-events: none;
      /* biar klik boleh lewat */
      background: linear-gradient(to top,
          rgba(255, 255, 255, 0.4),
          rgba(255, 255, 255, 0));
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      z-index: 9999;
    }

    /* SVG corak */
    .svg-logo {
      position: absolute;
      opacity: 0.12;
      pointer-events: none;
      fill: white;
      stroke: white;
      stroke-width: 2;
      z-index: 1;
    }
  </style>
</head>
<div class="containerz">
  <!-- Kad Statistik -->
  <div class="row">
    <div class="col-lg-4 col-12">
      <div class="card bg-info h-100 tilt" data-tilt="" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
        <!-- <div class="full-background" style="background-image: url('<?= base_url() ?>assets/img/curved-images/white-curved.jpg')"></div> -->
        <div class="card-body pt-4 text-center">
          <h2 class="text-white mb-0 mt-2 up">Pelajar</h2>
          <h1 class="text-white mb-0 up">67</h1>
          <a href="javascript:;" class="btn btn-outline-white mb-2 px-5">Lihat Lagi</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-12">
      <div class="card h-100 tilt" data-tilt="" style="background-color : #82a9eb; will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
        <!-- <div class="full-background" style="background-image: url('<?= base_url() ?>assets/img/curved-images/white-curved.jpg')"></div> -->
        <div class="card-body pt-4 text-center">
          <h2 class="text-white mb-0 mt-2 up">Kluster</h2>
          <h1 class="text-white mb-0 up"><?= $kluster ?></h1>
          <a href="<?= route_to('view_cluster'); ?>" class="btn btn-outline-white mb-2 px-5">Lihat Lagi</a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-12">
      <div class="card h-100 tilt" data-tilt="" style="background-color: #5eab95f2; will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
        <!-- <div class="full-background" style="background-image: url('<?= base_url() ?>assets/img/curved-images/white-curved.jpg')"></div> -->
        <div class="card-body pt-4 text-center">
          <h2 class="text-white mb-0 mt-2 up">Kelas</h2>
          <h1 class="text-white mb-0 up">4</h1>
          <a href="javascript:;" class="btn btn-outline-white mb-2 px-5">Lihat Lagi</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Kad Graf Chart.js + Dropdown Tahun -->
  <div class="row mt-4">
    <div class="col-lg-12">
      <div class="mac-card">
        <div class="mac-card-header">
          <div class="mac-dot red"></div>
          <div class="mac-dot yellow"></div>
          <div class="mac-dot green"></div>
        </div>
        <div class="mac-card-body" style="color: black;">
          <div
            style="
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            ">
            <h4>Status Pentaksiran</h4>
            <select
              id="tahunSelect"
              style="
                padding: 6px 12px;
                border-radius: 6px;
                border: 1px solid #ccc;
            ">
              <option value="2024">2024</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
            </select>
          </div>
          <canvas id="statusChart" style="margin-top: 20px;"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="fixed-bottom"></div>

  <script>
    const ctx = document.getElementById('statusChart').getContext('2d');
    let statusChart;

    const chartData = {
      2024: {
        selesai: [7, 20, 17, 50],
        proses: [30, 30, 20, 10],
        belum: [30, 17, 30, 7]
      },
      2023: {
        selesai: [15, 10, 20, 40],
        proses: [25, 15, 18, 22],
        belum: [10, 25, 15, 18]
      },
      2022: {
        selesai: [18, 25, 12, 35],
        proses: [20, 20, 15, 15],
        belum: [15, 10, 28, 20]
      },
      2021: {
        selesai: [10, 30, 20, 25],
        proses: [10, 10, 10, 10],
        belum: [40, 15, 20, 15]
      }
    };

    function generateChart(data) {
      if (statusChart) {
        statusChart.destroy();
      }

      statusChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Kelas Bestari', 'Kelas Bijak', 'Kelas Pintar', 'Kelas Cerdik'],
          datasets: [{
              label: 'Selesai',
              data: data.selesai,
              backgroundColor: 'rgba(75, 192, 192, 0.8)'
            },
            {
              label: 'Dalam Proses',
              data: data.proses,
              backgroundColor: 'rgba(255, 206, 86, 0.8)'
            },
            {
              label: 'Belum Bermula',
              data: data.belum,
              backgroundColor: 'rgba(255, 99, 132, 0.8)'
            }
          ]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top'
            },
            title: {
              display: true,
              text: 'Status Pentaksiran Mengikut Kelas'
            }
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    // Generate chart for default year
    generateChart(chartData[2024]);

    // Event: Tahun dropdown change
    document.getElementById('tahunSelect').addEventListener('change', function() {
      const tahun = this.value;
      generateChart(chartData[tahun]);
    });
  </script>
</div>