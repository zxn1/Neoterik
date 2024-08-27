<style>
    /* Custom Css to overwrite select2 style */
    .select2-container .select2-selection__rendered {
        display: flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.4rem;
        color: #344767;
        white-space: nowrap;
        background-color: #fff;
        border: 1px solid #d2d6da;
        border-radius: 0.5rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }

    .select2-container--open .select2-selection__rendered {
        border-bottom: none;
        border-bottom-right-radius: 0;
    }



    .select2-container--open .select2-dropdown--below {
        border-top: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border: 1px solid #d2d6da;
    }



    .select2-container--default .select2-selection--single .select2-selection__rendered {
        /* color: #444; */
        line-height: inherit !important;

    }

    .select2-container--default .select2-selection--single {
        /* background-color: #fff; */
        border: 0 !important;
        /* border-radius: 4px; */
    }

    /* Icon styling */
    .collapse-icon {
        font-size: 1.5rem;
        transition: transform 0.3s ease;
        /* Add transition for smooth animation */
    }

    /* Icon styling for expanded state */
    .accordion-header[aria-expanded="true"] .collapse-icon {
        transform: rotate(180deg);
    }



    /* CSS for desktop screens */
    .list-group {
        flex-basis: 0;
        flex-grow: 1;
    }

    /* Media query for screens smaller than a certain width (e.g., phones) */
    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
            /* Change flex direction to column for smaller screens */
        }

        .list-group {
            flex-basis: auto;
            /* Reset flex-basis to auto for stacked layout */
            flex-grow: 0;
            width: 100%;
            margin-bottom: 5%;
            /* Ensure each ul takes up the full width */
        }
    }

    .zero-top-border {
        border-top-left-radius: 0 !important;
        border-top-right-radius: 0 !important;
    }

    .custom-accordian-radius-header {
        border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0 !important;
    }

    .custom-accordian-radius {
        border-radius: 15px !important;
    }

    .accordion-item:last-of-type .accordion-button.collapsed {
        border-bottom-right-radius: 15px !important;
        border-bottom-left-radius: 15px !important;
    }

    .pagination-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        /* Align items to the left */
        align-items: flex-start;
        margin-top: 20px;
    }

    .pagination-button {
        background-color: rgba(233, 236, 239, 0.2);
        /* Background color with 50% opacity */
        border: none;
        color: #6c757d;
        padding: 8px 12px;
        margin: 2px 0;
        /* Add vertical margin between buttons */
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .pagination-button.active {
        background-color: #cb0c9f;
        color: white;
        font-weight: bold;
    }

    .pagination-button:hover:not(.active) {
        background-color: #d4d4d4;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
            <h6 class="my-auto text-white">Senarai Topik Dalam Kluster</h6>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-sm-2">
                    <div class="pagination-container">
                        <p class="text-center mb-2"><strong style="font-size: 1.0rem; color: black;">Pilih Tahun</strong></p>
                        <?php foreach ($years as $yearItem) : ?>
                            <?php if ($yearItem == $selectedYear) : ?>
                                <span class="pagination-button active" style="background-color: #613673;">Tahun <?= $yearItem; ?></span>
                            <?php else : ?>
                                <a href="?year=<?= $yearItem; ?>" class="pagination-button" style="color: #613673;">Tahun <?= $yearItem; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-sm">
                    <?php if ($hasData) : ?>
                        <div class="accordion" id="accordionRental">
                            <br>
                            <p class="text-center"><strong style="font-size: 1.0rem; color: black;">Senarai Topik</strong></p>
                            <?php foreach ($cluster as $clust) { ?>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $clust['ctm_code']; ?>" aria-expanded="false" aria-controls="collapse<?= $clust['ctm_code']; ?>">
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                            <?= $clust['ctm_desc']; ?>
                                        </button>
                                    </h5>
                                    <div id="collapse<?= $clust['ctm_code']; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental">
                                        <div class="accordion-body custom row" id="tahap-penguasaan">
                                            <?php foreach ($topik_main as $topik) {
                                                if ($topik['tm_ctm_id'] == $clust['ctm_id']) { ?>
                                                    <div class="col-md-12">
                                                        <div class="d-flex flex-column h-100">
                                                            <div id="collection1-<?= $topik['tm_id']; ?>">
                                                                <div class="d-flex w-100 align-items-center mb-2" id="1-collection1-<?= $topik['tm_id']; ?>">
                                                                    <span class="form-control me-2"><?= $topik['tm_desc']; ?></span>
                                                                    <a class="btn btn-link text-info text-gradient px-1 mb-0" href="<?= route_to('dskpn_by_topic', $topik['tm_id']) ?>">
                                                                        <i class="far fa-eye fa-lg me-2" aria-hidden="true"></i>
                                                                    </a>
                                                                    <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $topik['tm_id']; ?>').remove(); deleteTopic(<?= $topik['tm_id']; ?>);">
                                                                        <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php else : ?>
                        <div class="text-center py-4">
                            <br><br><br>
                            <strong>Tiada data yang didaftarkan bagi tahun yang dipilih</strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="container-fluid py-4 accordion">
    <!-- Button trigger modal -->

    <button type="button" class="btn bg-info" data-bs-toggle="modal" data-bs-target="#addClusterModal" hidden>
        Tambah Kluster
    </button>
    <!-- Modal Structure -->
    <div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClusterModalLabel">Tambah Kluster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addClusterForm" action="<?= route_to('store_create_cluster'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="clusterCode" class="form-label">Kod Kluster</label>
                            <input type="text" placeholder="Sila Masukkan Kod Kluster" class="form-control" id="clusterCode" name="ctm_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="clusterName" class="form-label">Nama Kluster</label>
                            <input type="text" placeholder="Sila Masukkan Nama Kluster" class="form-control" id="clusterName" name="ctm_desc" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn bg-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-info">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form class="accordion-item custom-accordian-radius card" action="<?= route_to('create_topic'); ?>" method="POST" hidden>
        <div class="card-header d-flex p-3 bg-primary accordion-header accordion-button custom-accordian-radius-header" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <div class="col-md-10">
                <h6 class="my-auto text-white">Daftar Topik dalam Kluster</h6>
            </div>
            <div class="col-md-2 text-end text-white">
                <i id="collapseIcon" class="ni ni-bold-down collapse-icon"></i>
            </div>
        </div>
        <div id="collapseOne" class="card-body p-3 accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clusterSelect">Kluster</label>
                            <select style="width:100%;" name="cluster" class="form-control select2" id="kluster" aria-label="Default select example">
                                <option disabled selected>-- Sila Pilih Kluster --</option>
                                <?php foreach ($cluster_listing as $item) { ?>
                                    <option value="<?= $item['ctm_id']; ?>"><?= $item['ctm_desc']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
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
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="yearInput">Topik</label>
                            <input type="text" name="topik" class="form-control" Placeholder="Sila Masukkan Topik" id="yearInput" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end p-3">
                <input type="submit" class="btn bg-info" value="Tambah" />
            </div>
        </div>
    </form>
</div>
<!-- <div class="text-end p-3">
    <a href="list-registered-dskpn" class="btn bg-primary btn-sm mb-0 me-1">Seterusnya</a>
</div> -->

<!-- alert part -->
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