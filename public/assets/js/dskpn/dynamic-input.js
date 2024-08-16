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
        if(get_default_subject != null && (item.sbm_id == get_default_subject[countSubject]))
        {
            htmlOptions += `<option selected class="dropdown-item" value='${item.sbm_id}'>${item.sbm_desc}</option>`;
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

        <div id="standard-subject-` + get_default_subject[countSubject] + `" style="margin-top : 5px; margin-bottom : 5px;">
            <div class="row m-1" id="standard-item-`+get_default_subject[countSubject]+`">
                <div class="col-1 p-0 pe-1">
                    <input type="number" name="standard-learning-number[`+get_default_subject[countSubject]+`][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1">
                </div>
                <div class="col-11 d-flex p-0" style="margin-bottom : 5px;">
                    <input type="text" class="form-control p-1 me-1" name="subject_description[`+get_default_subject[countSubject]+`][]" placeholder="1. Objektif bagi Subjek ini.">
                    <div class="input-group-prepend me-1" onclick="$('#standard-item-`+get_default_subject[countSubject]+`').remove();">
                        <button class="input-group-text" id="btnGroupAddon">
                            <i class="fas fa-trash-alt" style="color:red;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-1">
            <span class="btn bg-gradient-primary mt-2" onclick="addStandardPembelajaran('${get_default_subject[countSubject]}')">Tambah &nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                </svg>
            </span>
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
                        if(get_default_subject != null && (itemz.sbm_id == item.sbm_id))
                        {
                            htmlOptions += `<option selected class="dropdown-item" value='${itemz.sbm_id}'>${itemz.sbm_desc}</option>`;
                        } else {
                            htmlOptions += `<option class="dropdown-item" value='${itemz.sbm_id}'>${itemz.sbm_desc}</option>`;
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

                                <div id="standard-subject-` + item.sbm_id + `" style="margin-top : 5px; margin-bottom : 5px;">
                                    <div class="row m-1" id="standard-item-`+item.sbm_id+`">
                                        <div class="col-1 p-0 pe-1">
                                            <input type="number" name="standard-learning-number[`+item.sbm_id+`][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1">
                                        </div>
                                        <div class="col-11 d-flex p-0" style="margin-bottom : 5px;">
                                            <input type="text" class="form-control p-1 me-1" name="subject_description[`+item.sbm_id+`][]" placeholder="1. Objektif bagi Subjek ini.">
                                            <div class="input-group-prepend me-1" onclick="$('#standard-item-`+item.sbm_id+`').remove();">
                                                <button class="input-group-text" id="btnGroupAddon">
                                                    <i class="fas fa-trash-alt" style="color:red;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-1">
                                    <span class="btn bg-gradient-primary mt-2" onclick="addStandardPembelajaran('${item.sbm_id}')">Tambah &nbsp;&nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                                        </svg>
                                    </span>
                                </div>
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

function addStandardPembelajaran(sm_id)
{
    var divStandardPembelajaran = $('#standard-subject-' + sm_id);
        
    // Generate a unique ID for the new field
    var newFieldColl = Math.floor(Math.random() * 1000000);

    let newInputHTMLField = `<div class="row m-1" id="standard-item-`+newFieldColl+`">
                                <div class="col-1 p-0 pe-1">
                                    <input type="number" name="standard-learning-number[`+sm_id+`][]" step="0.01" min="0" class="form-control p-1" placeholder="1.1">
                                </div>
                                <div class="col-11 d-flex p-0" style="margin-bottom : 5px;">
                                    <input type="text" class="form-control p-1 me-1" name="subject_description[`+sm_id+`][]" placeholder="1. Objektif bagi Subjek ini.">
                                    <div class="input-group-prepend me-1" onclick="$('#standard-item-${newFieldColl}').remove();">
                                        <button class="input-group-text" id="btnGroupAddon">
                                            <i class="fas fa-trash-alt" style="color:red;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            `;

    divStandardPembelajaran.append(newInputHTMLField);
}

function addObjectivePrestasi()
{
    var divObjectivePrestasi = $('#objective-prestasi');
        
    // Generate a unique ID for the new field
    var newFieldColl = Math.floor(Math.random() * 1000000);
    
    let newInputHTMLField = `<div class="input-group" style="margin-bottom: 5px;" id="objective-prestasi-` + newFieldColl + `">
                                <div class="col-md-1 pe-1">
                                    <input type="number" name="objective-prestasi-number[]" step="0.01" min="0" class="form-control" placeholder="1.1">
                                </div>
                                <div class="col-md-8 pe-1">
                                    <input type="text" name="objective-prestasi-desc[]" class="form-control" placeholder="Objektif prestasi bagi Topik DSKPN ini.">
                                </div>
                                <div class="col-md-3 d-flex">
                                    <input type="text" name="objective-prestasi-ref[]" class="form-control" placeholder="PK 8.1.1">
                                    <div class="input-group-prepend ms-2" onclick="$('#objective-prestasi-` + newFieldColl + `').remove();">
                                    <button class="input-group-text" id="btnGroupAddon">
                                        <i class="fas fa-trash-alt" style="color: red;"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>`;

    divObjectivePrestasi.append(newInputHTMLField);
}

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