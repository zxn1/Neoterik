<style>
    .select2-container--open .select2-dropdown {
        z-index: 9999 !important;
        left: 0;
    }
</style>
<!-- Modal Structure -->
<div class="modal fade" id="TeacherClusterAllocationModal" tabindex="-1" aria-labelledby="TeacherClusterAllocationModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="addClusterModalLabel"><?= ml('teacher_list', 'modal_title'); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClusterForm" action="<?= route_to('allocate_teacher_cluster_class'); ?>" method="POST">
                    <!-- hidden cluster -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="clusterSelect"><?= ml('teacher_list', 'teacher_label'); ?></label>
                            <select style="width:100%;" name="teacher" class="form-control select2" id="teacher_list" aria-label="Default select example">
                                <option disabled selected><?= ml('teacher_list', 'please_select_teacher'); ?></option>
                                <?php foreach ($teachers as $teacher) { ?>
                                    <option value="<?= $teacher['sm_recid']; ?>"><?= $teacher['sm_fullname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="classSelect"><?= ml('teacher_list', 'kelas'); ?></label>
                            <select style="width:100%;" name="class" class="form-control select2" id="class_list" aria-label="Default select example">
                                <option disabled selected><?= ml('teacher_list', 'please_select_class'); ?></option>
                                <?php foreach ($classes as $class) { ?>
                                    <option value="<?= $class['cls_recid']; ?>"><?= $class['cls_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="frame-wrap p-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline1Radio" name="pemetaan_guru" value="kluster">
                                <label class="custom-control-label" for="defaultInline1Radio"><?= ml('teacher_list', 'mapping_cluster'); ?></label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline2Radio" name="pemetaan_guru" value="subjek">
                                <label class="custom-control-label" for="defaultInline2Radio"><?= ml('teacher_list', 'mapping_subject'); ?></label>
                            </div>
                        </div>

                        <!-- Kluster Dropdown (Initially hidden) -->
                        <div class="form-group" id="klusterDropdown" style="display:none;">
                            <label for="klusterSelect"><?= ml('teacher_list', 'cluster_label'); ?></label>
                            <select style="width:100%;" name="kluster" class="form-control select2" id="kluster_list" aria-label="Default select example">
                                <option disabled selected><?= ml('teacher_list', 'please_select_cluster'); ?></option>
                                <?php foreach ($clusters as $cluster) { ?>
                                    <option value="<?= $cluster['ctm_id']; ?>"><?= $cluster['ctm_desc']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Subjek Dropdown (Initially hidden) -->
                        <div class="form-group" id="subjekDropdown" style="display:none;">
                            <label for="subjekSelect"><?= ml('teacher_list', 'subject_label'); ?></label>
                            <select style="width:100%;" name="subjek" class="form-control select2" id="subjek_list" aria-label="Default select example">
                                <option disabled selected><?= ml('teacher_list', 'please_select_subject'); ?></option>
                                <?php foreach ($subjects as $subject) { ?>
                                    <option value="<?= $subject['sbm_id']; ?>"><?= $subject['sbm_desc']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="text-end pt-2">
                        <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal"><?= ml('teacher_list', 'cancel'); ?></button>
                        <button type="submit" class="btn bg-info text-white"><?= ml('teacher_list', 'submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
            <h6 class="my-auto text-white"><b><?= ml('teacher_list', 'search_class_year'); ?></b></h6>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="classSelect"><?= ml('teacher_list', 'class_label'); ?></label>
                            <select style="width:100%;" name="kelas_search" class="form-control select2" id="kelas_search" aria-label="Default select example">
                                <option disabled selected><?= ml('teacher_list', 'please_select_class'); ?></option>
                                <?php foreach ($classes as $class) { ?>
                                    <option value="<?= $class['cls_recid']; ?>"><?= $class['cls_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="yearSelect"><?= ml('teacher_list', 'year_label'); ?></label>
                            <select style="width:100%;" name="year" class="form-control select2" id="yearSelect" disabled required>
                                <option value="" disabled selected><?= ml('teacher_list', 'please_select_year'); ?></option>
                                <option value="1"><?= ml('teacher_list', 'one'); ?></option>
                                <option value="2"><?= ml('teacher_list', 'two'); ?></option>
                                <option value="3"><?= ml('teacher_list', 'three'); ?></option>
                                <option value="4"><?= ml('teacher_list', 'four'); ?></option>
                                <option value="5"><?= ml('teacher_list', 'five'); ?></option>
                                <option value="6"><?= ml('teacher_list', 'six'); ?></option>
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
            <h6 class="my-auto text-white"><b><?= ml('teacher_list', 'teacher'); ?></b></h6>
            <button type="button" class="btn bg-info text-white" style="margin-bottom:0 !important" data-bs-toggle="modal" data-bs-target="#TeacherClusterAllocationModal">
                <?= ml('teacher_list', 'add_teacher_setting'); ?>&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                </svg>
            </button>
        </div>
        <br>
        <div class="table-responsive" id="subject-list-container">
            <table id="teacher_cluster_table" class="table align-items-center mb-0" id="subject_list">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;"><?= ml('teacher_list', 'bil'); ?></th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;"><?= ml('teacher_list', 'name'); ?></th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;"><?= ml('teacher_list', 'kelas'); ?></th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;"><?= ml('teacher_list', 'kluster'); ?></th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;"><?= ml('teacher_list', 'mata_pelajaran'); ?></th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;"><?= ml('teacher_list', 'tindakan'); ?></th>
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
        $('#teacher_cluster_table').DataTable();
        // Fetch Tahun based on selected cluster
        $('#kelas_search').change(function() {
            var classId = $(this).val();

            if (classId) {
                $('#yearSelect').prop('disabled', false); // Enable the yearSelect dropdown

                // $.ajax({
                //     url: 'get_cluster_years', // URL to the PHP file that will fetch the years
                //     type: 'POST',
                //     data: {
                //         cluster_id: clusterId
                //     },
                //     dataType: 'json',
                //     success: function(response) {
                //         var $yearSelect = $('#yearSelect');
                //         $yearSelect.empty(); // Clear existing options

                //         $yearSelect.append('<option value="" disabled selected>-- Sila Pilih Tahun --</option>');

                //         // Mapping numeric values to words
                //         var yearMap = {
                //             '1': 'Satu',
                //             '2': 'Dua',
                //             '3': 'Tiga',
                //             '4': 'Empat',
                //             '5': 'Lima',
                //             '6': 'Enam'
                //         };

                //         $.each(response.year, function(index, item) {
                //             var yearText = item.tm_year; // Default to the numeric value
                //             if (yearMap[yearText]) {
                //                 yearText = yearMap[yearText]; // Map to the corresponding word if it exists
                //             }
                //             $yearSelect.append('<option value="' + item.tm_year + '">' + yearText + '</option>'); // Use the mapped value for display
                //         });
                //     }
                // });
            } else {
                $('#yearSelect').prop('disabled', true); // Disable the yearSelect dropdown if no cluster is selected
            }
        });


        $('#kelas_search, #yearSelect').change(function() {
            var kelas = $('#kelas_search').val();
            var year = $('#yearSelect').val();

            if (kelas && year) {
                $.ajax({
                    url: 'teacher_cluster_class_mapping', // Ensure this URL is correct
                    type: 'POST',
                    data: {
                        kelas: kelas,
                        year: year
                    },
                    dataType: 'html', // Expect HTML since you're returning a view
                    success: function(data) {
                        // Replace the subject-list-container with the returned view
                        $('#subject-list-container').html(data); // Append/replace in the target container
                    },
                    error: function(xhr) {
                        // Handle error if necessary
                        console.error(xhr.responseText);
                    }
                });
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        // Hide both dropdowns initially
        $('#klusterDropdown').hide();
        $('#subjekDropdown').hide();

        // Radio button change event
        $('input[name="pemetaan_guru"]').change(function() {
            if ($('#defaultInline1Radio').is(':checked')) {
                // Show Kluster dropdown, hide Subjek dropdown
                $('#klusterDropdown').show();
                $('#subjekDropdown').hide();
            } else if ($('#defaultInline2Radio').is(':checked')) {
                // Show Subjek dropdown, hide Kluster dropdown
                $('#subjekDropdown').show();
                $('#klusterDropdown').hide();
            }
        });
    });
</script>

<!-- Delete function -->

<script>
    function deleteSubjectMapping(id) {
        Swal.fire({
            title: '<?= ml('teacher_list', 'are_you_sure'); ?>',
            text: "<?= ml('teacher_list', 'cannot_revert'); ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= ml('teacher_list', 'yes_delete'); ?>'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('yourController/deleteMapping') ?>", // Adjust the controller and method
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                '<?= ml('teacher_list', 'deleted'); ?>',
                                '<?= ml('teacher_list', 'deleted_success'); ?>',
                                'success'
                            ).then(() => {
                                // Optionally reload the page or remove the deleted item from the view
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                '<?= ml('teacher_list', 'failed'); ?>',
                                '<?= ml('teacher_list', 'delete_failed'); ?>',
                                '<?= ml('teacher_list', 'error'); ?>'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire(
                            '<?= ml('teacher_list', 'failed'); ?>',
                            '<?= ml('teacher_list', 'delete_error'); ?>',
                            '<?= ml('teacher_list', 'error'); ?>'
                        );
                    }
                });
            }
        });
    }
</script>