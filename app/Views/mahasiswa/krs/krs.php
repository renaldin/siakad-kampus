<section class="content-header">
    <h1>
        <?= $title; ?> Tahun Akademik : <?= $tahun_akademik_aktif['tahun_akademik'] ?> - <?= $tahun_akademik_aktif['semester'] ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
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
    <div class="col-sm-12" style="margin-top: 5px; margin-bottom: 5px;">
        <button class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Mata Kuliah</button>
        <a href="<?= base_url('krs/print') ?>" target="_blank" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-print"></i> Print KRS</a>
    </div>
    <div class="col-sm-12">

        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>

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
                <th></th>
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
                    <td class="text-center">
                        <button data-toggle="modal" data-target="#delete<?= $row['id_krs'] ?>" class="btn btn-flat btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <h4><b>Jumlah SKS : <?= $sks ?></b></h4>
    </div>
</div>

<!-- Modal Add Mata Kuliah-->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar Mata Kuliah</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped text-sm" id="example1">
                    <thead>
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
                            <th>Quota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect();
                        $no = 1;
                        foreach ($MatakuliahDitawarkan as $row) {
                            $jumlah = $db->table('krs')
                                ->where('id_jadwal', $row['id_jadwal'])
                                ->countAllResults();
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['kode_mata_kuliah'] ?></td>
                                <td>
                                    <?= $row['mata_kuliah'] ?>
                                    (<?= $row['kode_prodi'] ?>)
                                </td>
                                <td><?= $row['sks'] ?></td>
                                <td><?= $row['sks'] ?></td>
                                <td><?= $row['nama_kelas'] ?>-<?= $row['tahun_angkatan'] ?></td>
                                <td><?= $row['ruangan'] ?></td>
                                <td><?= $row['nama_dosen'] ?></td>
                                <td><?= $row['hari'] ?>, <?= $row['waktu'] ?></td>
                                <td>
                                    <span class="label label-success"><?= $jumlah ?>/<?= $row['quota'] ?></span>
                                </td>
                                <td>
                                    <?php if ($jumlah == $row['quota']) { ?>
                                        <span class="label label-danger">Full</span>
                                    <?php } else { ?>
                                        <a href="<?= base_url('krs/tambah_matkul/' . $row['id_jadwal']) ?>" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php foreach ($DataKrs as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $row['id_krs']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus KRS <b><?= $row['kode_mata_kuliah']; ?> | <?= $row['mata_kuliah']; ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('krs/delete/' . $row['id_krs']); ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>