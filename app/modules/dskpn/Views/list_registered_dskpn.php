<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">Senarai DSKPN yang Didaftarkan</h6>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">Kod Dskpn</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Kluster</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Topik</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Attribute</th>
                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dskpn as $clusterItem) : ?>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"><?= esc($clusterItem['cm_desc']) ?></td>
                            <td class="text-center"><?= esc($clusterItem['tm_desc']) ?></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <div class="col-2 text-info" style="display: inline-block;">
                                    <a href="<?= route_to('dskpn_view', esc($clusterItem['dskpn_id'])) ?>" class="dropdown-item"><i class="fa fa-eye"></i></a>
                                </div>
                                &nbsp;&nbsp;
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $clusterItem['dskpn_id']; ?>').remove(); deleteDskpn(<?= $clusterItem['dskpn_id']; ?>);">
                                    <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>