<div class="container-fluid py-4">
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="addClusterModalLabel">Tambah Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addSubjectForm" action="<?= route_to('store_create_subject'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="subjectCode" class="form-label">Kod Mata Pelajaran</label>
                            <input type="text" placeholder="Sila Masukkan Kod Mata Pelajaran" class="form-control" id="subjectCode" name="sbm_code" style="text-transform:uppercase" required>
                        </div>
                        <div class="mb-3">
                            <label for="subjectName" class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" placeholder="Sila Masukkan Nama Mata Pelajaran" class="form-control" id="subjectName" name="sbm_desc" required>
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
    <!-- Edit Modal -->
    <div class="modal fade" id="editClusterModal" tabindex="-1" aria-labelledby="editClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="editClusterModalLabel">Edit Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSubjectForm" action="<?= route_to('update_subject'); ?>" method="POST">
                        <input type="hidden" name="sbm_id" id="edit_sbm_id">
                        <div class="mb-3">
                            <label for="edit_subjectCode" class="form-label">Kod Mata Pelajaran</label>
                            <input type="text" class="form-control" id="edit_subjectCode" name="sbm_code" style="text-transform:uppercase" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_subjectName" class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="edit_subjectName" name="sbm_desc" required>
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
    <!-- Delete Subject Modal -->
    <div class="modal fade" id="deleteSubjectModal" tabindex="-1" aria-labelledby="deleteSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="deleteSubjectModalLabel">Padam Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">Adakah anda pasti?</h4>
                        <p class="text-muted">
                            Anda akan memadam mata pelajaran "<span id="deleteSubjectName" class="fw-bold"></span>" secara kekal. 
                            Tindakan ini tidak boleh dibatalkan.
                        </p>
                    </div>
                    <form id="deleteSubjectForm" action="<?= route_to('delete_subject'); ?>" method="POST">
                        <input type="hidden" id="deleteSubjectID" name="sbm_id">
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

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
            <h6 class="my-auto text-white"><b>MATA PELAJARAN</b></h6>
            <button type="button" class="btn bg-info text-white" style="margin-bottom:0 !important" data-bs-toggle="modal" data-bs-target="#addClusterModal">
                Tambah Mata Pelajaran&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                </svg>
            </button>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="subject_list">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">KOD MATA PELAJARAN</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">MATA PELAJARAN</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $counter = 1;
                    foreach ($subjects as $subject) : ?>
                        <tr>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($subject['sbm_code']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($subject['sbm_desc']) ?></td>
                            <td class="text-m font-weight-normal text-center">
                                <div class="btn-group" role="group" aria-label="Subject Actions">
                                    <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success"
                                        onclick="openEditModal(<?= htmlspecialchars(json_encode($subject), ENT_QUOTES, 'UTF-8') ?>)" aria-hidden="true">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                   <?php
                                    $clusters = get_subject_cluster($subject['sbm_id']);
                                    if (is_null($clusters)) : ?>
                                        <button type="button" class="btn btn-sm action-icon btn-delete btn-outline-danger"
                                            onclick="openDeleteSubjectModal(<?= $subject['sbm_id'] ?>, '<?= rawurlencode($subject['sbm_code']) ?>', '<?= rawurlencode($subject['sbm_desc']) ?>')"
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
<script src="<?= base_url('assets/js/AutoTitleCase.js') ?>"></script>
<?php if (session()->has('success')) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Berjaya",
            text: "<?= session('success'); ?>"
        });
    </script>
<?php endif; ?>

<?php if (session()->has('fail')) : ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Maaf",
            text: "<?= session('fail'); ?>"
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('#subject_list').DataTable();
    });

    function openEditModal(subject) {
        $('#edit_sbm_id').val(subject.sbm_id);
        $('#edit_subjectCode').val(subject.sbm_code);
        $('#edit_subjectName').val(subject.sbm_desc);
        $('#editClusterModal').modal('show');
    }

   function openDeleteSubjectModal(sbm_id, sbm_code, sbm_desc) {
        $('#deleteSubjectID').val(sbm_id);
        $('#deleteSubjectName').text(decodeURIComponent(sbm_desc));
        $('#deleteSubjectModal').modal('show');
    }

    document.addEventListener("DOMContentLoaded", function() {
        var lastAccordionItem = document.querySelector(".accordion-item:last-of-type");
        if (lastAccordionItem) {
            lastAccordionItem.querySelector(".accordion-button").classList.add("collapsed");
        }

        // Handle year filter change
        document.getElementById('filterYear').addEventListener('change', function() {
            var selectedYear = this.value;
            var url = new URL(window.location.href);
            if (selectedYear) {
                url.searchParams.set('year', selectedYear);
            } else {
                url.searchParams.delete('year');
            }
            window.location.href = url.toString();
        });
    });
</script>