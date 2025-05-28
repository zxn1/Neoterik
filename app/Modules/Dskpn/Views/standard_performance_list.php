<style>
    .select2-container--open .select2-dropdown {
        z-index: 9999 !important;
        left: 0;
    }
    ol li[data-list="bullet"] {
        list-style-type: disc;    /* Tunjuk bullet */
        list-style-position: inside;
        counter-reset: none !important;
    }

    ol li[data-list="bullet"]::before {
        content: '';              /* Buang numbering auto */
        counter-increment: none;
    }
</style>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
            <h6 class="my-auto text-white"><b>DSKPN</b></h6>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="subjectSelect">Mata Pelajaran</label>
                            <select style="width:100%;" name="subject" class="form-control select2" id="subject" aria-label="Default select example">
                                <option disabled selected>-- Sila Pilih Mata Pelajaran --</option>
                                <?php foreach ($subject_list as $subject) { ?>
                                    <option value="<?= $subject['sbm_id']; ?>"><?= $subject['sbm_desc']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="dskpCodeSelect">Kod Rujukan</label>
                            <select style="width:100%;" name="dskpCode" class="form-control select2" id="dskpCodeSelect" disabled required>
                                <option value="" disabled selected>-- Sila Pilih Kod --</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
            <h6 class="my-auto text-white"><b>TAHAP PENGUASAAN</b></h6>
            <div>
                <a href="<?= route_to('view_tp_core_setup'); ?>" class="btn bg-secondary text-white" id="edit-tp" style="margin-bottom:0 !important; display : none;">
                    Ubah Tahap Penguasaan&nbsp;&nbsp;
                    <i class="fas fa-pencil-ruler"></i>
                </a>
                <a href="<?= route_to('view_tp_core_setup'); ?>" class="btn bg-info text-white" style="margin-bottom:0 !important">
                    Tetapan Tahap Penguasaan&nbsp;&nbsp;
                    <i class="fas fa-wrench"></i>
                </a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table id="standard_performance_table" class="table align-items-center mb-0" id="subject_list">
                <thead>
                    <tr>
                        <!-- <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th> -->
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">LEVEL</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">TAHAP PENGUASAAN</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Rows will be appended here -->
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    var currentHref = null;
    $(document).ready(function() {
        currentHref = $('#edit-tp').attr('href');
        $('.select2').select2();
        $('#standard_performance_table').DataTable();
        $('#subject').change(function() {
            $('#edit-tp').hide();
            var sbm_id = $(this).val();

            if (sbm_id) {
                $('#dskpCodeSelect').prop('disabled', false);

                $.ajax({
                    url: 'get-dskp-based-subject',
                    type: 'POST',
                    data: {
                        sbm_id: sbm_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var $dskpCodeSelect = $('#dskpCodeSelect');
                        $dskpCodeSelect.empty();

                        $dskpCodeSelect.append('<option value="" disabled selected>-- Sila Pilih Kod --</option>');

                        let includedArr = [];
                        $.each(response, function(index, item) {
                            if(!includedArr.includes(item.dskp_code))
                            {
                                $dskpCodeSelect.append('<option value="' + item.dskp_code + '">' + item.dskp_code + '</option>');
                                includedArr.push(item.dskp_code);   
                            }
                        });
                    }
                });
            } else {
                $('#dskpCodeSelect').prop('disabled', true);
            }
        });


        $('#subject, #dskpCodeSelect').change(function() {
            var subject = $('#subject').val();
            var dskpCodeSelect = $('#dskpCodeSelect').val();
            $('#edit-tp').hide();

            if (subject && dskpCodeSelect) {
                $.ajax({
                    url: 'standard-performance-dskp-mapping',
                    type: 'POST',
                    data: {
                        dskp_code: dskpCodeSelect,
                        sbm_id: subject
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.standard_performance_dskp_mapping.length <= 0) {
                            $('#edit-tp').hide();
                            $('#edit-tp').attr('href', currentHref);
                        } else {
                            let subject_name = $('#subject').select2('data')[0].text;
                            let batch_number = data.standard_performance_dskp_mapping[0].sp_current_batch_count;
                            let dskp_code = data.standard_performance_dskp_mapping[0].sp_dskp_code;
                            $('#edit-tp').attr('href', currentHref + '?dskp_code=' + dskp_code + '&batch=' + batch_number + '&subject=' + encodeURIComponent(subject_name) + "&data=" + encodeURIComponent(JSON.stringify(data)));
                            $('#edit-tp').show();
                        }
                        var counter = 1;
                        var tableBody = $('#tableBody');

                        tableBody.empty();

                        $.each(data.standard_performance_dskp_mapping, function(index, row) {

                            var tableRow = '<tr>' +
                                //'<td class="text-m font-weight-normal" style="text-align: left;">' + (counter++) + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.sp_tp_level + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.sp_tp_level_desc + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' +
                                '<a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="deleteStandardPerformance(' + row.sp_id + ', ' + subject + ');">' +
                                '<i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>' +
                                '</a>' +
                                '</td>' +
                                '</tr>';

                            tableBody.append(tableRow);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                        $('#edit-tp').hide();
                        $('#edit-tp').attr('href', currentHref);
                    }
                });
            }
        });
    });

    function deleteStandardPerformance(id, sbm_id) {
        Swal.fire({
            title: "Anda benar-benar ingin delete item Tahap Penguasaan ini?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya",
            denyButtonText: `Tidak`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var dskpCodeSelect = $('#dskpCodeSelect').val();
                $('#edit-tp').hide();
                $.ajax({
                    url: 'standard-performance-dskp-mapping',
                    type: 'POST',
                    data: {
                        dskp_code: dskpCodeSelect,
                        action: 'delete',
                        sp_id: id,
                        sbm_id: sbm_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.standard_performance_dskp_mapping.length <= 0) {
                            $('#edit-tp').hide();
                            $('#edit-tp').attr('href', currentHref);
                        } else {
                            $('#edit-tp').show();
                            let batch_number = data.standard_performance_dskp_mapping[0].sp_current_batch_count;
                            let dskp_code = data.standard_performance_dskp_mapping[0].sp_dskp_code;
                            $('#edit-tp').attr('href', currentHref + '?dskp_code=' + dskp_code + '&batch=' + batch_number);
                        }

                        var counter = 1;
                        var tableBody = $('#tableBody');

                        tableBody.empty();

                        $.each(data.standard_performance_dskp_mapping, function(index, row) {

                            var tableRow = '<tr>' +
                                //'<td class="text-m font-weight-normal" style="text-align: left;">' + (counter++) + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.sp_tp_level + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.sp_tp_level_desc + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' +
                                '<a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="deleteStandardPerformance(' + row.sp_id + ', ' + sbm_id + ');">' +
                                '<i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>' +
                                '</a>' +
                                '</td>' +
                                '</tr>';

                            tableBody.append(tableRow);
                        });
                        Swal.fire("Berjaya!", "", "success");
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                        Swal.fire("Error fetching data:" + error, "", "error");
                    }
                });
            } else if (result.isDenied) {
                Swal.fire("Dibatalkan..", "", "info");
            }
        });
    }
</script>