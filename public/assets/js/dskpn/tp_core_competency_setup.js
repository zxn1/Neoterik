function selectSubjectToCode(element)
{
    resetForm();
    let selectedText = element.options[element.selectedIndex].text;
    let subjectCode = element.options[element.selectedIndex].getAttribute('data-code');

    $("#kod-rujukan").val(subjectCode);
    $("#subject-name-one").html(selectedText);

    $("#empty-tahap-penguasaan").hide();
    $("#tahap-penguasaan").show();
    $("#code-tp-rank-div").show();
    $("#dskpn-topic-numbering-div").show();
    $("#reset-n-save-section").show();
    WysiwygComponent.renderTo('input-tahap-penguasaan-target', { id: '1', inputNameId: "input-tahap-penguasaan"});
}

function resetForm()
{
    let selectElement = document.getElementById('dskpn-topic-numbering-list');
    selectElement.innerHTML = "<option disabled selected>-- Sila Pilih Tahap --</option>";

    $("#code-tp-rank").prop("selectedIndex", 0);
}

function getAvailableDskpCode(val)
{
    let sbmId = $("#subject-dynamic-field").val();
    let subjectCode = $("#kod-rujukan").val();

    $.ajax({
        url: getAvailableDskpCodeURL + "?sbm_id=" + sbmId + "&sbm_code=" + subjectCode + "&code_tp_rank=" + val,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            data = response.data;

            restrictedRefCodeArray = data.map(item => parseInt(item.code));
            
            let selectElement = document.getElementById('dskpn-topic-numbering-list');
            selectElement.innerHTML = "<option disabled selected>-- Sila Pilih Tahap --</option>";

            for (let i = 1; i <= 24; i++) {
                if (!restrictedRefCodeArray.includes(i)) {
                    let option = document.createElement('option');
                    option.value = i;
                    option.text = subjectCode + val + i.toString().padStart(2, '0');
                    selectElement.appendChild(option);
                }
            }

            $("#dskpn-topic-numbering-list").prop("disabled", false);
            $("#dskpn-topic-numbering-list").select2();
        }
    });
}

function resetTPForm()
{
    $("#collection-tahap-penguasaan").empty();
    // $("#collection-tahap-penguasaan").append(`<div class="d-flex w-100 align-items-center mb-2" id="1-collection-tahap-penguasaan" style="display: flex !important;flex-direction: row !important;">
    //                                             <input name="input-tahap-penguasaan[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" required>
    //                                             <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-tahap-penguasaan').remove();">
    //                                                 <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
    //                                             </a>
    //                                         </div>`);
    $("#collection-tahap-penguasaan").append(`<div class="d-flex w-100 align-items-center mb-2" id="1-collection-tahap-penguasaan" style="display: flex !important;flex-direction: row !important;">
        <span class="ribbon badge" style="position : relative; left : -15px;" id="tpcounter">1</span>
            <div id="input-tahap-penguasaan-target" class="w-100"></div>
        </div>`);
        
    WysiwygComponent.renderTo('input-tahap-penguasaan-target', { id: '1', inputNameId: "input-tahap-penguasaan"});
}