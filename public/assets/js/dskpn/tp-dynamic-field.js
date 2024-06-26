$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    subjectData.forEach(function(item){
        item = item[0];

        $('#tahap-penguasaan').append(`
            <ul class="list-group flex-grow-1 mx-2">
                <label>Kod Rujukan TP</label>
                <div class="mb-3">
                    <input type="text" name="sub_ref_code[]" class="form-control subject-title" style="font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required value="${item.sm_code}">
                </div>
                <div class="card-header d-flex p-3 bg-gradient-primary" style="border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
                    <h6 class="my-auto text-white text-uppercase">${ item.sm_desc }</h6>
                </div>
                <div class="list-group-item" id="collection-${item.sm_code}" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                    <div class="d-flex w-100 align-items-center mb-2" id="1-collection-${item.sm_code}" style="display: flex !important;flex-direction: row !important;">
                        <input name="input-${item.sm_code}[]" type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencinpta">
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-${item.sm_code}').remove();">
                            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="p-2 pb-3">
                    <span class="btn bg-gradient-primary mt-2" onclick="addField('${item.sm_code}')">Tambah TP &nbsp;&nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                        </svg>
                    </span>
                </div>
            </ul>
        `);

        if(tpDatas.length !== 0)
        {
            if (tpDatas[item.sm_desc] && tpDatas[item.sm_desc][0] !== undefined)
            {
                var collSubCollzs = $('#collection-' + item.sm_code);
                collSubCollzs.empty();

                tpDatas[item.sm_desc][0][1].forEach(function(itemz) {
                    // Get the collection container
                    var collSubject = $('#collection-' + item.sm_code);
        
                    // Generate a unique ID for the new field
                    var newFieldColl = Math.floor(Math.random() * 1000000);
                    
                    let newInputHTMLField = `<div class="d-flex w-100 align-items-center mb-2" id="${newFieldColl}-${item.sm_code}">
                    <input type="text" name="input-${item.sm_code}[]" class="form-control me-2" placeholder="Menilai dan mencinpta" value="${itemz}">
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#${newFieldColl}-${item.sm_code}').remove();">
                            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                        </a>
                    </div>`;
        
                    collSubject.append(newInputHTMLField);
                });
            }
        }
    });
 });

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
            <input type="text" name="input-${bareBoneId}[]" class="form-control me-2" placeholder="Menilai dan mencinpta" value="${text}">
            <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#${newFieldId}-${collectionId}').remove();">
                <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
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