$(document).ready(function() {
    $('.select2').select2();

    // Event listener for when an option is selected
    $(document).on('select2:select', '.dynamic-select2', function(e) {
        var selectedValue = e.params.data.id; // Get the selected value
        var selectId = $(this).attr('id'); // Get the ID of the current select element

        // Hide the "Afektif" optgroup if any of its options is selected
        if (selectedValue.startsWith('A')) {
            // Disable all Afektif options except the selected one
            var afektifOptgroup = $('#' + selectId).find('optgroup[label="Afektif"]');
            afektifOptgroup.find('option').not(':selected').prop('disabled', true);

            // Trigger the update in Select2 to reflect the changes
            $('#' + selectId).trigger('change');

            // Hide the optgroup in the dropdown by targeting the Select2-generated elements
            var select2ContainerId = selectId.replace("dynamic-select2-", ""); // Use to target the select2 dropdown container
            $("#select2-" + selectId + "-results").find('li[aria-label="Afektif"]').hide();
        }

        // Hide the "Afektif" optgroup if any of its options is selected
        if (selectedValue.startsWith('C')) {
            // Disable all Afektif options except the selected one
            var kognitifOptgroup = $('#' + selectId).find('optgroup[label="Kognitif"]');
            kognitifOptgroup.find('option').not(':selected').prop('disabled', true);

            // Trigger the update in Select2 to reflect the changes
            $('#' + selectId).trigger('change');

            // Hide the optgroup in the dropdown by targeting the Select2-generated elements
            var select2ContainerId = selectId.replace("dynamic-select2-", ""); // Use to target the select2 dropdown container
            $("#select2-" + selectId + "-results").find('li[aria-label="Kognitif"]').hide();
        }

        // Hide the "Afektif" optgroup if any of its options is selected
        if (selectedValue.startsWith('P')) {
            // Disable all Afektif options except the selected one
            var psikomotorOptgroup = $('#' + selectId).find('optgroup[label="Psikomotor"]');
            psikomotorOptgroup.find('option').not(':selected').prop('disabled', true);

            // Trigger the update in Select2 to reflect the changes
            $('#' + selectId).trigger('change');

            // Hide the optgroup in the dropdown by targeting the Select2-generated elements
            var select2ContainerId = selectId.replace("dynamic-select2-", ""); // Use to target the select2 dropdown container
            $("#select2-" + selectId + "-results").find('li[aria-label="Psikomotor"]').hide();
        }
    });

    // Event listener for when an option is unselected
    $(document).on('select2:unselect', '.dynamic-select2', function(e) {
        var unselectedValue = e.params.data.id;
        var selectId = $(this).attr('id');

        // If an "Afektif" option is unselected and no "Afektif" options are selected, show the "Afektif" optgroup again
        var hasKognitifSelected = $('#' + selectId).find("optgroup[label='Kognitif'] option:selected").length > 0;
        var hasPsikomotorSelected = $('#' + selectId).find("optgroup[label='Psikomotor'] option:selected").length > 0;
        var hasAfektifSelected = $('#' + selectId).find("optgroup[label='Afektif'] option:selected").length > 0;
        if (!hasKognitifSelected) {
            // Re-enable the Afektif options
            $('#' + selectId).find("optgroup[label='Kognitif'] option").prop('disabled', false);
            $('#' + selectId).trigger('change');

            // Show the optgroup in the dropdown by targeting the Select2-generated elements
            $("#select2-" + selectId + "-results").find('li[aria-label="Kognitif"]').show();
        }
        if (!hasPsikomotorSelected) {
            // Re-enable the Afektif options
            $('#' + selectId).find("optgroup[label='Psikomotor'] option").prop('disabled', false);
            $('#' + selectId).trigger('change');

            // Show the optgroup in the dropdown by targeting the Select2-generated elements
            $("#select2-" + selectId + "-results").find('li[aria-label="Psikomotor"]').show();
        }
        if (!hasAfektifSelected) {
            // Re-enable the Afektif options
            $('#' + selectId).find("optgroup[label='Afektif'] option").prop('disabled', false);
            $('#' + selectId).trigger('change');

            // Show the optgroup in the dropdown by targeting the Select2-generated elements
            $("#select2-" + selectId + "-results").find('li[aria-label="Afektif"]').show();
        }
    });
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
            text: "Maksimum mata pelajaran dibenarkan adalah " + get_default_subject.length  + "!"
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
    let sbm_code = '';
    subject_list.forEach(function(item) {
        if(get_default_subject != null && (item.sbm_id == get_default_subject[countSubject]))
        {
            sbm_code = item.sbm_code;
            htmlOptions += `<option selected class="dropdown-item" value='${item.sbm_id}'>${item.sbm_desc}</option>`;
        }  
    });

    var newFieldColl = Math.floor(Math.random() * 1000000);

    $('#standard-pembelajaran').append(`
        <div class="col-md-4 subject-card">
            <div class="card mt-4">
            <div class="card-header d-flex p-1 bg-secondary align-items-center">
                <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Mata Pelajaran" required>
                    ${htmlOptions}
                </select>
                <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
            
    
            <div id="standard-subject-` + get_default_subject[countSubject] + '-' + newFieldColl + `" style="margin-top : 5px; margin-bottom : 5px;">
                <div class="row m-1" id="standard-item-`+get_default_subject[countSubject]+`-${newFieldColl}">
                    <div id="subject_description-${get_default_subject[countSubject]}-${newFieldColl}" class="w-100 pb-5 pe-2"></div>
                    <hr class="stylish-hr">
                </div>
            </div>
    
            <div class="p-1">
                <span class="btn bg-primary mt-2 text-white" onclick="addStandardPembelajaran('${get_default_subject[countSubject]}', '${sbm_code}', '${newFieldColl}', '${(countSubject)}')">Tambah &nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                    </svg>
                </span>
            </div>
        </div>
        `);

    WysiwygComponent.renderTo("subject_description-" + get_default_subject[countSubject] + "-" + newFieldColl, 
    { 
        id: get_default_subject[countSubject] + '-' + newFieldColl, 
        inputNameId: "subject_description[" + get_default_subject[countSubject] + "][" + (countSubject) + "]", 
        deleteButton : "standard-item-" + get_default_subject[countSubject] + "-" + newFieldColl, 
        isLearningStandard: true, 
        learningStandard : {
            sbm_id : get_default_subject[countSubject],
            sbm_code : sbm_code,
            learning_standard_number : "",
            index : countSubject
        }
    });
});

// Attach a delegated event listener for the delete buttons
$(document).on('click', '.delete-subject', function() {
    $(this).closest('.subject-card').remove();
    selectionPopulateBasedOnNumbering();
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
                data.data.forEach(function(item, index){
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

                    let newFieldColl = Math.floor(Math.random() * 1000000);

                    $('#standard-pembelajaran').append(`
                        <div class="col-md-4 subject-card">
                            <div class="card mt-4">
                                <div class="card-header d-flex p-1 bg-secondary align-items-center">
                                    <select name="subject[]" class="form-control subject-title" style="background-color: transparent; border: 0px; outline: none; color: white; font-size: 1em; font-weight: bold;" placeholder="Tajuk Mata Pelajaran" required>
                                        ${htmlOptions}
                                    </select>
                                    <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>

                                <div id="standard-subject-` + item.sbm_id + '-' + newFieldColl + `" style="margin-top : 5px; margin-bottom : 5px;">
                                    <div class="row m-1" id="standard-item-`+item.sbm_id+`-${newFieldColl}">
                                        <div id="subject_description-${item.sbm_id}-${newFieldColl}" class="w-100 pb-5 pe-2"></div>
                                        <hr class="stylish-hr">                                    
                                    </div>
                                </div>

                                <div class="p-1">
                                    <span class="btn bg-primary mt-2 text-white" onclick="addStandardPembelajaran('${item.sbm_id}', '${item.sbm_code}', '${newFieldColl}', '${index}')">Tambah &nbsp;&nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    `);

                    WysiwygComponent.renderTo("subject_description-" + item.sbm_id + "-" + newFieldColl, 
                    { 
                        id: item.sbm_id + '-' + newFieldColl, 
                        inputNameId: "subject_description[" + item.sbm_id + "][" + (index) +"]", 
                        deleteButton : "standard-item-" + item.sbm_id + "-" + newFieldColl, 
                        isLearningStandard: true, 
                        learningStandard : {
                            sbm_id : item.sbm_id,
                            sbm_code : item.sbm_code,
                            learning_standard_number : "",
                            index : index
                        }
                    });

                    //end populate subject
                });
            } else {
                document.getElementById('loading-screen').style.display = "none";
                Swal.fire({
                    icon: "error",
                    title: "Maaf",
                    text: "Mata Pelajaran bagi Kluster ini masih belum dikonfigurasi!"
                });
            }
        },
        error: function(xhr, status, error) {
            document.getElementById('loading-screen').style.display = "none";
            // Handle error
            Swal.fire({
                icon: "error",
                title: "Maaf",
                text: "Mata Pelajaran bagi Kluster ini masih belum dikonfigurasi!"
            });
        }
    });
});

function addStandardPembelajaran(sm_id, sm_code, idx = '', index = 0)
{
    var divStandardPembelajaran = $('#standard-subject-' + sm_id + '-' + idx);
        
    // Generate a unique ID for the new field
    var newFieldColl = Math.floor(Math.random() * 1000000);
    let newInputHTMLField = `<div class="row m-1" id="standard-item-`+ sm_id + '-' + newFieldColl+`">
                                <div id="subject_description-${sm_id}-${newFieldColl}" class="w-100 pb-5 pe-2"></div>
                                <hr class="stylish-hr">
                            </div>
                            `;

    divStandardPembelajaran.append(newInputHTMLField);

    WysiwygComponent.renderTo("subject_description-" + sm_id + "-" + newFieldColl, 
    { 
        id: newFieldColl, 
        inputNameId: "subject_description[" + sm_id +"][" + index + "]", 
        deleteButton : "standard-item-" + sm_id + "-" + newFieldColl, 
        isLearningStandard: true, 
        learningStandard : {
        sbm_id : sm_id,
        sbm_code : sm_code,
        learning_standard_number : "",
        index : index
        }
    });
}
// Use in objective prestasi
var select2Counter = 2; // Start counter at 3 since you have 3 select2 elements initially

// Initialize the 3 default select2 elements when the page loads
$(document).ready(function() {
    //make it dynamic. so find all element starting with id "dynamic-select2-"
    const selects = document.querySelectorAll('select[id^="dynamic-select2-"]');
    const count = selects.length; //count
    for (var i = 0; i <= count-1; i++) {
        $('#dynamic-select2-' + i).select2();
    }
});


function addObjectivePrestasi(i)
{
    var divObjectivePrestasi = $('#objective-prestasi');
    select2Counter++; // Increment the counter to create unique IDs
        
    // Generate a unique ID for the new field
    var newFieldColl = Math.floor(Math.random() * 1000000);

    let option = "";
    if($("#objective-performance-selection-listing").val() != "")
    JSON.parse($("#objective-performance-selection-listing").val()).forEach(item => {
        option += "<option value='" + item + "'>" + item + "</option>";
    });
    
    let newInputHTMLField = `<div class="input-group" style="margin-bottom: 5px;" id="objective-prestasi-` + newFieldColl + `">
                                <div class="col-md-1 pe-1">
                                    <input type="text" name="objective-prestasi-number[]" pattern="^\\d+(\\.\\d+)*$" 
                                        title="Sila masukkan format nombor yang sah (contoh: 1.1.1 atau 1.2.3.4). Hanya angka dan titik dibenarkan."  class="form-control" placeholder="1.1" required>
                                </div>
                                <div class="col-md-6 pe-1">
                                    <input type="text" name="objective-prestasi-desc[]" class="form-control" placeholder="Objektif prestasi bagi Topik DSKPN ini.">
                                </div>
                                <div class="col-md-3 d-flex">
                                    <select class="form-control" id="objective-prestasi-ref" name="objective-prestasi-ref[`+newFieldColl+`][]" multiple="multiple">`;
                                    if(option == "")
                                    {
                                        newInputHTMLField += `<option disabled>-- Sila pilih Kod --</option>`;
                                    } else {
                                        newInputHTMLField += option;
                                    }
              newInputHTMLField += `</select>
                                </div>
                                <div class="col-md-2 d-flex">
                                    <select name="objective-prestasi-pentaksiran[` + newFieldColl + `][]" id="dynamic-select2-` + newFieldColl + `" class="select2adjustheight dynamic-select2 form-control" multiple="multiple">
                  <optgroup label="Kognitif">
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                    <option value="C4">C4</option>
                    <option value="C5">C5</option>
                    <option value="C6">C6</option>
                    <option value="C7">C7</option>
                    <option value="C8">C8</option>
                  </optgroup>
                  <optgroup label="Psikomotor">
                    <option value="P1">P1</option>
                    <option value="P2">P2</option>
                    <option value="P3">P3</option>
                    <option value="P4">P4</option>
                    <option value="P5">P5</option>
                    <option value="P6">P6</option>
                    <option value="P7">P7</option>
                    <option value="P8">P8</option>
                  </optgroup>
                  <optgroup label="Afektif">
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="A3">A3</option>
                    <option value="A4">A4</option>
                    <option value="A5">A5</option>
                    <option value="A6">A6</option>
                    <option value="A7">A7</option>
                    <option value="A8">A8</option>
                  </optgroup>
                </select>

                                    <div class="input-group-prepend ms-2" onclick="$('#objective-prestasi-` + newFieldColl + `').remove();">
                                        <button type="button" class="input-group-text" id="btnGroupAddon">
                                            <i class="fas fa-trash-alt" style="color: red;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>`;

    divObjectivePrestasi.append(newInputHTMLField);

    $('select#objective-prestasi-ref').multipleSelect('destroy');
    $('select#objective-prestasi-ref').multipleSelect();

     // Initialize the newly added select2 element
     $('#dynamic-select2-' + newFieldColl).select2();
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