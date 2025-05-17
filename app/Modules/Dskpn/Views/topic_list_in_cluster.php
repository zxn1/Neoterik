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
                        <div class="tab-container">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 text-center"><i class="fas fa-list-ul me-2"></i> <strong>Senarai Topik</strong></h6>
                            </div>

                            <!-- Tab navigation -->
                            <div class="cluster-tabs">
                                <?php $firstCluster = true;
                                foreach ($cluster as $clust) { ?>
                                    <div class="cluster-tab <?= $firstCluster ? 'active' : ''; ?>"
                                        data-target="tab-<?= $clust['ctm_code']; ?>">
                                        <i class="fas fa-folder"></i>
                                        <?= $clust['ctm_desc']; ?>
                                    </div>
                                <?php $firstCluster = false;
                                } ?>
                            </div>

                            <!-- Tab content -->
                            <?php $firstCluster = true;
                            foreach ($cluster as $clust) { ?>
                                <div class="tab-content <?= $firstCluster ? 'active' : ''; ?>" id="tab-<?= $clust['ctm_code']; ?>">
                                    <!-- Search box for this cluster -->
                                    <div class="topic-search-container">
                                        <div class="search-box">
                                            <i class="fas fa-search search-icon"></i>
                                            <input type="text" class="form-control topic-search"
                                                placeholder="Cari topik..."
                                                data-cluster="<?= $clust['ctm_code']; ?>">
                                            <button type="button" class="btn-close search-clear" aria-label="Close" style="position: absolute; right: 12px; top: 12px; display: none;"></button>
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
                            <?php $firstCluster = false;
                            } ?>
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

        // Tab functionality
        $('.cluster-tab').on('click', function() {
            const targetId = $(this).data('target');

            // Update active tab
            $('.cluster-tab').removeClass('active');
            $(this).addClass('active');

            // Show selected tab content
            $('.tab-content').removeClass('active');
            $('#' + targetId).addClass('active');

            // Show loading indicator for the selected tab
            const clusterCode = targetId.replace('tab-', '');
            $(`#loader-${clusterCode}`).show();

            // Hide loading after a small delay (simulating loading)
            setTimeout(() => {
                $(`#loader-${clusterCode}`).hide();
            }, 300);
        });

        // The rest of your existing code remains the same
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
                const filtered = topicsData[clusterCode].filter(topic => topic.desc.toLowerCase().includes(searchTerm));
                const container = $(`#topics-${clusterCode}`);
                container.empty();

                if (filtered.length === 0) {
                    container.append('<p>Tiada topik dijumpai.</p>');
                } else {
                    filtered.slice(0, 5).forEach(topic => {
                        container.append(`
                <div class="topic-item" data-topic-id="${topic.id}">
                    <span class="form-control">${topic.desc}</span>
                    <div class="topic-actions">
                        <a class="btn btn-sm text-info" href="${topic.viewUrl}" title="Lihat">
                            <i class="far fa-eye"></i>
                        </a>
                    </div>
                </div>
            `);
                    });
                }

                $(`#loader-${clusterCode}`).hide();
            }, 300);

        });

        // Add click handler for search clear button
        $(document).on('click', '.search-clear', function() {
            const searchInput = $(this).siblings('.topic-search');
            const clusterCode = searchInput.data('cluster');

            // Clear the input
            searchInput.val('');
            $(this).hide();
            input.trigger('input'); // Re-trigger the input handler to reset the list
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
            $(`#tab-${clusterCode} .pagination-info`).text(
                `Menunjukkan ${start}-${end} daripada ${filteredTopics.length} topik`
            );
        });

        // Keep the rest of your function definitions the same
    });

    // Function to render a specific page of topics (update the selector from accordion to tab)
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

    // Function to update pagination controls (update the selector from accordion to tab)
    function updatePagination(clusterCode, totalItems) {
        const itemsPerPage = 5;
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const paginationContainer = $(`#tab-${clusterCode} .pagination`);

        // Update "showing X of Y" text
        const start = totalItems > 0 ? 1 : 0;
        const end = Math.min(itemsPerPage, totalItems);
        $(`#tab-${clusterCode} .pagination-info`).text(
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
                            <input type="text" placeholder="Sila Masukkan Kod Kluster" style="text-transform:uppercase;" class="form-control" id="clusterCode" name="ctm_code" required>
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
<script src="<?= base_url('assets/js/AutoTitleCase.js') ?>"></script>
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