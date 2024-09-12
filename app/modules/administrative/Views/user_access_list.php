<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Access Management</title>
    <!-- Include CSS and FontAwesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="path/to/select2.css">
    <link rel="stylesheet" href="path/to/dataTables.css">
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
            color: #2d3748;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 12px;
        }
    </style>
</head>
<body>
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
                        <?php $counter = 1; foreach ($users as $user): ?>
                            <tr>
                                <td><?= $counter++; ?></td>
                                <td><?= $user['sm_fullname']; ?></td>
                                <td><?= get_user_roles($user['sm_recid']) ?></td>
                                <td>
                                    <i class="fa fa-pencil-square-o fa-lg text-success me-2" data-user-id="<?= $user['sm_recid']; ?>" data-bs-toggle="modal" data-bs-target="#roleModal" title="Add Role"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Role Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalLabel">Pilih Akses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="roleForm">
                    <div class="mb-3">
                        <!-- Hardcoded Roles -->
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="role-1" value="1">
                            <label class="form-check-label" for="role-1">Penyelaras</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="role-2" value="2">
                            <label class="form-check-label" for="role-2">Ketua Pendidikan</label>
                        </div>
                    </div>
                    <input type="hidden" id="userId" name="user_id" value="">
                    <input type="hidden" id="isChecked" name="isChecked" value=""> 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveRoles">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Include JS Libraries -->
<script src="path/to/jquery.min.js"></script>
<script src="path/to/bootstrap.bundle.min.js"></script>
<script src="path/to/select2.min.js"></script>
<script src="path/to/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('#user_access_roles').DataTable();

        // Function to clear checkboxes
        function clearCheckboxes() {
            $('#roleModal input[type="checkbox"]').prop('checked', false);
        }

        // Event listener for when the modal is shown
        $('#roleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var userId = button.data('user-id'); // Extract user ID from data-* attributes

            $('#userId').val(userId); // Set user ID in the hidden input field

            // Clear checkboxes before setting new ones
            clearCheckboxes();

            // Auto-check checkboxes based on the user's roles
            var checkedRoles = <?= json_encode($user_roles); ?>;
            if (checkedRoles[userId]) {
                checkedRoles[userId].forEach(function(roleId) {
                    $('#role-' + roleId).prop('checked', true);
                });
            }
        });

        // Handle save button click
        $('#saveRoles').on('click', function() {
            var selectedRoles = [];
            $('#roleModal input:checked').each(function() {
                selectedRoles.push($(this).val()); // Collect selected role IDs
            });

            var userId = $('#userId').val(); // Get user ID

            // AJAX request to save selected roles for the user
            $.ajax({
                url: '/administrative/save_user_roles',
                method: 'POST',
                data: {
                    user_id: userId,
                    roles: selectedRoles,
                    isChecked: 1 // Adjust if needed
                },
                success: function(response) {
                    console.log('Roles saved successfully');
                    $('#roleModal').modal('hide'); // Hide modal on success
                    location.reload(); // Reload the page after saving
                },
                error: function(xhr, status, error) {
                    console.error('Error saving roles:', status, error);
                }
            });
        });

    });
</script>

</body>
</html>
