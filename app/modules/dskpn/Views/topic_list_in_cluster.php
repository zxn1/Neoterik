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

    /* .row>* {
    padding-right: calc(var(--bs-gutter-x)* 0);
    padding-left: calc(var(--bs-gutter-x)* 0);
    margin-right: calc(var(--bs-gutter-x)* .5);
    margin-left: calc(var(--bs-gutter-x)* .5);
  } */

  .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .pagination-button {
        background-color: #e9ecef;
        border: none;
        color: #6c757d;
        padding: 8px 12px;
        margin: 0 2px;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .pagination-button.active {
        background-color: #888a88;
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

<div class="container-fluid py-4 accordion">
    <form class="accordion-item custom-accordian-radius card" action="<?= route_to('create_topic'); ?>" method="POST">
        <div class="card-header d-flex p-3 bg-gradient-primary accordion-header accordion-button custom-accordian-radius-header" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <div class="col-md-10">
                <h6 class="my-auto text-white">Daftar Topik dalam Kluster</h6>
            </div>
            <div class="col-md-2 text-end">
                <i id="collapseIcon" class="fa fa-plus"></i>
            </div>
        </div>
        <div id="collapseOne" class="card-body p-3 accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clusterSelect">Sila Pilih Kluster anda</label>
                            <select style="width:100%;" name="cluster" class="form-control select2" id="kluster" aria-label="Default select example">
                                <option selected>-- Sila Pilih Kluster --</option>
                                <?php foreach ($cluster_listing as $item) { ?>
                                    <option value="<?= $item['cm_id']; ?>"><?= $item['cm_desc']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="yearSelect">Tahun</label>
                            <select name="year" class="form-control" id="yearSelect" required>
                                <option value="" disabled selected>Sila Pilih Tahun</option>
                                <option value="1">Tahun Satu</option>
                                <option value="2">Tahun Dua</option>
                                <option value="3">Tahun Tiga</option>
                                <option value="4">Tahun Empat</option>
                                <option value="5">Tahun Lima</option>
                                <option value="6">Tahun Enam</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="yearInput">Topik</label>
                            <input type="text" name="topik" class="form-control" id="yearInput" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end p-3">
                <input type="submit" class="btn bg-gradient-info" value="Tambah" />
            </div>
        </div>
    </form>
</div>
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">Senarai Topik Dalam Kluster</h6>
        </div>
        <div class="card-body p-3">
            <div class="accordion" id="accordionRental">
                <?php foreach ($cluster as $clust) { ?>
                    <div class="accordion-item mb-3">
                        <h5 class="accordion-header" id="headingOne">
                            <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $clust['cm_code']; ?>" aria-expanded="false" aria-controls="collapse<?= $clust['cm_code']; ?>">
                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                <?= $clust['cm_desc']; ?>
                            </button>
                        </h5>
                        <div id="collapse<?= $clust['cm_code']; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental">
                            <div class="accordion-body custom row" id="tahap-penguasaan">
                                <?php foreach ($topik_main as $topik) {
                                    if ($topik['cm_id'] == $clust['cm_id']) { ?>
                                        <div class="col-md-12">
                                            <div class="d-flex flex-column h-100">
                                                <div id="collection1-<?= $topik['tm_id']; ?>">
                                                    <div class="d-flex w-100 align-items-center mb-2" id="1-collection1-<?= $topik['tm_id']; ?>">
                                                        <span class="form-control me-2"><?= $topik['tm_desc']; ?></span>
                                                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="<?= route_to('dskpn_by_topic', $topik['tm_id']) ?>">
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
            <div class="card-body p-3">
    <div class="pagination-container">
        <?php if ($selectedYear > 1) : ?>
            <a href="?year=<?= $selectedYear - 1; ?>" class="pagination-button">&laquo;</a>
        <?php endif; ?>
        
        <?php foreach ($years as $yearItem) : ?>
            <?php if ($yearItem == $selectedYear) : ?>
                <span class="pagination-button active"><?= $yearItem; ?></span>
            <?php else : ?>
                <a href="?year=<?= $yearItem; ?>" class="pagination-button"><?= $yearItem; ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
        
        <?php if ($selectedYear < 6) : ?>
            <a href="?year=<?= $selectedYear + 1; ?>" class="pagination-button"> &raquo;</a>
        <?php endif; ?>
    </div>
</div>

        </div>
    </div>
</div>
<div class="text-end p-3">
    <a href="list-registered-dskpn" class="btn bg-gradient-primary btn-sm mb-0 me-1">Seterusnya</a>
</div>

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
            icon: "danger",
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
