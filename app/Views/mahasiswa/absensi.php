<section class="content-header">
    <h1>
        <?= $title; ?> Tahun Akademik : <?= $tahun_akademik_aktif['tahun_akademik'] ?> - <?= $tahun_akademik_aktif['semester'] ?>
    </h1>
    <br>
</section>

<div class="row">
    <table class="table table-striped table-bordered table-responsive">
        <tr class="label-success">
            <th class="text-center" rowspan="2">No</th>
            <th class="text-center" rowspan="2">Kode</th>
            <th class="text-center" rowspan="2">Mata Kuliah</th>
            <th class="text-center" colspan="18">Pertemuan</th>
            <th class="text-center" rowspan="2">%</th>
        </tr>
        <tr class="label-success">
            <th class="text-center">1</th>
            <th class="text-center">2</th>
            <th class="text-center">3</th>
            <th class="text-center">4</th>
            <th class="text-center">5</th>
            <th class="text-center">6</th>
            <th class="text-center">7</th>
            <th class="text-center">8</th>
            <th class="text-center">9</th>
            <th class="text-center">10</th>
            <th class="text-center">11</th>
            <th class="text-center">12</th>
            <th class="text-center">13</th>
            <th class="text-center">14</th>
            <th class="text-center">15</th>
            <th class="text-center">16</th>
            <th class="text-center">17</th>
            <th class="text-center">18</th>
        </tr>
        <?php $no = 1;
        $sks = 0;
        foreach ($DataKrs as $row) {
            $sks = $sks + $row['sks'];
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['kode_mata_kuliah'] ?></td>
                <td><?= $row['mata_kuliah'] ?></td>
                <td>
                    <?php if ($row['p1'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p1'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p1'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p2'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p2'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p2'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p3'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p3'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p3'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p4'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p4'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p4'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p5'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p5'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p5'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p6'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p6'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p6'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p7'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p7'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p7'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p8'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p8'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p8'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p9'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p9'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p9'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p10'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p10'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p10'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p11'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p11'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p11'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p12'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p12'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p12'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p13'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p13'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p13'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p14'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p14'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p14'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p15'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p15'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p15'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p16'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p16'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p16'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p17'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p17'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p17'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php if ($row['p18'] == 0) {
                        echo '<i class="fa fa-times text-center text-danger"></i>';
                    } elseif ($row['p18'] == 1) {
                        echo '<i class="fa fa-info text-center text-warning"></i>';
                    } elseif ($row['p18'] == 2) {
                        echo '<i class="fa fa-check text-center text-success"></i>';
                    } ?>
                </td>
                <td>
                    <?php
                    $absensi = ($row['p1'] +
                        $row['p2'] +
                        $row['p3'] +
                        $row['p4'] +
                        $row['p5'] +
                        $row['p6'] +
                        $row['p7'] +
                        $row['p8'] +
                        $row['p9'] +
                        $row['p10'] +
                        $row['p11'] +
                        $row['p12'] +
                        $row['p13'] +
                        $row['p14'] +
                        $row['p15'] +
                        $row['p16'] +
                        $row['p17'] +
                        $row['p18']
                    ) / 36 * 100;
                    echo number_format($absensi, 0) . ' %';
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>