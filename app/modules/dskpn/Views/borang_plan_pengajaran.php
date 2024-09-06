<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .container-custom img {
            max-width: 150px;
            height: auto;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .form-group {
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="container-custom">
            <h1>SULIT</h1>
            <img src="your-image-source.jpg" alt="Your Image">
            <h1>SULIT</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-2">
            <div class="form-group d-flex">
                <label for="kluster" class="form-label col-md-4"><b>KLUSTER:</b>&nbsp;</label>
                <input type="text" class="form-control" id="kluster" name="kluster">
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group d-flex align-items-center">
                <label for="subtema" class="form-label col-md-2" style="white-space: nowrap;"><b>SUB-TEMA:</b>&nbsp;</label>
                <input type="text" class="form-control" id="subtema" name="subtema">
            </div>

        </div>
        <div class="col-md-3">
            <div class="form-group d-flex align-items-center">
                <label for="tahun" class="form-label col-md-4"><b>TAHUN:</b>&nbsp;</label>
                <input type="text" class="form-control" id="tahun" name="tahun">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-2">
            <div class="form-group d-flex align-items-center">
                <label for="kluster" class="form-label col-md-4"><b>TEMA:</b>&nbsp;</label>
                <input type="text" class="form-control" id="kluster" name="kluster">
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group d-flex align-items-center">
                <label for="subtema" class="form-label col-md-2" style="white-space: nowrap;"><b>TOPIK:</b>&nbsp;</label>
                <input type="text" class="form-control" id="subtema" name="subtema">
            </div>

        </div>
        <div class="col-md-3">
            <div class="form-group d-flex align-items-center">
                <label for="tahun" class="form-label col-md-4"><b>DURASI PELAKSANAAN (minit):</b>&nbsp;</label>
                <input type="text" class="form-control" id="tahun" name="tahun">
            </div>
        </div>

    </div>

    <!-- Main Row -->
    <div class="row g-3">
        <!-- First Column: Standard Pembelajaran and Standard Prestasi & Pentaksiran -->
        <div class="col-md-6">
            <div class="row g-3">
                <!-- Standard Pembelajaran -->
                <div class="col-md-8 g-3" style="border:1px solid;">
                    <h6><b>STANDARD PEMBELAJARAN</b></h6>
                </div>

                <!-- Standard Prestasi and Pentaksiran -->
                <div class="col-md-4">
                    <div class="row g-3 mb-2">
                        <div class="col-12" style="border:1px solid;">
                            <h6><b>STANDARD PRESTASI</b></h6>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12" style="border:1px solid;">
                            <h6><b>PENTAKSIRAN</b></h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Objektif Prestasi -->
            <div class="row g-3">
                <div class="col-12" style="border:1px solid;">
                    <h6><b>OBJEKTIF PENTAKSIRAN</b></h6>
                </div>
            </div>
            <!-- Objektif Prestasi -->
            <div class="row g-3">
                <div class="col-12" style="border:1px solid;">
                    <h6><b>ALAT BANTU MENGAJAR</b></h6>
                </div>
            </div>
        </div>

        <!-- Second Column: Test -->
        <div class="col-md-6">
            <div class="row g-3">
                <!-- Reka Bentuk Instruksi -->
                <div class="col-md-12 g-3" style="border:1px solid;">
                    <h6><b>REKA BENTUK INSTRUKSI:</b></h6>
                    <div class="row g-3 mb-2">
                        <!-- First Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox1" class="me-2">
                                <label for="checkbox1">Label 1</label>
                            </div>
                        </div>
                        <!-- Second Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox2" class="me-2">
                                <label for="checkbox2">Label 2</label>
                            </div>
                        </div>
                        <!-- Third Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox3" class="me-2">
                                <label for="checkbox3">Label 3</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <!-- First Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox1" class="me-2">
                                <label for="checkbox1">Label 1</label>
                            </div>
                        </div>
                        <!-- Second Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox2" class="me-2">
                                <label for="checkbox2">Label 2</label>
                            </div>
                        </div>
                        <!-- Third Column -->
                        <div class="col-4" style="padding: 10px;">
                            <p>*Rujuk Technology Integration Matrik</p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row g-3">
                <!-- Integrasi Teknologi -->
                <div class="col-md-12 g-3" style="border:1px solid;">
                    <h6><b>INTEGRASI TEKNOLOGI:</b></h6>
                    <div class="row g-3 mb-2">
                        <!-- First Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox1" class="me-2">
                                <label for="checkbox1">Label 1</label>
                            </div>
                        </div>
                        <!-- Second Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox2" class="me-2">
                                <label for="checkbox2">Label 2</label>
                            </div>
                        </div>
                        <!-- Third Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox3" class="me-2">
                                <label for="checkbox3">Label 3</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <!-- First Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox1" class="me-2">
                                <label for="checkbox1">Label 1</label>
                            </div>
                        </div>
                        <!-- Second Column -->
                        <div class="col-4" style="padding: 10px;">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" id="checkbox2" class="me-2">
                                <label for="checkbox2">Label 2</label>
                            </div>
                        </div>
                        <!-- Third Column -->
                        <div class="col-4" style="padding: 10px;">
                            <p>*Rujuk Technology Integration Matrik</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row g-3">
                <div class="col-7">
                    <div class="row g-3 mb-2">
                        <div class="col-12" style="border:1px solid;">
                            <h6><b>PENDEKATAN</b></h6>
                            <div class="row g-3 mb-2">
                                <!-- First Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox1" class="me-2">
                                        <label for="checkbox1">Label 1</label>
                                    </div>
                                </div>
                                <!-- Second Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox2" class="me-2">
                                        <label for="checkbox2">Label 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mb-2">
                                <!-- First Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox1" class="me-2">
                                        <label for="checkbox1">Label 1</label>
                                    </div>
                                </div>
                                <!-- Second Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox2" class="me-2">
                                        <label for="checkbox2">Label 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 mb-2">
                                <!-- First Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox1" class="me-2">
                                        <label for="checkbox1">Label 1</label>
                                    </div>
                                </div>
                                <!-- Second Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox2" class="me-2">
                                        <label for="checkbox2">Label 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12" style="border:1px solid;">
                            <h6><b>PENGLIBATAN IBU BAPA</b></h6>
                            <div class="row g-3 mb-2">
                                <!-- First Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox1" class="me-2">
                                        <label for="checkbox1">Label 1</label>
                                    </div>
                                </div>
                                <!-- Second Column -->
                                <div class="col-6" style="padding: 10px;">
                                    <div class="d-flex align-items-center">
                                        <input type="checkbox" id="checkbox2" class="me-2">
                                        <label for="checkbox2">Label 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5" style="border:1px solid;">
                    <h6><b>KAEDAH</b></h6>
                </div>
            </div>
            <!-- AKTIVITI -->
            <div class="row g-3">
                <!-- AKTIVITI -->
                <div class="col-md-12 g-3" style="border:1px solid;">
                    <h6><b>INTEGRASI TEKNOLOGI:</b></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container-custom">
            <h1>SULIT</h1>
            <p style="font-size: 1.2em;width:400px;">PUSAT INISIATIF PEMODENAN PENDIDIKAN UNIVERSITI PENDIDIKAN SULTAN IDRIS</p>
            <h1>SULIT</h1>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>