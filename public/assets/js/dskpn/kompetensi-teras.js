$(document).ready(function() {
    $('.select2').select2();
});

document.getElementById('store-core-competency-form').addEventListener('submit', function(event) {
    $('#store-core-competency-form').find(':input').each(function() {
    var input = $(this);
    if (input.val().trim() === '' && !(input.attr('type') === 'button' || input.attr('type') === 'submit')) {
        input.css('border', '2px solid red');
        event.preventDefault();
    }
    });
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function addField(subject_code, text = "", index = 0) {
    bareBoneId = subject_code;
    subject_code = 'item-placing-' + subject_code;

    // Get the collection container
    var collection = $('#' + subject_code);

    // Generate a unique ID for the new field
    var newFieldId = Math.floor(Math.random() * 1000000);

    // Create the new field HTML
    var newFieldHTML = `
    <tr id="${newFieldId}-${subject_code}">
        <td class="ps-1" colspan="4">
        <div class="my-auto">
            <input type="text" class="form-control text-dark d-block text-sm" placeholder="Menilai dan mencipta" name="input-${index}-${bareBoneId}[]" value="${text}">
        </div>
        </td>
        <td width="10px">
        <div class="form-check form-switch mb-0 mt-2 d-flex align-items-center justify-content-center">
            <input class="form-check-input" type="checkbox" value="${bareBoneId}" id="flexSwitchCheckDefault11" onchange="setCheckBox(this, '${newFieldId}${bareBoneId}', this.value)">
            <input type="text" value="off" name="checked-${index}-${bareBoneId}[]" id="${newFieldId}${bareBoneId}" hidden/>
        </div>
        </td>
        <td width="5px">
        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#${newFieldId}-${subject_code}').remove();">
            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
        </a>
        </td>
    </tr>
    `;

    collection.append(newFieldHTML);
}


function setCheckBox(checkbox, barebone, valuez)
{
    if ($(checkbox).is(':checked')) {
        $('#' + barebone).val(valuez);
    } else {
        $('#' + barebone).val('off');
    }
}