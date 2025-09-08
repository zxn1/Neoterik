<style>
    /* Base styling improvements */
    :root {
        --primary-color: #613673;
        --secondary-color: #5e72e4;
        --text-color: #344767;
        --light-bg: #f8f9fa;
        --border-radius: 0.5rem;
        --box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.05);
        --transition: all 0.3s ease;
    }

    body {
        font-family: "Lato", Arial, sans-serif;
        font-size: 16px;
        line-height: 1.8;
        font-weight: normal;
        color: var(--text-color);
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 10px;
        box-shadow: var(--box-shadow);
        border: none;
        margin-bottom: 20px;
    }

    .card-header {
        border-radius: 10px 10px 0 0 !important;
        border-bottom: 0;
        padding: 15px 20px;
    }

    /* Enhanced Select2 styling */
    .select2-container .select2-selection__rendered {
        display: flex;
        align-items: center;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.4rem;
        color: var(--text-color);
        background-color: #fff;
        border: 1px solid #d2d6da;
        border-radius: var(--border-radius);
        transition: var(--transition);
        height: 38px;
    }

    .select2-container--default .select2-selection--single {
        border: 0 !important;
        height: 38px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }

    .select2-dropdown {
        border-radius: var(--border-radius);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        border: 1px solid #e9ecef;
    }

    .select2-container--open .select2-dropdown--below {
        border-top: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .select2-search--dropdown .select2-search__field {
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #e9ecef;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: var(--primary-color);
    }

    /* Improved accordion styling */
    .accordion-item {
        border: none;
        margin-bottom: 15px;
        border-radius: var(--border-radius) !important;
        box-shadow: var(--box-shadow);
        overflow: hidden;
    }

    .accordion-button {
        padding: 15px 20px;
        font-weight: 500;
        color: var(--text-color);
        background-color: white;
        box-shadow: none;
        border-radius: var(--border-radius) !important;
    }

    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: var(--primary-color);
        box-shadow: none;
    }

    .accordion-button::after {
        background-size: 15px;
        transition: var(--transition);
    }

    .accordion-body {
        padding: 15px 20px;
        background-color: white;
    }

    /* Topic list styling */
    .topic-item {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        margin-bottom: 8px;
        border-radius: var(--border-radius);
        background-color: var(--light-bg);
        transition: var(--transition);
    }

    .topic-item:hover {
        background-color: rgba(97, 54, 115, 0.05);
    }

    .topic-item .form-control {
        border: none;
        background-color: transparent;
        padding: 0;
        margin-right: 10px;
        flex-grow: 1;
    }

    .topic-actions {
        display: flex;
        gap: 5px;
    }

    .topic-actions .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        padding: 0;
        transition: var(--transition);
    }

    /* Enhanced year filter */
    .year-filter {
        background-color: white;
        border-radius: var(--border-radius);
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: var(--box-shadow);
    }

    .year-filter h6 {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 15px;
        text-align: center;
    }

    .year-filter .pagination-button {
        display: flex;
        width: 100%;
        padding: 8px 15px;
        margin-bottom: 8px;
        text-align: center;
        justify-content: center;
        background-color: #f8f9fa;
        border-radius: var(--border-radius);
        transition: var(--transition);
        text-decoration: none;
        color: var(--primary-color);
    }

    .year-filter .pagination-button.active {
        background-color: var(--primary-color);
        color: white;
        font-weight: 500;
    }

    .year-filter .pagination-button:hover:not(.active) {
        background-color: rgba(97, 54, 115, 0.1);
    }

    /* Topic search & pagination */
    .topic-search-container {
        margin-bottom: 15px;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding-left: 40px;
        border-radius: var(--border-radius);
        border: 1px solid #e9ecef;
        height: 42px;
    }

    .search-box .search-icon {
        position: absolute;
        left: 15px;
        top: 12px;
        color: #adb5bd;
    }

    .pagination-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }

    .pagination-info {
        color: #6c757d;
        font-size: 0.875rem;
    }

    .pagination {
        display: flex;
        gap: 5px;
    }

    .page-item .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        padding: 0;
        border-radius: 50%;
        color: var(--primary-color);
        border: 1px solid #e9ecef;
        text-decoration: none;
        transition: var(--transition);
    }

    .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .page-item .page-link:hover:not(.active) {
        background-color: rgba(97, 54, 115, 0.1);
    }

    /* Empty state */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        text-align: center;
    }

    .empty-state i {
        font-size: 3rem;
        color: #adb5bd;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: #6c757d;
        font-weight: 500;
    }

    /* Loading state */
    .topic-loader {
        display: none;
        text-align: center;
        padding: 20px;
    }

    .spinner {
        width: 30px;
        height: 30px;
        border: 3px solid rgba(97, 54, 115, 0.1);
        border-radius: 50%;
        border-top-color: var(--primary-color);
        animation: spin 1s ease-in-out infinite;
        margin: 0 auto 10px;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Responsive improvements */
    @media (min-width: 1800px) {

        .container,
        .container-sm,
        .container-md,
        .container-lg,
        .container-xl,
        .container-xxl {
            max-width: 1720px;
        }
    }

    @media (min-width: 1600px) {

        .container,
        .container-sm,
        .container-md,
        .container-lg,
        .container-xl,
        .container-xxl {
            max-width: 1520px;
        }
    }

    @media (max-width: 768px) {
        .card-header h6 {
            font-size: 1rem;
        }

        .year-filter {
            margin-bottom: 20px;
        }

        .pagination-controls {
            flex-direction: column;
            gap: 10px;
        }

        .pagination-info {
            text-align: center;
        }
    }

    /* Add these styles to your CSS section */

    /* Improved search box */
    .search-box {
        position: relative;
        margin-bottom: 15px;
    }

    .search-box input {
        padding-left: 40px;
        padding-right: 30px;
        border-radius: var(--border-radius);
        border: 1px solid #e9ecef;
        height: 42px;
        transition: all 0.2s ease;
    }

    .search-box input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(97, 54, 115, 0.25);
    }

    .search-box .search-icon {
        position: absolute;
        left: 15px;
        top: 12px;
        color: #adb5bd;
        transition: color 0.2s ease;
    }

    .search-box input:focus+.search-icon {
        color: var(--primary-color);
    }

    .search-box .search-clear {
        position: absolute;
        right: 12px;
        top: 10px;
        width: 22px;
        height: 22px;
        font-size: 10px;
        background-color: #e9ecef;
        border-radius: 50%;
        display: none;
        cursor: pointer;
        opacity: 0.7;
        transition: opacity 0.2s ease;
    }

    .search-box .search-clear:hover {
        opacity: 1;
    }

    /* Enhanced empty state */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 30px 20px;
        text-align: center;
        background-color: rgba(248, 249, 250, 0.7);
        border-radius: var(--border-radius);
        margin: 10px 0;
    }

    .empty-state i {
        font-size: 2.5rem;
        color: #adb5bd;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: #6c757d;
        font-weight: 500;
        margin-bottom: 0;
    }

    /* Improved loader */
    .topic-loader {
        display: none;
        text-align: center;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: var(--border-radius);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 5;
    }

    .spinner {
        width: 30px;
        height: 30px;
        border: 3px solid rgba(97, 54, 115, 0.1);
        border-radius: 50%;
        border-top-color: var(--primary-color);
        animation: spin 1s ease-in-out infinite;
        margin: 0 auto 10px;
    }

    /* Add smooth animations for topic items */
    .topic-item {
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3" style="background-color: var(--primary-color);">
            <h6 class="my-auto text-white"><i class="fas fa-layer-group me-2"></i> <b>Topik Dan Kluster</b></h6>
        </div>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="year-filter">
                        <h6><i class="fas fa-calendar-alt me-2"></i> Pilih Tahun</h6>
                        <?php foreach ($years as $yearItem) : ?>
                            <?php if ($yearItem == $selectedYear) : ?>
                                <span class="pagination-button active">Tahun <?= $yearItem; ?></span>
                            <?php else : ?>
                                <a href="?year=<?= $yearItem; ?>" class="pagination-button">Tahun <?= $yearItem; ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-md-9 col-sm-12">
                    <?php if ($hasData) : ?>
                        <div class="accordion" id="accordionRental">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 text-center"><i class="fas fa-list-ul me-2"></i> <strong>Senarai Topik</strong></h6>
                            </div>

                            <?php foreach ($cluster as $clust) { ?>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="heading<?= $clust['ctm_code']; ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $clust['ctm_code']; ?>" aria-expanded="false" aria-controls="collapse<?= $clust['ctm_code']; ?>">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-folder me-2"></i>
                                                <span><?= $clust['ctm_desc']; ?></span>
                                            </div>
                                        </button>
                                    </h5>

                                    <div id="collapse<?= $clust['ctm_code']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $clust['ctm_code']; ?>" data-bs-parent="#accordionRental">
                                        <div class="accordion-body">
                                            <!-- Search box for this cluster -->
                                            <div class="topic-search-container">
                                                <div class="search-box">
                                                    <i class="fas fa-search search-icon"></i>
                                                    <input type="text" class="form-control topic-search"
                                                        placeholder="Cari topik..."
                                                        data-cluster="<?= $clust['ctm_code']; ?>">
                                                </div>
                                            </div>

                                            <!-- Topics container with pagination -->
                                            <div class="topics-container" id="topics-<?= $clust['ctm_code']; ?>">
                                                <?php
                                                $topicsInCluster = [];
                                                foreach ($topik_main as $topik) {
                                                    if ($topik['tm_ctm_id'] == $clust['ctm_id']) {
                                                        $topicsInCluster[] = $topik;
                                                    }
                                                }

                                                // We'll show only first page initially
                                                $itemsPerPage = 5;
                                                $totalTopics = count($topicsInCluster);
                                                $totalPages = ceil($totalTopics / $itemsPerPage);

                                                for ($i = 0; $i < min($itemsPerPage, $totalTopics); $i++) {
                                                    $topik = $topicsInCluster[$i];
                                                ?>
                                                    <div class="topic-item" data-topic-id="<?= $topik['tm_id']; ?>">
                                                        <span class="form-control"><?= $topik['tm_desc']; ?></span>
                                                        <div class="topic-actions">
                                                            <a class="btn btn-sm text-info" href="<?= route_to('dskpn_by_topic', $topik['tm_id']) ?>"
                                                                title="Lihat">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <!-- Loading indicator -->
                                                <div class="topic-loader" id="loader-<?= $clust['ctm_code']; ?>">
                                                    <div class="spinner"></div>
                                                    <p>Memuat...</p>
                                                </div>
                                            </div>

                                            <!-- Pagination controls -->
                                            <?php if ($totalTopics > $itemsPerPage) { ?>
                                                <div class="pagination-controls">
                                                    <span class="pagination-info">
                                                        Menunjukkan 1-<?= min($itemsPerPage, $totalTopics) ?> daripada <?= $totalTopics ?> topik
                                                    </span>
                                                    <ul class="pagination">
                                                        <li class="page-item disabled" data-cluster="<?= $clust['ctm_code']; ?>" data-page="prev">
                                                            <a class="page-link" href="javascript:void(0)">
                                                                <i class="fas fa-chevron-left"></i>
                                                            </a>
                                                        </li>

                                                        <?php for ($page = 1; $page <= min(3, $totalPages); $page++) { ?>
                                                            <li class="page-item <?= ($page == 1) ? 'active' : '' ?>"
                                                                data-cluster="<?= $clust['ctm_code']; ?>"
                                                                data-page="<?= $page ?>">
                                                                <a class="page-link" href="javascript:void(0)"><?= $page ?></a>
                                                            </li>
                                                        <?php } ?>

                                                        <?php if ($totalPages > 3) { ?>
                                                            <li class="page-item disabled">
                                                                <a class="page-link" href="javascript:void(0)">...</a>
                                                            </li>
                                                            <li class="page-item"
                                                                data-cluster="<?= $clust['ctm_code']; ?>"
                                                                data-page="<?= $totalPages ?>">
                                                                <a class="page-link" href="javascript:void(0)"><?= $totalPages ?></a>
                                                            </li>
                                                        <?php } ?>

                                                        <li class="page-item" data-cluster="<?= $clust['ctm_code']; ?>" data-page="next">
                                                            <a class="page-link" href="javascript:void(0)">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php else : ?>
                        <div class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>Tiada data yang didaftarkan bagi tahun yang dipilih</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Store all topics in a JavaScript object for client-side search and pagination
    const topicsData = {};

    <?php foreach ($cluster as $clust) { ?>
        topicsData['<?= $clust['ctm_code']; ?>'] = [
            <?php foreach ($topik_main as $topik) {
                if ($topik['tm_ctm_id'] == $clust['ctm_id']) { ?> {
                        id: <?= $topik['tm_id']; ?>,
                        desc: "<?= addslashes($topik['tm_desc']); ?>",
                        viewUrl: "<?= route_to('dskpn_by_topic', $topik['tm_id']); ?>"
                    },
            <?php }
            } ?>
        ];
    <?php } ?>

    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            width: '100%',
            dropdownCssClass: 'select2-dropdown'
        });

        // Update the search box HTML first (replace in your PHP file)
        const searchBoxHtml = `
<div class="search-box">
    <i class="fas fa-search search-icon"></i>
    <input type="text" class="form-control topic-search" 
           placeholder="Cari topik..." 
           data-cluster="<?= $clust['ctm_code']; ?>">
    <button type="button" class="btn-close search-clear" aria-label="Close" style="position: absolute; right: 12px; top: 12px; display: none;"></button>
</div>
`;

        // Add this to your document.ready function
        let searchTimeouts = {};


        // Topic search functionality with debounce
        $('.topic-search').on('input', function() {
            const clusterCode = $(this).data('cluster');
            const searchTerm = $(this).val().toLowerCase();

            // Show/hide clear button
            const clearBtn = $(this).siblings('.search-clear');
            if (searchTerm.length > 0) {
                clearBtn.show();
            } else {
                clearBtn.hide();
            }

            // Clear existing timeout if any
            if (searchTimeouts[clusterCode]) {
                clearTimeout(searchTimeouts[clusterCode]);
            }

            // Add loading indicator
            $(`#loader-${clusterCode}`).show();

            // Set a new timeout (300ms debounce)
            searchTimeouts[clusterCode] = setTimeout(() => {
                if (topicsData[clusterCode]) {
                    // Filter topics based on search term
                    const filteredTopics = searchTerm ?
                        topicsData[clusterCode].filter(topic =>
                            topic.desc.toLowerCase().includes(searchTerm)
                        ) :
                        topicsData[clusterCode];

                    // Render the first page of filtered results
                    renderTopicsPage(clusterCode, filteredTopics, 1);

                    // Update pagination
                    updatePagination(clusterCode, filteredTopics.length);

                    // Hide loading indicator
                    $(`#loader-${clusterCode}`).hide();
                }
            }, 300);
        });


        // Add click handler for search clear button
        $(document).on('click', '.search-clear', function() {
            const searchInput = $(this).siblings('.topic-search');
            const clusterCode = searchInput.data('cluster');

            // Clear the input
            searchInput.val('');
            $(this).hide();

            // Show loading indicator
            $(`#loader-${clusterCode}`).show();

            // Reset search results
            setTimeout(() => {
                // Render all topics (first page)
                renderTopicsPage(clusterCode, topicsData[clusterCode], 1);

                // Update pagination
                updatePagination(clusterCode, topicsData[clusterCode].length);

                // Hide loading indicator
                $(`#loader-${clusterCode}`).hide();
            }, 100);
        });
        // Pagination click handler
        $(document).on('click', '.page-item:not(.disabled)', function() {
            const clusterCode = $(this).data('cluster');
            const page = $(this).data('page');

            if (!page) return;

            // Get currently filtered topics (if any search is active)
            const searchTerm = $(`input[data-cluster="${clusterCode}"]`).val().toLowerCase();
            const filteredTopics = searchTerm ?
                topicsData[clusterCode].filter(topic =>
                    topic.desc.toLowerCase().includes(searchTerm)
                ) :
                topicsData[clusterCode];

            let targetPage = page;

            // Handle next/prev navigation
            if (page === 'next' || page === 'prev') {
                const currentPage = parseInt($(`li.page-item.active[data-cluster="${clusterCode}"]`).data('page'));
                const totalPages = Math.ceil(filteredTopics.length / 5);

                if (page === 'next' && currentPage < totalPages) {
                    targetPage = currentPage + 1;
                } else if (page === 'prev' && currentPage > 1) {
                    targetPage = currentPage - 1;
                } else {
                    return; // Don't do anything if at first/last page
                }
            }

            // Render the selected page
            renderTopicsPage(clusterCode, filteredTopics, targetPage);

            // Update active page in pagination
            $(`li.page-item[data-cluster="${clusterCode}"]`).removeClass('active');
            $(`li.page-item[data-cluster="${clusterCode}"][data-page="${targetPage}"]`).addClass('active');

            // Enable/disable prev/next buttons
            const totalPages = Math.ceil(filteredTopics.length / 5);
            $(`li.page-item[data-cluster="${clusterCode}"][data-page="prev"]`)
                .toggleClass('disabled', targetPage === 1);
            $(`li.page-item[data-cluster="${clusterCode}"][data-page="next"]`)
                .toggleClass('disabled', targetPage === totalPages);

            // Update the "showing X of Y" text
            const start = (targetPage - 1) * 5 + 1;
            const end = Math.min(targetPage * 5, filteredTopics.length);
            $(`#collapse${clusterCode} .pagination-info`).text(
                `Menunjukkan ${start}-${end} daripada ${filteredTopics.length} topik`
            );
        });

        // Show loading state when accordion opens
        $('.accordion-button').on('click', function() {
            const target = $(this).attr('data-bs-target');
            const clusterCode = target.replace('#collapse', '');

            if ($(this).hasClass('collapsed')) {
                // Accordion is opening
                $(`#loader-${clusterCode}`).show();

                // Simulate loading (in real implementation, you might be loading data via AJAX)
                setTimeout(() => {
                    $(`#loader-${clusterCode}`).hide();
                }, 300);
            }
        });
    });

    // Function to render a specific page of topics
    function renderTopicsPage(clusterCode, topics, page) {
        const itemsPerPage = 5;
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, topics.length);
        const topicsContainer = $(`#topics-${clusterCode}`);

        // Clear existing topics AND empty state messages
        topicsContainer.find('.topic-item, .empty-state').remove();

        // Show "no results" message if no topics found
        if (topics.length === 0) {
            topicsContainer.prepend(`
            <div class="empty-state">
                <i class="fas fa-search"></i>
                <p>Tiada topik ditemui</p>
            </div>
        `);
            return;
        }

        // Add topics for this page
        for (let i = startIndex; i < endIndex; i++) {
            const topic = topics[i];
            const topicHtml = `
            <div class="topic-item" data-topic-id="${topic.id}">
                <span class="form-control">${topic.desc}</span>
                <div class="topic-actions">
                    <a class="btn btn-sm text-info" href="${topic.viewUrl}" title="Lihat">
                        <i class="far fa-eye"></i>
                    </a>
                </div>
            </div>
        `;
            topicsContainer.prepend(topicHtml);
        }
    }

    // Function to update pagination controls
    function updatePagination(clusterCode, totalItems) {
        const itemsPerPage = 5; // Fixed the typo here (was a5)
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const paginationContainer = $(`#collapse${clusterCode} .pagination`);

        // Update "showing X of Y" text
        const start = totalItems > 0 ? 1 : 0;
        const end = Math.min(itemsPerPage, totalItems);
        $(`#collapse${clusterCode} .pagination-info`).text(
            `Menunjukkan ${start}-${end} daripada ${totalItems} topik`
        );

        // Clear existing page items (except prev/next)
        paginationContainer.find('li.page-item:not([data-page="prev"]):not([data-page="next"])').remove();

        // Disable pagination if no results or only one page
        if (totalPages <= 1) {
            paginationContainer.find('li.page-item[data-page="prev"]').addClass('disabled');
            paginationContainer.find('li.page-item[data-page="next"]').addClass('disabled');

            if (totalPages === 1) {
                // Add single page
                const pageItem = `
                <li class="page-item active" data-cluster="${clusterCode}" data-page="1">
                    <a class="page-link" href="javascript:void(0)">1</a>
                </li>
            `;
                paginationContainer.find('li.page-item[data-page="prev"]').after(pageItem);
            }
            return;
        }

        // Enable next button, disable prev (we're on page 1)
        paginationContainer.find('li.page-item[data-page="prev"]').addClass('disabled');
        paginationContainer.find('li.page-item[data-page="next"]').removeClass('disabled');

        // Create page items
        let pageItems = '';

        // Always show page 1
        pageItems += `
        <li class="page-item active" data-cluster="${clusterCode}" data-page="1">
            <a class="page-link" href="javascript:void(0)">1</a>
        </li>
    `;

        // If more than 5 pages, use ellipsis
        if (totalPages <= 5) {
            for (let i = 2; i <= totalPages; i++) {
                pageItems += `
                <li class="page-item" data-cluster="${clusterCode}" data-page="${i}">
                    <a class="page-link" href="javascript:void(0)">${i}</a>
                </li>
            `;
            }
        } else {
            // Show pages 2 and 3
            pageItems += `
            <li class="page-item" data-cluster="${clusterCode}" data-page="2">
                <a class="page-link" href="javascript:void(0)">2</a>
            </li>
            <li class="page-item" data-cluster="${clusterCode}" data-page="3">
                <a class="page-link" href="javascript:void(0)">3</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)">...</a>
            </li>
            <li class="page-item" data-cluster="${clusterCode}" data-page="${totalPages}">
                <a class="page-link" href="javascript:void(0)">${totalPages}</a>
            </li>
        `;
        }

        // Insert page items between prev and next buttons
        paginationContainer.find('li.page-item[data-page="prev"]').after(pageItems);
    }
</script>

<!-- Hidden modals from original code preserved -->
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
        <!-- Hidden form content preserved from original -->
    </form>
</div>

<!-- Sweet Alert handling (preserved from original) -->
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