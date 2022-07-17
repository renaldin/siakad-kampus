<!-- judul -->
<section class="content-header">
    <h1>
        <a class="btn btn-success" href="<?= base_url('jadwal_kuliah') ?>"><?= $title; ?></a>
        <small><?= $prodi['prodi']; ?></small>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">

            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="150px">Program Studi</th>
                        <td width="20px">:</td>
                        <td><?= $prodi['prodi']; ?></td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>:</td>
                        <td><?= $prodi['jenjang']; ?></td>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <td>:</td>
                        <td><?= $prodi['fakultas']; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>:</td>
                        <td><?= $tahun_akademik_aktif['tahun_akademik'] ?> - <?= $tahun_akademik_aktif['semester'] ?></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title; ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> Add</i></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php  } ?>
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
                            <th class="text-center">Semester</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kelas</th>
                            <th class="text-center">Dosen</th>
                            <th class="text-center">Hari</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Quota</th>
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['smt'] ?></td>
                                <td><?= $row['kode_mata_kuliah'] ?></td>
                                <td><?= $row['mata_kuliah'] ?></td>
                                <td><?= $row['sks'] ?></td>
                                <td><?= $row['nama_kelas'] ?> - <?= $row['tahun_angkatan'] ?></td>
                                <td><?= $row['nama_dosen'] ?></td>
                                <td><?= $row['hari'] ?></td>
                                <td><?= $row['waktu'] ?></td>
                                <td><?= $row['ruangan'] ?></td>
                                <td><?= $row['quota'] ?></td>
                                <td>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $row['id_jadwal']; ?>"><i class="fa fa-trash"></i></button>
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

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add <?= $title; ?></h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('jadwal_kuliah/add/' . $prodi['id_prodi']);
                ?>

                <div class="form-group">
                    <label for="">Mata Kuliah</label>
                    <select name="id_mata_kuliah" id="" class="form-control">
                        <option value="">--Pilih Mata Kuliah--</option>
                        <?php foreach ($matkul as $row) { ?>
                            <?php if ($row['semester'] == $tahun_akademik_aktif['semester']) { ?>
                                <option value="<?= $row['id_mata_kuliah'] ?>"><?= $row['smt'] ?> | <?= $row['kode_mata_kuliah'] ?> - <?= $row['mata_kuliah'] ?> | <?= $row['sks'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Dosen</label>
                    <select name="id_dosen" id="" class="form-control">
                        <option value="">--Pilih Dosen--</option>
                        <?php foreach ($dosen as $row) { ?>
                            <option value="<?= $row['id_dosen'] ?>"><?= $row['nama_dosen'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="id_kelas" id="" class="form-control">
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($kelas as $row) { ?>
                            <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?>-<?= $row['tahun_angkatan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select name="hari" id="" class="form-control">
                                <option value="">--Pilih Hari--</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                                <option value="Sabut">Sabut</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Waktu</label>
                            <input type="text" class="form-control" name="waktu" placeholder="Ex: 08:00-10:30">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Ruangan</label>
                            <select name="id_ruangan" id="" class="form-control">
                                <option value="">--Pilih Ruangan--</option>
                                <?php foreach ($ruangan as $row) { ?>
                                    <option value="<?= $row['id_ruangan'] ?>"><?= $row['ruangan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Quota</label>
                            <input type="text" class="form-control" name="quota" placeholder="Masukkan Quota">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($jadwal as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $row['id_jadwal']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title ?></h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus <?= $title ?> <b><?= $row['mata_kuliah']; ?> | <?= $row['nama_dosen'] ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('jadwal_kuliah/delete/' . $row['id_jadwal'] . '/' . $prodi['id_prodi']); ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>