$(document).ready(function() {
    $('.select2').select2();

    let editor_idea_pengajaran, editor_pentaksiran;

    ClassicEditor
    .create( document.querySelector('#editor-idea-pengajaran'), {
        simpleUpload: {
        // Feature configuration.
        uploadUrl: ckeditor_upload_url,
        headers: {
            //later put csrf_token
        }
        }
    } )
    .then( newEditor => {
        //ni incase ada nak adjust editor ni nanti
        editor_idea_pengajaran = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector('#editor-pentaksiran'), {
        simpleUpload: {
        // Feature configuration.
        uploadUrl: ckeditor_upload_url,
        headers: {
            //later put csrf_token
        }
        }
    } )
    .then( newEditor => {
        //ni incase ada nak adjust editor ni nanti
        editor_pentaksiran = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );
});

 function addField() {
    // Get the collection container
    var collection = $('#item-abm');

    // Generate a unique ID for the new field
    var newFieldId = Math.floor(Math.random() * 1000000);

    // Create the new field HTML
    var newFieldHTML = `
    <tr id="${newFieldId}-item-abm">
        <td class="ps-1" colspan="4">
            <div class="my-auto">
            <input type="text" class="form-control text-dark d-block text-sm" placeholder="Alat Bantu Mengajar (ABM)" name="abm[]" value="">
            </div>
        </td>
        <td width="5px">
            <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#${newFieldId}-item-abm').remove();">
                <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
            </a>
        </td>
    </tr>
    `;

    collection.append(newFieldHTML);
}

function addActivityItemField() {
    // Get the collection container
    var collection = $('#teaching-idea-and-activity');

    // Generate a unique ID for the new field
    var newFieldId = Math.floor(Math.random() * 1000000);

    // Create the new field HTML
    var newFieldHTML = `
    <div class="row m-1" id="activity-idea-item-` + newFieldId + `">
        <div class="col-2 p-0 pe-1">
            <input type="number" name="activity-idea-number[]" step="0.01" min="0" class="form-control p-1" placeholder="1.1" style="height : 45px;">
        </div>
        <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
            <input type="text" class="form-control p-1 me-1" name="activity-idea-input[]" placeholder="Idea pengajaran bagi topik DSKPN ini" style="height : 45px;">
            <div class="input-group-prepend me-1" style="margin-right : 5px;" onclick="$('#activity-idea-item-` + newFieldId + `').remove();">
                <button class="input-group-text justify-content-center" id="btnGroupAddon" style="height : 45px; width : 50px;">
                    <i class="fas fa-trash-alt" style="color:red;"></i>
                </button>
            </div>
        </div>
    </div>
    `;

    collection.append(newFieldHTML);
}

function addAsessmentItemField(whichID) {
    // Get the collection container
    var collection = $('#assessment-div-' + whichID);

    // Generate a unique ID for the new field
    var newFieldId = Math.floor(Math.random() * 1000000);

    // Create the new field HTML
    var newFieldHTML = `
    <div class="row m-1" id="assessment-`+ whichID +`-item-`+newFieldId+`">
        <div class="col-2 p-0 pe-1">
        <input type="number" name="assessment-number[`+ whichID +`][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1" style="height : 45px;">
        </div>
        <div class="col-10 d-flex p-0" style="margin-bottom : 5px;">
        <input type="text" class="form-control p-1 me-1" name="assessment-input[`+ whichID +`][]" placeholder="Idea pentaksiran seterusnya.." style="height : 45px;">
        <div class="input-group-prepend me-1" style="margin-right : 5px;" onclick="$('#assessment-`+ whichID +`-item-`+newFieldId+`').remove();">
            <button class="input-group-text justify-content-center" id="btnGroupAddon" style="height : 45px; width : 50px;">
                <i class="fas fa-trash-alt" style="color:red;"></i>
            </button>
        </div>
        </div>
    </div>
    `;

    collection.append(newFieldHTML);
}