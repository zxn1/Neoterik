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