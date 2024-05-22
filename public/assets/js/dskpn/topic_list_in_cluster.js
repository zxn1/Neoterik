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


function deleteTopic(topicID)
{
    // Make a DELETE request using jQuery's $.ajax()
    $.ajax({
        url: '/dskpn/topic/delete/' + topicID,
        type: 'DELETE',
        data: {
            csrf: csrfToken, // Include the CSRF token
            // Other data parameters
        },
        dataType: 'json',
        success: function(data) {
            // Handle success response
            if(data.status == 'success')
            {
                Swal.fire({
                    icon: "success",
                    title: "Berjaya",
                    text: "Topik berkaitan berjaya dipadam!"
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Maaf",
                    text: "Proses pemadaman topik gagal!"
                });
            }
        },
        error: function(xhr, status, error) {
            // Handle error
            Swal.fire({
                icon: "error",
                title: "Maaf",
                text: "Proses pemadaman topik gagal!\n" + error
            });
        }
    });
}

 