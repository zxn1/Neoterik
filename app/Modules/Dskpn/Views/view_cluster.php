<style>
    .select2-container {
        z-index: 1060 !important;
        /* Ensure this is higher than the modal */
    }

    .modal {
        z-index: 1050;
        /* Standard Bootstrap modal z-index */
    }

    .modal-backdrop {
        z-index: 1040;
    }

    .btn {
        margin-bottom: 0rem !important;
    }
</style>
<div class="container-fluid py-4">
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
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

        <br>
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="cluster_list">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">KOD KLUSTER</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 35%; text-align: left;">KLUSTER</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 50%; text-align: left;">MATA PELAJARAN</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 50%; text-align: left;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;
                    foreach ($clusters as $cluster) : ?>
                        <tr>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($cluster['ctm_code']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($cluster['ctm_desc']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;">
                                <?php
                                $subject = get_cluster_subject($cluster['ctm_id']);
                                if (is_null($subject)) { ?>
                                    <button type="button" class="btn bg-info text-white" style="margin-bottom:0 !important"
                                        data-bs-toggle="modal" data-bs-target="#clusterSubjectMappingModal"
                                        data-ctm-id="<?= esc($cluster['ctm_id']) ?>"
                                        data-ctm-desc="<?= esc($cluster['ctm_desc']) ?>">
                                        Pemetaan Mata Pelajaran&nbsp;&nbsp;
                                        <i class="fas fa-wrench"></i>
                                    </button>

                                <?php
                                } else {
                                    // Proceed with the subject data
                                    echo $subject;
                                }
                                ?>
                            </td>
                            <td class="text-m font-weight-normal text-center">
                                <div class="btn-group" role="group" aria-label="Cluster Actions">
                                    <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success"
                                        onclick="openEditClusterModal(<?php echo $cluster['ctm_id']; ?>, '<?= rawurlencode($cluster['ctm_code']) ?>', '<?= rawurlencode($cluster['ctm_desc']) ?>')"
                                        aria-hidden="true">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <?php
                                    // Show delete button only if cluster has no subjects mapped
                                    $subject = get_cluster_subject($cluster['ctm_id']);
                                    if (is_null($subject)) : ?>
                                        <button type="button" class="btn btn-sm action-icon btn-delete btn-outline-danger"
                                            onclick="openDeleteClusterModal(<?php echo $cluster['ctm_id']; ?>, '<?= rawurlencode($cluster['ctm_code']) ?>', '<?= rawurlencode($cluster['ctm_desc']) ?>')"
                                            aria-hidden="true">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <div class="text-end pt-3">
        <a href="#" class="btn bg-gradient-primary btn-sm mb-0">Seterusnya</a>
    </div> -->
</div>

<div class="modal fade" id="clusterSubjectMappingModal" tabindex="-1" aria-labelledby="clusterSubjectMappingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Pemetaan Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rejectForm" action="<?= route_to('store_cluster_subject_mapping') ?>" method="post">

                    <!-- Hidden input to store ctm_id -->
                    <input type="hidden" id="ctm-id-input" name="ctm_id">

                    <h6 class="modal-title" id="rejectModalLabel"></h6>

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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
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

<!-- Delete Cluster Modal -->
<div class="modal fade" id="deleteClusterModal" tabindex="-1" aria-labelledby="deleteClusterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="deleteClusterModalLabel">Padam Kluster</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                    <h4 class="mt-3">Adakah anda pasti?</h4>
                    <p class="text-muted">Anda akan memadam kluster "<span id="deleteClusterName" class="fw-bold"></span>" secara kekal. Tindakan ini tidak boleh dibatalkan.</p>
                </div>
                <form id="deleteClusterForm" action="<?= route_to('delete_cluster'); ?>" method="POST">
                    <input type="hidden" id="deleteClusterID" name="ctm_id">
                    <div class="text-center">
                        <button type="button" class="btn bg-secondary text-white me-2" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn bg-danger text-white">
                            <i class="fas fa-trash"></i> Padam
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/AutoTitleCase.js') ?>"></script>
<script>
    function openEditClusterModal(ctm_id, ctm_code, ctm_desc) {
        $('#editClusterID').val(ctm_id);
        $('#editClusterCode').val(decodeURIComponent(ctm_code));
        $('#editClusterName').val(decodeURIComponent(ctm_desc));
        $('#editClusterModal').modal('show');
    }

    function openDeleteClusterModal(ctm_id, ctm_code, ctm_desc) {
        $('#deleteClusterID').val(ctm_id);
        $('#deleteClusterName').text(decodeURIComponent(ctm_desc));
        $('#deleteClusterModal').modal('show');
    }

    $(document).ready(function() {
        $('#cluster_list').DataTable();

        // Listener for add subject button
        counter = 0;
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
        });

        // Show the submit button after adding a subject
        $('#add-subject-btn').on('click', function() {
            try {
                document.getElementById("submit-btn").style.display = "inline";
            } catch (err) {
                // Do nothing
            }
        });

        // Attach a delegated event listener for the delete buttons
        $(document).on('click', '.delete-subject', function() {
            $(this).closest('.subject-card').remove();
        });

        // Handle delete cluster form submission
        $('#deleteClusterForm').on('submit', function(e) {
            e.preventDefault();

            // Optional: Add loading state
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Memadam...');
            submitBtn.prop('disabled', true);

            // Submit the form
            this.submit();
        });
    });
</script>

<script>
    $('#clusterSubjectMappingModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var ctmId = button.data('ctm-id'); // Extract info from data-ctm-id attribute
        var ctmDesc = button.data('ctm-desc'); // Extract info from data-ctm-id attribute

        // Update the modal's hidden input with the ctm_id value
        $('#ctm-id-input').val(ctmId);

        // Optionally, update the modal title or content to reflect the selected cluster
        $('#rejectModalLabel').text('Kluster: ' + ctmDesc);
    });
</script>