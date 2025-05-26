$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    initializeTPField();
 });


 function initializeTPField()
 {
    subjectData.forEach(function(item, index){
        item = item[0];

        $('#tahap-penguasaan').append(`
            <ul class="list-group flex-grow-1 mx-2">
                <label>Kod Rujukan TP</label>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-9 p-0 ps-2">
                            <input id="dskp-code-subject-${item.sbm_id}-${index}" type="text" name="sub_ref_code[]" class="form-control subject-title" style="font-size: 1em; font-weight: bold;" placeholder="Tajuk Mata Pelajaran" required value="${item.sbm_code}">
                        </div>
                        <div class="col-3 p-0 pe-2">
                            <button type="button" class="btn bg-secondary p-3 text-white" style="height: 40px; line-height: 5px;" onclick="getTPFromDSKPCode(${item.sbm_id}, '${item.sbm_code}', '${item.sbm_desc}', '${index}')">Semak</button>
                        </div>
                    </div>
                </div>
                <div class="card-header d-flex p-3 bg-primary" style="border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
                    <h6 class="my-auto text-white text-uppercase">${ item.sbm_desc }</h6>
                </div>
                <div class="list-group-item" id="collection-${item.sbm_code}-${index}" style="padding-left : 0px; border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                    <div class="d-flex w-100 align-items-center mb-2" id="1-collection-${item.sbm_code}-${index}" style="display: flex !important;flex-direction: row !important;">
                        <input type="text" class="form-control me-2 ms-3" id="exampleFormControlInput1" placeholder="Menilai dan mencipta" required readonly>
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" style="display : none;">
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
        <div id="${newFieldId}-${collectionId}">
            ${countInputs(collectionId) != 0?`<hr style="border-top : solid 1px !important; margin-left : 30px;" id="pleaseignoreme">`:''}
            <div class="d-flex w-100 align-items-center mb-3">
                <span class="ribbon badge" style="position : relative; left : -15px;" id="tpcounter">#</span>
                <div class="w-100" id="${newFieldId}-${bareBoneId}-target"></div>
            </div>
        </div>
    `;

    collection.append(newFieldHTML);

    WysiwygComponent.renderTo(newFieldId + '-' + bareBoneId + '-target', { id: newFieldId + '-' + bareBoneId, placeholder: text, inputNameId: "input-tahap-penguasaan", deleteButton : newFieldId + '-' + collectionId});

    tpUpdateNumbering(collectionId);
}

function countInputs(collectionId) {
    // Get the collection container
    var collection = $('#' + collectionId);

    // Count the number of input fields in the collection
    var inputCount = collection.children().length;

    return inputCount;
}

function removeIfFirstIsPleaseIgnoreMe() {
    var container = $('#collection-tahap-penguasaan');
    try {
        var firstChild = container.children().first(); // first child

        if (firstChild.length) {
            var nestedFirst = firstChild.children().first();

            if (nestedFirst.length && nestedFirst.attr('id') === 'pleaseignoreme') {
                nestedFirst.remove();
            }
        }
    } catch (err) {
        //to avoid error on console log
    }
}

function tpUpdateNumbering(collectionId) {
    removeIfFirstIsPleaseIgnoreMe();
    var counters = $('#' + collectionId).find('[id="tpcounter"]');

    // Loop and assign numbering
    counters.each(function(index) {
        // index start at 0, jadi tambah 1 supaya start dari 1
        $(this).html(index + 1);
    });
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