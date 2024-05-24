$(document).ready(function() {
    $('.select2').select2();
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