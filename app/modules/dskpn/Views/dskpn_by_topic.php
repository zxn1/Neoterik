<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">Petaan Input Statik</h6>
        </div>
        <div class="card-body mb-4 py-2">
            <di class="row">
                <div class="col-md-6">
                    <div class="d-flex flex-column h-100 mb-2">
                        <p class="mb-1 pt-2 text-bold">Pilih Kluster</p>
                        <select name="kluster" id="kluster-selection" class="form-control select2" aria-label="Default select example">
                            <option value="<?= $topic['cm_id'] ?>"><?= $topic['cm_desc'] ?></option>
                            <?php foreach ($kluster as $item) { ?>
                                <option value="<?= $item['cm_id']; ?>"><?= $item['cm_desc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column h-100 mb-2">
                        <p class="mb-1 pt-2 text-bold">Pilih Topik</p>
                        <select name="topik" id="topik-dynamic-field" class="form-control select2" aria-label="Default select example">
                            <option value="<?= $topic['tm_id'] ?>"><?= $topic['tm_desc'] ?></option>
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
            <h6 class="my-auto text-white">Senarai DSKPN</h6>
            <a href="<?= route_to('create_dskpn',$topic['tm_id']) ?>" id="add-dskpn-button" class="btn bg-gradient-info" style="margin-bottom:0 !important">
                Tambah Dskpn&nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5.5 0 0 0 1 0v-3h3a.5.5.5 0 0 0 0-1h-3z"></path>
                </svg>
            </a>
        </div>


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
                    <?php foreach ($dskpn as $dskpnItem) : ?>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"><?= esc($dskpnItem['dskpn_theme']) ?></td>
                            <td class="text-center"><?= esc($dskpnItem['dskpn_sub_theme']) ?></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <div class="col-2" style="display: inline-block;">
                                    <a href="dskpn-view" class="dropdown-item"><i class="fa fa-eye"></i></a>
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
</div>


<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<div style="position : absolute; top : 0px; right : 0px; width: 100%; height: 100%; z-index : 3; display : none;" id="loading-screen">
    <dotlottie-player style="position : fixed; right : -100px; top : 20px; z-index : 3;" src="https://lottie.host/82b8666a-afa5-4659-8a0e-6faedb04158f/vlZwAM82T0.json" background="transparent" speed="1" style="width: 500px; height: 500px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
    <div style="position : absolute; width : 100%; height : 100%; background-color : black; opacity : 0.2;"></div>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>