let editor_objective;
$(document).ready(function() {
    // ClassicEditor
    // .create( document.querySelector('#editor-objectif-pentaksiran'), {
    //     simpleUpload: {
    //     // Feature configuration.
    //     uploadUrl: ckeditor_upload_url,
    //     headers: {
    //         //later put csrf_token
    //     }
    //     }
    // } )
    // .then( newEditor => {
    //     //ni incase ada nak adjust editor ni nanti
    //     editor_objective = newEditor;
    // } )
    // .catch( error => {
    //     console.log( error );
    // } );

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

function selectionPopulateBasedOnNumbering()
{
    let arrValues = [];
    var nodes = document.querySelectorAll("input[type=number]");
    for (var i=0; i<nodes.length; i++)
    if(nodes[i].id == 'standard-learning-number' && nodes[i].value != '')
    {
        arrValues.push(nodes[i].getAttribute('data-subject') + " " + nodes[i].value);
    }

    $("#objective-performance-selection-listing").val(JSON.stringify(arrValues));

    var nodeTwo = document.querySelectorAll("select#objective-prestasi-ref");

    for (var i=0; i<nodeTwo.length; i++)
    {
        nodeTwo[i].innerHTML = "";
        let htmlOption = "";
        arrValues.forEach(item => {
            htmlOption += `<option value="${item}">${item}</option>`;
        });

        nodeTwo[i].innerHTML = htmlOption;
    }

    $('select#objective-prestasi-ref').multipleSelect('destroy');
    $('select#objective-prestasi-ref').multipleSelect();
}

function initializeEachOne(id_num)
{
    $('select#objective-prestasi-ref-' + id_num).multipleSelect();
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