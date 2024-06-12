<style>
    .select2-container--open .select2-dropdown {
        z-index: 9999 !important;
        left: 0;
    }

    .dt-container .dt-paging .dt-paging-button {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: #8392ab !important;
        padding: 0 !important;
        margin: 0 3px !important;
        border: 1px solid #dee2e6 !important;
        border-radius: 50% !important;
        width: 36px !important;
        height: 36px !important;
        font-size: .875rem !important;
        background: #fff !important;
        margin-left: 0 !important;
    }

    .dt-container .dt-paging .dt-paging-button:hover {
        background: rgba(131, 146, 171, 0.2) !important;
    }

    div.dt-container .dt-paging .dt-paging-button.current,
    div.dt-container .dt-paging .dt-paging-button.current:hover {
        background: transparent !important;
        background-image: linear-gradient(310deg, #7928ca, #ff0080) !important;
        box-shadow: 0 3px 5px -1px rgba(0, 0, 0, .09), 0 2px 3px -1px rgba(0, 0, 0, .07) !important;
        color: #fff !important;
        border: none !important;
        border-radius: 50% !important;
    }

    div.dt-container div.dt-layout-row {
        display: table !important;
        clear: both !important;
        width: 100% !important;
    }

    .dt-layout-row {
        padding: 20px !important;
    }

    .dt-info {
        color: #8392ab !important;
        font-size: .875rem !important;
    }

    .dt-length>label {
        color: #8392ab !important;
        font-size: .875rem !important;
        font-weight: 400 !important;
    }

    .dt-input {
        border-color: #e9ecef !important;
        border-radius: .25rem !important;
    }

    div.dt-container div.dt-layout-cell.dt-end {
        text-align: right !important;
    }

    div.dt-container div.dt-layout-cell.dt-start {
        text-align: left !important;
    }

    div.dt-container div.dt-layout-cell {
        display: table-cell !important;
        vertical-align: middle !important;
        padding: 5px 0 !important;
    }

    /* More specific selector to override the default style */
    div.dt-container div.dt-paging button.dt-paging-button,
    div.dt-container div.dt-paging button.dt-paging-button:hover {
        color: rgba(0, 0, 0, 0.5) !important;
        /* Set color to black */
    }

    /* Ensure the current button has white color */
    div.dt-container div.dt-paging button.dt-paging-button.current,
    div.dt-container div.dt-paging button.dt-paging-button.current:hover {
        color: #fff !important;
        /* Set color to white */
    }

    table.dataTable>tbody>tr:hover {
        box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.082);
        box-shadow: inset 0 0 0 9999px rgba(var(--dt-row-hover), 0.082);
    }

    div.dt-container .dt-paging .dt-paging-button {
        box-sizing: border-box !important;
        display: inline-block !important;
        min-width: 1.5em !important;
        padding: 0.5em 1em !important;
        margin-left: 2px !important;
        text-align: center !important;
    }

    div.dt-paging-button {
        color: #7928ca !important;
    }

    .dt-paging {
        color: #fff !important;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">MAKLUMAT DSKPN</h6>
        </div>
        <div class="card-body mb-4 py-2">
            <di class="row">
                <div class="col-md-6">
                    <div class="d-flex flex-column h-100 mb-2">
                        <p class="mb-1 pt-2 text-bold">Pilih Kluster</p>
                        <select disabled name="kluster" id="kluster-selection" class="form-control select2" aria-label="Default select example">
                            <option selected value="<?= $topic['cm_id'] ?>"><?= $topic['cm_desc'] ?></option>
                            <?php foreach ($kluster as $item) { ?>
                                <option value="<?= $item['cm_id']; ?>"><?= $item['cm_desc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column h-100 mb-2">
                        <p class="mb-1 pt-2 text-bold">Pilih Topik</p>
                        <select disabled name="topik" id="topik-dynamic-field" class="form-control select2" aria-label="Default select example">
                            <option selected value="<?= $topic['tm_id'] ?>"><?= $topic['tm_desc'] ?></option>
                        </select>
                    </div>
                </div>
            </di>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">SENARAI DSKPN</h6>

            <?php if ($register_subject_status == true) : ?>
                <a href="<?= route_to('create_dskpn', $topic['tm_id']) ?>" id="add-dskpn-button" class="btn bg-gradient-info" style="margin-bottom:0 !important">
                    Tambah Topik Dskpn&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5.5 0 0 0 1 0v-3h3a.5.5.5 0 0 0 0-1h-3z"></path>
                    </svg>
                </a>
            <?php else : ?>
                <button class="btn bg-gradient-info" type="button" data-bs-toggle="modal" data-bs-target="#clusterSubjectMappingModal">
                    Tambah Topik Dskpn&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5.5 0 0 0 1 0v-3h3a.5.5.5 0 0 0 0-1h-3z"></path>
                    </svg>
                </button>
            <?php endif ?>

        </div>

        <table class="table table-flush dataTable-table" id="datatable-basic">
            <thead class="thead-light">
                <tr>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">KOD DSKPN</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">TEMA</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 15%; text-align: left;">SUB-TEMA</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">STATUS</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 30%; text-align: left;">PENYEDIA</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 30%; text-align: left;">PENGESAH</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dskpn as $dskpnItem) : ?>
                    <tr>
                        <td class="text-m font-weight-normal"><?= esc($dskpnItem['dskpn_code']) ?></td>
                        <td class="text-m font-weight-normal">
                            <?php if (!function_exists('get_dskpn_tema')) {
                                helper('dskpn_helper');
                            } ?>
                            <?= get_dskpn_tema($dskpnItem['dskpn_theme']) ?>
                        </td>
                        <td class="text-m font-weight-normal"><?= esc($dskpnItem['dskpn_sub_theme']) ?></td>
                        <?php if (!function_exists('get_dskpn_status')) {
                            helper('dskpn_helper');
                        } ?>
                        <td class="text-m font-weight-normal"><?= get_dskpn_status($dskpnItem['dskpn_status']) ?></td>
                        <?php if (!function_exists('get_user_name')) {
                            helper('dskpn_helper');
                        } ?>
                        <td class="text-m font-weight-normal" style="text-align: left;"><?= get_user_name($dskpnItem['created_by']) ?></td>
                        <td class="text-m font-weight-normal" style="text-align: left;"><?= get_user_name($dskpnItem['approved_by']) ?></td>
                        <td class="text-m font-weight-normal">
                            <div class="col-2 text-info" style="display: inline-block;">
                                <a href="<?= route_to('dskpn_view', esc($dskpnItem['dskpn_id'])) ?>" class="dropdown-item"><i class="fa fa-eye"></i></a>
                            </div>
                            &nbsp;&nbsp;
                            <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $dskpnItem['dskpn_id']; ?>').remove(); deleteDskpn(<?= $dskpnItem['dskpn_id']; ?>);">
                                <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>


<div style="position : absolute; top : 0px; right : 0px; width: 100%; height: 100%; z-index : 3; display : none;" id="loading-screen">
    <dotlottie-player style="position : fixed; right : -100px; top : 20px; z-index : 3;" src="https://lottie.host/82b8666a-afa5-4659-8a0e-6faedb04158f/vlZwAM82T0.json" background="transparent" speed="1" style="width: 500px; height: 500px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
    <div style="position : absolute; width : 100%; height : 100%; background-color : black; opacity : 0.2;"></div>
</div>

<div class="modal fade" id="clusterSubjectMappingModal" tabindex="-1" aria-labelledby="clusterSubjectMappingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Sila Daftarkan Subjek bagi Kluster:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rejectForm" action="<?= route_to('store_cluster_subject_mapping') ?>" method="post">

                    <input type="text" name="cm_id" value="<?= $topic['cm_id'] ?>" hidden>
                    <input type="text" name="tm_id" value="<?= $topic['tm_id'] ?>" hidden>
                    <div class="row pb-4" id="standard-pembelajaran">
                        <span style="color : red;" id="hinting-no-subject">Hint : Anda masih belum menambah subjek</span>

                    </div>
                    <div class="text-end">
                        <span id="add-subject-btn" class="btn bg-gradient-info" style="margin-bottom:0 !important">Tambah Subjek&nbsp;&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                            </svg>
                        </span>
                        <button id="submit-btn" class="btn bg-gradient-info m-0" type="submit" style="display: none;">Simpan&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"></path>
                                <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize select2 for existing elements
        $('.select2').select2();

        let counter = 0; // Initialize a counter outside of the click handler

        // Listener for add subject button
        $('#add-subject-btn').on('click', function() {
            try {
                document.getElementById("hinting-no-subject").style.display = "none";
            } catch (err) {
                // Do nothing
            }

            let subjects = <?= json_encode($subjects) ?>; // Pass PHP variable to JavaScript
            let options = '';
            subjects.forEach(function(subject) {
                options += `<option value="${subject.sm_id}">${subject.sm_desc}</option>`;
            });

            counter++; // Increment the counter

            $('#standard-pembelajaran').append(`
                <div class="col-md-12 subject-card">
                    <div class="card mt-4">
                        <div class="d-flex p-2 bg-gradient-primary">
                            <select id="subject-${counter}" name="subject[]" class="form-control select2" placeholder="Tajuk Subjek" required>
                                <option value="" selected disabled>--Select Subject--</option>
                                ${options}
                            </select>
                            <button type="button" style="margin-bottom:0 !important;" class="btn btn-link text-white ms-auto delete-subject">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `);

            // Initialize Select2 on the new select element
            $(`#subject-${counter}`).select2();
        });

        // Show the submit button after adding a subject
        $('#add-subject-btn').on('click', function() {
            try {
                document.getElementById("submit-btn").style.display = "inline";
            } catch (err) {
                // Do nothing
            }
        });

        // Attach a delegated event listener for the delete buttons
        $(document).on('click', '.delete-subject', function() {
            $(this).closest('.subject-card').remove();
        });

        $('#datatable-basic').DataTable();

    });
</script>