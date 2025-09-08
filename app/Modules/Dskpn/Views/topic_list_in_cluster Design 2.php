<style>
    :root {
        --primary-color: #613673;
        --secondary-color: #8a4e9d;
        --light-color: #f8f9fa;
        --dark-color: #343a40;
        --border-radius: 0.5rem;
        --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    body {
        font-family: "Lato", Arial, sans-serif;
        font-size: 16px;
        line-height: 1.8;
        font-weight: normal;
        background-color: #f8f9fa;
    }

    /* Card styling */
    .card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .card-header {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Select2 custom styling */
    .select2-container .select2-selection__rendered {
        display: flex;
        align-items: center;
        padding: 0.65rem 1rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: var(--border-radius);
        transition: var(--transition);
    }

    .select2-container--default .select2-selection--single {
        border: 0 !important;
        height: auto;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 42px !important;
    }

    .select2-container--open .select2-dropdown--below {
        border: 1px solid #ced4da;
        border-top: none;
        border-radius: 0 0 var(--border-radius) var(--border-radius);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: var(--primary-color);
    }

    /* Accordion styling */
    .accordion-item {
        margin-bottom: 1rem;
        border: none;
        border-radius: var(--border-radius) !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .accordion-button {
        padding: 1rem 1.25rem;
        font-weight: 500;
        color: #212529;
        background-color: #fff;
        border: none;
        box-shadow: none;
        transition: var(--transition);
    }

    .accordion-button:not(.collapsed) {
        color: var(--primary-color);
        background-color: rgba(97, 54, 115, 0.05);
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(97, 54, 115, 0.25);
    }

    .accordion-button::after {
        background-size: 1rem;
        transition: var(--transition);
    }

    .collapse-icon {
        font-size: 1rem;
        transition: transform 0.3s ease;
        color: var(--primary-color);
    }

    .accordion-header[aria-expanded="true"] .collapse-icon {
        transform: rotate(180deg);
    }

    /* Topic list styling */
    .topic-item {
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
        border-radius: var(--border-radius);
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .topic-item:hover {
        background-color: rgba(97, 54, 115, 0.03);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .topic-content {
        flex: 1;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .topic-actions {
        flex-shrink: 0;
        display: flex;
        gap: 0.5rem;
    }

    /* Year filter styling */
    .pagination-container {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        background-color: #fff;
        padding: 1rem;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
    }

    .pagination-title {
        font-size: 1rem;
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.5rem;
        text-align: center;
    }

    .pagination-button {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        color: #495057;
        padding: 0.6rem 1rem;
        margin: 0.15rem 0;
        text-decoration: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        transition: var(--transition);
        text-align: center;
    }

    .pagination-button.active {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        font-weight: 500;
    }

    .pagination-button:hover:not(.active) {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    /* Buttons styling */
    .btn {
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        border-radius: var(--border-radius);
        transition: var(--transition);
    }

    .btn-primary,
    .bg-primary {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
    }

    .btn-info,
    .bg-info {
        background-color: var(--secondary-color) !important;
        border-color: var(--secondary-color) !important;
        color: white !important;
    }

    .btn-link {
        text-decoration: none;
    }

    /* Modal styling */
    .modal-content {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        background-color: var(--primary-color);
        color: white;
    }

    .modal-footer {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Form controls */
    .form-control,
    .form-select {
        padding: 0.65rem 1rem;
        border-radius: var(--border-radius);
        border: 1px solid #ced4da;
        transition: var(--transition);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: rgba(97, 54, 115, 0.25);
        box-shadow: 0 0 0 0.25rem rgba(97, 54, 115, 0.1);
    }

    /* Empty state */
    .empty-state {
        padding: 3rem 1rem;
        text-align: center;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }

    /* Pagination for large datasets */
    .topic-pagination {
        display: flex;
        justify-content: center;
        gap: 0.25rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .topic-pagination .page-link {
        color: var(--primary-color);
        border-radius: var(--border-radius);
        border: 1px solid #dee2e6;
        padding: 0.4rem 0.75rem;
        transition: var(--transition);
    }

    .topic-pagination .page-link:hover {
        background-color: #e9ecef;
    }

    .topic-pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    /* Search bar for topics */
    .search-container {
        position: relative;
        margin-bottom: 1rem;
    }

    .search-container .form-control {
        padding-left: 2.5rem;
        padding-right: 1rem;
    }

    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
    }

    /* Topic list container with scroll for large datasets */
    .topics-container {
        max-height: 500px;
        overflow-y: auto;
        padding-right: 0.5rem;
    }

    .topics-container::-webkit-scrollbar {
        width: 6px;
    }

    .topics-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .topics-container::-webkit-scrollbar-thumb {
        background: #d4d4d4;
        border-radius: 10px;
    }

    .topics-container::-webkit-scrollbar-thumb:hover {
        background: #c1c1c1;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }

        .list-group {
            flex-basis: auto;
            flex-grow: 0;
            width: 100%;
            margin-bottom: 1rem;
        }

        .pagination-container {
            margin-bottom: 1.5rem;
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
            <h6 class="my-auto text-white fw-bold"><i class="fas fa-layer-group me-2"></i>Topik Dan Kluster</h6>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="pagination-container">
                        <p class="pagination-title mb-2"><i class="fas fa-calendar-alt me-2"></i>Pilih Tahun</p>
                        <?php foreach ($years as $yearItem) : ?>
                            <?php if ($yearItem == $selectedYear) : ?>
                                <span class="pagination-button active">Tahun <?= $yearItem; ?></span>
                            <?php else : ?>
                                <a href="?year=<?= $yearItem; ?>" class="pagination-button">Tahun <?= $yearItem; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8">
                    <?php if ($hasData) : ?>
                        <div class="card">
                            <div class="card-header p-3">
                                <h6 class="text-center fw-bold mb-0"><i class="fas fa-list-ul me-2"></i>Senarai Topik</h6>
                                <div class="search-container mt-3">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" id="topicSearch" class="form-control" placeholder="Cari topik...">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="accordion" id="accordionRental">
                                    <?php foreach ($cluster as $clust) { ?>
                                        <div class="accordion-item mb-3 cluster-item">
                                            <h5 class="accordion-header" id="heading<?= $clust['ctm_code']; ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $clust['ctm_code']; ?>" aria-expanded="false" aria-controls="collapse<?= $clust['ctm_code']; ?>">
                                                    <i class="fas fa-folder me-2"></i> <?= $clust['ctm_desc']; ?>
                                                    <span class="badge bg-primary rounded-pill ms-2" id="topic-count-<?= $clust['ctm_id']; ?>">0</span>
                                                </button>
                                            </h5>
                                            <div id="collapse<?= $clust['ctm_code']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $clust['ctm_code']; ?>" data-bs-parent="#accordionRental">
                                                <div class="accordion-body p-3">
                                                    <div class="topics-container">
                                                        <?php
                                                        $topicCount = 0;
                                                        foreach ($topik_main as $topik) {
                                                            if ($topik['tm_ctm_id'] == $clust['ctm_id']) {
                                                                $topicCount++;
                                                        ?>
                                                                <div class="topic-item topic-data" data-topic="<?= strtolower($topik['tm_desc']); ?>">
                                                                    <div class="topic-content"><?= $topik['tm_desc']; ?></div>
                                                                    <div class="topic-actions">
                                                                        <a class="btn btn-sm btn-outline-primary" href="<?= route_to('dskpn_by_topic', $topik['tm_id']) ?>" title="Lihat">
                                                                            <i class="far fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>

                                                    <!-- Pagination for large datasets -->
                                                    <div class="topic-pagination-container" id="pagination-<?= $clust['ctm_id']; ?>" style="display: <?= $topicCount > 10 ? 'block' : 'none'; ?>">
                                                        <nav aria-label="Topic navigation">
                                                            <ul class="pagination topic-pagination justify-content-center flex-wrap" id="pagination-list-<?= $clust['ctm_id']; ?>">
                                                                <!-- Pagination will be generated by JavaScript -->
                                                            </ul>
                                                        </nav>
                                                    </div>

                                                    <!-- No topics message -->
                                                    <?php if ($topicCount == 0) : ?>
                                                        <div class="text-center text-muted py-3">
                                                            <i class="fas fa-info-circle me-2"></i> Tiada topik dalam kluster ini
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            document.getElementById('topic-count-<?= $clust['ctm_id']; ?>').innerText = <?= $topicCount; ?>;
                                        </script>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="empty-state">
                            <i class="fas fa-database"></i>
                            <h5>Tiada Data</h5>
                            <p>Tiada data yang didaftarkan bagi tahun yang dipilih</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
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
                    <h5 class="modal-title" id="addClusterModalLabel"><i class="fas fa-plus-circle me-2"></i>Tambah Kluster</h5>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-info">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form class="accordion-item card" action="<?= route_to('create_topic'); ?>" method="POST" hidden>
        <div class="card-header d-flex p-3 bg-primary accordion-header accordion-button" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <div class="col-md-10">
                <h6 class="my-auto text-white">Daftar Topik dalam Kluster</h6>
            </div>
            <div class="col-md-2 text-end text-white">
                <i id="collapseIcon" class="fas fa-chevron-down collapse-icon"></i>
            </div>
        </div>
        <div id="collapseOne" class="card-body p-3 accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clusterSelect" class="form-label">Kluster</label>
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
                            <label for="yearSelect" class="form-label">Tahun</label>
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
                            <label for="yearInput" class="form-label">Topik</label>
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

<!-- Sweet Alert for notifications -->
<?php if (session()->has('success')) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Berjaya",
            text: "<?= session('success'); ?>",
            confirmButtonColor: "#613673"
        });
    </script>
<?php endif; ?>

<?php if (session()->has('fail')) : ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Maaf",
            text: "<?= session('fail'); ?>",
            confirmButtonColor: "#613673"
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        // Initialize select2
        $('.select2').select2({
            width: '100%',
            placeholder: "Sila pilih",
            allowClear: true
        });

        // Handle search functionality for topics
        $("#topicSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            // If search is empty, show all clusters
            if (value === "") {
                $(".cluster-item").show();
                $(".topic-data").show();
                return;
            }

            // Hide all clusters initially
            $(".cluster-item").hide();

            // Loop through all topic items
            $(".topic-data").each(function() {
                var text = $(this).data("topic");
                var matches = text.indexOf(value) > -1;

                $(this).toggle(matches);

                // If this topic matches, show its parent cluster
                if (matches) {
                    $(this).closest(".cluster-item").show();
                    $(this).closest(".accordion-collapse").addClass("show");
                }
            });
        });

        // Set up pagination for large datasets
        $(".accordion-collapse").each(function() {
            const clusterId = $(this).attr('id').replace('collapse', '');
            const topicItems = $(this).find('.topic-item');
            const itemsPerPage = 10;

            if (topicItems.length > itemsPerPage) {
                // Initialize pagination
                setupPagination(topicItems, itemsPerPage, clusterId);
                showPage(1, topicItems, itemsPerPage);
            }
        });

        // Function to set up pagination
        function setupPagination(items, itemsPerPage, clusterId) {
            const pageCount = Math.ceil(items.length / itemsPerPage);
            const paginationList = $(`#pagination-list-${clusterId}`);
            paginationList.empty();

            // Previous button
            paginationList.append(`
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" data-page="prev">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            `);

            // Page numbers
            for (let i = 1; i <= pageCount; i++) {
                if (pageCount <= 7 || i === 1 || i === pageCount || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    paginationList.append(`
                        <li class="page-item ${i === 1 ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `);
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    paginationList.append(`
                        <li class="page-item disabled">
                            <a class="page-link" href="#">...</a>
                        </li>
                    `);
                }
            }

            // Next button
            paginationList.append(`
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next" data-page="next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            `);

            // Event handlers for pagination
            paginationList.find('.page-link').click(function(e) {
                e.preventDefault();

                const pageNum = $(this).data('page');
                let newPage;

                if (pageNum === 'prev') {
                    newPage = Math.max(1, currentPage - 1);
                } else if (pageNum === 'next') {
                    newPage = Math.min(pageCount, currentPage + 1);
                } else {
                    newPage = parseInt(pageNum);
                }

                if (newPage !== currentPage) {
                    currentPage = newPage;
                    showPage(currentPage, items, itemsPerPage);

                    // Update active state
                    paginationList.find('.page-item').removeClass('active');
                    paginationList.find(`.page-link[data-page="${currentPage}"]`).parent().addClass('active');
                }
            });
        }

        // Function to show a specific page
        function showPage(page, items, itemsPerPage) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            items.hide();
            items.slice(startIndex, endIndex).show();
        }

        // Set up current page variable
        let currentPage = 1;

        // Handle accordion icon rotation
        $('.accordion-button').on('click', function() {
            const expanded = $(this).attr('aria-expanded') === 'true';
            if (expanded) {
                $(this).find('.collapse-icon').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            } else {
                $(this).find('.collapse-icon').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            }
        });
    });
</script>