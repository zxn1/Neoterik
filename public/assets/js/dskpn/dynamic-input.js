$(document).ready(function() {
    $('.select2').select2();
});

//listener
$('#add-subject-button').on('click', function() {
    //check not more than subject set~
    let childElements = document.getElementById('standard-pembelajaran').children;

    // Initialize the count
    let countSubject = 0;

    // Loop through the children and count only those that do not have the specified ID
    for (let i = 0; i < childElements.length; i++) {
        if (childElements[i].id !== 'hinting-no-subject') {
            countSubject++;
        }
    }

    if(get_default_subject != null && ((countSubject+1) > get_default_subject.length))
    {
        Swal.fire({
            icon: "error",
            title: "Maaf",
            text: "Maksimum subjek dibenarkan adalah " + get_default_subject.length  + "!"
        });
        return;
    }
    //end
    
    try {
        document.getElementById("hinting-no-subject").style.display = "none";
    } catch (err) {
        //do nothing
    }

    let htmlOptions = ``;
    subject_list.forEach(function(item) {
        if(get_default_subject != null && (item.sm_id == get_default_subject[countSubject]))
        {
            htmlOptions += `<option selected class="dropdown-item" value='${item.sm_id}'>${item.sm_desc}</option>`;
        } else {
            htmlOptions += `<option class="dropdown-item" value='${item.sm_id}'>${item.sm_desc}</option>`;
        }
    });

    $('#standard-pembelajaran').append(`
        <div class="col-md-4 subject-card">
            <div class="card mt-4">
                <div class="card-header d-flex p-1 bg-gradient-secondary align-items-center">
                    <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required>
                        ${htmlOptions}
                    </select>
                    <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                <textarea class="multisteps-form__textarea form-control zero-top-border" name="subject_description[]" rows="5" placeholder="1. Objektif bagi Subjek ini.\n2. Objektif 2.."></textarea>
            </div>
        </div>
    `);
});

// Attach a delegated event listener for the delete buttons
$(document).on('click', '.delete-subject', function() {
    $(this).closest('.subject-card').remove();
});

$('#topik-dynamic-field').on('change', function() {
    var topic_id = $(this).val();
    
    document.getElementById('loading-screen').style.display = "block";

    $.ajax({
        url: '/dskpn/topic/get-year-by-tm-id/' + topic_id,
        type: 'GET',
        data: {
            csrf: csrfToken,
        },
        dataType: 'json',
        success: function(data) {
            // Handle success response
            if(data.status == 'success')
            {
                let yearz = data.data.tm_year;
                switch(data.data.tm_year){
                    case '1':
                        yearz = "Satu";
                    break;
                    case '2':
                        yearz = "Dua";
                    break;
                    case '3':
                        yearz = "Tiga";
                    break;
                    case '4':
                        yearz = "Empat";
                    break;
                    case '5':
                        yearz = "Lima";
                    break;
                    case '6':
                        yearz = "Enam";
                    break;
                }
                document.getElementById('tahun-to-display').value = yearz;
                // console.log(data);
            } else {
                document.getElementById('loading-screen').style.display = "none";
                Swal.fire({
                    icon: "error",
                    title: "Maaf",
                    text: "Tiada rekod tahun bagi topik yang dipilih!"
                });
                return;
            }
        },
        error: function(xhr, status, error) {
            document.getElementById('loading-screen').style.display = "none";
            // Handle error
            Swal.fire({
                icon: "error",
                title: "Maaf",
                text: "Tiada rekod tahun bagi topik yang dipilih!"
            });
            return;
        }
    });

    //display all subject related
    $.ajax({
        url: '/dskpn/subject/get-default-sm-id/' + $('#kluster-selection').val(),
        type: 'GET',
        data: {
            csrf: csrfToken,
        },
        dataType: 'json',
        success: function(data) {
            // Handle success response
            if(data.status == 'success')
            {
                try {
                    $('#standard-pembelajaran').html("");
                    document.getElementById("hinting-no-subject").style.display = "none";
                } catch (err) {
                    //do nothing
                }

                document.getElementById('loading-screen').style.display = "none";
                get_default_subject = data.clean_data;
                data.data.forEach(function(item){
                    //populate subject here
                    let htmlOptions = ``;
                    subject_list.forEach(function(itemz) {
                        if(get_default_subject != null && (itemz.sm_id == item.sm_id))
                        {
                            htmlOptions += `<option selected class="dropdown-item" value='${itemz.sm_id}'>${itemz.sm_desc}</option>`;
                        } else {
                            htmlOptions += `<option class="dropdown-item" value='${itemz.sm_id}'>${itemz.sm_desc}</option>`;
                        }
                    });

                    $('#standard-pembelajaran').append(`
                        <div class="col-md-4 subject-card">
                            <div class="card mt-4">
                                <div class="card-header d-flex p-1 bg-gradient-secondary align-items-center">
                                    <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Subjek" required>
                                        ${htmlOptions}
                                    </select>
                                    <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                                <textarea class="multisteps-form__textarea form-control zero-top-border" name="subject_description[]" rows="5" placeholder="1. Objektif bagi Subjek ini.\n2. Objektif 2.."></textarea>
                            </div>
                        </div>
                    `);

                    //end populate subject
                });
            } else {
                document.getElementById('loading-screen').style.display = "none";
                Swal.fire({
                    icon: "error",
                    title: "Maaf",
                    text: "Subjek bagi Kluster ini masih belum dikonfigurasi!"
                });
            }
        },
        error: function(xhr, status, error) {
            document.getElementById('loading-screen').style.display = "none";
            // Handle error
            Swal.fire({
                icon: "error",
                title: "Maaf",
                text: "Subjek bagi Kluster ini masih belum dikonfigurasi!"
            });
        }
    });
});

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
                $('#topik-dynamic-field').append(`<option selected>-- Sila Pilih Topik --</option>`);
                data.data.forEach(function(item){
                    $('#topik-dynamic-field').append(`<option value="${item.tm_id}">${item.tm_desc}</option>`);
                });
            } else {
                document.getElementById('loading-screen').style.display = "none";
                Swal.fire({
                    icon: "error",
                    title: "Maaf",
                    text: "Tiada rekod topik dijumpai dibawah kluster yang dipilih!"
                });
            }
        },
        error: function(xhr, status, error) {
            document.getElementById('loading-screen').style.display = "none";
            // Handle error
            Swal.fire({
                icon: "error",
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


// $(document).ready(function() {
//     StandardData.forEach(function(item){
//         $('#standard-pembelajaran').append(`
//             <div class="col-md-4">
//                 <div class="card mt-4">
//                     <div class="card-header d-flex p-3 bg-gradient-primary">
//                         <h6 class="my-auto text-white">${ item.name }</h6>
//                     </div>
//                     <textarea class="multisteps-form__textarea form-control zero-top-border" id="exampleFormControlTextarea1" rows="5" placeholder="${item.hint}"></textarea>
//                 </div>
//             </div>
//         `);
//     });
//  });

// $(document).ready(function() {
//     StandardData.forEach(function(item){
//         $('#standard-pembelajaran').append(`
//             <div class="col-md-4">
//                 <div class="card mt-4">
//                     <div class="card-header d-flex p-3 bg-gradient-primary">
//                         <input type="text" name="subtema" class="form-control" style="background-color: transparent;border: 0px; outline: none; color: white; font-size: 1em; font-weight:bold;" placeholder="Sains & Kemanusiaan" required></input>
//                     </div>
//                     <textarea class="multisteps-form__textarea form-control zero-top-border" id="exampleFormControlTextarea1" rows="5" placeholder="${item.hint}"></textarea>
//                 </div>
//             </div>
//         `);
//     });
//  });