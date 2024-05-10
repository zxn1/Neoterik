$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    StandardData.forEach(function(item){
        $('#tahap-penguasaan').append(`
            <div class="col-md-4">
                <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">${ item.name }</p>
                    <div id="collection-${item.name}">
                        <div class="d-flex w-100 align-items-center mb-2" id="1-collection-${item.name}">
                            <input type="text" class="form-control me-2" id="exampleFormControlInput1" placeholder="Menilai dan mencinpta">
                            <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection-${item.name}').remove();">
                                <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <button class="btn btn-outline-warning opacity-6 btn-sm mt-2" onclick="addField('collection-${item.name}')">Tambah TP</button>
                </div>
            </div>
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
        <div class="d-flex w-100 align-items-center mb-2" id="${newFieldId}-${collectionId}">
            <input type="text" class="form-control me-2" placeholder="Menilai dan mencinpta" value="${text}">
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