<style>
    :root {
        --primary-color: #613673;
        --secondary-color: #5e72e4;
        --text-color: #344767;
        --light-bg: #f8f9fa;
        --border-radius: 0.5rem;
        --box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.05);
        --transition: all 0.3s ease;
    }

    .select2-container {
        z-index: 1060 !important;
    }

    .modal {
        z-index: 1050;
    }

    .modal-backdrop {
        z-index: 1040;
    }

    .row {
        padding: 20px !important;
    }

    /* Enhanced Tabs styling */
    .nav-tabs {
        border-bottom: 2px solid #eee;
        margin-bottom: 1.5rem;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: hidden;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */
    }

    .nav-tabs::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, Opera */
    }

    .nav-tabs .nav-item {
        margin-bottom: -2px;
        flex: 0 0 auto;
    }

    .nav-tabs .nav-link {
        border: none;
        color: var(--text-color);
        font-weight: 600;
        padding: 0.85rem 1.5rem;
        border-radius: 0.35rem 0.35rem 0 0;
        transition: var(--transition);
        background-color: rgba(240, 242, 245, 0.4);
        margin-right: 0.25rem;
        position: relative;
        display: flex;
        align-items: center;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .nav-tabs .nav-link:hover {
        color: var(--primary-color);
        background-color: rgba(240, 242, 245, 0.8);
    }

    .nav-tabs .nav-link.active {
        color: var(--primary-color);
        border-bottom: 2px solid var(--primary-color);
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        font-weight: 700;
    }

    .nav-tabs .nav-link .year-icon {
        margin-right: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background-color: rgba(97, 54, 115, 0.1);
        color: var(--primary-color);
    }

    .nav-tabs .nav-link.active .year-icon {
        background-color: var(--primary-color);
        color: white;
    }

    /* Table improvements */
    .table-responsive {
        overflow-x: auto;
        width: 100%;
    }

    .topic-table {
        width: 100% !important;
        margin-bottom: 0;
    }

    .topic-table th {
        background-color: rgba(97, 54, 115, 0.05);
        font-weight: 600;
        border-top: none;
        white-space: nowrap;
    }

    .topic-table tr:nth-child(even) {
        background-color: rgba(248, 249, 250, 0.7);
    }

    .topic-table tr:hover {
        background-color: rgba(97, 54, 115, 0.03);
    }

    .table-header {
        background-color: rgba(97, 54, 115, 0.05);
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
        color: var(--primary-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-header .year-badge {
        background-color: var(--primary-color);
        color: white;
        padding: 0.35rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* Improved modal forms */
    .modal-form-group {
        margin-bottom: 1.25rem;
    }

    .modal-form-group label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: block;
    }

    /* Tab content transition */
    .tab-content>.tab-pane {
        transition: all 0.3s ease;
        padding: 0.5rem 0.25rem;
    }

    /* Enhanced DataTables styling */
    .topic-table-controls {
        margin-bottom: 1.5rem;
    }

    /* Action buttons */
    .action-icon {
        border-radius: 0.4rem;
        transition: var(--transition);
    }

    .action-icon:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Enhanced Tab Navigation with scroll indicators */
    .nav-tabs-wrapper {
        position: relative;
        overflow: hidden;
    }

    .nav-tabs {
        border-bottom: 2px solid #eee;
        margin-bottom: 1.5rem;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: hidden;
        scrollbar-width: thin;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        -webkit-overflow-scrolling: touch;
        padding-bottom: 5px;
    }

    .nav-tabs::-webkit-scrollbar {
        height: 4px;
        background-color: #f0f0f0;
    }

    .nav-tabs::-webkit-scrollbar-thumb {
        background-color: #613673;
        border-radius: 4px;
    }

    /* Scroll indicators */
    .scroll-indicator {
        position: absolute;
        top: 0;
        height: 100%;
        width: 25px;
        display: none;
        align-items: center;
        justify-content: center;
        color: #613673;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.5) 100%);
        cursor: pointer;
        z-index: 1;
        border: none;
    }

    .scroll-indicator.left {
        left: 0;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.5) 100%);
    }

    .scroll-indicator.right {
        right: 0;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.5) 0%, rgba(255, 255, 255, 0.9) 100%);
    }

    /* Add active class to show indicators when needed */
    .scroll-indicator.active {
        display: flex;
    }
</style>

<div class="container-fluid py-4">

    <!-- Main Card -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
            <h5 class="my-auto text-white fw-bold m-0">TOPIK</h5>
            <button type="button" class="btn bg-info text-white m-0" data-bs-toggle="modal" data-bs-target="#addClusterModal">
                <i class="fas fa-plus-circle me-2"></i>Tambah Topik
            </button>
        </div>
        <div class="card-body">
            <!-- Enhanced Tabs Navigation -->
            <ul class="nav nav-tabs" id="topicTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">
                        <i class="fas fa-layer-group me-2"></i>Semua
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year1-tab" data-bs-toggle="tab" data-bs-target="#year1-tab-pane" type="button" role="tab" aria-controls="year1-tab-pane" aria-selected="false">
                        Tahun &nbsp; <span class="year-icon">1</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year2-tab" data-bs-toggle="tab" data-bs-target="#year2-tab-pane" type="button" role="tab" aria-controls="year2-tab-pane" aria-selected="false">
                        Tahun &nbsp; <span class="year-icon">2</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year3-tab" data-bs-toggle="tab" data-bs-target="#year3-tab-pane" type="button" role="tab" aria-controls="year3-tab-pane" aria-selected="false">
                        Tahun &nbsp; <span class="year-icon">3</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year4-tab" data-bs-toggle="tab" data-bs-target="#year4-tab-pane" type="button" role="tab" aria-controls="year4-tab-pane" aria-selected="false">
                        Tahun &nbsp; <span class="year-icon">4</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year5-tab" data-bs-toggle="tab" data-bs-target="#year5-tab-pane" type="button" role="tab" aria-controls="year5-tab-pane" aria-selected="false">
                        Tahun &nbsp; <span class="year-icon">5</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year6-tab" data-bs-toggle="tab" data-bs-target="#year6-tab-pane" type="button" role="tab" aria-controls="year6-tab-pane" aria-selected="false">
                        Tahun &nbsp; <span class="year-icon">6</span>
                    </button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content" id="topicTabsContent">
                <!-- All Topics Tab -->
                <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table topic-table" id="allTopicsTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%">BIL</th>
                                    <th style="width: 10%">TAHUN</th>
                                    <th>KLUSTER</th>
                                    <th>TOPIK</th>
                                    <th class="text-center" style="width: 10%">TINDAKAN</th>
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
                                        <td><?= $counter++; ?></td>
                                        <td><?= esc($numbers[$topic['tm_year']]) ?></td>
                                        <td><?= esc($topic['ctm_desc']) ?></td>
                                        <td><?= esc($topic['tm_desc']) ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" title="Klik untuk mengemaskini topik" onclick="openEditTopicModal(<?= $topic['tm_id'] ?>, <?= $topic['tm_year'] ?>, <?= $topic['ctm_id'] ?>, '<?= rawurlencode($topic['tm_desc']) ?>')">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Year 1 Tab -->
                <div class="tab-pane fade" id="year1-tab-pane" role="tabpanel" aria-labelledby="year1-tab" tabindex="0">
                    <div class="table-header">
                        <span>Senarai Topik</span>
                        <span class="year-badge">Tahun 1</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table topic-table" id="year1Table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">BIL</th>
                                    <th>KLUSTER</th>
                                    <th>TOPIK</th>
                                    <th class="text-center" style="width: 10%">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($topics as $topic) :
                                    if ($topic['tm_year'] == 1) : ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= esc($topic['ctm_desc']) ?></td>
                                            <td><?= esc($topic['tm_desc']) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" title="Klik untuk mengemaskini topik" onclick="openEditTopicModal(<?= $topic['tm_id'] ?>, <?= $topic['tm_year'] ?>, <?= $topic['ctm_id'] ?>, '<?= rawurlencode($topic['tm_desc']) ?>')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Year 2 Tab -->
                <div class="tab-pane fade" id="year2-tab-pane" role="tabpanel" aria-labelledby="year2-tab" tabindex="0">
                    <div class="table-header">
                        <span>Senarai Topik</span>
                        <span class="year-badge">Tahun 2</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table topic-table" id="year2Table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">BIL</th>
                                    <th>KLUSTER</th>
                                    <th>TOPIK</th>
                                    <th class="text-center" style="width: 10%">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($topics as $topic) :
                                    if ($topic['tm_year'] == 2) : ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= esc($topic['ctm_desc']) ?></td>
                                            <td><?= esc($topic['tm_desc']) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" title="Klik untuk mengemaskini topik" onclick="openEditTopicModal(<?= $topic['tm_id'] ?>, <?= $topic['tm_year'] ?>, <?= $topic['ctm_id'] ?>, '<?= rawurlencode($topic['tm_desc']) ?>')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Year 3 Tab -->
                <div class="tab-pane fade" id="year3-tab-pane" role="tabpanel" aria-labelledby="year3-tab" tabindex="0">
                    <div class="table-header">
                        <span>Senarai Topik</span>
                        <span class="year-badge">Tahun 3</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table topic-table" id="year3Table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">BIL</th>
                                    <th>KLUSTER</th>
                                    <th>TOPIK</th>
                                    <th class="text-center" style="width: 10%">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($topics as $topic) :
                                    if ($topic['tm_year'] == 3) : ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= esc($topic['ctm_desc']) ?></td>
                                            <td><?= esc($topic['tm_desc']) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" title="Klik untuk mengemaskini topik" onclick="openEditTopicModal(<?= $topic['tm_id'] ?>, <?= $topic['tm_year'] ?>, <?= $topic['ctm_id'] ?>, '<?= rawurlencode($topic['tm_desc']) ?>')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Year 4 Tab -->
                <div class="tab-pane fade" id="year4-tab-pane" role="tabpanel" aria-labelledby="year4-tab" tabindex="0">
                    <div class="table-header">
                        <span>Senarai Topik</span>
                        <span class="year-badge">Tahun 4</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table topic-table" id="year4Table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">BIL</th>
                                    <th>KLUSTER</th>
                                    <th>TOPIK</th>
                                    <th class="text-center" style="width: 10%">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($topics as $topic) :
                                    if ($topic['tm_year'] == 4) : ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= esc($topic['ctm_desc']) ?></td>
                                            <td><?= esc($topic['tm_desc']) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" title="Klik untuk mengemaskini topik" onclick="openEditTopicModal(<?= $topic['tm_id'] ?>, <?= $topic['tm_year'] ?>, <?= $topic['ctm_id'] ?>, '<?= rawurlencode($topic['tm_desc']) ?>')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Year 5 Tab -->
                <div class="tab-pane fade" id="year5-tab-pane" role="tabpanel" aria-labelledby="year5-tab" tabindex="0">
                    <div class="table-header">
                        <span>Senarai Topik</span>
                        <span class="year-badge">Tahun 5</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table topic-table" id="year5Table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">BIL</th>
                                    <th>KLUSTER</th>
                                    <th>TOPIK</th>
                                    <th class="text-center" style="width: 10%">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($topics as $topic) :
                                    if ($topic['tm_year'] == 5) : ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= esc($topic['ctm_desc']) ?></td>
                                            <td><?= esc($topic['tm_desc']) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" title="Klik untuk mengemaskini topik" onclick="openEditTopicModal(<?= $topic['tm_id'] ?>, <?= $topic['tm_year'] ?>, <?= $topic['ctm_id'] ?>, '<?= rawurlencode($topic['tm_desc']) ?>')">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Year 6 Tab -->
                <div class="tab-pane fade" id="year6-tab-pane" role="tabpanel" aria-labelledby="year6-tab" tabindex="0">
                    <div class="table-header">
                        <span>Senarai Topik</span>
                        <span class="year-badge">Tahun 6</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table topic-table" id="year6Table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">BIL</th>
                                    <th>KLUSTER</th>
                                    <th>TOPIK</th>
                                    <th class="text-center" style="width: 10%">TINDAKAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach ($topics as $topic) :
                                    if ($topic['tm_year'] == 6) : ?>
                                        <tr>
                                            <td><?= $counter++; ?></td>
                                            <td><?= esc($topic['ctm_desc']) ?></td>
                                            <td><?= esc($topic['tm_desc']) ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" title="Klik untuk mengemaskini topik" onclick="openEditTopicModal(<?= $topic['tm_id'] ?>, <?= $topic['tm_year'] ?>, <?= $topic['ctm_id'] ?>, '<?= rawurlencode($topic['tm_desc']) ?>')">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Topic Modal (unchanged) -->
<div class="modal fade" id="addClusterModal" tabindex="-1" aria-labelledby="addClusterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="addClusterModalLabel">Tambah Topik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSubjectForm" action="<?= route_to('create_topic'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-form-group">
                        <label for="clusterSelect">Kluster</label>
                        <select style="width:100%;" name="cluster" class="form-control select2" id="kluster" aria-label="Default select example">
                            <option disabled selected>-- Sila Pilih Kluster --</option>
                            <?php foreach ($clusters as $item) { ?>
                                <option value="<?= $item['ctm_id']; ?>"><?= $item['ctm_desc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-form-group">
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
                    <div class="modal-form-group">
                        <label for="yearInput">Topik</label>
                        <input type="text" name="topik" class="form-control" placeholder="Sila Masukkan Topik" id="yearInput" required>
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

<!-- Edit Topic Modal (unchanged) -->
<div class="modal fade" id="editClusterModal" tabindex="-1" aria-labelledby="editClusterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="editClusterModalLabel">Edit Topik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSubjectForm" action="<?= route_to('update_topic'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="text" name="id" id="editIdCluster" required hidden>
                    <div class="modal-form-group">
                        <label for="editKluster">Kluster</label>
                        <select style="width:100%;" name="cluster" class="form-control select2" id="editKluster" aria-label="Default select example">
                            <option disabled selected>-- Sila Pilih Kluster --</option>
                            <?php foreach ($clusters as $item) { ?>
                                <option value="<?= $item['ctm_id']; ?>"><?= $item['ctm_desc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-form-group">
                        <label for="editYearSelect">Tahun</label>
                        <select style="width:100%;" name="year" class="form-control select2" id="editYearSelect" required>
                            <option value="" disabled selected>-- Sila Pilih Tahun --</option>
                            <option value="1">Satu</option>
                            <option value="2">Dua</option>
                            <option value="3">Tiga</option>
                            <option value="4">Empat</option>
                            <option value="5">Lima</option>
                            <option value="6">Enam</option>
                        </select>
                    </div>
                    <div class="modal-form-group">
                        <label for="editTopik">Topik</label>
                        <input type="text" name="editTopik" class="form-control" placeholder="Sila Masukkan Topik" id="editTopik" required>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn bg-info text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            width: '100%',
            dropdownParent: function() {
                return $(this).closest('.modal');
            }
        });

        // Custom DataTables language options (keep your existing ones)
        const languageOptions = {
            search: "Cari:",
            lengthMenu: "Papar _MENU_ rekod",
            info: "Paparan _START_ hingga _END_ daripada _TOTAL_ rekod",
        };

        // Custom DataTables initialization function
        function initializeDataTable(tableId) {
            return $(tableId).DataTable({
                language: languageOptions,
                // dom: '<"topic-table-controls d-flex justify-content-between align-items-center mb-3"<"d-flex align-items-center"l><"d-flex"f>>rt<"topic-pagination mt-3"p>',
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Semua"]
                ],
                // Use your existing order settings where needed
                order: tableId === '#allTopicsTable' ? [
                    [1, 'asc']
                ] : [
                    [0, 'asc']
                ],
                initComplete: function() {
                    // Custom styling for search and length elements
                    $('.dataTables_filter input').addClass('topic-search').attr('placeholder', 'Cari topik...');
                    $('.dataTables_length select').addClass('form-select form-select-sm');

                    // Hide the default search boxes since we're using custom ones
                    $('.dataTables_filter').hide();
                }
            });
        }

        // Initialize all tables using the custom function
        const tables = {
            all: initializeDataTable('#allTopicsTable'),
            year1: initializeDataTable('#year1Table'),
            year2: initializeDataTable('#year2Table'),
            year3: initializeDataTable('#year3Table'),
            year4: initializeDataTable('#year4Table'),
            year5: initializeDataTable('#year5Table'),
            year6: initializeDataTable('#year6Table')
        };
        // Form submission handling for adding a new topic
        $('#addSubjectForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berjaya!',
                            text: response.message,
                            confirmButtonColor: '#3b71ca'
                        }).then(() => {
                            $('#addClusterModal').modal('hide');
                            // Clear form fields
                            $('#addSubjectForm')[0].reset();
                            $('.select2').val(null).trigger('change');
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.message,
                            confirmButtonColor: '#3b71ca'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terdapat ralat!',
                        text: 'Maaf, terdapat masalah teknikal. Sila cuba lagi nanti.',
                        confirmButtonColor: '#3b71ca'
                    });
                    console.log(xhr.responseText);
                }
            });
        });

        // Edit form submission handling
        $('#editSubjectForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berjaya!',
                            text: response.message,
                            confirmButtonColor: '#3b71ca'
                        }).then(() => {
                            $('#editClusterModal').modal('hide');
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.message,
                            confirmButtonColor: '#3b71ca'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terdapat ralat!',
                        text: 'Maaf, terdapat masalah teknikal. Sila cuba lagi nanti.',
                        confirmButtonColor: '#3b71ca'
                    });
                    console.log(xhr.responseText);
                }
            });
        });

        // Initialize modals
        const addClusterModal = new bootstrap.Modal(document.getElementById('addClusterModal'));
        const editClusterModal = new bootstrap.Modal(document.getElementById('editClusterModal'));

        // Reset form when add modal is closed
        $('#addClusterModal').on('hidden.bs.modal', function() {
            $('#addSubjectForm')[0].reset();
            $('#kluster').val(null).trigger('change');
            $('#yearSelect').val(null).trigger('change');
        });
    });

    // Tab scrolling functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Create wrapper for tabs and add scroll indicators
        const tabsNav = document.getElementById('topicTabs');

        // Create wrapper element
        const wrapper = document.createElement('div');
        wrapper.className = 'nav-tabs-wrapper';

        // Create scroll indicators
        const leftIndicator = document.createElement('button');
        leftIndicator.className = 'scroll-indicator left';
        leftIndicator.innerHTML = '<i class="fas fa-chevron-left"></i>';

        const rightIndicator = document.createElement('button');
        rightIndicator.className = 'scroll-indicator right';
        rightIndicator.innerHTML = '<i class="fas fa-chevron-right"></i>';

        // Insert wrapper before tabsNav in the DOM
        tabsNav.parentNode.insertBefore(wrapper, tabsNav);

        // Move tabsNav into wrapper and add indicators
        wrapper.appendChild(leftIndicator);
        wrapper.appendChild(tabsNav);
        wrapper.appendChild(rightIndicator);

        // Function to check scroll position and show/hide indicators
        function checkScroll() {
            // Show left indicator if scrolled to the right
            if (tabsNav.scrollLeft > 0) {
                leftIndicator.classList.add('active');
            } else {
                leftIndicator.classList.remove('active');
            }

            // Show right indicator if there's more content to scroll to
            if (tabsNav.scrollLeft < (tabsNav.scrollWidth - tabsNav.clientWidth - 5)) {
                rightIndicator.classList.add('active');
            } else {
                rightIndicator.classList.remove('active');
            }
        }

        // Initial check
        setTimeout(checkScroll, 100);

        // Event listeners for scroll
        tabsNav.addEventListener('scroll', checkScroll);
        window.addEventListener('resize', checkScroll);

        // Scroll on indicator click
        leftIndicator.addEventListener('click', function() {
            tabsNav.scrollBy({
                left: -100,
                behavior: 'smooth'
            });
        });

        rightIndicator.addEventListener('click', function() {
            tabsNav.scrollBy({
                left: 100,
                behavior: 'smooth'
            });
        });
    });
    // Function to open edit modal
    function openEditTopicModal(tm_id, tm_year, ctm_id, tm_desc) {
        tm_desc = decodeURIComponent(tm_desc);

        // Set values in the edit form
        $('#editIdCluster').val(tm_id);
        $('#editYearSelect').val(tm_year).trigger('change');
        $('#editKluster').val(ctm_id).trigger('change');
        $('#editTopik').val(tm_desc);

        // Show the modal
        $('#editClusterModal').modal('show');
    }
</script>