<div class="container-fluid py-4">
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="addClusterModalLabel">Tambah Subjek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addSubjectForm" action="<?= route_to('store_create_subject'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="subjectCode" class="form-label">Kod Subjek</label>
                            <input type="text" placeholder="Sila Masukkan Kod Kluster" class="form-control" id="subjectCode" name="sbm_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="subjectName" class="form-label">Nama Subjek</label>
                            <input type="text" placeholder="Sila Masukkan Nama Kluster" class="form-control" id="subjectName" name="sbm_desc" required>
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
            <h6 class="my-auto text-white"><b>SUBJEK</b></h6>
            <button type="button" class="btn bg-info text-white" style="margin-bottom:0 !important" data-bs-toggle="modal" data-bs-target="#addClusterModal">
                Tambah Subjek&nbsp;&nbsp;
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
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">KOD SUBJEK</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">SUBJEK</th>
                        <!-- <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">TINDAKAN</th> -->
                    </tr>
                </thead>
                <tbody>

                    <?php $counter = 1;
                    foreach ($subjects as $subject) : ?>
                        <tr>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($subject['sbm_code']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($subject['sbm_desc']) ?></td>
                            <!-- <td class="text-m font-weight-normal" style="text-align: left;">
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $subject['sbm_id']; ?>').remove(); deleteSubject(<?= $subject['sbm_id']; ?>);">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                            </td> -->
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