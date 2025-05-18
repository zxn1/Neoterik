$(document).ready(function() {
  if(tpSessRefcode.length > 0 && subjectData.length > 0)
  {
    subjectData.forEach((sub, index) => {
      $("#dskp-code-subject-" + sub[0].sbm_id).val(tpSessRefcode[index]);
      getTPFromDSKPCode(sub[0].sbm_id, sub[0].sbm_code, sub[0].sbm_desc);
    });
  }
});

function getTPFromDSKPCode(sbm_id, sbm_code, sbm_name = "")
{
  let dskpCode = $("#dskp-code-subject-" + sbm_id).val();
  $.ajax({
    url: getTPListEndpoint + "?dskp_code=" + dskpCode + "&sbm_code=" + sbm_code,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      if(response.status = 'success')
      {
        let TPData = response.data;
        if(TPData.length > 0)
        {
          let subjectTPDiv = $("#collection-" + sbm_code);

          subjectTPDiv.empty();
          let counter = 1;
          TPData.forEach(item => {
            subjectTPDiv.append(`<div class="d-flex w-100 align-items-center mb-2" style="display: flex !important;flex-direction: row !important;">
                                  <span class="ribbon badge" style="position : relative; left : 0px; top : 0px; width: 25px; height : 45px; font-size : 12px; opacity : 0.7;" id="tpcounter">${counter}</span>
                                  <div style="margin-left : 2px; background-color: #f9f9f9;" class="form-control text-muted border" style="opacity: 0.9; pointer-events: none;">
                                    ${item.sp_tp_level_desc}
                                  </div>
                                  <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" style="display : none;">
                                      <i class="fas fa-info-circle fa-lg me-2"></i>
                                  </a>
                                </div>`);
            counter++;
          });
          $("#dskp-code-subject-" + sbm_id).prop("readonly", true);
        } else {
          Swal.fire({
            icon: "error",
            title: "Maaf!",
            text: "Tiada rekod Tahap Penguasaan bagi Kod '" + dskpCode + "' " + sbm_name?"yang berkait subjek '" + sbm_name + "'":"."
          });
        }
      } else {
        Swal.fire({
          icon: "error",
          title: "Maaf!",
          text: "Ralat telah berlaku! Tolong muat semula pelayar."
        });
      }
    }
  });
}

document.getElementById('tp-maintenance-form').addEventListener('submit', function(event) {
    $('#tp-maintenance-form').find(':input').each(function() {
    var input = $(this);
    if (input.val().trim() === '' && !(input.attr('type') === 'button' || input.attr('type') === 'submit')) {
      input.css('border', '2px solid red');
      event.preventDefault();
    }
  });
});

function resetTPForm()
{
    //subjectData
    subjectData.forEach(item => {
        item = item[0];
        $("#dskp-code-subject-" + item.sbm_id).prop("readonly", false);
        $("#collection-" + item.sbm_code).empty();
        $("#collection-" + item.sbm_code).append(`<div class="d-flex w-100 align-items-center mb-2" style="display: flex !important;flex-direction: row !important;">
                        <input type="text" class="form-control me-2 ms-4" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" required readonly>
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" sty;e="display : none;">
                            <i class="fas fa-info-circle fa-lg me-2"></i>
                        </a>
                    </div>`);
    });
}