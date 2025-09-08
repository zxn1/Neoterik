<style>
    /* Base styles with improved aesthetic */
    :root {
        --primary-color: #613673;
        --secondary-color: #8e44ad;
        --light-color: #f8f9fa;
        --dark-color: #495057;
        --border-radius: 0.5rem;
        --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    body {
        font-family: "Lato", Arial, sans-serif;
        font-size: 16px;
        line-height: 1.8;
        font-weight: normal;
        background-color: #f5f7fa;
    }

    /* Enhanced card styling */
    .card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        margin-bottom: 1.5rem;
        background-color: white;
        transition: var(--transition);
    }

    .card:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Improved Select2 styling */
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
        border-radius: var(--border-radius);
        transition: var(--transition);
    }

    .select2-container--default .select2-selection--single {
        border: 0 !important;
        height: auto;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: inherit !important;
    }

    .select2-container--open .select2-selection__rendered {
        border-bottom: none;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .select2-container--open .select2-dropdown--below {
        border-top: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border: 1px solid #d2d6da;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.05);
    }

    /* Enhanced accordion styling */
    .accordion-item {
        border: none;
        border-radius: var(--border-radius) !important;
        margin-bottom: 0.75rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        transition: var(--transition);
    }

    .accordion-item:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    }

    .accordion-button {
        padding: 1rem;
        background-color: #fff;
        border: none;
        border-radius: var(--border-radius) !important;
        font-weight: 600;
        color: var(--dark-color);
        transition: var(--transition);
    }

    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: var(--primary-color);
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(97, 54, 115, 0.2);
    }

    .accordion-button::after {
        background-size: 1rem;
    }

    .accordion-body {
        padding: 1rem;
        background-color: #fff;
    }

    /* Custom pagination styling */
    .pagination-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        margin-top: 1rem;
        padding: 1rem;
        background-color: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
    }

    .pagination-header {
        margin-bottom: 1rem;
        width: 100%;
        text-align: center;
        font-weight: 600;
        color: var(--dark-color);
    }

    .pagination-button {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        color: var(--dark-color);
        padding: 0.5rem 1rem;
        margin: 0.25rem 0;
        text-decoration: none;
        border-radius: var(--border-radius);
        transition: var(--transition);
        width: 100%;
        text-align: center;
    }

    .pagination-button.active {
        background-color: var(--primary-color);
        color: white;
        font-weight: 500;
        border-color: var(--primary-color);
    }

    .pagination-button:hover:not(.active) {
        background-color: #e9ecef;
    }

    /* Topic list improvements for large datasets */
    .topic-list-container {
        max-height: 500px;
        overflow-y: auto;
        padding-right: 0.5rem;
        scrollbar-width: thin;
        scrollbar-color: #d2d6da #f8f9fa;
    }

    .topic-list-container::-webkit-scrollbar {
        width: 6px;
    }

    .topic-list-container::-webkit-scrollbar-track {
        background: #f8f9fa;
    }

    .topic-list-container::-webkit-scrollbar-thumb {
        background-color: #d2d6da;
        border-radius: 10px;
    }

    .topic-item {
        background-color: #fff;
        border: 1px solid #e9ecef;
        border-radius: var(--border-radius);
        margin-bottom: 0.5rem;
        transition: var(--transition);
    }

    .topic-item:hover {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        transform: translateY(-1px);
    }

    .topic-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 1rem;
    }

    .topic-desc {
        flex-grow: 1;
        margin-right: 0.5rem;
        font-size: 0.9rem;
    }

    .topic-actions {
        display: flex;
        align-items: center;
    }

    .topic-actions a {
        color: var(--primary-color);
        margin-left: 0.5rem;
        transition: var(--transition);
    }

    .topic-actions a:hover {
        color: var(--secondary-color);
    }

    /* Search box for topics */
    .topic-search-container {
        margin-bottom: 1rem;
        position: relative;
    }

    .topic-search {
        width: 100%;
        padding: 0.5rem 2rem 0.5rem 0.75rem;
        border: 1px solid #d2d6da;
        border-radius: var(--border-radius);
        font-size: 0.875rem;
    }

    .topic-search:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(97, 54, 115, 0.1);
    }

    .topic-search-icon {
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    /* Pagination for topics */
    .topics-pagination {
        display: flex;
        justify-content: center;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .topics-pagination-btn {
        padding: 0.25rem 0.5rem;
        margin: 0 0.25rem 0.25rem 0;
        border: 1px solid #d2d6da;
        border-radius: var(--border-radius);
        background-color: #fff;
        color: var(--dark-color);
        font-size: 0.8rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .topics-pagination-btn.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .topics-pagination-btn:hover:not(.active) {
        background-color: #e9ecef;
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
            width: 100%;
            margin-bottom: 1.5rem;
        }
    }

    /* Loading spinner */
    .loading-spinner {
        display: none;
        text-align: center;
        padding: 2rem;
    }

    .spinner {
        width: 2rem;
        height: 2rem;
        border: 0.25rem solid rgba(97, 54, 115, 0.2);
        border-radius: 50%;
        border-top-color: var(--primary-color);
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
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
        <div class="card-header d-flex p-3" style="background-color: #613673;">
            <h6 class="my-auto text-white"><b>Topik Dan Kluster</b></h6>
        </div>
        <div class="container py-3">
            <div class="row">
                <!-- Year Selection Column -->
                <div class="col-lg-3 col-md-4">
                    <div class="pagination-container">
                        <div class="pagination-header">
                            <strong>Pilih Tahun</strong>
                        </div>
                        <?php foreach ($years as $yearItem) : ?>
                            <?php if ($yearItem == $selectedYear) : ?>
                                <span class="pagination-button active">Tahun <?= $yearItem; ?></span>
                            <?php else : ?>
                                <a href="?year=<?= $yearItem; ?>" class="pagination-button">Tahun <?= $yearItem; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Topics Column -->
                <div class="col-lg-9 col-md-8">
                    <?php if ($hasData) : ?>
                        <div class="card">
                            <div class="card-header p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><strong>Senarai Topik</strong></h5>
                                    <div class="topic-search-container" style="width: 300px;">
                                        <input type="text" class="topic-search" id="topicSearch" placeholder="Cari topik...">
                                        <i class="fas fa-search topic-search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="accordion" id="accordionRental">
                                    <?php foreach ($cluster as $clust) { ?>
                                        <div class="accordion-item mb-3 cluster-item" data-cluster="<?= $clust['ctm_code']; ?>">
                                            <h5 class="accordion-header" id="heading<?= $clust['ctm_code']; ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $clust['ctm_code']; ?>" aria-expanded="false" aria-controls="collapse<?= $clust['ctm_code']; ?>">
                                                    <span><?= $clust['ctm_desc']; ?></span>
                                                    <span class="ms-auto topic-count badge bg-light text-dark me-2"></span>
                                                </button>
                                            </h5>
                                            <div id="collapse<?= $clust['ctm_code']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $clust['ctm_code']; ?>" data-bs-parent="#accordionRental">
                                                <div class="accordion-body p-0">
                                                    <div class="topic-list-container" id="topic-list-<?= $clust['ctm_code']; ?>">
                                                        <!-- Topics will be loaded here -->
                                                        <div class="loading-spinner" id="spinner-<?= $clust['ctm_code']; ?>">
                                                            <div class="spinner mx-auto"></div>
                                                            <p class="mt-2">Memuat topik...</p>
                                                        </div>
                                                    </div>
                                                    <div class="topics-pagination p-3" id="pagination-<?= $clust['ctm_code']; ?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center py-5">
                                    <i class="fas fa-exclamation-circle fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Tiada data yang didaftarkan bagi tahun yang dipilih</h5>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Modals (kept from original) -->
<div class="container-fluid py-4 accordion">
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

<!-- Alert handling (kept from original) -->
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
        $('.select2').select2();

        // Initialize topic data and pagination
        const topicsPerPage = 10;
        let topicsData = {};
        let currentPage = {};
        let filteredTopics = {};

        <?php foreach ($cluster as $clust) { ?>
            // Initialize data structures for each cluster
            topicsData['<?= $clust['ctm_code']; ?>'] = [];
            currentPage['<?= $clust['ctm_code']; ?>'] = 1;
            filteredTopics['<?= $clust['ctm_code']; ?>'] = [];

            // Load topics when accordion is opened
            $('#heading<?= $clust['ctm_code']; ?> button').on('click', function() {
                const isCollapsed = $(this).hasClass('collapsed');
                if (!isCollapsed && topicsData['<?= $clust['ctm_code']; ?>'].length === 0) {
                    loadTopics('<?= $clust['ctm_code']; ?>', <?= $clust['ctm_id']; ?>);
                }
            });
        <?php } ?>

        // Function to load topics for a cluster
        function loadTopics(clusterCode, clusterId) {
            const spinner = document.getElementById(`spinner-${clusterCode}`);
            spinner.style.display = 'block';

            // In a real application, you would fetch this data from the server
            // For now, we'll use the data already in the DOM
            <?php foreach ($topik_main as $topik) { ?>
                if (<?= $topik['tm_ctm_id']; ?> === clusterId) {
                    topicsData[clusterCode].push({
                        id: <?= $topik['tm_id']; ?>,
                        desc: "<?= addslashes($topik['tm_desc']); ?>",
                        url: "<?= route_to('dskpn_by_topic', $topik['tm_id']) ?>"
                    });
                }
            <?php } ?>

            // Update topic count badge
            $(`.cluster-item[data-cluster="${clusterCode}"] .topic-count`).text(topicsData[clusterCode].length + ' topik');

            // Set filtered topics to all topics initially
            filteredTopics[clusterCode] = [...topicsData[clusterCode]];

            // Render the first page
            renderTopics(clusterCode);

            // Hide spinner after a brief delay (simulating network load)
            setTimeout(() => {
                spinner.style.display = 'none';
            }, 300);
        }

        // Function to render topics with pagination
        function renderTopics(clusterCode) {
            const container = document.getElementById(`topic-list-${clusterCode}`);
            const paginationContainer = document.getElementById(`pagination-${clusterCode}`);
            const topics = filteredTopics[clusterCode];
            const page = currentPage[clusterCode];

            // Clear existing content
            container.innerHTML = '';
            paginationContainer.innerHTML = '';

            // If no topics, show message
            if (topics.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4">
                        <p class="text-muted">Tiada topik yang ditemui</p>
                    </div>
                `;
                return;
            }

            // Calculate pagination
            const totalPages = Math.ceil(topics.length / topicsPerPage);
            const startIndex = (page - 1) * topicsPerPage;
            const endIndex = Math.min(startIndex + topicsPerPage, topics.length);

            // Generate topics HTML
            const topicsHTML = topics.slice(startIndex, endIndex).map(topic => `
                <div class="topic-item">
                    <div class="topic-content">
                        <div class="topic-desc">${topic.desc}</div>
                        <div class="topic-actions">
                            <a href="${topic.url}" class="btn btn-sm btn-light" title="Lihat">
                                <i class="far fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `).join('');

            container.innerHTML = topicsHTML;

            // Generate pagination
            if (totalPages > 1) {
                let paginationHTML = '';

                // Previous button
                if (page > 1) {
                    paginationHTML += `<button class="topics-pagination-btn" data-page="${page-1}">«</button>`;
                }

                // Page numbers
                for (let i = 1; i <= totalPages; i++) {
                    if (
                        i === 1 ||
                        i === totalPages ||
                        (i >= page - 1 && i <= page + 1)
                    ) {
                        paginationHTML += `<button class="topics-pagination-btn ${i === page ? 'active' : ''}" data-page="${i}">${i}</button>`;
                    } else if (i === page - 2 || i === page + 2) {
                        paginationHTML += `<span class="mx-1">...</span>`;
                    }
                }

                // Next button
                if (page < totalPages) {
                    paginationHTML += `<button class="topics-pagination-btn" data-page="${page+1}">»</button>`;
                }

                paginationContainer.innerHTML = paginationHTML;

                // Add click handlers to pagination buttons
                paginationContainer.querySelectorAll('.topics-pagination-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        currentPage[clusterCode] = parseInt(this.getAttribute('data-page'));
                        renderTopics(clusterCode);
                    });
                });
            }
        }

        // Search functionality
        const searchInput = document.getElementById('topicSearch');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();

                // Filter topics for each cluster
                <?php foreach ($cluster as $clust) { ?>
                    filteredTopics['<?= $clust['ctm_code']; ?>'] = topicsData['<?= $clust['ctm_code']; ?>'].filter(topic =>
                        topic.desc.toLowerCase().includes(searchTerm)
                    );

                    // Only reset page if the accordion is open
                    if (!$('#collapse<?= $clust['ctm_code']; ?>').hasClass('collapse')) {
                        currentPage['<?= $clust['ctm_code']; ?>'] = 1;
                        renderTopics('<?= $clust['ctm_code']; ?>');
                    }

                    // Update topic count badge
                    $(`.cluster-item[data-cluster="<?= $clust['ctm_code']; ?>"] .topic-count`).text(
                        filteredTopics['<?= $clust['ctm_code']; ?>'].length + ' topik'
                    );
                <?php } ?>
            });
        }

        // Handle year filter change
        const filterYear = document.getElementById('filterYear');
        if (filterYear) {
            filterYear.addEventListener('change', function() {
                const selectedYear = this.value;
                const url = new URL(window.location.href);
                if (selectedYear) {
                    url.searchParams.set('year', selectedYear);
                } else {
                    url.searchParams.delete('year');
                }
                window.location.href = url.toString();
            });
        }
    });
</script>