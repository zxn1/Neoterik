<style>
  .ck-editor__editable_inline {
      min-height: 220px;
  }

  .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    border-radius: 1rem !important;
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
  }

  .card .card-header {
    padding: 0.5rem;
  }
</style>
<script src="/neoterik/assets/ckeditor5/ckeditor.js"></script>
<div class="container-fluid py-4">
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
            <?php } ?>
          </select>
        </div>
        <div class="col">
          <label for="tahun">TOPIK</label>
          <select class="form-control select2" id="tahun" name="tahun" <?= isset($topikncluster)?'disabled':''; ?>>
            <?php if(isset($topikncluster)) { ?>
              <option value="<?= $topikncluster['tm_id']; ?>" selected><?= $topikncluster['tm_desc']; ?></option>
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
        <textarea id="view-idea-pentaksiran" rows="5" name="idea-pengajaran" class="multisteps-form__textarea form-control zero-top-border" disabled><?= $act_assess_idea_pengajaran; ?></textarea>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="py-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
          <h6 class="my-auto text-white">Pentaksiran</h6>
        </div>
        <textarea id="view-pentaksiran" rows="5" name="pentaksiran" class="multisteps-form__textarea form-control zero-top-border" disabled><?= $act_assess_pentaksiran; ?></textarea>
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

                <?php
                if(!empty($act_assess_abm))
                {
                  foreach($act_assess_abm as $abm)
                  { 
                    $random_number = rand(100000, 999999);
                    ?>
                    <tr id="<?= $random_number; ?>-item-abm">
                      <td class="ps-1" colspan="4">
                        <div class="my-auto">
                          <input type="text" class="form-control text-dark d-block text-sm" value="<?= $abm; ?>" disabled>
                        </div>
                      </td>
                    </tr>
                  <?php 
                  }
                } ?>

                </tbody>
              </table>
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
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault11" <?= (!empty($act_assess_parent_involve) && $act_assess_parent_involve == 'Y')?'checked':''; ?> disabled>
            </div>
          </td>
          <td>
            Keperluan Pengilabatan Ibu Bapa
          </td>
        </tr>
      </table>
      
    </div>
  </div>
</div>
<div id="custom-freetext-id"><!-- nothing here --></div>
<script>
  $(document).ready(function() {
      ClassicEditor
      .create( document.querySelector('#view-pentaksiran'), {
        toolbar: [], // Remove the toolbar
        disabled: true,
      } )
      .then( editor => {
        editor.enableReadOnlyMode('custom-freetext-id');
      } )
      .catch( error => {
          console.log( error );
      } );

      ClassicEditor
      .create( document.querySelector('#view-idea-pentaksiran'), {
        toolbar: [], // Remove the toolbar
        disabled: true,
      } )
      .then( editor => {
        editor.enableReadOnlyMode('custom-freetext-id');
      } )
      .catch( error => {
          console.log( error );
      } );
  });
</script>