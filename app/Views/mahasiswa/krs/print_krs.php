<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD | Print KRS</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        <i class="fa fa-file-pdf-o"></i> <b>Kartu Rencana Studi</b>
                        <small class="pull-right">Date: <?= date('d M Y') ?></small>
                    </h1>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info" style="margin-bottom: 5px;">
                <table class="table-striped table-responsive">
                    <tr>
                        <td rowspan="7"><img src="<?= base_url('fotomahasiswa/' . $mahasiswa['fotomahasiswa']) ?>" height="170px" width="150px" alt=""></td>
                        <td width="150px">Tahun Akademik</td>
                        <td width="20px">:</td>
                        <td><?= $tahun_akademik_aktif['tahun_akademik'] ?> - <?= $tahun_akademik_aktif['semester'] ?></td>
                        <td rowspan="7"></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $mahasiswa['nim'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>:</td>
                        <td><?= $mahasiswa['nama_mahasiswa'] ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td>:</td>
                        <td><?= $mahasiswa['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td>:</td>
                        <td><?= $mahasiswa['prodi'] ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $mahasiswa['nama_kelas'] ?>-<?= $mahasiswa['tahun_angkatan'] ?></td>
                    </tr>
                    <tr>
                        <td>Dosen PA</td>
                        <td>:</td>
                        <td><?= $mahasiswa['nama_dosen'] ?></td>
                    </tr>
                </table>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped table-bordered table-responsive">
                        <tr class="label-success">
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Kelas</th>
                            <th>Ruangan</th>
                            <th>Dosen</th>
                            <th>Waktu</th>
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
                                <td><?= $row['sks'] ?></td>
                                <td><?= $row['smt'] ?></td>
                                <td><?= $row['nama_kelas'] ?>-<?= $row['tahun_angkatan'] ?></td>
                                <td><?= $row['ruangan'] ?></td>
                                <td><?= $row['nama_dosen'] ?></td>
                                <td><?= $row['hari'] ?>, <?= $row['waktu'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-4">
                    <p class="lead"><b>Jumlah SKS : <?= $sks ?></b></p>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    Subang, <?= date('d M Y') ?><br>
                    Pembimbing Akademik <br><br><br>
                    dto. <br><br><br>
                    <?= $mahasiswa['nama_dosen'] ?>
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