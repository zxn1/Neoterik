<div class="container-fluid py-4">
    <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#addClusterModal">
        Tambah Subjek
    </button>
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClusterModalLabel">Tambah Subjek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addSubjectForm" action="<?= route_to('store_create_subject'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="subjectName" class="form-label">Kod Subjek</label>
                            <input type="text" placeholder="Sila Masukkan Kod Kluster" class="form-control" id="subjectName" name="sm_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="subjectName" class="form-label">Nama Subjek</label>
                            <input type="text" placeholder="Sila Masukkan Nama Kluster" class="form-control" id="subjectName" name="sm_desc" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn bg-gradient-info">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">Senarai Subjek yang Didaftarkan</h6>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="subject_list">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">Subjek Kode</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 80%; text-align: left;">Subjek</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subjects as $subject) : ?>
                        <tr>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($subject['sm_code']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($subject['sm_desc']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;">
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $subject['sm_id']; ?>').remove(); deleteSubject(<?= $subject['sm_id']; ?>);">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
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