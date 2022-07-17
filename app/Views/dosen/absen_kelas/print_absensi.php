<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD | Print Absensi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">



    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css" media="print">
        /* @page {size:landscape}  */
        body {
            page-break-before: avoid;
            width: 100%;
            height: 100%;
            zoom: 100%
        }
    </style>
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        <i class="fa fa-file-pdf-o"></i> <b>Absensi Kelas</b> Tahun Akademik : <?= $ta['tahun_akademik'] ?>/<?= $ta['semester'] ?>
                        <small class="pull-right">Date: <?= date('d M Y') ?></small>
                    </h1>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-6 table-responsive">
                    <table class="table-striped table-responsive">
                        <tr>
                            <td width="100px">Fakultas</td>
                            <td class="text-center" width="30px">:</td>
                            <td><?= $jadwal['fakultas'] ?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td><?= $jadwal['prodi'] ?></td>
                        </tr>
                        <tr>
                            <td>Kode</td>
                            <td>:</td>
                            <td><?= $jadwal['kode_mata_kuliah'] ?></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
                <div class="col-xs-6 table-responsive">
                    <table class="table-striped table-responsive">
                        <tr>
                            <td>Mata Kuliah</td>
                            <td class="text-center" width="30px">:</td>
                            <td><?= $jadwal['mata_kuliah'] ?></td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
                        </tr>
                        <tr>
                            <td>Dosen</td>
                            <td>:</td>
                            <td><?= $jadwal['nama_dosen'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-responsive">
                        <tr class="label-success">
                            <th class="text-center" rowspan="2">No</th>
                            <th class="text-center" rowspan="2" width="40px">NIM</th>
                            <th class="text-center" rowspan="2" width="180px">Mahasiswa</th>
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
                        foreach ($mhs as $row) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama_mahasiswa'] ?></td>
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
            </div>
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    Subang, <?= date('d M Y') ?><br>
                    Dosen <br><br><br>
                    dto. <br><br><br>
                    <?= $jadwal['nama_dosen'] ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>