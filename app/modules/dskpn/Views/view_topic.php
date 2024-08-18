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
</style>
<div class="container-fluid py-4">
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClusterModalLabel">Tambah Topik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addSubjectForm" action="<?= route_to('create_topic'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="clusterSelect">Kluster</label>
                            <select style="width:100%;" name="cluster" class="form-control select2" id="kluster" aria-label="Default select example">
                                <option disabled selected>-- Sila Pilih Kluster --</option>
                                <?php foreach ($clusters as $item) { ?>
                                    <option value="<?= $item['ctm_id']; ?>"><?= $item['ctm_desc']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="yearSelect">Tahun</label>
                            <select style="width:100%;" name="year" class="form-control select2" id="yearSelect" required>
                                <option value="" disabled selected>-- Sila Pilih Tahun --</option>
                                <option value="1">Satu</option>
                                <option value="2">Dua</option>
                                <option value="3">Tiga</option>
                                <option value="4">Empat</option>
                                <option value="5">Lima</option>
                                <option value="6">Enam</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="yearInput">Topik</label>
                            <input type="text" name="topik" class="form-control" Placeholder="Sila Masukkan Topik" id="yearInput" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-gradient-info">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">Senarai Topik yang Didaftarkan</h6>
            <button type="button" class="btn bg-gradient-info" style="margin-bottom:0 !important" data-bs-toggle="modal" data-bs-target="#addClusterModal">
                Tambah Topik&nbsp;&nbsp;
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
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">TAHUN</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="text-align: left;">KLUSTER</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="text-align: left;">TOPIK</th>
                        <!-- <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">TINDAKAN</th> -->
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Mapping array
                    $numbers = [
                        1 => 'Satu',
                        2 => 'Dua',
                        3 => 'Tiga',
                        4 => 'Empat',
                        5 => 'Lima',
                        6 => 'Enam'
                    ];

                    $counter = 1;
                    foreach ($topics as $topic) : ?>
                        <tr>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($numbers[$topic['tm_year']]) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($topic['ctm_desc']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($topic['tm_desc']) ?></td>
                            <!-- <td class="text-m font-weight-normal" style="text-align: left;">
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $topic['tm_id']; ?>').remove(); deleteSubject(<?= $topic['tm_id']; ?>);">
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

<script>
    $(document).ready(function() {
        $('#subject_list').DataTable();
        $('.select2-element').select2({
            dropdownParent: $('#addClusterModal')
        });
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