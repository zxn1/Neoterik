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

    if (!globalCheckingDSKPNCode)
        $('#setDSKPNIC').modal('show');
    $('#setDSKPNIC').on('hidden.bs.modal', function () {
        if (!globalCheckingDSKPNCode) {
            $('#setDSKPNIC').modal('show');
        }
    });
});

function yearDSKPNChecked(event) {
    var checkbox = document.getElementById('year-dskpn-checkbox');
    var input = document.getElementById('year-dskpn-input');

    if (checkbox.checked) {
        input.disabled = false;
    } else {
        input.disabled = true;
    }
}

function validateAndSubmit()
{
    if(document.getElementById("tema-selection").value != "-- Sila Pilih Tema --")
    {
        // Check if the form is valid
        if (document.getElementById("submit_learning").checkValidity() === false) {
            // If the form is invalid, trigger the browser's built-in validation
            document.getElementById("submit_learning").reportValidity();
            return false;
        }

        document.getElementById("submit_learning").submit();
    } else {
        Swal.fire("Sila pilih Tema!", "", "error");
    }
}