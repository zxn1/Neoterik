$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    StandardData.forEach(function(item){
        $('#tahap-penguasaan').append(`
            <ul class="list-group flex-grow-1 mx-2">
                <div class="card-header d-flex p-3 bg-gradient-primary">
                    <h6 class="my-auto text-white text-uppercase">${ item.name }</h6>
                </div>
                <div class="list-group-item" id="collection-${item.name}" style="border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">
                    <div class="d-flex w-100 align-items-center mb-2" id="1-collection-${item.name}" style="display: flex !important;flex-direction: row !important;">
                        <input type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencipta">
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-${item.name}').remove();">
                            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="p-2 pb-3">
                <button class="btn bg-gradient-primary mt-2" onclick="addField('collection-${item.name}')">Tambah TP</button>
                </div>
            </ul>
            
        `);
    });
 });

 function addField(collectionId, text = "") {
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
        <div class="d-flex w-100 align-items-center mb-2" id="${newFieldId}-${collectionId}" style="display: flex !important;flex-direction: row !important;">
            <input type="text" class="form-control me-2" placeholder="Menilai dan mencipta" value="${text}">
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
    StandardData.forEach(function(item){
        var collection = $('#collection-' + item.name);
        var children = collection.children(); // Get all children elements
        children.not(':first-child').remove(); // Remove all excep first
    });
}

function clearAllDynamicInputs()
{
    StandardData.forEach(function(item) {
        var collection = $('#collection-' + item.name);
        collection.empty();
    });
}