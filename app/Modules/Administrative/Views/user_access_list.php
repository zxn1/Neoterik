<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Access Management</title>
    <!-- Include CSS and FontAwesome -->
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="path/to/select2.css">
    <link rel="stylesheet" href="path/to/dataTables.css"> -->
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
                            <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 35%; text-align: center;">JENIS AKSES</th>
                            <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: center;">EDIT</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php $counter = 1;
                        foreach ($users as $user): ?>
                            <tr>
                                <td><?= $counter++; ?></td>
                                <td><?= $user['sm_fullname']; ?></td>
                                <td style="text-align: center;"><?= get_user_roles($user['sm_recid']) ?></td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-sm action-icon btn-edit btn-outline-success" data-user-id="<?= $user['sm_recid']; ?>" data-bs-toggle="modal" data-bs-target="#roleModal" title="Add Role">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Role Modal with enhanced styling -->
    <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="roleModalLabel">
                        <i class="fas fa-user-shield me-2"></i>Tetapkan Akses Pengguna
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pengguna: <span id="selectedUserName" class="text-primary"></span></label>
                    </div>
                    <form id="roleForm">
                        <div class="mb-3">
                            <label class="form-label">Pilih Jenis Akses:</label>
                            <!-- Role Selection Cards -->
                            <div class="role-cards">
                                <div class="role-card mb-2">
                                    <input type="checkbox" class="role-checkbox" id="role-3" value="3">
                                    <label class="role-label" for="role-3">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon">
                                                <i class="fas fa-user-cog"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="role-title">Admin</div>
                                                <div class="role-description">Akses penuh ke semua fungsi sistem</div>
                                            </div>
                                            <div class="checkbox-indicator">
                                                <div class="checkbox-inner"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="role-card mb-2">
                                    <input type="checkbox" class="role-checkbox" id="role-1" value="1">
                                    <label class="role-label" for="role-1">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon">
                                                <i class="fas fa-tasks"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="role-title">Penyelaras</div>
                                                <div class="role-description">Mengelola dan menyelaraskan aktivitas</div>
                                            </div>
                                            <div class="checkbox-indicator">
                                                <div class="checkbox-inner"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="role-card">
                                    <input type="checkbox" class="role-checkbox" id="role-2" value="2">
                                    <label class="role-label" for="role-2">
                                        <div class="d-flex align-items-center">
                                            <div class="role-icon">
                                                <i class="fas fa-graduation-cap"></i>
                                            </div>
                                            <div class="ms-3">
                                                <div class="role-title">Ketua Pendidikan</div>
                                                <div class="role-description">Mengelola fungsi pendidikan</div>
                                            </div>
                                            <div class="checkbox-indicator">
                                                <div class="checkbox-inner"></div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="userId" name="user_id" value="">
                        <input type="hidden" id="isChecked" name="isChecked" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Tutup
                    </button>
                    <button type="button" class="btn btn-primary" id="saveRoles">
                        <i class="fas fa-save me-1"></i>Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS styles for the enhanced modal - add this to your <style> section -->
    <style>
        /* Enhanced Modal Styling */
        #roleModal .modal-content {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        #roleModal .modal-title {
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        #roleModal .modal-body {
            padding: 20px;
        }

        /* Role Cards Styling */
        .role-card {
            position: relative;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .role-card:hover {
            border-color: #4a0069;
            background-color: #f8f9fc;
        }

        /* Hide the default checkbox */
        .role-checkbox {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .role-label {
            cursor: pointer;
            margin: 0;
            width: 100%;
            display: block;
        }

        /* Custom checkbox indicator */
        .checkbox-indicator {
            position: relative;
            margin-left: auto;
            width: 24px;
            height: 24px;
            border: 2px solid #ccd0d9;
            border-radius: 4px;
            background-color: white;
            transition: all 0.3s ease;
        }

        .checkbox-inner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 12px;
            height: 12px;
            background-color: #4a0069;
            border-radius: 2px;
            transition: all 0.2s ease;
        }

        /* When the checkbox is checked */
        .role-checkbox:checked~.role-label .checkbox-indicator {
            border-color: #4a0069;
            background-color: #e8eafd;
        }

        .role-checkbox:checked~.role-label .checkbox-inner {
            transform: translate(-50%, -50%) scale(1);
        }

        /* Styling for selected role card */
        .role-checkbox:checked~.role-label {
            color: #4a0069;
        }

        .role-checkbox:checked+.role-label .role-title {
            color: #4a0069;
            font-weight: 600;
        }

        input[type="checkbox"]:checked~label .role-card {
            border-color: #4a0069;
            background-color: #f8f9fc;
        }

        .role-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e8eafd;
            color: #4a0069;
            font-size: 18px;
        }

        .role-title {
            font-weight: 500;
            margin-bottom: 3px;
        }

        .role-description {
            font-size: 12px;
            color: #6c757d;
        }

        /* Enhanced Modal Footer */
        #roleModal .modal-footer {
            border-top: 1px solid #f0f0f0;
            padding: 15px 20px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('#user_access_roles').DataTable();

        });
    </script>

    <script>
        $(document).ready(function() {
            // Existing modal event functionality
            $('#roleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var userId = button.data('user-id');
                var userName = button.closest('tr').find('td:nth-child(2)').text().trim();

                $('#userId').val(userId);
                $('#selectedUserName').text(userName);

                // Clear checkboxes
                $('#roleModal input[type="checkbox"]').prop('checked', false);

                // Set checked roles
                var checkedRoles = <?= json_encode($user_roles); ?>;
                if (checkedRoles[userId]) {
                    checkedRoles[userId].forEach(function(roleId) {
                        $('#role-' + roleId).prop('checked', true);
                    });
                }

                // Add visual feedback when a role is selected
                $('.role-checkbox').change(function() {
                    if ($(this).is(':checked')) {
                        $(this).closest('.role-card').addClass('selected-role');
                    } else {
                        $(this).closest('.role-card').removeClass('selected-role');
                    }
                });
            });

            // Handle save button click (existing functionality)
            $('#saveRoles').on('click', function() {
                var selectedRoles = [];
                $('#roleModal input:checked').each(function() {
                    selectedRoles.push($(this).val());
                });

                var userId = $('#userId').val();

                $.ajax({
                    url: '/administrative/save_user_roles',
                    method: 'POST',
                    data: {
                        user_id: userId,
                        roles: selectedRoles,
                        isChecked: 1
                    },
                    success: function(response) {
                        // Show success modal using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Berjaya!',
                            text: 'Perubahan akses telah disimpan',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // After the alert is closed
                            $('#roleModal').modal('hide');
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving roles:', status, error);
                        // Show error notification
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal menyimpan perubahan!'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>