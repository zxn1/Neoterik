<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @media print {
            @page {
                size: A4 landscape; /* Set to A4 size and portrait orientation */
            }
            body {
                zoom: 0.9; /* Scales content to 90% */
            }
  }
        /* Ensure the table collapses borders */
        .table {
            border-collapse: collapse;
        }

        /* Default to no border for all td elements */
        .table td {
            border: none;
            padding-left: 10px;
        }

        .table td {
            border: none;
            padding-left: 10px;
        }

        /* Add a class to selectively apply borders to specific td elements */
        .bordered {
            border: 1px solid #000;
        }

        .container-custom {
            display: flex;
            justify-content: space-between;
            /* Space between items */
            align-items: center;
            /* Align items vertically in the center */
        }

        .container-custom img {
            max-width: 400px;
            /* Maintain the image size */
            margin: 0 20px;
            /* Adjust spacing between text and image */
        }

        .left,
        .right {
            margin: 0;
            /* Remove default margins */
        }

        .mid {
            text-align: center;
            /* Center-aligns text horizontally */
            margin: 0 auto;
            /* Center-aligns the div itself if its width is set */
        }

        table {
            width: 100%;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-fymr {
            border-color: inherit;
            font-weight: bold;
            text-align: left;
            vertical-align: top;
            border-bottom: none;
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: top;
            border-top: none;
        }
    </style>
</head>

<body>
    <!-- <table class="table">
        <tr>
            <td>SULIT</td>
            <td style="text-align: center;"><img src="http://localhost:8080/neoterik/img/assets/header_bpp.jpg" style="max-width:400px !important;" alt="Your Image"></td>
            <td>SULIT</td>
        </tr>
    </table> -->
    <div class="row">
        <div class="container-custom">
            <h5 class="left">SULIT</h5>
            <div class="mid">
            <img src="/neoterik/img/assets/header_bpp.jpg" style="max-width:400px !important;" alt="Your Image">
            </div>
            <?php
            if($dskpn_details['dskpn_status'] == 5 || $dskpn_details['dskpn_status'] == null || empty($dskpn_details['dskpn_status']))
            {
            ?>
            <img src="/neoterik/img/assets/draft_watermark_v1.png" style="max-width:400px !important; position : absolute; right : 35%; transform : rotate(30deg); top : 30%; opacity : 0.6;" alt="Your Image">
            <?php
            } ?>
            <h5 class="right">SULIT</h5>
        </div>
    </div>
<br>
    <table class="table">
        <tr style="width:100%">
            <td style="width: 100px;"><b>KLUSTER:</b></td>
            <td style="width: 300px; border: 1px solid #000;"><?= isset($cluster_details) && !empty($cluster_details) ? $cluster_details['ctm_desc'] : '' ?></td>

            <td style="width: 120px;"><b>SUB-TEMA:</b></td>
            <td style="border: 1px solid #000;"><?= isset($dskpn_details) && !empty($dskpn_details) ? $dskpn_details['dskpn_sub_theme'] : '' ?></td>

            <td style="width: 200px;"><b>TAHUN:</b></td>
            <td style="width: 100px; border: 1px solid #000;"><?= isset($tm_details) && !empty($tm_details) ? $tm_details['tm_year'] : '' ?></td>
        </tr>
        <tr>
            <td><b>TEMA:</b></td>
            <td style="border: 1px solid #000;"><?= isset($dskpn_details) && !empty($dskpn_details) ? $dskpn_details['dskpn_theme'] : '' ?></td>

            <td><b>TOPIK:</b></td>
            <td style="border: 1px solid #000;"><?= isset($tm_details) && !empty($tm_details) ? $tm_details['tm_desc'] : '' ?></td>

            <td><b>DURASI PELAKSANAAN (minit):</b></td>
            <td style="border: 1px solid #000;"><?= isset($dskpn_details) && !empty($dskpn_details) ? $dskpn_details['dskpn_duration'] : '' ?></td>
        </tr>
    </table>
    <br>
    <table class="tg">
        <tr>
            <td class="tg-fymr" colspan="3" style="width: 30%;text-align: center;">STANDARD PEMBELAJARAN</td>
            <td class="tg-fymr" colspan="1" style="width: 10%;text-align: center;">STANDARD PRESTASI</td>
            <td class="tg-fymr" colspan="4" style="width: 60%;">REKA BENTUK INSTRUKSI:</td>
        </tr>
        <tr>
            
       <td class="tg-0pky" colspan="3" rowspan="9" style="vertical-align: top;">
            <?php if (isset($learning_standard) && !empty($learning_standard) && isset($subjects) && !empty($subjects)): ?>
                <?php
                // Map subjects for easy lookup: sbm_id => sbm_desc
                $subjectMap = [];
                foreach ($subjects as $sb) {
                    $subjectMap[$sb['sbm_id']] = $sb['sbm_desc'];
                }

                // Group learning standards by subject ID and learning standard group ID
                $grouped = [];
                foreach ($learning_standard as $ls) {
                    $lsId = $ls['lsi_ls_id']; // i.e. the 'learning standard' group
                    $grouped[$lsId]['subject_id'] = $ls['ls_sbm_id']; // keep subject ID for label
                    $grouped[$lsId]['items'][] = $ls;
                }
                ?>

                <?php foreach ($grouped as $lsId => $group): ?>
                    <?php 
                        $subjectName = $subjectMap[$group['subject_id']] ?? 'Unknown Subject';
                    ?>
                    <div style="font-weight: bold; margin-bottom: 4px;">
                        <?= $subjectName ?>
                    </div>

                    <?php foreach ($group['items'] as $item): ?>
                        <table style="width: 100%; border-collapse: collapse; border: none; margin-bottom: 2px;">
                            <tr style="border: none;">
                                <td valign="top" style="width: 35px; font-weight: bold; text-align: right; border: none; padding-right: 5px;">
                                    <p><?= $item['lsi_number'] ?>.</p>
                                </td>
                                <td valign="top" style="border: none;">
                                    <?= $item['lsi_desc'] ?>
                                </td>
                            </tr>
                        </table>
                    <?php endforeach; ?>

                    <br>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No learning standards available.</p>
            <?php endif; ?>
        </td>

            <td class="tg-0pky" colspan="1" rowspan="2">
                <?php if (isset($standard_performance) && !empty($standard_performance)): ?>
                    <?php
                    // Collect all 'dskp_code' values from the nested arrays
                    $dskp_codes = [];
                     // Loop through outer array sebab it nested array bukan flat array
                    foreach ($standard_performance as $group) {
                        // Loop through inner array
                        foreach ($group as $item) {
                            if (isset($item['dskp_code'])) {
                                $dskp_codes[] = $item['dskp_code'];
                            }
                        }
                    }

                    // Remove duplicate 'dskp_code' values
                    $unique_performance = array_unique($dskp_codes);

                    // Echo the unique values
                    foreach ($unique_performance as $performance) {
                        echo $performance . "<br>";
                    }
                    ?>
                    <br>
                <?php endif; ?>
            </td>
            <td class="tg-0pky" colspan="4" rowspan="2">
                <?php if (isset($rekabentuk_instruksi) && !empty($rekabentuk_instruksi)): ?>
                    <div style="display: flex; flex-wrap: wrap;">
                        <?php foreach ($rekabentuk_instruksi as $index => $item): ?>
                            <label style="display: inline-block; margin-right: 20px; width: 30%;">
                                <input type="checkbox" checked> <?= $item['tapp_desc'] ?>
                            </label>
                            <?php if (($index + 1) % 3 == 0): ?>
                                <br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td class="tg-fymr" colspan="1" style="text-align: center;">PENTAKSIRAN</td>
            <td class="tg-fymr" colspan="4">INTEGRASI TEKNOLOGI:</td>
        </tr>
        <tr>
            <td class="tg-0pky" colspan="1" rowspan="6">
                <?php
                $assessment_html_line = "";
                if (isset($assessment) && !empty($assessment)): ?>
                    <?php
                    $cognitive = "";
                    $affective = "";
                    $psikomotor = "";
                    foreach ($assessment as $assess) :

                        if ($assess['asc_desc'] == 'Kognitif') {
                            $cognitive .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                        }

                        if ($assess['asc_desc'] == 'Afektif') {
                            $affective .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                        }

                        if ($assess['asc_desc'] == 'Psikomotor') {
                            $psikomotor .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                        }
                    endforeach;

                    echo $assessment_html_line .= "<b>Kognitif</b><br>" . $cognitive . "<br><b>Psikomotor</b><br>" . $psikomotor . "<br><b>Affective</b><br>" . $affective;
                    ?>
                <?php endif; ?>
            </td>
            <td class="tg-0pky" colspan="4" rowspan="2">
                <?php if (isset($integrasi_teknologi) && !empty($integrasi_teknologi)): ?>
                    <div style="display: flex; flex-wrap: wrap;">
                        <?php foreach ($integrasi_teknologi as $index => $item): ?>
                            <label style="display: inline-block; margin-right: 20px; width: 30%;">
                                <input type="checkbox" checked> <?= $item['tapp_desc'] ?>
                            </label>
                            <?php if (($index + 1) % 3 == 0): ?>
                                <br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td class="tg-fymr" colspan="2">PENDEKATAN:</td>
            <td class="tg-fymr" colspan="2">KAEDAH:</td>
        </tr>
        <tr>
            <td class="tg-0pky" colspan="2" rowspan="3">
                <?php if (isset($pendekatan) && !empty($pendekatan)): ?>
                    <div style="display: flex; flex-wrap: wrap;">
                        <?php foreach ($pendekatan as $index => $item): ?>
                            <label style="display: inline-block; margin-right: 20px; width: auto; white-space: nowrap;">
                                <input type="checkbox" checked> <?= $item['tapp_desc'] ?>
                            </label>
                            <?php if (($index + 1) % 2 == 0): ?>
                                <br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </td>
            <td class="tg-0pky" colspan="2" rowspan="5">
                <?php if (isset($kaedah) && !empty($kaedah)): ?>
                    <div style="display: flex; flex-wrap: wrap;">
                        <?php foreach ($kaedah as $index => $item): ?>
                            <label style="display: inline-block; margin-right: 20px; width: 45%;">
                                <input type="checkbox" checked> <?= $item['tapp_desc'] ?>
                            </label>
                            <?php if (($index + 1) % 2 == 0): ?>
                                <br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <td class="tg-fymr" colspan="4" style="text-align: center;">OBJEKTIF PRESTASI</td>
            <td class="tg-fymr" colspan="2">PENGLIBATAN IBU BAPA:</td>
        </tr>
        <tr>
            <td class="tg-0pky" colspan="4" rowspan="4">
                <?php
                if (isset($objective_performance) && !empty($objective_performance)) {
                    foreach ($objective_performance as $op) {
                        echo $op['opm_number'] . " " . $op['opm_desc'] . "<br>";
                    }
                }
                ?>
            </td>
            <td class="tg-0pky" colspan="2">
                <label>
                    <input type="checkbox" name="parent_involvement_yes" value="Y"
                        <?php echo (isset($dskpn_details['dskpn_parent_involvement']) && $dskpn_details['dskpn_parent_involvement'] == 'Y') ? 'checked' : ''; ?>> Yes
                </label>
                <span style="margin-right: 20px;"></span>
                <label>
                    <input type="checkbox" name="parent_involvement_no" value="N"
                        <?php echo (isset($dskpn_details['dskpn_parent_involvement']) && $dskpn_details['dskpn_parent_involvement'] == 'N') ? 'checked' : ''; ?>> No
                </label>
            </td>
        </tr>
        <tr>
            <td class="tg-fymr" colspan="4" style="text-align: center;">AKTIVITI</td>
        </tr>
        <tr>
            <td class="tg-0pky" colspan="4" rowspan="5">
                <?php 
                if (isset($activity) && !empty($activity)):
                    foreach ($activity as $ac) {
                        echo $ac['aci_number'] . ". " . $ac['aci_desc'] . "<br>";
                    }
                endif;
                ?>
            </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td class="tg-fymr" colspan="4" style="text-align: center;">ALAT BANTU MENGAJAR</td>
        </tr>
        <tr>
            <td class="tg-0pky" colspan="4" rowspan="2">
                <?php if (isset($abm) && !empty($abm)): ?>
                    <?php foreach ($abm as $index => $item): ?>
                        <?= $index + 1 . ". " . $item['la_desc'] ?> <br>
                    <?php endforeach; ?>
                <?php endif; ?>
            </td>
        </tr>
    </table>
<br>
    <div class="row">
        <div class="container-custom">
            <h5 class="left">SULIT</h5>
            <div class="mid">
                PUSAT INISIATIF PEMODENAN PENDIDIKAN<br>
                UNIVERSITI PENDIDIKAN SULTAN IDRIS
            </div>
            <h5 class="right">SULIT</h5>
        </div>
    </div>
</body>


</html>