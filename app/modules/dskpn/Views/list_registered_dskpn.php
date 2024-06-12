<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">Senarai DSKPN yang Didaftarkan</h6>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">KOD DSKPN</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">KLUSTER</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">TOPIK</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">STATUS</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">PENYEDIA</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">PENGESAH</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dskpn as $clusterItem) : ?>
                        <tr>
                            <td class="text-center"><?= $clusterItem['dskpn_code'] ?></td>
                            <td class="text-center"><?= esc($clusterItem['cm_desc']) ?></td>
                            <td class="text-center"><?= esc($clusterItem['tm_desc']) ?></td>
                            <?php if (!function_exists('get_dskpn_status')) {
                                helper('dskpn_helper');
                            } ?>
                            <td class="text-center"><?= get_dskpn_status($clusterItem['dskpn_status']) ?></td>
                            <?php if (!function_exists('get_user_name')) {
                                helper('dskpn_helper');
                            } ?>
                            <td class="text-center"><?= get_user_name($clusterItem['created_by']) ?></td>
                            <td class="text-center"><?= get_user_name($clusterItem['approved_by']) ?></td>
                            <td class="text-center">
                                <div class="col-2 text-info" style="display: inline-block;">
                                    <a href="<?= route_to('dskpn_view', esc($clusterItem['dskpn_id'])) ?>" class="dropdown-item"><i class="fa fa-eye"></i></a>
                                </div>
                                <?php if((get_user_role() == 'GURU_BESAR') && ($clusterItem['dskpn_status'] != 3)): ?>
                                &nbsp;&nbsp;
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="requestToDeleteDSKPN(<?= $clusterItem['dskpn_id']; ?>)">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>

                                <?php if((get_user_role() == 'PENYELARAS') && ($clusterItem['dskpn_status'] == 3 || $clusterItem['dskpn_status'] == 4)): ?>
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
<script>
    const req_delete_dskpn_endpoint = '<?= route_to('req_delete_dskpn'); ?>';
    const delete_dskpn_endpoint = '<?= route_to('delete_dskpn'); ?>';
    const reject_delete_dskpn_endpoint = '<?= route_to('reject_delete_dskpn'); ?>';
</script>