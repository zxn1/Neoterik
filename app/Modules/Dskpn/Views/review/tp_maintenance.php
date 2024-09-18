<div class="container-fluid py-4" id="tp-maintenance-form">
  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">PENETAPAN TAHAP PENGUASAAN</h6>
    </div>
    <div class="card-body py-2">
      <div class="custom row pt-3 pb-3">
        <div class="row" id="tahap-penguasaan">
        </div>
      </div>
      <hr class="custom">
    </div>
</div>

<script>
  const getTPListEndpoint = "<?= route_to('get_standard_performance') ?>";
  const subjectData = <?= json_encode(!empty($subjects) ? $subjects : []); ?>;
  const tpSessRefcode = <?= json_encode(!empty($tp_sess_refcode) ? $tp_sess_refcode : []); ?>;
</script>
tp-dynamic-field
tp_loader

<script src="/assets/js/dskpn/tp-dynamic-field.js"></script>
<script src="/assets/js/dskpn/tp_loader.js"></script>