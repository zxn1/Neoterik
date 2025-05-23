<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-primary">
            <h6 class="my-auto text-white">Senarai DSKPN yang Didaftarkan</h6>
            <?php if(in_array('ADMIN', get_user_role())): ?>
            <button class="btn btn-primary ms-auto mb-0" data-toggle="modal" data-target="#versioningModal">
                <i class="fas fa-code-branch"></i>&nbsp;&nbsp;Versioning Setting
            </button>
            <?php endif; ?>
        </div>
        <div class="form-check d-flex justify-content-end pe-4 pt-2 pb-2">
            <input class="form-check-input" type="checkbox" value="" onchange="handleCheckboxChange(this)" <?= $owned==true?'checked':''; ?>>
            <label class="form-check-label" for="flexCheckChecked">
                Papar hanya dokumen milik saya.
            </label>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="dskpn_list">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">KOD DSKPN</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 15%; text-align: left;">KLUSTER</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 15%; text-align: left;">TOPIK</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">STATUS</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 22.5%; text-align: left;">PENYEDIA</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 22.5%; text-align: left;">PENGESAH</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;
                    foreach ($dskpn as $clusterItem) : ?>
                        <tr>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= $clusterItem['dskpn_code'] ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($clusterItem['ctm_desc']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($clusterItem['tm_desc']) ?></td>
                            <?php if (!function_exists('get_dskpn_status')) {
                                helper('dskpn_helper');
                            } ?>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= get_dskpn_status($clusterItem['dskpn_status']) ?></td>
                            <?php if (!function_exists('get_user_name')) {
                                helper('dskpn_helper');
                            } ?>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= get_user_name($clusterItem['dskpn_created_by']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= get_user_name($clusterItem['dskpn_approved_by']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;">
                                <div class="col-2 text-info" style="display: inline-block;">
                                    <a href="<?= route_to('dskpn_view', esc($clusterItem['dskpn_id'])) ?>" class="dropdown-item"><i class="fa fa-eye"></i></a>
                                </div>
                                <?php
                                $both_roles = [
                                    'GURU_BESAR',
                                    'PENYELARAS'
                                ];

                                if ((in_array($both_roles[1], get_user_role())) && ($clusterItem['dskpn_status'] != 3)): ?>
                                    &nbsp;&nbsp;
                                    <?php 
                                    $is_draft_url = (($clusterItem['dskpn_status'] == 5) || ($clusterItem['dskpn_status'] == 2))?"?draft=true":""; // if draft and rejected
                                    $tooltip_title = "";
                                    $icon_color = "text-warning";
                                    $url_action = route_to('edit_dskpn_initializer', esc($clusterItem['dskpn_id'])) . $is_draft_url;
                                    if((($clusterItem['dskpn_status'] == 5) || ($clusterItem['dskpn_status'] == 2)) && ($clusterItem['dskpn_created_by'] != session('sm_id')))
                                    {
                                        $url_action = "#";
                                        $icon_color = "text-dark";
                                        $tooltip_title = "Dokumen ini hanya boleh di-Edit oleh " . get_user_name($clusterItem['dskpn_created_by']) . ".";
                                    }
                                    else if(($clusterItem['dskpn_status'] == 5))
                                        $tooltip_title = "Kemas kini bahagian yang masih belum selesai.";
                                    else if(($clusterItem['dskpn_status'] == null) || empty($clusterItem['dskpn_status']))
                                    {
                                        $icon_color = "text-dark";
                                        $url_action = "#";
                                        $tooltip_title = "Menunggu keputusan COE untuk melulus atau menolak dokumen.";
                                    }
                                    else
                                        $tooltip_title = "Kemas kini dokumen ini untuk versi seterusnya.";
                                    ?>
                                    <a class="btn btn-link <?= $icon_color; ?> text-gradient px-1 mb-0" data-toggle="tooltip" data-placement="top" title="<?= $tooltip_title; ?>" href="<?= $url_action; ?>">
                                        <?php
                                        if(($clusterItem['dskpn_status'] == null) || empty($clusterItem['dskpn_status']))
                                            echo '<i class="fa fas fa-stopwatch fa-lg" aria-hidden="true"></i>';
                                        else if($clusterItem['dskpn_status'] != 5 && $clusterItem['dskpn_status'] != 2)
                                            echo '<i class="fa fal fa-file-signature fa-lg" aria-hidden="true"></i>';
                                        else
                                            echo '<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>';
                                        ?>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="requestToDeleteDSKPN(<?= $clusterItem['dskpn_id']; ?>)">
                                        <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if ((in_array($both_roles[0], get_user_role())) && ($clusterItem['dskpn_status'] == 3)): ?>
                                    &nbsp;&nbsp;
                                    <a class="btn btn-danger px-1 mb-0" style="height: 30px;" href="javascript:void(0)" onclick="deleteDSKPN(<?= $clusterItem['dskpn_id']; ?>)">
                                        <span style="position : relative; top : -5px;">&nbsp;&nbsp;Sah Padam&nbsp;&nbsp;</span>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $setting_dskpn_versioning; ?>
<script>
    const req_delete_dskpn_endpoint = '<?= route_to('req_delete_dskpn'); ?>';
    const delete_dskpn_endpoint = '<?= route_to('delete_dskpn'); ?>';
    const reject_delete_dskpn_endpoint = '<?= route_to('reject_delete_dskpn'); ?>';
    const get_to_delete_reason = '<?= route_to('delete_dskpn_reason'); ?>';

    $(document).ready(function() {
        $('#dskpn_list').DataTable();

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });

    function handleCheckboxChange(checkbox) {
        if (checkbox.checked) {
            window.location.href = '<?= route_to('list_dskpn') . "?owned=true"; ?>';
        } else {
            window.location.href = '<?= route_to('list_dskpn'); ?>';
        }
    }
</script>