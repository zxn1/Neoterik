<style>
    .select2-container--open .select2-dropdown {
        z-index: 9999 !important;
        left: 0;
    }

    .badge-role {
        background-color: #5a67d8;
        /* Example color */
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 12px;
        margin-right: 5px;
        font-size: 12px;
    }

    .badge-no-role {
        background-color: #e2e8f0;
        /* Gray background for no roles */
        color: #2d3748;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 12px;
    }
</style>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-primary">
            <h6 class="my-auto text-white">AKSES PENGGUNA</h6>
        </div>
        <br>
        <div class="table-responsive">
            <table id="user_access_roles" class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 50%; text-align: left;">NAMA</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 35%; text-align: left;">AKSES</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody id="tableBody">

                    <?php $counter = 1;
                    foreach ($users as $user): ?>
                        <tr>
                            <td><?= $counter++; ?></td>
                            <td><?= $user['sm_fullname']; ?></td>
                            <td><?= get_user_roles($user['sm_recid']) ?></td>
                            <td></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#user_access_roles').DataTable();
    });
</script>