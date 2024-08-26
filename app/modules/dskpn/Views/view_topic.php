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

    .row {
        padding: 20px !important;
    }

    .table-responsive {
        overflow-x: hidden;
    }
</style>

<div class="container-fluid py-4">
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="addClusterModalLabel">Tambah Topik</h5>
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
            <h6 class="my-auto text-white">Topik</h6>
            <button type="button" class="btn bg-info text-white" style="margin-bottom:0 !important" data-bs-toggle="modal" data-bs-target="#addClusterModal">
                Tambah Topik&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                </svg>
            </button>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="topic_list">
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

<!-- Ajax to submit add form -->
<script>
    $(document).ready(function() {
        $('#addSubjectForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: $(this).attr('action'), // Get the action URL from the form
                type: $(this).attr('method'), // Get the form method (POST)
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // Handle the successful response here
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berjaya!',
                            text: response.message
                        }).then(() => {
                            $('#addClusterModal').modal('hide'); // Hide the modal
                            location.reload(); // Optionally reload the page
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    Swal.fire({
                        icon: 'error',
                        title: 'Terdapat ralat!',
                        text: 'Maaf, terdapat masalah teknikal. Sila cuba lagi nanti.'
                    });
                    console.log(xhr.responseText); // Log the error to the console for debugging
                }
            });
        });
    });

    $(document).ready(function() {

        $('#topic_list').DataTable({
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 d-flex justify-content-end'p>>",

            buttons: [{
                    text: 'Satu',
                    name: 'satu',
                    className: 'btn-primary btn-sm mr-1 filter-button',
                    action: function(e, dt, node, config) {
                        dt.column(1).search('^Satu$', true, false).draw(); // Filter for "Satu"
                    }
                },
                {
                    text: 'Dua',
                    name: 'dua',
                    className: 'btn-primary btn-sm mr-1 filter-button',
                    action: function(e, dt, node, config) {
                        dt.column(1).search('^Dua$', true, false).draw(); // Filter for "Dua"
                    }
                },
                {
                    text: 'Tiga',
                    name: 'tiga',
                    className: 'btn-primary btn-sm mr-1 filter-button',
                    action: function(e, dt, node, config) {
                        dt.column(1).search('^Tiga$', true, false).draw(); // Filter for "Tiga"
                    }
                },
                {
                    text: 'Empat',
                    name: 'empat',
                    className: 'btn-primary btn-sm mr-1 filter-button',
                    action: function(e, dt, node, config) {
                        dt.column(1).search('^Empat$', true, false).draw(); // Filter for "Empat"
                    }
                },
                {
                    text: 'Lima',
                    name: 'lima',
                    className: 'btn-primary btn-sm mr-1 filter-button',
                    action: function(e, dt, node, config) {
                        dt.column(1).search('^Lima$', true, false).draw(); // Filter for "Lima"
                    }
                },
                {
                    text: 'Enam',
                    name: 'enam',
                    className: 'btn-primary btn-sm mr-1 filter-button',
                    action: function(e, dt, node, config) {
                        dt.column(1).search('^Enam$', true, false).draw(); // Filter for "Enam"
                    }
                },
                {
                    text: 'All',
                    name: 'all',
                    className: 'btn-secondary btn-sm mr-1 filter-button',
                    action: function(e, dt, node, config) {
                        dt.column(1).search('').draw(); // Show all records
                    }
                }
            ]
        });
    });
</script>