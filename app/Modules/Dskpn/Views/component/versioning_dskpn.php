<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #613673;
        margin-bottom: 20px;
    }

    .versioning-option {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 15px;
        transition: box-shadow 0.3s, outline 0.3s;
    }

    .versioning-option:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Custom radio button style to make it square */
    .custom-radio {
        position: relative;
        cursor: pointer;
    }

    .custom-radio input[type="radio"] {
        position: absolute;
        width: 0;
        height: 0;
        opacity: 0;
        /* Hide original radio button */
    }

    .custom-control-label {
        padding-left: 35px;
        /* Space for the custom style */
        position: relative;
    }

    .custom-control-label::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 20px;
        /* Width of the square */
        height: 20px;
        /* Height of the square */
        background: white;
        /* Background color */
        border: 2px solid #613673;
        /* Border color */
        border-radius: 4px;
        /* Slight rounding to create squared effect */
        transform: translateY(-50%);
        /* Centering the square */
        transition: background 0.3s, border 0.3s;
    }

    .custom-control-input:checked+.custom-control-label::before {
        background: #613673;
        /* Background color when checked */
        border-color: #613673;
        /* Change border color when checked */
    }

    .info-icon {
        color: #613673;
        margin-left: 5px;
        font-size: 1.5em;
        cursor: pointer;
    }

    .info-icon:hover {
        color: #9371a7;
    }

    .btn-custom {
        background-color: #613673;
        color: white;
    }

    .btn-custom:hover {
        background-color: #9371a7;
        color: white;
    }

    .active-icon {
        color: green;
    }

    .inactive-icon {
        color: red;
    }

    /* Custom styling for modal header */
    .modal-header {
        background-color: #613673;
        color: white;
        text-align: center;
        padding: 20px;
    }

    .modal-title {
        font-size: 1.5rem;
        /* Increase font size */
        font-weight: bold;
    }

    /* Center text in the modal header */
    .modal-header h5 {
        text-align: center;
        width: 100%;
    }

    /* Styling to highlight div on select with smooth effect */
    .active-outline {
        outline: 3px solid #4CAF50;
        /* Green outline when activated */
        outline-offset: 4px;
        box-shadow: 0 0 6px rgba(76, 175, 80, 0.4);
        /* Softer, lighter green glow */
        transition: outline 0.4s, box-shadow 0.4s ease-in-out;
    }

    .inactive-outline {
        outline: 3px solid #f44336;
        /* Red outline when deactivated */
        outline-offset: 4px;
        box-shadow: 0 0 6px rgba(244, 67, 54, 0.4);
        /* Softer, lighter red glow */
        transition: outline 0.4s, box-shadow 0.4s ease-in-out;
    }

    .custom-close-btn {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #fff;
        cursor: pointer;
        transition: transform 0.3s, color 0.3s;
    }

    .custom-close-btn:hover {
        color: #f8a5c2;
        /* Soft pink color on hover */
        transform: rotate(90deg);
    }

    .custom-close-btn:focus {
        outline: none;
    }
</style>

<!-- Modal -->
<?php
if (!function_exists('get_user_role')) {
    helper('dskpn_helper');
}
?>
<div class="modal fade" id="versioningModal" tabindex="-1" role="dialog" aria-labelledby="versioningModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"
        <?php if (in_array('ADMIN', get_user_role())): ?>
        style="display:block;"
        <?php else: ?>
        style="display:none;"
        <?php endif; ?>>

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="versioningModalLabel"><i class="fas fa-cogs"></i> DSKPN Versioning Settings</h5>
                <button type="button" class="close custom-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form action="<?= route_to('update_versioning') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <?php
                    helper('dskpn_helper');
                    $status = get_versioning_status();
                    ?>
                    <div class="versioning-option" id="optionActivate">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="activateVersioning" name="versioning" value="1" class="custom-control-input" checked>
                            <label class="custom-control-label" for="activateVersioning">Aktifkan pengesanan versi</label>
                        </div>
                        <i class="fas fa-check-circle active-icon info-icon" title="Aktifkan pengesanan untuk menjejaki perubahan kepada data."></i>
                    </div>

                    <div class="versioning-option" id="optionDeactivate">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="deactivateVersioning" name="versioning" value="0" class="custom-control-input">
                            <label class="custom-control-label" for="deactivateVersioning">Nonaktifkan pengesanan versi</label>
                        </div>
                        <i class="fas fa-times-circle inactive-icon info-icon" title="Menonaktifkan pengesanan untuk data."></i>
                    </div>

                    <p class="text-center text-muted font-italic">Pilih untuk mengaktifkan atau menonaktifkan fungsi pengesanan versi DSKPN bagi pengurusan data yang lebih baik.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Tetapan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (!(strpos(current_url(), route_to('load_dskpn_versioning')) !== false)) { ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<script>
    // JavaScript to add outline on div when selecting radio button
    $(document).ready(function() {
        // Initially apply outline to the default checked radio button (activate versioning)
        $('#optionActivate').addClass('active-outline');

        // When activate versioning is clicked, apply active outline and remove inactive outline
        $('#activateVersioning').on('change', function() {
            $('#optionActivate').addClass('active-outline');
            $('#optionDeactivate').removeClass('inactive-outline');
        });

        // When deactivate versioning is clicked, apply inactive outline and remove active outline
        $('#deactivateVersioning').on('change', function() {
            $('#optionDeactivate').addClass('inactive-outline');
            $('#optionActivate').removeClass('active-outline');
        });

        $('.custom-close-btn').on('click', function () {
            $('#versioningModal').modal('hide');
        });

        <?php
        if ($status) { ?>
            $('#activateVersioning').prop('checked', true); // Set the radio button to "checked"
            $('#activateVersioning').trigger('change');
        <?php
        } else { ?>
            $('#deactivateVersioning').prop('checked', true); // Set the radio button to "checked"
            $('#deactivateVersioning').trigger('change');
        <?php
        }
        ?>
    });
</script>