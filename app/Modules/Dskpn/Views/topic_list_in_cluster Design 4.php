<style>
    /* Corporate color scheme */
    :root {
        --primary-color: #613673;
        --secondary-color: #8a4f9b;
        --accent-color: #4e2d5e;
        --light-color: #f8f9fa;
        --dark-color: #343a40;
        --border-radius: 0.5rem;
        --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Base styling improvements */
    body {
        font-family: "Lato", Arial, sans-serif;
        font-size: 16px;
        line-height: 1.8;
        font-weight: normal;
        background-color: #f5f7fa;
        color: #495057;
    }

    .card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        margin-bottom: 1.5rem;
    }

    .card-header {
        background-color: var(--primary-color);
        border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
        padding: 1rem 1.5rem;
    }

    .container {
        padding: 1.5rem;
    }

    /* Enhanced Select2 styling */
    .select2-container .select2-selection__rendered {
        display: flex;
        align-items: center;
        padding: 0.625rem 1rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.5rem;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: var(--border-radius);
        transition: all 0.2s ease;
    }

    .select2-container--default .select2-selection--single {
        border: 0 !important;
        height: 42px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 42px !important;
    }

    .select2-container--open .select2-dropdown {
        border-color: var(--primary-color);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: var(--primary-color);
    }

    /* Year filter buttons */
    .pagination-container {
        display: flex;
        flex-direction: column;
        margin-top: 1.5rem;
        padding: 1rem;
        background-color: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
    }

    .pagination-button {
        margin: 0.25rem 0;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        transition: all 0.2s ease;
        text-align: center;
        font-weight: 500;
    }

    .pagination-button.active {
        background-color: var(--primary-color);
        color: white !important;
    }

    .pagination-button:hover:not(.active) {
        background-color: #e9ecef;
        color: var(--primary-color) !important;
    }

    /* Accordion improvements */
    .accordion-item {
        border: none;
        margin-bottom: 1rem;
        border-radius: var(--border-radius) !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .accordion-header {
        background-color: #fff;
    }

    .accordion-button {
        padding: 1rem 1.5rem;
        font-weight: 600;
        color: #495057;
        background-color: #fff;
        border: none !important;
        box-shadow: none !important;
    }

    .accordion-button:not(.collapsed) {
        color: var(--primary-color);
        background-color: #f8f9fa;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: transparent;
    }

    .accordion-body {
        background-color: #fff;
        padding: 1.5rem;
    }

    /* Enhanced topic list */
    .topic-list-container {
        position: relative;
    }

    .topic-search-container {
        margin-bottom: 1rem;
        position: relative;
    }

    .topic-search-input {
        padding-left: 2.5rem;
        border-radius: var(--border-radius);
        border: 1px solid #ced4da;
        transition: all 0.2s ease;
    }

    .topic-search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(97, 54, 115, 0.25);
    }

    .search-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .topic-item {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
        background-color: #f8f9fa;
        border-radius: var(--border-radius);
        transition: all 0.2s ease;
    }

    .topic-item:hover {
        background-color: #e9ecef;
    }

    .topic-text {
        flex-grow: 1;
        margin-right: 0.5rem;
        font-size: 0.875rem;
    }

    .topic-actions {
        display: flex;
        align-items: center;
    }

    .topic-actions a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        margin-left: 0.5rem;
        transition: all 0.2s ease;
    }

    .topic-actions a:hover {
        background-color: #e2e6ea;
    }

    .view-action {
        color: var(--primary-color);
    }

    /* Pagination for topics */
    .topics-pagination {
        display: flex;
        justify-content: center;
        margin-top: 1rem;
    }

    .topics-pagination .page-item .page-link {
        color: var(--primary-color);
        border: none;
        padding: 0.5rem 0.75rem;
        min-width: 36px;
        text-align: center;
    }

    .topics-pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        color: white;
    }

    .topics-pagination .page-item .page-link:focus {
        box-shadow: none;
    }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .card-header {
            padding: 1rem;
        }

        .container {
            padding: 1rem;
        }

        .accordion-button {
            padding: 0.75rem 1rem;
        }

        .accordion-body {
            padding: 1rem;
        }

        .topic-item {
            padding: 0.5rem 0.75rem;
        }
    }

    /* No data message */
    .no-data-message {
        padding: 3rem 1.5rem;
        text-align: center;
        background-color: #f8f9fa;
        border-radius: var(--border-radius);
        color: #6c757d;
    }

    .no-data-message i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #ced4da;
    }

    /* Empty state message */
    .empty-results {
        padding: 2rem;
        text-align: center;
        color: #6c757d;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3">
            <h6 class="my-auto text-white"><b>Topik Dan Kluster</b></h6>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="pagination-container">
                        <h6 class="text-center mb-3 text-dark"><i class="fas fa-calendar-alt me-2"></i>Pilih Tahun</h6>
                        <div class="d-flex flex-column">
                            <?php foreach ($years as $yearItem) : ?>
                                <?php if ($yearItem == $selectedYear) : ?>
                                    <span class="pagination-button active">Tahun <?= $yearItem; ?></span>
                                <?php else : ?>
                                    <a href="?year=<?= $yearItem; ?>" class="pagination-button" style="color: var(--primary-color);">Tahun <?= $yearItem; ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-12">
                    <?php if ($hasData) : ?>
                        <div class="accordion" id="accordionRental">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 text-dark"><i class="fas fa-list-alt me-2"></i>Senarai Topik</h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="expandAllSwitch">
                                    <label class="form-check-label small" for="expandAllSwitch">Buka semua</label>
                                </div>
                            </div>

                            <?php foreach ($cluster as $clust) { ?>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="heading<?= $clust['ctm_code']; ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $clust['ctm_code']; ?>" aria-expanded="false" aria-controls="collapse<?= $clust['ctm_code']; ?>">
                                            <span class="me-2"><?= $clust['ctm_code']; ?>:</span>
                                            <span><?= $clust['ctm_desc']; ?></span>
                                            <span class="badge bg-primary ms-2 topic-count" data-cluster="<?= $clust['ctm_id']; ?>">0</span>
                                        </button>
                                    </h5>
                                    <div id="collapse<?= $clust['ctm_code']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $clust['ctm_code']; ?>" data-bs-parent="#accordionRental">
                                        <div class="accordion-body">
                                            <div class="topic-list-container" id="topic-list-<?= $clust['ctm_id']; ?>" data-cluster-id="<?= $clust['ctm_id']; ?>">
                                                <div class="topic-search-container">
                                                    <i class="fas fa-search search-icon"></i>
                                                    <input type="text" class="form-control topic-search-input" placeholder="Cari topik..." data-cluster-id="<?= $clust['ctm_id']; ?>">
                                                </div>

                                                <div class="topic-list" id="topic-items-<?= $clust['ctm_id']; ?>">
                                                    <!-- Topics will be loaded dynamically -->
                                                    <div class="d-flex justify-content-center">
                                                        <div class="spinner-border text-primary" role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="topics-pagination-container mt-3">
                                                    <nav aria-label="Topics pagination">
                                                        <ul class="pagination topics-pagination justify-content-center" id="pagination-<?= $clust['ctm_id']; ?>">
                                                            <!-- Pagination will be generated dynamically -->
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php else : ?>
                        <div class="no-data-message">
                            <i class="fas fa-folder-open"></i>
                            <h5>Tiada Data</h5>
                            <p>Tiada data yang didaftarkan bagi tahun yang dipilih</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Keep the original modals and forms but hide them -->
<div class="container-fluid py-4 accordion" style="display: none;">
    <button type="button" class="btn bg-info" data-bs-toggle="modal" data-bs-target="#addClusterModal" hidden>
        Tambah Kluster
    </button>
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

<!-- Sweetalert notifications -->
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
        // Initialize Select2
        $('.select2').select2({
            width: '100%',
            placeholder: "Sila Pilih",
            allowClear: true
        });

        // Expand/Collapse All toggle
        $('#expandAllSwitch').change(function() {
            if ($(this).is(':checked')) {
                $('.accordion-collapse').collapse('show');
            } else {
                $('.accordion-collapse').collapse('hide');
            }
        });

        // Topic list management
        const ITEMS_PER_PAGE = 10;
        let topicData = {};

        // Fetch topics for each cluster
        function loadTopics() {
            <?php foreach ($cluster as $clust) { ?>
                // In a real implementation, you would fetch this data from your server
                // For demo purposes, we're extracting it from the existing page
                const clusterId = <?= $clust['ctm_id']; ?>;
                topicData[clusterId] = [];

                <?php foreach ($topik_main as $topik) {
                    if ($topik['tm_ctm_id'] == $clust['ctm_id']) { ?>
                        topicData[clusterId].push({
                            id: <?= $topik['tm_id']; ?>,
                            description: "<?= addslashes($topik['tm_desc']); ?>",
                            viewUrl: "<?= route_to('dskpn_by_topic', $topik['tm_id']) ?>"
                        });
                <?php }
                } ?>

                // Set topic count badge
                $('.topic-count[data-cluster="' + clusterId + '"]').text(topicData[clusterId].length);

                // Initialize with the first page
                displayTopics(clusterId, 1, '');
            <?php } ?>
        }

        // Search functionality
        $(document).on('input', '.topic-search-input', function() {
            const clusterId = $(this).data('cluster-id');
            const searchTerm = $(this).val().toLowerCase();

            // Reset to first page when searching
            displayTopics(clusterId, 1, searchTerm);
        });

        // Display topics with pagination
        function displayTopics(clusterId, currentPage, searchTerm) {
            const filteredTopics = searchTerm ?
                topicData[clusterId].filter(topic =>
                    topic.description.toLowerCase().includes(searchTerm.toLowerCase())
                ) :
                topicData[clusterId];

            const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
            const endIndex = Math.min(startIndex + ITEMS_PER_PAGE, filteredTopics.length);
            const paginatedTopics = filteredTopics.slice(startIndex, endIndex);

            const topicContainer = $(`#topic-items-${clusterId}`);
            topicContainer.empty();

            if (paginatedTopics.length === 0) {
                topicContainer.html(`
                    <div class="empty-results">
                        <i class="fas fa-search mb-3" style="font-size: 2rem; color: #ced4da;"></i>
                        <p>Tiada topik yang ditemui</p>
                    </div>
                `);
            } else {
                paginatedTopics.forEach(topic => {
                    topicContainer.append(`
                        <div class="topic-item" id="topic-${topic.id}">
                            <div class="topic-text">${topic.description}</div>
                            <div class="topic-actions">
                                <a href="${topic.viewUrl}" class="view-action" title="Lihat">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    `);
                });
            }

            // Update pagination
            updatePagination(clusterId, currentPage, filteredTopics.length, searchTerm);
        }

        // Create pagination
        function updatePagination(clusterId, currentPage, totalItems, searchTerm) {
            const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);
            const paginationContainer = $(`#pagination-${clusterId}`);
            paginationContainer.empty();

            if (totalPages <= 1) {
                paginationContainer.hide();
                return;
            }

            paginationContainer.show();

            // Previous button
            paginationContainer.append(`
                <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="#" aria-label="Previous" data-page="${currentPage - 1}" data-cluster-id="${clusterId}" data-search="${searchTerm}">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            `);

            // Page numbers
            const displayPages = getDisplayPages(currentPage, totalPages);

            for (let i = 0; i < displayPages.length; i++) {
                if (displayPages[i] === '...') {
                    paginationContainer.append(`
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    `);
                } else {
                    paginationContainer.append(`
                        <li class="page-item ${displayPages[i] === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${displayPages[i]}" data-cluster-id="${clusterId}" data-search="${searchTerm}">${displayPages[i]}</a>
                        </li>
                    `);
                }
            }

            // Next button
            paginationContainer.append(`
                <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                    <a class="page-link" href="#" aria-label="Next" data-page="${currentPage + 1}" data-cluster-id="${clusterId}" data-search="${searchTerm}">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            `);
        }

        // Calculate which page numbers to display
        function getDisplayPages(currentPage, totalPages) {
            let pages = [];

            if (totalPages <= 7) {
                for (let i = 1; i <= totalPages; i++) {
                    pages.push(i);
                }
            } else {
                pages.push(1);

                if (currentPage > 3) {
                    pages.push('...');
                }

                let start = Math.max(2, currentPage - 1);
                let end = Math.min(totalPages - 1, currentPage + 1);

                if (currentPage <= 3) {
                    end = 5;
                }

                if (currentPage >= totalPages - 2) {
                    start = totalPages - 4;
                }

                for (let i = start; i <= end; i++) {
                    pages.push(i);
                }

                if (currentPage < totalPages - 2) {
                    pages.push('...');
                }

                pages.push(totalPages);
            }

            return pages;
        }

        // Handle pagination clicks
        $(document).on('click', '.page-link', function(e) {
            e.preventDefault();

            const page = $(this).data('page');
            if (!page) return;

            const clusterId = $(this).data('cluster-id');
            const searchTerm = $(this).data('search');

            displayTopics(clusterId, page, searchTerm);

            // Scroll to top of topics container
            const container = $(`#topic-list-${clusterId}`);
            container.closest('.accordion-body').animate({
                scrollTop: 0
            }, 'fast');
        });

        // Load topics on accordion open to improve performance
        $('.accordion-button').on('click', function() {
            const target = $(this).attr('data-bs-target');
            const isExpanded = $(this).attr('aria-expanded') === 'true';

            if (!isExpanded) {
                // It's being expanded now
                const clusterId = $(target).find('.topic-list-container').data('cluster-id');
                if (clusterId && topicData[clusterId]) {
                    const searchInput = $(target).find('.topic-search-input');
                    const searchTerm = searchInput.val();
                    displayTopics(clusterId, 1, searchTerm);
                }
            }
        });

        // Load all topic data initially
        loadTopics();
    });
</script>