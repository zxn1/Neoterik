<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Lesson Plan Layout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100%;
        }

        table.fitcontent {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        td.header {
            background-color: #c6e0b4;
            font-weight: bold;
        }

        td.bold {
            font-weight: bold;
        }

        td.yellow {
            background-color: #ffe699;
            font-weight: bold;
        }

        td.yellownobold {
            background-color: #ffe699;
        }

        td.slowgray {
            background-color: #e8e3d3a3;
        }

        td.slowyellow {
            background-color: #ffedb5;
        }

        td.blank {
            background-color: black;
        }

        td.bluelight {
            background-color: #bdd7ee;
        }

        td.greennotes {
            background-color: #d9ead3;
            font-weight: bold;
            font-size: 12px;
        }

        .center {
            text-align: center;
        }

        .vertical-center {
            vertical-align: middle;
        }

        span.assessmentcodebadge {
            border-radius: 15px;
            padding-left: 10px;
            padding-right: 10px;
            margin-left: 2.5px;
            margin-right: 2.5px;
            border: 1px none #ccc;
        }

        span.coginitve {
            background-color: #a6b3ed;
        }

        span.affective {
            background-color: #ff9595;
        }

        span.psikomotor {
            background-color: #59f65a;
        }

        td.no-border {
            border: none;
        }

        .approved-by {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- <table style="transform: scale(0.5); transform-origin: top left;"> -->
    <table class="fitcontent">
        <thead>
            <tr>
                <td class="header center no-border">
                    <?php
                    if (isset($dskpn_details['dskpn_code']))
                        echo  $dskpn_details['dskpn_code'];
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="12" class="center vertical-center no-border"><b>
                        <center>
                            <table>
                                <tr>
                                    <td class="center vertical-center no-border" style="padding-right: 15px;">
                                        <b>
                                            DOKUMEN STANDARD KURIKULUM PENDEKATAN NEOTERIK<br>
                                            AKADEMI PENDIDIKAN / SEKOLAH MAKMAL<br>
                                            UNIVERSITI PENDIDIKAN SULTAN IDRIS
                                        </b>
                                    </td>
                                    <td class="no-border">
                                        <img style="width: 90px;" src="<?= $srsb_logo; ?>">
                                    </td>
                                </tr>
                            </table>
                        </center>
                </td>
            </tr>
            <?php
            $ls_id = [];

            foreach ($learning_standard as $ls) {
                if (!in_array($ls['ls_id'], $ls_id)) {
                    $ls_id[] = $ls['ls_id']; // Store full object instead of just id
                }
            }
            ?>
            <tr>
                <td class="bold">KLUSTER</td>
                <td class="bold" colspan="3"><?= isset($cluster_details) && !empty($cluster_details) ? $cluster_details['ctm_desc'] : '' ?></td>
                <?php
                $adjustColumnYear = 9;
                if(count($ls_id) == 1)
                    $adjustColumnYear = 3;
                else if (count($ls_id) == 2)
                    $adjustColumnYear = 5;
                else if(count($ls_id) == 3)
                    $adjustColumnYear = 7;
                ?>
                <td colspan="<?= $adjustColumnYear ?>" class="no-border" style="text-align: right;">
                    <b>TAHUN</b>
                </td>

                <?php
                $year_map = [
                    1 => 'SATU',
                    2 => 'DUA',
                    3 => 'TIGA',
                    4 => 'EMPAT',
                    5 => 'LIMA',
                    6 => 'ENAM'
                ];
                $tm_year_display = isset($year_map[$tm_details['tm_year']]) ? $year_map[$tm_details['tm_year']] : $tm_details['tm_year'];
                ?>
                <td class="center"><b><?= $tm_year_display; ?></b></td>
            </tr>
            <tr>
                <td class="bold">TOPIK</td>
                <td colspan="3" class="bold"><?= isset($tm_details) && !empty($tm_details) ? $tm_details['tm_desc'] : '' ?></td>
            </tr>
            <tr>
            <tr>
                <td class="center vertical-center header" colspan="2" rowspan="2">TEMA</td>
                <td class="center header" colspan="<?= count($ls_id) * 2 ?>">STANDARD PEMBELAJARAN</td>
                <td class="center vertical-center header" colspan="4" rowspan="2">OBJEKTIF PRESTASI (OP)</td>
            </tr>
            <tr>
                <?php
                $sb_flag = false;
                if (isset($subjects) && !empty($subjects)) {
                    $sb_flag = true; //check if subject contain value
                    foreach ($subjects as $sb) { ?>
                        <td class="center header" colspan="2">
                            <?= $sb['sbm_desc'] ?>
                        </td>
                <?php
                    }
                }
                ?>
            </tr>
            </tr>
            </tdead>
        <tbody>
            <tr>
                <td colspan="2" class="center vertical-center bold">
                    Individu
                </td>
                <?php
                if ($sb_flag)
                ?>
                <?php
            $lsi_item = [];

            if (isset($learning_standard) && !empty($learning_standard)) {
                $ls_flag = true;
                $data = [
                    'ls_id' => $ls_id,
                    'learning_standard' => $learning_standard,
                ];

                foreach ($ls_id as $lsid) {
                ?>
                        <td colspan="2" rowspan="3" style="vertical-align: middle;">

                            <?php
                            foreach ($learning_standard as $ls) {
                                if ($ls['lsi_ls_id'] == $lsid) {
                            ?>

                                    <table style="width: 100%; margin-bottom: 4px; border-collapse: collapse; border: none;">
                                        <tr style="border: none;">
                                            <td style="width: 30px; font-weight: bold; text-align: right; vertical-align: top; border: none;">
                                                <?= $ls['lsi_number'] ?>
                                            </td>
                                            <td style="vertical-align: top; border: none;">
                                                <?= $ls['lsi_desc'] ?>
                                            </td>
                                        </tr>
                                    </table>

                                <?php
                                }
                                ?>
                        </td>
                <?php
                            }
                        }
                ?>
            <?php } ?>

            <td colspan="4" rowspan="3" class="vertical-center">
                <?php
                if (isset($objective_performance) && !empty($objective_performance)) {
                    foreach ($objective_performance as $op) {
                        $op_reff_code = [];
                        if (isset($all_reff_code_op) && !empty($all_reff_code_op)) {
                            $arco_flag = false;
                            foreach ($all_reff_code_op as $arco) {
                                if ($arco['opm_id'] == $op['opm_id']) {
                                    $op_reff_code[] = $arco['orc_code'];
                                    $arco_flag = true;
                                }
                            }

                            if ($arco_flag)
                                $op_reff_code = "(" . implode(",", $op_reff_code) . ")";
                            else
                                $op_reff_code = "";
                        }

                        if ($op_reff_code == [])
                            $op_reff_code = "";

                        $opm_assessment_code_html = "";
                        if (isset($opm_assessment_code) && !empty($opm_assessment_code)) {
                            foreach ($opm_assessment_code as $oac) {
                                $color_code = "";
                                switch ($oac['oac_code'][0]) {
                                    case 'C':
                                        $color_code = "coginitve";
                                        break;
                                    case 'A':
                                        $color_code = "affective";
                                        break;
                                    case 'P':
                                        $color_code = "psikomotor";
                                        break;
                                }

                                if ($oac['oac_opm_id'] == $op['opm_id']) {
                                    $opm_assessment_code_html .= "&nbsp;&nbsp;<span class='center assessmentcodebadge " . $color_code . "'>&nbsp;&nbsp;<b>" . $oac['oac_code'] . "</b>&nbsp;&nbsp;</span>";
                                }
                            }
                        }

                        echo $op['opm_number'] . ". " . $op['opm_desc'] . " <b>" . $op_reff_code . "</b>" . $opm_assessment_code_html . "<br>";
                    }
                }
                ?>
            </td>
            </tr>
            <tr>
                <td class="center vertical-center header" colspan="2">
                    SUB - TEMA
                </td>
            </tr>
            <tr>
                <td class="center vertical-center bold" colspan="2">
                    TUBUH DAN KESIHATAN
                </td>
            </tr>

            <tr>
                <td colspan="2" rowspan="8" class="center vertical-center yellow">
                    TAHAP PENGUASAAN
                </td>
                <td colspan="<?= count($ls_id) * 2 ?>" class="center vertical-center header">
                    STANDARD PRESTASI
                </td>
                <td colspan="3" class="center vertical-center header">
                    DURASI PERLAKSANAAN (MINIT)
                </td>
                <td class="center vertical-center">
                    <?= isset($dskpn_details) && !empty($dskpn_details) ? $dskpn_details['dskpn_duration'] : '' ?>
                </td>
            </tr>
            <tr>
                <?php
                $dskp_code = [];
                $sp_flag = false;
                if (isset($standard_performance) && !empty($standard_performance)) {
                    $sp_flag = true;
                    foreach ($standard_performance as $group) {
                        if(isset($group[0]['dskp_code']))
                            $dskp_code[] = $group[0]['dskp_code'];
                        // foreach ($group as $sp) {
                        //     if (!in_array($sp['dskp_code'], $dskp_code))
                        //         $dskp_code[] = $sp['dskp_code'];
                        // }
                    }
                }
                foreach ($dskp_code as $dc) { ?>
                    <td class="center vertical-center header">
                        <?= $dc ?>
                    </td>
                    <td class="center vertical-center header"></td>
                <?php }   ?>

                <td colspan="4" class="center vertical-center header">
                    IDEA PENGAJARAN (AKTIVITI)
                </td>
            </tr>

            <?php
            for ($i = 1; $i <= 6; $i++) {
                echo "<tr>";
                if ($sp_flag && !empty($dskp_code)) {
                    foreach ($dskp_code as $dc) {
                        $hasValue = false;
                        foreach ($standard_performance as  $group_key => $group) {
                            foreach ($group as $index => $sp) {
                                if ($dc == $sp['dskp_code'] && $sp['sp_tp_level'] == $i) {
                                    $hasValue = true;
                                    echo '<td class="center vertical-center yellownobold">' . $i . '</td>';
                                    $desc = $sp['sp_tp_level_desc'];
                                    $center_or_not = (
                                        stripos($desc, '<ol') !== false ||
                                        stripos($desc, '<ul') !== false
                                    );
                                    if (strpos($desc, 'data-list="bullet"') !== false) {
                                        $desc = str_replace(['<ol>', '</ol>'], ['<ul>', '</ul>'], $desc);
                                    }
                                    echo '<td' . (!$center_or_not ? ' class="center vertical-center"' : '') . '>' . $desc . '</td>';
                                    unset($standard_performance[$group_key][$index]);
                                    break 2; // Exit both inner loops once match is found
                                }
                            }
                        }

                        if (!$hasValue) {
                            echo "<td class='slowyellow'></td><td class='slowgray'></td>";
                        }
                    }
                } else {
                    echo "<td class='slowyellow'></td><td class='slowgray'></td>";
                }

                // Additional content for each level
                if ($i == 1) {
                    echo '<td class="vertical-center greennotes" colspan="4">
                CATATAN:<br>
                Idea pengajaran adalah panduan kepada guru sahaja, sebarang penambahbaikan adalah amat dialukan
            </td>';
                } else if ($i == 2) {
                    $activity_line_html = "";
                    if (isset($activity) && !empty($activity)) {
                        foreach ($activity as $ac) {
                            $activity_line_html .= $ac['aci_number'] . ". " . $ac['aci_desc'] . "<br>";
                        }
                    }
                    echo '<td class="vertical-center" colspan="4" rowspan="2">
                Murid:<br>' . $activity_line_html . '</td>';
                } else if ($i == 4) {
                    echo '<td colspan="4" class="center vertical-center header">
            ALAT BANTU MENGAJAR
        </td>';
                } else if ($i == 5) {
                    $abm_line_html = "";
                    if (isset($abm) && !empty($abm)) {
                        foreach ($abm as $index => $item) {
                            $abm_line_html .= ($index + 1) . ". " . $item['la_desc'] . "<br>";
                        }
                    }
                    echo '<td class="vertical-center" colspan="4" rowspan="2">' . $abm_line_html . '</td>';
                }

                echo "</tr>";
            }

            ?>

            <?php
            //to calculate max length 1 of other subject core competency
            $highest_sbm_id = null;
            $highest_val_item_for_sbm_id = 0;
            $acc_flag = false;
            $tempAccArr = [];
            if ($sb_flag) {
                foreach ($subjects as $idx => $sb) {
                    if (isset($all_core_competency) && !empty($all_core_competency)) {
                        $acc_flag = true;
                        foreach ($all_core_competency as $acc) {
                            if ($sb['sbm_id'] == $acc['sbm_id'])
                                $tempAccArr[$sb['sbm_id']][$idx][] = $acc;
                        }
                    }
                }
                foreach ($subjects as $idx => $sb) {
                    if(isset($tempAccArr[$sb['sbm_id']]))
                    {
                        foreach ($tempAccArr[$sb['sbm_id']] as $sb_idx => $sbmArr) {
                            if ($highest_val_item_for_sbm_id < count($sbmArr)) {
                                $highest_val_item_for_sbm_id = count($sbmArr);
                                $highest_sbm_id = $sb['sbm_id'];
                            }
                        }
                    }
                    else
                    {
                        $highest_val_item_for_sbm_id = 0;
                        $highest_sbm_id = 0;
                    }
                }
            }
            ?>

            <?php
            for ($i = 0; $i < $highest_val_item_for_sbm_id; $i++) {
                echo "<tr>";

                if ($i == 0)
                    echo '<td colspan="2" rowspan="' . $highest_val_item_for_sbm_id . '" class="center vertical-center yellow">KOMPETENSI TERAS<br>SKOR 1-6</td>';

                if ($acc_flag && (isset($subjects) && !empty($subjects))) {
                    foreach ($subjects as $idx => $sb) {
                        if (isset($tempAccArr[$sb['sbm_id']][$idx][$i]['cc_desc']) && !empty($tempAccArr[$sb['sbm_id']][$idx][$i]['cc_desc'])) {
                            $ticked = "";
                            foreach ($core_competency as $indeks => $cc) {
                                if ($cc['cmp_cc_code'] == $tempAccArr[$sb['sbm_id']][$idx][$i]['cc_code'] && $idx == $cc['cmp_column_index']) {
                                    $ticked = "&#x2714;";
                                    unset($core_competency[$indeks]);
                                }
                            }
                            $item_inside = count($tempAccArr[$sb['sbm_id']][$idx]);

                            if (($i + 1) == $item_inside) {
                                $differenceRow = $highest_val_item_for_sbm_id - $item_inside;
                                echo '<td class="center vertical-center" rowspan="' . $differenceRow + 1  . '">' . $ticked . '</td><td class="vertical-center" rowspan="' . $differenceRow + 1  . '">(' . $tempAccArr[$sb['sbm_id']][$idx][$i]['cc_code'] . ") " . $tempAccArr[$sb['sbm_id']][$idx][$i]['cc_desc'] . '</td>';
                            } else if (($i + 1) < $item_inside) {
                                echo '<td class="center vertical-center">' . $ticked . '</td><td>(' . $tempAccArr[$sb['sbm_id']][$idx][$i]['cc_code'] . ") " . $tempAccArr[$sb['sbm_id']][$idx][$i]['cc_desc'] . '</td>';
                            }
                            //echo '<td class="center vertical-center">' . $ticked . '</td><td>(' . $tempAccArr[$sb['sbm_id']][$i]['cc_code'] . ") " . $tempAccArr[$sb['sbm_id']][$i]['cc_desc'] . '</td>';
                        } else {
                            //echo '<td></td><td></td>';
                        }
                    }
                }

                if ($i == 0)
                    echo '<td colspan="2" class="center vertical-center greennotes bold">
                            PENTAKSIRAN
                        </td>
                        <td colspan="2" class="center vertical-center greennotes bold">
                            PENGLIBATAN IBU BAPA
                        </td>';
                if ($i == 1) {
                    $assessment_html_line = "";
                    if (isset($assessment) && !empty($assessment)) {
                        $cognitive = "";
                        $affective = "";
                        $psikomotor = "";
                        foreach ($assessment as $assess) {
                            if ($assess['asc_desc'] == 'Kognitif') {
                                $cognitive .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                            }

                            if ($assess['asc_desc'] == 'Afektif') {
                                $affective .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                            }

                            if ($assess['asc_desc'] == 'Psikomotor') {
                                $psikomotor .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                            }
                        }

                        $assessment_html_line .= "<b>Kognitif</b><br>" . $cognitive . "<br><b>Psikomotor</b><br>" . $psikomotor . "<br><b>Affective</b><br>" . $affective;
                    }
                    echo '<td colspan="2" rowspan="' . $highest_val_item_for_sbm_id - 1 . '">'
                        . $assessment_html_line .
                        '</td>
                    <td colspan="2" rowspan="' . $highest_val_item_for_sbm_id - 1 . '" class="center vertical-center bold">';
                    echo (isset($dskpn_details['dskpn_parent_involvement']) && !empty($dskpn_details['dskpn_parent_involvement']) && $dskpn_details['dskpn_parent_involvement'] == 'Y') ? "YA" : "TIDAK";
                    echo '</td>';
                }
                echo "</tr>";
            }
            ?>

            <?php
            $max_adpa_val = 0;
            $max_adk_val = 0;
            $max_adkk_val = 0;
            $max_aki_val = 0;

            //dd($kaedah);
            //remove duplicate in kaedah
            //kekalkan id yang ada dalam all kaedah based on kaedah yang mapped.
            $unique_kaedah = [];
            $seen_desc = []; // untuk jejak tapp_desc yang dah diproses

            foreach ($all_kaedah as $kaedah_item) {
                $desc = strtolower(preg_replace('/\s+/', '', $kaedah_item['tapp_desc']));
                // var_dump($desc); // Debug jika perlu

                if (!isset($seen_desc[$desc])) {
                    // Cari semua kaedah yang ada tapp_desc sama
                    $duplicates = array_filter($all_kaedah, function($item) use ($desc) {
                        return strtolower(preg_replace('/\s+/', '', $item['tapp_desc'])) === $desc;
                    });

                    // Check kalau ada dalam $kaedah
                    $match = null;
                    foreach ($duplicates as $dup) {
                        foreach ($kaedah as $k_item) {
                            if ($k_item['tapp_id'] == $dup['tapp_id']) {
                                $match = $dup;
                                break 2;
                            }
                        }
                    }

                    // Pilih sama ada yang matched, atau fallback ke satu
                    $selected = $match ?: reset($duplicates);

                    // tapis yang tak aktif & tak digunakan
                    if ($selected['tapp_status'] == 2 && !$match) {
                        continue;
                    }

                    // Simpan sebagai unique
                    $unique_kaedah[] = $selected;
                    $seen_desc[$desc] = true;
                }
            }
            //then baru removed duplicate
            $all_kaedah = $unique_kaedah;

            //remove duplicate in pendekatan
            $unique_pendekatan = [];
            $seen_pendekatan_desc = [];

            foreach ($all_pendekatan as $item) {
                $desc = strtolower(preg_replace('/\s+/', '', $item['tapp_desc']));

                if (!isset($seen_pendekatan_desc[$desc])) {
                    // Cari semua pendekatan yang ada tapp_desc sama
                    $duplicates = array_filter($all_pendekatan, function($x) use ($desc) {
                        return strtolower(preg_replace('/\s+/', '', $x['tapp_desc'])) === $desc;
                    });

                    // Utamakan yang wujud dalam $pendekatan
                    $match = null;
                    foreach ($duplicates as $dup) {
                        foreach ($pendekatan as $pdkt) {
                            if ($dup['tapp_id'] == $pdkt['tapp_id']) {
                                $match = $dup;
                                break 2;
                            }
                        }
                    }

                    // Pilih yang match atau fallback ke yang pertama
                    $selected = $match ?: reset($duplicates);

                    // kalau tapp_status == 2 dan tiada dalam $pendekatan → skip
                    if ($selected['tapp_status'] == 2 && !$match) {
                        // Abaikan, jangan simpan
                        continue;
                    }

                    $unique_pendekatan[] = $selected;
                    $seen_pendekatan_desc[$desc] = true;
                }
            }

            $all_pendekatan = $unique_pendekatan;

            if (isset($all_domain_pengetahuan_asas) && !empty($all_domain_pengetahuan_asas))
                $max_adpa_val = count($all_domain_pengetahuan_asas);

            if (isset($all_domain_kemandirian) && !empty($all_domain_kemandirian))
                $max_adk_val = count($all_domain_kemandirian);

            if (isset($all_domain_kualiti_keperibadian) && !empty($all_domain_kualiti_keperibadian))
                $max_adkk_val = count($all_domain_kualiti_keperibadian);

            if (isset($all_kemahiran_insaniah) && !empty($all_kemahiran_insaniah))
                $max_aki_val = count($all_kemahiran_insaniah);

            //count max row for reka bentuk instruksi and integrasi teknologi
            if (isset($all_rekabentuk_instruksi) && !empty($all_rekabentuk_instruksi))
                if ($max_adpa_val < count($all_rekabentuk_instruksi))
                    $max_adpa_val = count($all_rekabentuk_instruksi) + 1;

            if (isset($all_integrasi_teknologi) && !empty($all_integrasi_teknologi))
                if ($max_adpa_val < count($all_integrasi_teknologi))
                    $max_adpa_val = count($all_integrasi_teknologi) + 1;

            //count max row for pendekatan and kaedah
            if (isset($all_kaedah) && !empty($all_kaedah))
                if ($max_adk_val < count($all_kaedah))
                    $max_adk_val = count($all_kaedah) + 1;

            if (isset($all_pendekatan) && !empty($all_pendekatan))
                if ($max_adk_val < count($all_pendekatan))
                    $max_adk_val = count($all_pendekatan) + 1;
            ?>

            <?php
            for ($j = 1; $j <= $max_adpa_val; $j++) {
                echo "<tr>";
                if ($j == 1) { ?>
                    <td class="center vertical-center header" rowspan="<?= ($max_adpa_val + $max_adk_val + $max_adkk_val); ?>">
                        16 DOMAIN<br>KEMENJADIAN MURID
                    </td>
                    <td class="center vertical-center header" rowspan="<?= ($max_adpa_val); ?>">
                        PENGETAHUAN ASAS
                    </td>
                <?php
                }

                foreach ($subjects as $idx => $sb) {
                ?>
                    <td class="center vertical-center">
                        <?php
                        $dpa_flag = false;
                        if (isset($domain_pengetahuan_asas) && !empty($domain_pengetahuan_asas))
                            foreach ($domain_pengetahuan_asas as $dpa) {
                                if ($dpa['dm_dmn_code'] == $all_domain_pengetahuan_asas[$j - 1]['dmn_code'] && $sb['sbm_id'] == $dpa['dm_sbm_id'] && (!is_null($dpa['dm_column_index']) ? ($idx == $dpa['dm_column_index']) : true)) {
                                    echo "&#x2714;";
                                    //unset($subjects[$idx]);
                                }
                            }
                        ?>
                    </td>
                    <td><?= (($max_adpa_val > 0) && isset($all_domain_pengetahuan_asas[$j - 1]['dmn_code'])) ? "(" . $all_domain_pengetahuan_asas[$j - 1]['dmn_code'] . ") " . $all_domain_pengetahuan_asas[$j - 1]['dmn_desc'] : '' ?></td>
            <?php
                }

                if ($j == 1)
                    echo '<td class="center vertical-center greennotes bold" colspan="2">REKA BENTUK INSTRUKSI</td>
                          <td class="center vertical-center greennotes bold" colspan="2">INTEGRASI TEKNOLOGI</td>';

                // reka bentuk instruksi
                if (($j > 1) && ($j <= $max_adpa_val)) {
                    echo "<td class='";
                    echo isset($all_rekabentuk_instruksi[$j - 2]['tapp_id']) ? "center vertical-center" : "blank";
                    echo "'>";
                    if (isset($rekabentuk_instruksi) && !empty($rekabentuk_instruksi))
                        foreach ($rekabentuk_instruksi as $index_ri => $ri) {
                            if ($all_rekabentuk_instruksi[$j - 2]['tapp_id'] == $ri['tapp_id']) {
                                echo "&#x2714;";
                                unset($rekabentuk_instruksi[$index_ri]);
                            }
                        }
                    echo "</td>";
                    echo "<td class='";
                    echo isset($all_rekabentuk_instruksi[$j - 2]['tapp_id']) ? "" : "blank";
                    echo "'>";
                    echo isset($all_rekabentuk_instruksi[$j - 2]['tapp_desc']) && !empty($all_rekabentuk_instruksi[$j - 2]['tapp_desc']) ? $all_rekabentuk_instruksi[$j - 2]['tapp_desc'] : '';
                    echo "</td>";
                } else if ($j == 1) {
                } else {
                    echo '<td></td><td></td>';
                }

                // integrasi teknologi
                if (($j > 1) && ($j <= $max_adpa_val)) {
                    echo "<td class='";
                    echo isset($all_integrasi_teknologi[$j - 2]['tapp_id']) ? "center vertical-center" : "blank";
                    echo "'>";
                    if (isset($integrasi_teknologi) && !empty($integrasi_teknologi))
                        foreach ($integrasi_teknologi as $index_it => $it) {
                            if ($all_integrasi_teknologi[$j - 2]['tapp_id'] == $it['tapp_id']) {
                                echo "&#x2714;";
                                unset($integrasi_teknologi[$index_it]);
                            }
                        }
                    echo "</td>";
                    echo "<td class='";
                    echo isset($all_integrasi_teknologi[$j - 2]['tapp_id']) ? "" : "blank";
                    echo "'>";
                    echo isset($all_integrasi_teknologi[$j - 2]['tapp_desc']) && !empty($all_integrasi_teknologi[$j - 2]['tapp_desc']) ? $all_integrasi_teknologi[$j - 2]['tapp_desc'] : '';
                    echo "</td>";
                } else if ($j == 1) {
                } else {
                    echo '<td></td><td></td>';
                }

                echo "</tr>";
            } ?>


            <?php
            for ($j = 1; $j <= $max_adk_val; $j++) {
                echo "<tr>";
                if ($j == 1) { ?>
                    <td class="center vertical-center header" rowspan="<?= ($max_adk_val); ?>">
                        KEMANDIRIAN
                    </td>
                <?php
                }

                foreach ($subjects as $idxx => $sb) {
                    if (count($all_domain_kemandirian) > ($j)) {
                        echo '<td class="center vertical-center">';
                    } else if (count($all_domain_kemandirian) == ($j)) {
                        echo '<td class="center vertical-center" rowspan="' . (($max_adk_val + 1) - count($all_domain_kemandirian)) . '">';
                    }

                    if (isset($domain_kemandirian) && !empty($domain_kemandirian))
                        foreach ($domain_kemandirian as $dkem) {
                            if (
                                isset($all_domain_kemandirian[$j - 1]) &&
                                $dkem['dm_dmn_code'] == $all_domain_kemandirian[$j - 1]['dmn_code'] &&
                                $sb['sbm_id'] == $dkem['sbm_id'] &&
                                (!is_null($dkem['dm_column_index']) ? ($idxx == $dkem['dm_column_index']) : true)
                            ) {
                                echo "&#x2714;";
                                //unset($subjects[$idx]);
                            }
                        }
                ?>
                    </td>
                    <?php
                    if (count($all_domain_kemandirian) > ($j)) {
                    ?>
                        <td><?= (($max_adk_val > 0) && isset($all_domain_kemandirian[$j - 1]['dmn_code'])) ? "(" . $all_domain_kemandirian[$j - 1]['dmn_code'] . ") " . $all_domain_kemandirian[$j - 1]['dmn_desc'] : '' ?></td>
                    <?php } else if (count($all_domain_kemandirian) == ($j)) { ?>
                        <td class="vertical-center" rowspan="<?= (($max_adk_val + 1) - count($all_domain_kemandirian)) ?>"><?= (($max_adk_val > 0) && isset($all_domain_kemandirian[$j - 1]['dmn_code'])) ? "(" . $all_domain_kemandirian[$j - 1]['dmn_code'] . ") " . $all_domain_kemandirian[$j - 1]['dmn_desc'] : '' ?></td>
            <?php
                    }
                }

                if ($j == 1)
                    echo '<td class="center vertical-center greennotes bold" colspan="2">PENDEKATAN:</td>
                          <td class="center vertical-center greennotes bold" colspan="2">KAEDAH:</td>';

                // pendekatan
                if (($j > 1) && ($j <= $max_adk_val)) {
                    if (isset($all_pendekatan[$j - 2]['tapp_id'])) {
                        $rowspan_pendekatan = 1;
                        if (!isset($all_pendekatan[$j - 1]['tapp_id'])) {
                            $rowspan_pendekatan = $max_adk_val - $j + 1;
                        }

                        echo "<td rowspan='" . $rowspan_pendekatan . "' class='";
                        echo isset($all_pendekatan[$j - 2]['tapp_id']) ? "center vertical-center" : "blank";
                        echo "'>";
                        if (isset($pendekatan) && !empty($pendekatan))
                            foreach ($pendekatan as $index_pdkt => $pdkt) {
                                if ($all_pendekatan[$j - 2]['tapp_id'] == $pdkt['tapp_id']) {
                                    echo "&#x2714;";
                                    unset($pendekatan[$index_pdkt]);
                                }
                            }
                        echo "</td>";
                        echo "<td rowspan='" . $rowspan_pendekatan . "' class='";
                        echo isset($all_pendekatan[$j - 2]['tapp_id']) ? "" : "blank";
                        echo "'>";
                        echo isset($all_pendekatan[$j - 2]['tapp_desc']) && !empty($all_pendekatan[$j - 2]['tapp_desc']) ? $all_pendekatan[$j - 2]['tapp_desc'] : '';
                        echo "</td>";
                    }
                } else if ($j == 1) {
                } else {
                    echo '<td></td><td></td>';
                }

                // kaedah
                if (($j > 1) && ($j <= $max_adk_val)) {
                    echo "<td class='";
                    echo isset($all_kaedah[$j - 2]['tapp_id']) ? "center vertical-center" : "blank";
                    echo "'>";
                    if (isset($kaedah) && !empty($kaedah))
                        foreach ($kaedah as $index_ri => $ri) {
                            if ($all_kaedah[$j - 2]['tapp_id'] == $ri['tapp_id']) {
                                echo "&#x2714;";
                                unset($kaedah[$index_ri]);
                            }
                        }
                    echo "</td>";
                    echo "<td class='";
                    echo isset($all_kaedah[$j - 2]['tapp_id']) ? "" : "blank";
                    echo "'>";
                    echo isset($all_kaedah[$j - 2]['tapp_desc']) && !empty($all_kaedah[$j - 2]['tapp_desc']) ? $all_kaedah[$j - 2]['tapp_desc'] : '';
                    echo "</td>";
                } else if ($j == 1) {
                } else {
                    echo '<td></td><td></td>';
                }

                echo "</tr>";
            } ?>


            <?php
            for ($j = 1; $j <= $max_adkk_val; $j++) {
                echo "<tr>";
                if ($j == 1) { ?>
                    <td class="center vertical-center header" rowspan="<?= ($max_adkk_val); ?>">
                        KUALITI KEPERIBADIAN
                    </td>
                <?php
                }

                foreach ($subjects as $idx => $sb) {
                ?>
                    <td class="center vertical-center">
                        <?php
                        $dpa_flag = false;
                        if (isset($domain_kualiti_keperibadian) && !empty($domain_kualiti_keperibadian))
                            foreach ($domain_kualiti_keperibadian as $dkk) {
                                if ($dkk['dm_dmn_code'] == $all_domain_kualiti_keperibadian[$j - 1]['dmn_code'] && $sb['sbm_id'] == $dkk['sbm_id'] && (!is_null($dkk['dm_column_index']) ? ($idx == $dkk['dm_column_index']) : true)) {
                                    echo "&#x2714;";
                                    //unset($domain_kualiti_keperibadian[$index_dpa]);
                                }
                            }
                        ?>
                    </td>
                    <td><?= (($max_adk_val > 0) && isset($all_domain_kualiti_keperibadian[$j - 1]['dmn_code'])) ? "(" . $all_domain_kualiti_keperibadian[$j - 1]['dmn_code'] . ") " . $all_domain_kualiti_keperibadian[$j - 1]['dmn_desc'] : '' ?></td>
            <?php
                }

                if ($j == 1)
                    echo '<td class="center vertical-center greennotes bold" colspan="2">CATATAN</td>
                          <td colspan="2" rowspan="' . $max_adk_val + $max_aki_val . '"></td>';
                if ($j == 2)
                    echo '<td colspan="2" rowspan="' . ($max_adk_val - 1) + $max_aki_val . '"></td>';

                echo "</tr>";
            } ?>


            <?php
            for ($j = 1; $j <= $max_aki_val; $j++) {
                echo "<tr>";
                if ($j == 1) { ?>
                    <td class="center vertical-center bluelight bold" colspan="2" rowspan="<?= ($max_aki_val); ?>">
                        7 KEMAHIRAN INSANIAH
                    </td>
                <?php
                }

                foreach ($subjects as $idx => $sb) {
                ?>
                    <td class="center vertical-center">
                        <?php
                        if (isset($kemahiran_insaniah) && !empty($kemahiran_insaniah))
                            foreach ($kemahiran_insaniah as $ki) {
                                if ($ki['dm_dmn_code'] == $all_kemahiran_insaniah[$j - 1]['dmn_code'] && $sb['sbm_id'] == $ki['sbm_id'] && (!is_null($ki['dm_column_index']) ? ($idx == $ki['dm_column_index']) : true)) {
                                    echo "&#x2714;";
                                    //unset($kemahiran_insaniah[$index_kii]);
                                }
                            }
                        ?>
                    </td>
                    <td><?= (($max_adk_val > 0) && isset($all_kemahiran_insaniah[$j - 1]['dmn_code'])) ? "(" . $all_kemahiran_insaniah[$j - 1]['dmn_code'] . ") " . $all_kemahiran_insaniah[$j - 1]['dmn_desc'] : '' ?></td>
            <?php
                }

                echo "</tr>";
            } ?>

        </tbody>
    </table><br>
    <div class="approved-by"><b>
            Tarikh dikeluarkan: <?= isset($dskpn_details['dskpn_created_at']) ? $dskpn_details['dskpn_created_at'] : 'N\A'; ?><br>
            Disahkan oleh: <?= isset($dskpn_details['dskpn_approved_by']) ? $dskpn_details['dskpn_approved_by'] : 'N\A'; ?>
        </b></div>
</body>

</html>