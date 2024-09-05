<style>
    .select2-container--open .select2-dropdown {
        z-index: 9999 !important;
        left: 0;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
            <h6 class="my-auto text-white"><b>MAKLUMAT DSKPN</b></h6>
        </div>
        <div class="card-body mb-4 py-2">
            <di class="row">
                <div class="col-md-6">
                    <div class="d-flex flex-column h-100 mb-2">
                        <p class="mb-1 pt-2 text-bold">Kluster</p>
                        <select disabled name="kluster" id="kluster-selection" class="form-control select2" aria-label="Default select example">
                            <option selected value="<?= $topic['tm_ctm_id'] ?>"><?= $topic['tm_desc'] ?></option>
                            <?php foreach ($kluster as $item) { ?>
                                <option value="<?= $item['ctm_id']; ?>"><?= $item['ctm_desc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column h-100 mb-2">
                        <p class="mb-1 pt-2 text-bold">Topik</p>
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
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
            <h6 class="my-auto text-white"><b>SENARAI DSKPN</b></h6>

            <?php if ($register_subject_status == true) : ?>
                <a href="<?= route_to('create_dskpn', $topic['tm_id']) ?>" id="add-dskpn-button" class="btn bg-info text-white" style="margin-bottom:0 !important">
                    Tambah Topik Dskpn&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                    </svg>
                </a>
            <?php else : ?>
                <button class="btn bg-info" type="button" data-bs-toggle="modal" data-bs-target="#clusterSubjectMappingModal">
                    Tambah Topik Dskpn&nbsp;&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
                    </svg>
                </button>
            <?php endif ?>

        </div>
        <br>
        <table class="table table-flush dataTable-table" id="datatable-basic">
            <thead class="thead-light">
                <tr>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">KOD DSKPN</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">TEMA</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 20%; text-align: left;">SUB-TEMA</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">STATUS</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 25%; text-align: left;">PENYEDIA</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 25%; text-align: left;">PENGESAH</th>
                    <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1;
                foreach ($dskpn as $dskpnItem) : ?>
                    <tr>
                        <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                        <td class="text-m font-weight-normal"><?= esc($dskpnItem['dskpn_code']) ?></td>
                        <td class="text-m font-weight-normal">
                            <?php if (!function_exists('get_dskpn_tema')) {
                                helper('dskpn_helper');
                            } ?>
                            <?= get_dskpn_tema($dskpnItem['dskpn_theme']) ?>
                        </td>
                        <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($dskpnItem['dskpn_sub_theme']) ?></td>
                        <?php if (!function_exists('get_dskpn_status')) {
                            helper('dskpn_helper');
                        } ?>
                        <td class="text-m font-weight-normal" style="text-align: left;"><?= get_dskpn_status($dskpnItem['dskpn_status']) ?></td>
                        <?php if (!function_exists('get_user_name')) {
                            helper('dskpn_helper');
                        } ?>
                        <td class="text-m font-weight-normal" style="text-align: left;"><?= get_user_name($dskpnItem['dskpn_created_by']) ?></td>
                        <td class="text-m font-weight-normal" style="text-align: left;"><?= get_user_name($dskpnItem['dskpn_approved_by']) ?></td>
                        <td class="text-m font-weight-normal">
                            <div class="col-2 text-info" style="display: inline-block;">
                                <a href="<?= route_to('dskpn_view', esc($dskpnItem['dskpn_id'])) ?>" class="dropdown-item"><i class="fa fa-eye"></i></a>
                            </div>
                            &nbsp;&nbsp;

                            <?php
                            $both_roles = [
                                'GURU_BESAR',
                                'PENYELARAS'
                            ];
                            if ((get_user_role() == $both_roles[1]) && ($dskpnItem['dskpn_status'] != 3)): ?>
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="requestToDeleteDSKPN(<?= $dskpnItem['dskpn_id']; ?>)">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ((get_user_role() == $both_roles[0]) && ($dskpnItem['dskpn_status'] == 3 || $dskpnItem['dskpn_status'] == 4)): ?>
                                &nbsp;&nbsp;
                                <a class="btn btn-danger px-1 mb-0" style="height: 30px;" href="javascript:void(0)" onclick="deleteDSKPN(<?= $dskpnItem['dskpn_id']; ?>)">
                                    <span style="position : relative; top : -5px;">&nbsp;&nbsp;Sah Padam&nbsp;&nbsp;</span>
                                </a>
                            <?php endif; ?>
                            <!-- <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $dskpnItem['dskpn_id']; ?>').remove(); deleteDSKPN(<?= $dskpnItem['dskpn_id']; ?>);">
                                <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                            </a> -->
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

                    <input type="text" name="cm_id" value="<?= $topic['tm_ctm_id'] ?>" hidden>
                    <input type="text" name="tm_id" value="<?= $topic['tm_id'] ?>" hidden>
                    <div class="row pb-4" id="standard-pembelajaran">
                        <span style="color : red;" id="hinting-no-subject">Hint : Anda masih belum menambah subjek</span>

                    </div>
                    <div class="text-end">
                        <button type="button" class="btn bg-secondary" style="margin-bottom:0 !important" data-bs-dismiss="modal">Batal</button>
                        <span id="add-subject-btn" class="btn bg-info" style="margin-bottom:0 !important">Tambah Subjek&nbsp;&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                            </svg>
                        </span>
                        <button id="submit-btn" class="btn bg-info m-0" type="submit" style="display: none;">Simpan&nbsp;
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
    const req_delete_dskpn_endpoint = '<?= route_to('req_delete_dskpn'); ?>';
    const delete_dskpn_endpoint = '<?= route_to('delete_dskpn'); ?>';
    const reject_delete_dskpn_endpoint = '<?= route_to('reject_delete_dskpn'); ?>';
    const get_to_delete_reason = '<?= route_to('delete_dskpn_reason'); ?>';

    $(document).ready(function() {
        // Initialize select2 for existing elements
        $('.select2').select2();
        $('#datatable-basic').DataTable();
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
                options += `<option value="${subject.sbm_id}">${subject.sbm_desc}</option>`;
            });

            counter++; // Increment the counter

            $('#standard-pembelajaran').append(`
                <div class="col-md-12 subject-card">
                    <div class="card mt-4">
                        <div class="d-flex p-2 bg-primary">
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
    });
</script>