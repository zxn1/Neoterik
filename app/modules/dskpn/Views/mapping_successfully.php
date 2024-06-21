<div class="container-fluid py-4">

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">DSKPN</h6>
    </div>
    <div class="card-body">
      <div class="row pb-6">
        <center>
          <h2>DSKPN #<?= $dskpn_code; ?></h2>
          <dotlottie-player src="https://lottie.host/08e4f323-207d-4f1c-b002-c561616b7066/PziNlyQZGC.json" background="transparent" speed="1" style="position : relative; width: 40%; top: -50px;" direction="1" playMode="normal" loop autoplay></dotlottie-player>
          <h3 style="position : relative; top: -50px;">Topik DSKPN berjaya direkodkan didalam sistem!</h3>
        </center>
      </div>
    </div>
  </div>
  <br>

  <div class="text-end">
    <a href="<?= route_to('dskpn_view', $dskpn_id) ?>" type="button" class="btn bg-gradient-success">Selesai</a>
  </div>
</div>

<!-- alert part -->
<script>
    Swal.fire({
        icon: "success",
        title: "Berjaya",
        text: "Proses merekodkan Topik DSKPN telah berjaya!"
    });
</script>