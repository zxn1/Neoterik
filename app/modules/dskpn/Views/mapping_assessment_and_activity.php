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


<form action="<?= route_to('store_actv_asses') . "?dskpn=" . $dskpn_id; ?>" method="POST" class="container-fluid py-4">

  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">Petaan Aktiviti dan Pentaksiran</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label for="kluster">KLUSTER</label>
          <select class="form-control select2" id="kluster" name="kluster" <?= isset($topikncluster)?'disabled':''; ?>>
            <?php if(isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['cm_id']; ?>" selected><?= $topikncluster['cm_desc']; ?></option>
            <?php } else { ?>
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
            <?php } ?>
          </select>
        </div>
        <div class="col">
          <label for="tahun">TOPIK</label>
          <select class="form-control select2" id="tahun" name="tahun" <?= isset($topikncluster)?'disabled':''; ?>>
            <?php if(isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['tm_id']; ?>" selected><?= $topikncluster['tm_desc']; ?></option>
            <?php } else { ?>
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="py-1">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Idea Pengajaran (Aktiviti)</h6>
        </div>
        <textarea rows="9" name="idea-pengajaran" class="multisteps-form__textarea form-control zero-top-border">
        </textarea>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="py-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Pentaksiran</h6>
        </div>
        <textarea rows="9" name="pentaksiran" class="multisteps-form__textarea form-control zero-top-border">
        </textarea>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Alat Bantu Mengajar (ABM)</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="table-responsive">
              <table class="table mb-0">
                <tbody id="item-abm">

                  <tr id="0-item-abm">
                    <td class="ps-1" colspan="4">
                      <div class="my-auto">
                        <input type="text" class="form-control text-dark d-block text-sm" placeholder="Alat Bantu Mengajar (ABM)" name="abm[]" value="">
                      </div>
                    </td>
                    <td width="5px">
                      <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#0-item-abm').remove();">
                          <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>

                </tbody>
              </table>
              <span class="btn bg-gradient-primary mt-2" onclick="addField()">Tambah Item&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                  <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13m.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0"/>
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <table class="mt-2 card" style="border-style : solid; border-width : 2px;">
        <tr>
          <td>
            <div class="form-check form-switch mb-0 d-flex align-items-center justify-content-center">
              <input class="form-check-input" value="Y" name="parent-involvement" type="checkbox" id="flexSwitchCheckDefault11">
            </div>
          </td>
          <td>
            Keperluan Pengilabatan Ibu Bapa
          </td>
        </tr>
      </table>
      
    </div>
  </div>

  <div class="text-end p-3">
    <a href="domain-mapping" type="button" class="btn bg-gradient-secondary">Batal</a>
    <button type="submit" class="btn bg-gradient-info">Simpan</button>
  </div>
</form>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>