let editor_objective;
$(document).ready(function() {
    ClassicEditor
    .create( document.querySelector('#editor-objectif-pentaksiran'), {
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
        editor_objective = newEditor;
    } )
    .catch( error => {
        console.log( error );
    } );
});

function validateAndSubmit()
{
    if(document.getElementById("tema-selection").value != "-- Sila Pilih Tema --")
    {
        //console.log(document.getElementById("tema-selection").value);
        document.getElementById("submit_learning").submit();
    } else {
        Swal.fire("Sila pilih Tema!", "", "error");
    }
}