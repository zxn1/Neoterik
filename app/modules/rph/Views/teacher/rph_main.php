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
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">MAKLUMAT RPH</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label for="kluster">KLUSTER</label>
          <select class="form-control select2" id="kluster" name="kluster">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="col">
          <label for="subtema">SUB-TEMA</label>
          <select class="form-control select2" id="subtema" name="subtema">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="col">
          <label for="tahun">TAHUN</label>
          <select class="form-control select2" id="tahun" name="tahun">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
        </div>
      </div>
      <div class="row py-4">
        <div class="col">
          <label for="tema">TEMA</label>
          <select class="form-control select2" id="tema" name="tema">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="col">
          <label for="topik">TOPIK</label>
          <select class="form-control select2" id="topik" name="topik">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
        </div>
        <div class="col">
          <label for="durasi">DURASI</label>
          <select class="form-control select2" id="durasi" name="durasi">
            <option value="AL">Alabama</option>
            <!-- Other options here -->
            <option value="WY">Wyoming</option>
          </select>
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