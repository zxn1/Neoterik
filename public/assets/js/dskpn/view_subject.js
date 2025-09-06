$(document).ready(function() {
    $('.select2').select2();
});

function clearDynamicInputs()
{
    StandardData.forEach(function(item){
        var collection = $('#collection1-' + item.name);
        var children = collection.children(); // Get all children elements
        children.not(':first-child').remove(); // Remove all excep first
    });
}

function clearAllDynamicInputs()
{
    StandardData.forEach(function(item) {
        var collection = $('#collection1-' + item.name);
        collection.empty();
    });
}

function clearDynamicInputs()
{
    StandardData.forEach(function(item){
        var collection = $('#collection2-' + item.name);
        var children = collection.children(); // Get all children elements
        children.not(':first-child').remove(); // Remove all excep first
    });
}

function clearAllDynamicInputs()
{
    StandardData.forEach(function(item) {
        var collection = $('#collection2-' + item.name);
        collection.empty();
    });
}

function clearDynamicInputs()
{
    StandardData.forEach(function(item){
        var collection = $('#collection3-' + item.name);
        var children = collection.children(); // Get all children elements
        children.not(':first-child').remove(); // Remove all excep first
    });
}

function clearAllDynamicInputs()
{
    StandardData.forEach(function(item) {
        var collection = $('#collection3-' + item.name);
        collection.empty();
    });
}


function deleteSubject(subjectID) {
    // var csrfName = '<?= csrf_token() ?>';  // CSRF Token name
    // var csrfHash = '<?= csrf_hash() ?>';   // CSRF Hash

    $.ajax({
        url: '/dskpn/subject/delete/' + subjectID,
        type: 'DELETE',
        data: {
            csrf: csrfToken, // Include the CSRF token
            // Other data parameters
        },
        dataType: 'json',
        success: function(data) {
            if (data.status == 'success') {
                Swal.fire({
                    icon: "success",
                    title: "Berjaya",
                    text: "Mata Pelajaran berkaitan berjaya dipadam!"
                }).then(function() {
                    // Optionally remove the row from the table
                    $('#row-' + subjectID).remove();
                    // Reload the page
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Maaf",
                    text: "Proses pemadaman mata pelajaran gagal!"
                });
            }
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: "error",
                title: "Maaf",
                text: "Proses pemadaman mata pelajaran gagal!\n" + error
            });
        }
    });
}



 