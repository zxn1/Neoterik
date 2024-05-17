$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function() {
    StandardData.forEach(function(item){
        $('#standard-pembelajaran').append(`
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header d-flex p-3 bg-gradient-primary">
                        <h6 class="my-auto text-white">${ item.name }</h6>
                    </div>
                    <textarea class="multisteps-form__textarea form-control zero-top-border" id="exampleFormControlTextarea1" rows="5" placeholder="${item.hint}"></textarea>
                </div>
            </div>
        `);
    });
 });


//listener
$('#kluster-selection').on('change', function() {
    var cm_id = $(this).val();

    document.getElementById('loading-screen').style.display = "block";

    $.ajax({
        url: '/dskpn/topic/get-topic-by-kluster/' + cm_id,
        type: 'GET',
        data: {
            csrf: csrfToken, // Include the CSRF token
        },
        dataType: 'json',
        success: function(data) {
            // Handle success response
            if(data.status == 'success')
            {
                document.getElementById('loading-screen').style.display = "none";
                $('#topik-dynamic-field').empty();
                data.data.forEach(function(item){
                    $('#topik-dynamic-field').append(`<option value="${item.tm_id}">${item.tm_desc}</option>`);
                });
            } else {
                document.getElementById('loading-screen').style.display = "none";
                Swal.fire({
                    icon: "danger",
                    title: "Maaf",
                    text: "Tiada rekod topik dijumpai dibawah kluster yang dipilih!"
                });
            }
        },
        error: function(xhr, status, error) {
            document.getElementById('loading-screen').style.display = "none";
            // Handle error
            Swal.fire({
                icon: "danger",
                title: "Maaf",
                text: "Tiada rekod topik dijumpai dibawah kluster yang dipilih!"
            });
        }
    });
});
 

//  <div class="card mt-4" id="notifications">
//         <div class="card-header d-flex p-3 bg-gradient-primary">
//           <h6 class="my-auto text-white">KAEDAH</h6>
//         </div>
//         <div class="card-body pt-0">
          
//         </div>
//       </div>