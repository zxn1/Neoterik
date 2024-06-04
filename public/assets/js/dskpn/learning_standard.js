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