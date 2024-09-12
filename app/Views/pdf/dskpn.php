<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Lesson Plan Layout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            widtd: 100%;
            border-collapse: collapse;
        }
        td, td {
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
            vertical-align : middle;
        }
    </style>
</head>
<body>
    <!-- <table style="transform: scale(0.5); transform-origin: top left;"> -->
    <table>
        <tdead>
            <tr>
                <td class="bold">KLUSTER</td>
                <td class="bold" colspan="3"><?= isset($cluster_details)&&!empty($cluster_details)?$cluster_details['ctm_desc']:'' ?></td>
            </tr>
            <tr>
                <td class="bold">TOPIK</td>
                <td colspan="3" class="bold"><?= isset($tm_details)&&!empty($tm_details)?$tm_details['tm_desc']:'' ?></td>
            </tr>
            <tr>
                <tr>
                    <td class="center vertical-center header" colspan="2" rowspan="2">TEMA</td>
                    <td class="center header" colspan="6">STANDARD PEMBELAJARAN</td>
                    <td class="center vertical-center header" colspan="4" rowspan="2">OBJEKTIF PRESTASI (OP)</td>
                </tr>
                <tr>
                    <?php
                    $sb_flag = false;
                    if(isset($subjects)&&!empty($subjects))
                    {
                        $sb_flag = true; //check if subject contain value
                        foreach($subjects as $sb)
                        { ?>
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
                if($sb_flag)
                foreach($subjects as $sb)
                { ?>
                <td colspan="2" rowspan="3" class="vertical-center">
                <?php
                    if(isset($learning_standard)&&!empty($learning_standard))
                    {
                        foreach($learning_standard as $ls)
                        {
                            if($sb['sbm_id'] == $ls['ls_sbm_id'])
                                echo $ls['lsi_number'] . ". " . $ls['lsi_desc'] . "<br>";
                        }
                    } ?>
                </td>
                <?php } ?>
                
                <td colspan="4" rowspan="3" class="vertical-center">
                    <?php 
                    if(isset($objective_performance)&&!empty($objective_performance))
                    {
                        foreach($objective_performance as $op)
                        {
                            $op_reff_code = [];
                            if(isset($all_reff_code_op) && !empty($all_reff_code_op))
                            {
                                $arco_flag = false;
                                foreach($all_reff_code_op as $arco)
                                {
                                    if($arco['opm_id'] == $op['opm_id'])
                                    {
                                        $op_reff_code[] = $arco['orc_code'];
                                        $arco_flag = true;
                                    }
                                }

                                if($arco_flag)
                                    $op_reff_code = "(" . implode(",", $op_reff_code) . ")";
                                else
                                    $op_reff_code = "";
                            }

                            echo $op['opm_number'] . ". " . $op['opm_desc'] . " <b>" . $op_reff_code . "</b><br>";
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
                <td colspan="6" class="center vertical-center header">
                    STANDARD PRESTASI
                </td>
                <td colspan="3" class="center vertical-center header">
                    DURASI PERLAKSANAAN (MINIT)
                </td>
                <td class="center vertical-center">
                    <?= isset($dskpn_details)&&!empty($dskpn_details)?$dskpn_details['dskpn_duration']:'' ?>
                </td>
            </tr>
            <tr>
                <?php 
                $dskp_code = [];
                $sp_flag = false;
                if(isset($standard_performance)&&!empty($standard_performance))
                {
                    $sp_flag = true;
                    foreach($standard_performance as $sp)
                    {
                        if(!in_array($sp['dskp_code'], $dskp_code))
                            $dskp_code[] = $sp['dskp_code'];
                    }
                }
                foreach($dskp_code as $dc)
                { ?>
                    <td class="center vertical-center header">
                        <?= $dc ?>
                    </td><td class="center vertical-center header"></td>
                <?php }   ?>

                <td colspan="4" class="center vertical-center header">
                    IDEA PENGAJARAN (AKTIVITI)
                </td>
            </tr>
            
            <?php
            for($i = 1; $i <= 6; $i++)
            {
                echo "<tr>";
                if($sp_flag && !empty($dskp_code))
                {
                    foreach($dskp_code as $dc)
                    {
                        $hasValue = false;
                        foreach($standard_performance as $index => $sp)
                        {
                            if($dc == $sp['dskp_code'] && $sp['sp_tp_level'] == $i)
                            {
                                $hasValue = true;
                                echo '<td class="center vertical-center yellownobold">' . $i . '</td>';
                                echo '<td class="center vertical-center">'. $sp['sp_tp_level_desc'] .'</td>';
                                unset($standard_performance[$index]);
                            }
                        }

                        if(!$hasValue)
                            echo "<td></td><td></td>";
                    }
                } else {
                    echo "<td></td><td></td>";
                }

                if ($i == 1) {
                    echo '<td class="vertical-center greennotes" colspan="4">
                            CATATAN:<br>
                            Idea pengajaran adalah panduan kepada guru sahaja, sebarang penambahbaikan adalah amat dialukan
                        </td>';
                } else if($i == 2) {
                    $activity_line_html = "";
                    if(isset($activity) && !empty($activity))
                    foreach($activity as $ac)
                    {
                        $activity_line_html .= $ac['aci_number'] . ". " . $ac['aci_desc'] . "<br>";
                    }

                    echo '<td class="vertical-center" colspan="4" rowspan="2">
                            Murid:<br>
                            ' . $activity_line_html .
                        '</td>';
                } else if($i == 4) {
                    echo '<td colspan="4" class="center vertical-center header">
                        ALAT BANTU MENGAJAR
                    </td>';
                } else if($i == 5) {
                    $abm_line_html = "";
                    if(isset($abm) && !empty($abm))
                    foreach($abm as $index => $item)
                    {
                        $abm_line_html .= $index + 1 . ". " . $item['la_desc'] . "<br>";
                    }

                    echo '<td class="vertical-center" colspan="4" rowspan="2">'
                        . $abm_line_html .
                    '</td>';
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
            if($sb_flag)
            {
                foreach($subjects as $sb)
                {
                    if(isset($all_core_competency) && !empty($all_core_competency))
                    {
                        $acc_flag = true;
                        foreach($all_core_competency as $acc)
                        {
                            if($sb['sbm_id'] == $acc['sbm_id'])
                                $tempAccArr[$sb['sbm_id']][] = $acc;
                        }
                    }
                }
                foreach($tempAccArr as $sbm_id => $sbmArr)
                {
                    if($highest_val_item_for_sbm_id < count($sbmArr))
                    {
                        $highest_val_item_for_sbm_id = count($sbmArr);
                        $highest_sbm_id = $sbm_id;
                    }
                }
            }
            ?>

            <?php
            for($i = 0; $i < $highest_val_item_for_sbm_id; $i++)
            {
                echo "<tr>";

                if($i == 0)
                    echo '<td colspan="2" rowspan="' . $highest_val_item_for_sbm_id . '" class="center vertical-center yellow">KOMPETENSI TERAS<br>SKOR 1-6</td>';

                if($acc_flag && (isset($subjects) && !empty($subjects)))
                {
                    foreach($subjects as $sb)
                    {
                        if(isset($tempAccArr[$sb['sbm_id']][$i]['cc_desc']) && !empty($tempAccArr[$sb['sbm_id']][$i]['cc_desc']))
                        {
                            $ticked = "";
                            foreach($core_competency as $indeks => $cc)
                            {
                                if($cc['cmp_cc_code'] == $tempAccArr[$sb['sbm_id']][$i]['cc_code'])
                                {
                                    $ticked = "&#x2714;";
                                    unset($core_competency[$indeks]);
                                }
                            }
                            $item_inside = count($tempAccArr[$sb['sbm_id']]);
                                
                            if(($i+1) == $item_inside)
                            {
                                $differenceRow = $highest_val_item_for_sbm_id - $item_inside;
                                echo '<td class="center vertical-center" rowspan="' . $differenceRow + 1  . '">' . $ticked . '</td><td class="vertical-center" rowspan="' . $differenceRow + 1  . '">(' . $tempAccArr[$sb['sbm_id']][$i]['cc_code'] . ") " . $tempAccArr[$sb['sbm_id']][$i]['cc_desc'] . '</td>';
                            } else if(($i+1) < $item_inside) {
                                echo '<td class="center vertical-center">' . $ticked . '</td><td>(' . $tempAccArr[$sb['sbm_id']][$i]['cc_code'] . ") " . $tempAccArr[$sb['sbm_id']][$i]['cc_desc'] . '</td>';
                            }
                            //echo '<td class="center vertical-center">' . $ticked . '</td><td>(' . $tempAccArr[$sb['sbm_id']][$i]['cc_code'] . ") " . $tempAccArr[$sb['sbm_id']][$i]['cc_desc'] . '</td>';
                        } else {
                            //echo '<td></td><td></td>';
                        }
                    }
                }

                if($i == 0)
                 echo '<td colspan="2" class="center vertical-center greennotes bold">
                            PENTAKSIRAN
                        </td>
                        <td colspan="2" class="center vertical-center greennotes bold">
                            PENGLIBATAN IBU BAPA
                        </td>';
                if($i == 1)
                {
                    $assessment_html_line = "";
                    if(isset($assessment) && !empty($assessment))
                    {
                        $cognitive = "";
                        $affective = "";
                        $psikomotor = "";
                        foreach($assessment as $assess)
                        {
                            if($assess['asc_desc'] == 'Kognitif')
                            {
                                $cognitive .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                            }

                            if($assess['asc_desc'] == 'Afektif')
                            {
                                $affective .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                            }

                            if($assess['asc_desc'] == 'Psikomotor')
                            {
                                $psikomotor .= $assess['asi_desc_number'] . ". " . $assess['asi_desc'] . "<br>";
                            }
                        }

                        $assessment_html_line .= "<b>Kognitif</b><br>" . $cognitive . "<br><b>Psikomotor</b><br>" . $psikomotor . "<br><b>Affective</b><br>" . $affective;
                    }
                    echo '<td colspan="2" rowspan="' . $highest_val_item_for_sbm_id-1 . '">'
                        . $assessment_html_line . 
                    '</td>
                    <td colspan="2" rowspan="' . $highest_val_item_for_sbm_id-1 . '" class="center vertical-center bold">';
                    echo (isset($dskpn_details['dskpn_parent_involvement'])&&!empty($dskpn_details['dskpn_parent_involvement'])&&$dskpn_details['dskpn_parent_involvement']=='Y')?"YA":"TIDAK";
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

            if(isset($all_domain_pengetahuan_asas) && !empty($all_domain_pengetahuan_asas))
                $max_adpa_val = count($all_domain_pengetahuan_asas);

            if(isset($all_domain_kemandirian) && !empty($all_domain_kemandirian))
                $max_adk_val = count($all_domain_kemandirian);

            if(isset($all_domain_kualiti_keperibadian) && !empty($all_domain_kualiti_keperibadian))
                $max_adkk_val = count($all_domain_kualiti_keperibadian);

            if(isset($all_kemahiran_insaniah) && !empty($all_kemahiran_insaniah))
                $max_aki_val = count($all_kemahiran_insaniah);
 
            //count max row for reka bentuk instruksi and integrasi teknologi
            if(isset($all_rekabentuk_instruksi) && !empty($all_rekabentuk_instruksi))
            if($max_adpa_val < count($all_rekabentuk_instruksi))
                $max_adpa_val = count($all_rekabentuk_instruksi) + 1;

            if(isset($all_integrasi_teknologi) && !empty($all_integrasi_teknologi))
            if($max_adpa_val < count($all_integrasi_teknologi))
                $max_adpa_val = count($all_integrasi_teknologi) + 1;

            //count max row for pendekatan and kaedah
            if(isset($all_kaedah) && !empty($all_kaedah))
            if($max_adk_val < count($all_kaedah))
                $max_adk_val = count($all_kaedah) + 1;

            if(isset($all_pendekatan) && !empty($all_pendekatan))
            if($max_adk_val < count($all_pendekatan))
                $max_adk_val = count($all_pendekatan) + 1;
            ?>

            <?php 
            for($j = 1; $j <= $max_adpa_val; $j++)
            {
                echo "<tr>";
                if($j == 1)
                { ?>
                    <td class="center vertical-center header" rowspan="<?= ($max_adpa_val + $max_adk_val + $max_adkk_val); ?>">
                        16 DOMAIN<br>KEMENJADIAN MURID
                    </td>
                    <td class="center vertical-center header" rowspan="<?= ($max_adpa_val); ?>">
                        PENGETAHUAN ASAS
                    </td>
                <?php
                } 
                
                foreach($subjects as $sb)
                {
                    ?>
                    <td class="center vertical-center">
                        <?php
                        if(isset($domain_pengetahuan_asas)&&!empty($domain_pengetahuan_asas))
                            foreach($domain_pengetahuan_asas as $index_dpa => $dpa)
                            {
                                if($dpa['dm_dmn_code'] == $all_domain_pengetahuan_asas[$j - 1]['dmn_code'] && $sb['sbm_id'] == $dpa['sbm_id'])
                                {
                                    echo "&#x2714;";
                                    unset($domain_pengetahuan_asas[$index_dpa]);
                                }
                            }
                        ?>
                    </td>
                    <td><?= (($max_adpa_val > 0) && isset($all_domain_pengetahuan_asas[$j - 1]['dmn_code']))?"(" . $all_domain_pengetahuan_asas[$j - 1]['dmn_code'] . ") " . $all_domain_pengetahuan_asas[$j - 1]['dmn_desc']:'' ?></td>
                    <?php
                }

                if($j == 1)
                    echo '<td class="center vertical-center greennotes bold" colspan="2">REKA BENTUK INSTRUKSI</td>
                          <td class="center vertical-center greennotes bold" colspan="2">INTEGRASI TEKNOLOGI</td>';

                // reka bentuk instruksi
                if(($j > 1) && ($j <= $max_adpa_val))
                {
                    echo "<td class='";
                    echo isset($all_rekabentuk_instruksi[$j-2]['tapp_id'])?"center vertical-center":"blank";
                    echo "'>";
                    if(isset($rekabentuk_instruksi) && !empty($rekabentuk_instruksi))
                    foreach($rekabentuk_instruksi as $index_ri => $ri)
                    {
                        if($all_rekabentuk_instruksi[$j-2]['tapp_id'] == $ri['tapp_id'])
                        {
                            echo "&#x2714;";
                            unset($rekabentuk_instruksi[$index_ri]);
                        }
                    }
                    echo "</td>";
                    echo "<td class='";
                    echo isset($all_rekabentuk_instruksi[$j-2]['tapp_id'])?"":"blank";
                    echo "'>";
                    echo isset($all_rekabentuk_instruksi[$j-2]['tapp_desc']) && !empty($all_rekabentuk_instruksi[$j-2]['tapp_desc'])?$all_rekabentuk_instruksi[$j-2]['tapp_desc']:'';
                    echo "</td>";
                } else if($j == 1) {} 
                else {
                    echo '<td></td><td></td>';
                }

                // integrasi teknologi
                if(($j > 1) && ($j <= $max_adpa_val))
                {
                    echo "<td class='";
                    echo isset($all_integrasi_teknologi[$j-2]['tapp_id'])?"center vertical-center":"blank";
                    echo "'>";
                    if(isset($integrasi_teknologi) && !empty($integrasi_teknologi))
                    foreach($integrasi_teknologi as $index_it => $it)
                    {
                        if($all_integrasi_teknologi[$j-2]['tapp_id'] == $it['tapp_id'])
                        {
                            echo "&#x2714;";
                            unset($integrasi_teknologi[$index_it]);
                        }
                    }
                    echo "</td>";
                    echo "<td class='";
                    echo isset($all_integrasi_teknologi[$j-2]['tapp_id'])?"":"blank";
                    echo "'>";
                    echo isset($all_integrasi_teknologi[$j-2]['tapp_desc']) && !empty($all_integrasi_teknologi[$j-2]['tapp_desc'])?$all_integrasi_teknologi[$j-2]['tapp_desc']:'';
                    echo "</td>";
                } else if($j == 1) {} 
                else {
                    echo '<td></td><td></td>';
                }

                echo "</tr>";
            } ?>


            <?php 
            for($j = 1; $j <= $max_adk_val; $j++)
            {
                echo "<tr>";
                if($j == 1)
                { ?>
                    <td class="center vertical-center header" rowspan="<?= ($max_adk_val); ?>">
                        KEMANDIRIAN
                    </td>
                <?php
                } 
                
                foreach($subjects as $sb)
                {
                    if(count($all_domain_kemandirian) > ($j))
                    {
                        echo '<td class="center vertical-center">';
                    } else if(count($all_domain_kemandirian) == ($j)) {
                        echo '<td class="center vertical-center" rowspan="' . (($max_adk_val+1) - count($all_domain_kemandirian)) . '">';
                    }
                   
                    if(isset($domain_kemandirian)&&!empty($domain_kemandirian))
                        foreach($domain_kemandirian as $index_dpa => $dpa)
                        {
                            if($dpa['dm_dmn_code'] == $all_domain_kemandirian[$j - 1]['dmn_code'] && $sb['sbm_id'] == $dpa['sbm_id'])
                            {
                                echo "&#x2714;";
                                unset($domain_kemandirian[$index_dpa]);
                            }
                        }
                    ?>
                    </td>
                    <?php
                    if(count($all_domain_kemandirian) > ($j))
                    { 
                    ?>
                        <td><?= (($max_adk_val > 0) && isset($all_domain_kemandirian[$j - 1]['dmn_code']))?"(" . $all_domain_kemandirian[$j - 1]['dmn_code'] . ") " . $all_domain_kemandirian[$j - 1]['dmn_desc']:'' ?></td>
                    <?php } else if(count($all_domain_kemandirian) == ($j)) { ?>
                        <td class="vertical-center" rowspan="<?= (($max_adk_val+1) - count($all_domain_kemandirian)) ?>"><?= (($max_adk_val > 0) && isset($all_domain_kemandirian[$j - 1]['dmn_code']))?"(" . $all_domain_kemandirian[$j - 1]['dmn_code'] . ") " . $all_domain_kemandirian[$j - 1]['dmn_desc']:'' ?></td>
                    <?php
                    }
                }

                if($j == 1)
                    echo '<td class="center vertical-center greennotes bold" colspan="2">PENDEKATAN:</td>
                          <td class="center vertical-center greennotes bold" colspan="2">KAEDAH:</td>';

                // pendekatan
                if(($j > 1) && ($j <= $max_adk_val))
                {
                    echo "<td class='";
                    echo isset($all_pendekatan[$j-2]['tapp_id'])?"center vertical-center":"blank";
                    echo "'>";
                    if(isset($pendekatan) && !empty($pendekatan))
                    foreach($pendekatan as $index_pdkt => $pdkt)
                    {
                        if($all_pendekatan[$j-2]['tapp_id'] == $pdkt['tapp_id'])
                        {
                            echo "&#x2714;";
                            unset($pendekatan[$index_pdkt]);
                        }
                    }
                    echo "</td>";
                    echo "<td class='";
                    echo isset($all_pendekatan[$j-2]['tapp_id'])?"":"blank";
                    echo "'>";
                    echo isset($all_pendekatan[$j-2]['tapp_desc']) && !empty($all_pendekatan[$j-2]['tapp_desc'])?$all_pendekatan[$j-2]['tapp_desc']:'';
                    echo "</td>";
                } else if($j == 1) {}  else {
                    echo '<td></td><td></td>';
                }

                // kaedah
                if(($j > 1) && ($j <= $max_adk_val))
                {
                    echo "<td class='";
                    echo isset($all_kaedah[$j-2]['tapp_id'])?"center vertical-center":"blank";
                    echo "'>";
                    if(isset($kaedah) && !empty($kaedah))
                    foreach($kaedah as $index_ri => $ri)
                    {
                        if($all_kaedah[$j-2]['tapp_id'] == $ri['tapp_id'])
                        {
                            echo "&#x2714;";
                            unset($kaedah[$index_ri]);
                        }
                    }
                    echo "</td>";
                    echo "<td class='";
                    echo isset($all_kaedah[$j-2]['tapp_id'])?"":"blank";
                    echo "'>";
                    echo isset($all_kaedah[$j-2]['tapp_desc']) && !empty($all_kaedah[$j-2]['tapp_desc'])?$all_kaedah[$j-2]['tapp_desc']:'';
                    echo "</td>";
                } else if($j == 1) {} else {
                    echo '<td></td><td></td>';
                }

                echo "</tr>";
            } ?>


            <?php 
            for($j = 1; $j <= $max_adkk_val; $j++)
            {
                echo "<tr>";
                if($j == 1)
                { ?>
                    <td class="center vertical-center header" rowspan="<?= ($max_adkk_val); ?>">
                        KUALITI KEPERIBADIAN
                    </td>
                <?php
                } 
                
                foreach($subjects as $sb)
                {
                    ?>
                    <td class="center vertical-center">
                        <?php
                        if(isset($domain_kualiti_keperibadian)&&!empty($domain_kualiti_keperibadian))
                            foreach($domain_kualiti_keperibadian as $index_dpa => $dpa)
                            {
                                if($dpa['dm_dmn_code'] == $all_domain_kualiti_keperibadian[$j - 1]['dmn_code'] && $sb['sbm_id'] == $dpa['sbm_id'])
                                {
                                    echo "&#x2714;";
                                    unset($domain_kualiti_keperibadian[$index_dpa]);
                                }
                            }
                        ?>
                    </td>
                    <td><?= (($max_adk_val > 0) && isset($all_domain_kualiti_keperibadian[$j - 1]['dmn_code']))?"(" . $all_domain_kualiti_keperibadian[$j - 1]['dmn_code'] . ") " . $all_domain_kualiti_keperibadian[$j - 1]['dmn_desc']:'' ?></td>
                    <?php
                }

                if($j == 1)
                    echo '<td class="center vertical-center greennotes bold" colspan="2">CATATAN</td>
                          <td colspan="2" rowspan="' . $max_adk_val + $max_aki_val . '"></td>';
                if($j == 2)
                    echo '<td colspan="2" rowspan="' . ($max_adk_val - 1) + $max_aki_val . '"></td>';

                echo "</tr>";
            } ?>


        <?php 
            for($j = 1; $j <= $max_aki_val; $j++)
            {
                echo "<tr>";
                if($j == 1)
                { ?>
                    <td class="center vertical-center bluelight bold" colspan="2" rowspan="<?= ($max_aki_val); ?>">
                        7 KEMAHIRAN INSANIAH
                    </td>
                <?php
                } 
                
                foreach($subjects as $sb)
                {
                    ?>
                    <td class="center vertical-center">
                        <?php
                        if(isset($kemahiran_insaniah)&&!empty($kemahiran_insaniah))
                            foreach($kemahiran_insaniah as $index_kii => $kii)
                            {
                                if($kii['dm_dmn_code'] == $all_kemahiran_insaniah[$j - 1]['dmn_code'] && $sb['sbm_id'] == $kii['sbm_id'])
                                {
                                    echo "&#x2714;";
                                    unset($kemahiran_insaniah[$index_kii]);
                                }
                            }
                        ?>
                    </td>
                    <td><?= (($max_adk_val > 0) && isset($all_kemahiran_insaniah[$j - 1]['dmn_code']))?"(" . $all_kemahiran_insaniah[$j - 1]['dmn_code'] . ") " . $all_kemahiran_insaniah[$j - 1]['dmn_desc']:'' ?></td>
                    <?php
                }

                echo "</tr>";
            } ?>
                
        </tbody>
    </table>
</body>
</html>