<!-- judul -->
<section class="content-header">
    <h1>
        <?= $title; ?> Tahun Akademik : <?= $tahun_akademik_aktif['tahun_akademik'] ?> - <?= $tahun_akademik_aktif['semester'] ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">

            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered table-striped" id="">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Fakultas</th>
                            <th>Kode Prodi</th>
                            <th>Program Studi</th>
                            <th>Jenjang</th>
                            <th width="150px" class="text-center">Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($prodi as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><b><?= $row['fakultas'] ?></b></td>
                                <td><?= $row['kode_prodi'] ?></td>
                                <td><?= $row['prodi'] ?></td>
                                <td><?= $row['jenjang'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('jadwal_kuliah/detailjadwal/' . $row['id_prodi']) ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-calendar"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>