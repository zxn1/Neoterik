<div id="collapseOne" class="card-body p-3 accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

    <div class="text-end p-3">
        <input type="submit" class="btn bg-gradient-info" value="Tambah" />
    </div>
</div>
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">DSKPN</h6>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="clusterSelect">Kluster</label>
                            <select style="width:100%;" name="cluster" class="form-control select2" id="kluster" aria-label="Default select example">
                                <option disabled selected>-- Sila Pilih Kluster --</option>
                                <?php foreach ($clusters as $item) { ?>
                                    <option value="<?= $item['cm_id']; ?>"><?= $item['cm_desc']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="yearSelect">Tahun</label>
                            <select style="width:100%;" name="year" class="form-control select2" id="yearSelect" required>
                                <option value="" disabled selected>-- Sila Pilih Tahun --</option>
                                <option value="1">Satu</option>
                                <option value="2">Dua</option>
                                <option value="3">Tiga</option>
                                <option value="4">Empat</option>
                                <option value="5">Lima</option>
                                <option value="6">Enam</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-gradient-primary">
            <h6 class="my-auto text-white">Senarai Cikgu</h6>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table align-items-center mb-0" id="subject_list">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 5%; text-align: left;">BIL</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">NAMA</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 75%; text-align: left;">TELEFON</th>
                        <th class="text-uppercase text-secondary text-m font-weight-bolder" style="width: 10%; text-align: left;">TINDAKAN</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $counter = 1;
                    foreach ($teachers as $teacher) : ?>
                        <tr>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= $counter++; ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($teacher['sm_fullname']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;"><?= esc($teacher['sm_mobile']) ?></td>
                            <td class="text-m font-weight-normal" style="text-align: left;">
                                <a class="btn btn-link text-danger text-gradient px-1 mb-0" href="javascript:void(0)" onclick="$('#1-collection1-<?= $teacher['sm_recid']; ?>').remove(); deleteSubject(<?= $teacher['sm_recid']; ?>);">
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

<table id="resultTable">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
            <!-- Add more columns as needed -->
        </tr>
    </thead>
    <tbody>
        <!-- Data will be appended here -->
    </tbody>
</table>
<?php if (session()->has('success')) : ?>
    <script>
        Swal.fire({
            icon: "success",
            title: "Berjaya",
            text: "<?= session('success'); ?>"
        });
    </script>
<?php endif; ?>

<?php if (session()->has('fail')) : ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Maaf",
            text: "<?= session('fail'); ?>"
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('#subject_list').DataTable();
    });

    document.addEventListener("DOMContentLoaded", function() {
        var lastAccordionItem = document.querySelector(".accordion-item:last-of-type");
        if (lastAccordionItem) {
            lastAccordionItem.querySelector(".accordion-button").classList.add("collapsed");
        }

        // Handle year filter change
        document.getElementById('filterYear').addEventListener('change', function() {
            var selectedYear = this.value;
            var url = new URL(window.location.href);
            if (selectedYear) {
                url.searchParams.set('year', selectedYear);
            } else {
                url.searchParams.delete('year');
            }
            window.location.href = url.toString();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('#kluster, #yearSelect').change(function() {
            var cluster = $('#kluster').val();
            var year = $('#yearSelect').val();

            if (cluster && year) {
                $.ajax({
                    url: 'teacher_cluster_class_mapping',
                    type: 'POST',
                    data: {
                        cluster: cluster,
                        year: year
                    },
                    success: function(response) {
                        console.log(response); // Log the response to the console
                        // Assuming the response is a JSON array of objects, uncomment if needed
                        // var data = JSON.parse(response);
                        // var tableBody = $('#resultTable tbody');
                        // tableBody.empty();

                        // data.forEach(function(row) {
                        //     var tr = $('<tr></tr>');
                        //     tr.append('<td>' + row.column1 + '</td>');
                        //     tr.append('<td>' + row.column2 + '</td>');
                        //     tr.append('<td>' + row.column3 + '</td>');
                        //     // Add more columns as needed
                        //     tableBody.append(tr);
                        // });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                    }
                });
            }
        });
    });
</script>