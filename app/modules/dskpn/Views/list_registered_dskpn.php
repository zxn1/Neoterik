<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
        <h6 class="my-auto text-white">Senarai DSKPN yang Didaftarkan</h6>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">ID</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Kluster</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Topik</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Attribute</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td class="text-center">data</td>
                <td class="text-center">data</td>
                <td class="text-center">data</td>
                <td class="text-center">data</td>
                <td class="text-center">
                    <div class="col-2" style="display: inline-block;">
                        <a href="dskpn-view" class="dropdown-item"><i class="fa fa-eye"></i></a>
                    </div>
                    <div style="display: inline-block;">
                        <a id="deleteProposalButton" class="dropdown-item" data-id="{{ $trainingProposal->id }}"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
    <div class="text-end pt-3">
        <a href="#" class="btn bg-gradient-primary btn-sm mb-0">Seterusnya</a>
    </div>

</div>