<style>
    .select2-container--open .select2-dropdown {
        z-index: 9999 !important;
        left: 0;
    }
</style>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
            <h6 class="my-auto text-white">DSKPN</h6>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="row">
                    <div class="form-group">
                        <label for="subjectSelect">Subject</label>
                        <select style="width:100%;" name="subject" class="form-control select2" id="subject" aria-label="Default select example">
                            <option disabled selected>-- Sila Pilih Subjek --</option>
                            <?php foreach ($subject_list as $subject) { ?>
                                <option value="<?= $subject['sbm_id']; ?>"><?= $subject['sbm_desc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
            <h6 class="my-auto text-white">Senarai Kompetensi Teras</h6>
            <div>
                <button class="btn bg-secondary text-white" id="edit-tp" style="margin-bottom:0 !important; display : none;">
                    Ubah Kompetensi Teras Subjek Ini&nbsp;&nbsp;
                    <i class="fas fa-pencil-ruler"></i>
                </button>
                <a href="<?= route_to('view_core_competency_setup'); ?>" class="btn bg-info text-white" style="margin-bottom:0 !important">
                    Tetapan Kompetensi Teras&nbsp;&nbsp;
                    <i class="fas fa-wrench"></i>
                </a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table id="standard_performance_table" class="table align-items-center mb-0" id="subject_list">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">KOD</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">KOMPETENSI TERAS</th>
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
    $(document).ready(function() {
        $('.select2').select2();
        $('#standard_performance_table').DataTable();
        $('#subject').change(function() {
            $('#edit-tp').hide();
            var sbm_id = $(this).val();

            if (sbm_id) {
                $.ajax({
                    url: 'get-core-competency-based-subject' + "?sbm_id=" + sbm_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.length <= 0) {
                            $('#edit-tp').hide();
                        } else {
                            $('#edit-tp').show();
                        }
                        var counter = 1;
                        var tableBody = $('#tableBody');

                        tableBody.empty();

                        $.each(response, function(index, row) {

                            var tableRow = '<tr>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + (counter++) + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.cc_code + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.cc_desc + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' +
                                '<a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="deleteCoreCompetency(' + row.cc_id + ', ' + sbm_id + ');">' +
                                '<i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>' +
                                '</a>' +
                                '</td>' +
                                '</tr>';

                            tableBody.append(tableRow);
                        });
                    }
                });
            }
        });
    });

    function deleteCoreCompetency(id, sbm_id) {
        Swal.fire({
            title: "Anda benar-benar ingin delete item Kompetensi Teras ini?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya",
            denyButtonText: `Tidak`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $('#edit-tp').hide();

                $.ajax({
                    url: 'get-core-competency-based-subject' + "?sbm_id=" + sbm_id + "&cc_id=" + id + "&action=delete",
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.length <= 0) {
                            $('#edit-tp').hide();
                        } else {
                            $('#edit-tp').show();
                        }
                        var counter = 1;
                        var tableBody = $('#tableBody');

                        tableBody.empty();

                        $.each(response, function(index, row) {

                            var tableRow = '<tr>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + (counter++) + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.cc_code + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' + row.cc_desc + '</td>' +
                                '<td class="text-m font-weight-normal" style="text-align: left;">' +
                                '<a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="deleteCoreCompetency(' + row.cc_id + ', ' + sbm_id + ');">' +
                                '<i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>' +
                                '</a>' +
                                '</td>' +
                                '</tr>';

                            tableBody.append(tableRow);

                            Swal.fire("Berjaya!", "", "success");
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire("Dibatalkan..", "", "info");
            }
        });
    }
</script>