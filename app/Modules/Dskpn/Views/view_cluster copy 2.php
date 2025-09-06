<div class="container-fluid py-4">
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="addClusterModalLabel">Tambah Kluster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addClusterForm" action="<?= route_to('store_create_cluster'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="clusterCode" class="form-label">Kod Kluster</label>
                            <input type="text" placeholder="Sila Masukkan Kod Kluster" style="text-transform:uppercase;" class="form-control" id="clusterCode" name="ctm_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="clusterName" class="form-label">Nama Kluster</label>
                            <input type="text" placeholder="Sila Masukkan Nama Kluster" class="form-control" id="clusterName" name="ctm_desc" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-info text-white">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
            <h6 class="my-auto text-white"><b>KLUSTER</b></h6>
            <div class="ms-auto d-flex align-items-center">
                <button type="button" class="btn bg-info text-white me-2" style="margin-bottom:0 !important" data-bs-toggle="modal" data-bs-target="#addClusterModal">
                    Tambah Kluster&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Replace tabs with dropdown selector -->
        <div class="px-4 pt-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="form-group mb-0">
                        <label for="clusterFilter" class="form-label">Filter by Kluster:</label>
                        <select class="form-select" id="clusterFilter">
                            <option value="all" selected>Semua Kluster</option>
                            <?php foreach ($clusters as $cluster): ?>
                                <option value="<?= esc($cluster['ctm_id']) ?>"><?= esc($cluster['ctm_desc']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single table that shows all data -->
        <div class="p-4">
            <div class="table-responsive">
                <table class="table align-items-center m-0 cluster-table" id="clusterTable">
                    <thead>
                        <tr>
                            <th style="width: 5%; text-align: left;">BIL</th>
                            <th style="width: 10%; text-align: left;">KOD KLUSTER</th>
                            <th style="width: 35%; text-align: left;">KLUSTER</th>
                            <th style="width: 50%; text-align: left;">MATA PELAJARAN</th>
                            <th style="width: 50%; text-align: left;">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($clusters as $cluster): ?>
                            <tr data-cluster-id="<?= esc($cluster['ctm_id']) ?>">
                                <td style="text-align: left;"><?= $counter++ ?></td>
                                <td style="text-align: left;"><?= esc($cluster['ctm_code']) ?></td>
                                <td style="text-align: left;"><?= esc($cluster['ctm_desc']) ?></td>
                                <td style="text-align: left;">
                                    <?php
                                    $subject = get_cluster_subject($cluster['ctm_id']);
                                    if (is_null($subject)) { ?>
                                        <button type="button" class="btn bg-info text-white"
                                            data-bs-toggle="modal" data-bs-target="#clusterSubjectMappingModal"
                                            data-ctm-id="<?= esc($cluster['ctm_id']) ?>"
                                            data-ctm-desc="<?= esc($cluster['ctm_desc']) ?>">
                                            Pemetaan Mata Pelajaran&nbsp;&nbsp;<i class="fas fa-wrench"></i>
                                        </button>
                                    <?php } else {
                                        echo $subject;
                                    } ?>
                                </td>
                                <td style="text-align: center;">
                                    <i class="fa fa-pencil-square-o fa-lg text-warning me-2"
                                        onclick="openEditClusterModal(<?= $cluster['ctm_id'] ?>, '<?= rawurlencode($cluster['ctm_code']) ?>', '<?= rawurlencode($cluster['ctm_desc']) ?>')"
                                        aria-hidden="true"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="clusterSubjectMappingModal" tabindex="-1" aria-labelledby="clusterSubjectMappingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Sila Daftarkan Mata Pelajaran bagi Kluster:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rejectForm" action="<?= route_to('store_cluster_subject_mapping') ?>" method="post">

                    <!-- Hidden input to store ctm_id -->
                    <input type="hidden" id="ctm-id-input" name="ctm_id">

                    <div class="row pb-4" id="standard-pembelajaran">
                        <span style="color : red;" id="hinting-no-subject">Hint : Anda masih belum menambah mata pelajaran</span>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn bg-secondary text-white" style="margin-bottom:0 !important" data-bs-dismiss="modal">Batal</button>
                        <span id="add-subject-btn" class="btn bg-info text-white" style="margin-bottom:0 !important">Tambah Mata Pelajaran&nbsp;&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                            </svg>
                        </span>
                        <button id="submit-btn" class="btn bg-info m-0 text-white" type="submit" style="display: none;">Simpan&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"></path>
                                <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editClusterModal" tabindex="-1" aria-labelledby="editClusterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="editClusterModalLabel">Edit Kluster</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addClusterForm" action="<?= route_to('update_cluster'); ?>" method="POST">
                    <input type="text" class="form-control" id="editClusterID" name="ctm_id" value="" required hidden>
                    <div class="mb-3">
                        <label for="editClusterCode" class="form-label">Kod Kluster</label>
                        <input type="text" class="form-control" style="text-transform:uppercase" id="editClusterCode" name="ctm_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="editClusterName" class="form-label">Nama Kluster</label>
                        <input type="text" class="form-control" id="editClusterName" name="ctm_desc" required>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn bg-info text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/AutoTitleCase.js') ?>"></script>
<script>
    // Custom DataTables language options
    const languageOptions = {
        search: "Cari:",
        lengthMenu: "Papar _MENU_ rekod",
        info: "Paparan _START_ hingga _END_ daripada _TOTAL_ rekod",
    };

    // Initialize DataTable with search capability
    $(document).ready(function() {
        // Initialize the DataTable
        var table = $('#clusterTable').DataTable({
            language: languageOptions,
            responsive: true,
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "Semua"]
            ],
            order: [
                [0, 'asc']
            ],
            initComplete: function() {
                // Custom styling for search and length elements
                $('#clusterTable_filter input').addClass('topic-search').attr('placeholder', 'Cari...');
                $('#clusterTable_length select').addClass('form-select form-select-sm');
            }
        });

        // Handle the filter dropdown change event
        $('#clusterFilter').on('change', function() {
            var selectedValue = $(this).val();

            // Clear any existing filters
            table.columns(0).search('').draw();

            if (selectedValue === 'all') {
                // If "All Clusters" is selected, show all rows
                table.columns(0).search('').draw();
                // Reset the counter for visible rows
                updateRowNumbers();
            } else {
                // Custom filtering function to filter by data attribute
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var row = table.row(dataIndex).node();
                        var clusterID = $(row).data('cluster-id');
                        return clusterID == selectedValue;
                    }
                );

                // Apply the filter
                table.draw();

                // Remove the custom filter function after it's applied
                $.fn.dataTable.ext.search.pop();

                // Update row numbers for visible rows
                updateRowNumbers();
            }
        });

        // Function to update row numbers for visible rows
        function updateRowNumbers() {
            var counter = 1;
            table.rows({
                search: 'applied'
            }).every(function() {
                var data = this.data();
                data[0] = counter++;
                this.data(data);
            });
        }

        // Function to handle the edit modal
        function openEditClusterModal(ctm_id, ctm_code, ctm_desc) {
            $('#editClusterID').val(ctm_id);
            $('#editClusterCode').val(decodeURIComponent(ctm_code));
            $('#editClusterName').val(decodeURIComponent(ctm_desc));
            $('#editClusterModal').modal('show');
        }

        // Make the openEditClusterModal function globally available
        window.openEditClusterModal = openEditClusterModal;
    });
</script>

<script>
    $(document).ready(function() {
        // Listener for add subject button
        let counter = 0;
        $('#add-subject-btn').on('click', function() {
            try {
                document.getElementById("hinting-no-subject").style.display = "none";
            } catch (err) {
                // Do nothing
            }

            let subjects = <?= json_encode($subjects) ?>; // Pass PHP variable to JavaScript
            let options = '';
            subjects.forEach(function(subject) {
                options += `<option value="${subject.sbm_id}">${subject.sbm_desc}</option>`;
            });

            counter++; // Increment the counter

            $('#standard-pembelajaran').append(`
                <div class="col-md-12 subject-card">
                    <div class="card">
                        <div class="d-flex p-2">
                            <select id="subject-${counter}" name="subject[]" class="form-control select2" placeholder="Tajuk Mata Pelajaran" required>
                                <option value="" selected disabled>--Select Subject--</option>
                                ${options}
                            </select>
                            <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                                <i class="fas fa-trash-alt text-dark"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `);

            // Initialize Select2 on the new select element
            $(`#subject-${counter}`).select2();

            // Show the submit button
            document.getElementById("submit-btn").style.display = "inline";
        });

        // Attach a delegated event listener for the delete buttons
        $(document).on('click', '.delete-subject', function() {
            $(this).closest('.subject-card').remove();

            // Hide submit button if no subject cards remain
            if ($('.subject-card').length === 0) {
                document.getElementById("submit-btn").style.display = "none";
                document.getElementById("hinting-no-subject").style.display = "block";
            }
        });
    });
</script>

<script>
    $('#clusterSubjectMappingModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var ctmId = button.data('ctm-id'); // Extract info from data-ctm-id attribute
        var ctmDesc = button.data('ctm-desc'); // Extract info from data-ctm-desc attribute

        // Update the modal's hidden input with the ctm_id value
        $('#ctm-id-input').val(ctmId);

        // Update the modal title to reflect the selected cluster
        $('#rejectModalLabel').text('Daftarkan Mata Pelajaran bagi Kluster: ' + ctmDesc);
    });
</script>