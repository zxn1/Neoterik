<div class="table-responsive">
    <table id="teacher_cluster_table" class="table align-items-center mb-0" id="subject_list">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">NAMA</th>
                <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">KELAS</th>
                <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">KLUSTER</th>
                <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">SUBJEK</th>
                <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">TINDAKAN</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <!-- Rows will be appended here -->
            <?php $counter = 1; ?>
            <?php foreach ($teacher_cluster_mapping as $tcm): ?>
                <tr>
                    <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?>
                </td>
                    <td class="text-m font-weight-normal" style="text-align: left;"><?= $tcm['sm_fullname'] ?? 'N/A'; ?></td>
                    <td class="text-m font-weight-normal" style="text-align: left;"><?= $tcm['cls_name'] ?? 'N/A'; ?></td>
                    <td class="text-m font-weight-normal" style="text-align: left;">
                            <?php
                                $cluster = get_cluster_desc($tcm['tccm_ctm_id']);
                                if (is_null($cluster)) { ?>
                                    No Cluster
                                <?php
                                } else {
                                    // Proceed with the subject data
                                    echo $cluster;
                                }
                            ?>
                    </td>
                    <td class="text-m font-weight-normal" style="text-align: left;">
                            <?php
                                $subject = get_cluster_subject($tcm['tccm_ctm_id']);
                                if (is_null($subject)) { ?>
                                    <!-- Get subject based on the tccm_id -->
                                    <?php get_subject($tcm['tccm_id']); ?>
                                <?php
                                } else {
                                    // Proceed with the subject data
                                    echo $subject;
                                }
                            ?>
                    </td>
                    <td class="text-m font-weight-normal" style="text-align: left;">
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" 
                        onclick="deleteClusterMapping(<?= $tcm['tccm_ctm_id'] ?>, <?= $tcm['tccm_cls_recid'] ?>, <?= $tcm['sm_recid'] ?>, <?= $tcm['tccm_year'] ?>)">
                            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php foreach ($teacher_class_mapping as $tcmc): ?>
                <tr>
                    <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                    <td class="text-m font-weight-normal" style="text-align: left;"><?= $tcmc['sm_fullname'] ?? 'N/A'; ?></td>
                    <td class="text-m font-weight-normal" style="text-align: left;"><?= $tcmc['cls_name'] ?? 'N/A'; ?></td>
                    <td class="text-m font-weight-normal" style="text-align: left;">No Cluster</td>
                    <td class="text-m font-weight-normal" style="text-align: left;"><?= $tcmc['sbm_desc'] ?? 'N/A'; ?></td>
                    <td class="text-m font-weight-normal" style="text-align: left;">
                        <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="deleteSubjectMapping(<?= $tcmc['tccm_id']; ?>)">
                            <i class="far fa-trash-alt fa-lg me-2" aria-hidden="true"></i>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>

            

        </tbody>

    </table>

</div>


<script>
    function deleteSubjectMapping(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('administrative/deleteSubjectMapping') ?>",  // Adjust to your controller/method
                    type: "POST",  // Use POST instead of GET for deletion
                    data: { id: id },
                    dataType: "json",  // Ensure the response is expected to be in JSON
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Deleted!',
                                'Mapping has been deleted successfully.',
                                'success'
                            ).then(() => {
                                // Reload the page or update the UI
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Failed to delete the mapping.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the mapping.',
                            'error'
                        );
                    }
                });
            }
        });
    }

    function deleteClusterMapping(ctm_id, cls_recid, sm_recid, year) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('administrative/deleteClusterMapping') ?>",  // Adjust the controller/method
                    type: "POST",
                    data: { 
                        ctm_id: ctm_id,
                        cls_recid: cls_recid,
                        sm_recid: sm_recid,
                        year: year
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Deleted!',
                                'Cluster mapping has been deleted successfully.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Failed!',
                                'Failed to delete the cluster mapping.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the cluster mapping.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>