let editor_objective;
$(document).ready(function() {
    //force to show dskpn set ic/id form
    if (!globalCheckingDSKPNCode)
        $('#setDSKPNIC').modal('show');
    $('#setDSKPNIC').on('hidden.bs.modal', function () {
        if (!globalCheckingDSKPNCode) {
            $('#setDSKPNIC').modal('show');
        }
    });

    //force to show form either resume or new dskpn
    if (resumeOrNot)
        $('#resumeornot').modal('show');
    $('#resumeornot').on('hidden.bs.modal', function () {
        if (resumeOrNot) {
            $('#resumeornot').modal('show');
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
    var nodes = document.querySelectorAll("input[type=text]");
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