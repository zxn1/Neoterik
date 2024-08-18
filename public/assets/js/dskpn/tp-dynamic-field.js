$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    initializeTPField();
 });


 function initializeTPField()
 {
    subjectData.forEach(function(item){
        item = item[0];

        $('#tahap-penguasaan').append(`
            <ul class="list-group flex-grow-1 mx-2">
                <label>Kod Rujukan TP</label>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-9 p-0 ps-2">
                            <input id="dskp-code-subject-${item.sbm_id}" type="text" name="sub_ref_code[]" class="form-control subject-title" style="font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required value="${item.sbm_code}">
                        </div>
                        <div class="col-3 p-0 pe-2">
                            <button type="button" class="btn bg-gradient-success p-3" style="height: 40px; line-height: 5px;" onclick="getTPFromDSKPCode(${item.sbm_id})">Semak</button>
                        </div>
                    </div>
                </div>
                <div class="card-header d-flex p-3 bg-gradient-primary" style="border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
                    <h6 class="my-auto text-white text-uppercase">${ item.sbm_desc }</h6>
                </div>
                <div class="list-group-item" id="collection-${item.sbm_code}" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                    <div class="d-flex w-100 align-items-center mb-2" id="1-collection-${item.sbm_code}" style="display: flex !important;flex-direction: row !important;">
                        <input name="input-${item.sbm_code}[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencinpta" disabled>
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)">
                            <i class="fas fa-info-circle fa-lg me-2"></i>
                        </a>
                    </div>
                </div>
            </ul>
        `);
    });
 }

 function addField(collectionId, text = "") {
    bareBoneId = collectionId;
    collectionId = 'collection-' + collectionId;
    if(countInputs(collectionId) > 5)
    {
        Swal.fire({
            icon: "warning",
            title: "Oops...",
            text: "Maksima TP dibenarkan adalah 6"
          });
        return 0;
    }

    // Get the collection container
    var collection = $('#' + collectionId);

    // Generate a unique ID for the new field
    var newFieldId = Math.floor(Math.random() * 1000000);

    // Create the new field HTML
    var newFieldHTML = `
        <div class="d-flex w-100 align-items-center mb-2" id="${newFieldId}-${collectionId}">
            <input type="text" name="input-${bareBoneId}[]" class="form-control me-2" placeholder="Menilai dan mencinpta" value="${text}" disabled>
            <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)">
                <i class="fas fa-info-circle fa-lg me-2"></i>
            </a>
        </div>
    `;

    collection.append(newFieldHTML);
}

function countInputs(collectionId) {
    // Get the collection container
    var collection = $('#' + collectionId);

    // Count the number of input fields in the collection
    var inputCount = collection.children().length;

    return inputCount;
}

function clearDynamicInputs()
{
    subjectData.forEach(function(item) {
        item = item[0];
        var collection = $('#collection-' + item.sm_code);
        collection.empty();
        addField(item.sm_code);
    });
}

function clearAllDynamicInputs()
{
    subjectData.forEach(function(item) {
        item = item[0];
        var collection = $('#collection-' + item.sm_code);
        collection.empty();
    });
}