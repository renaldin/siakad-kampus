<section class="content-header">
    <h1>
        <?= $title; ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title; ?></h3>

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

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th class="text-center">Nama Kelas</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Dosen PA</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Jumlah</th>
                            <th width="100px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db = \Config\Database::connect();
                        $no = 1;
                        foreach ($kelas as $row) {

                            $jumlah = $db->table('mahasiswa')
                                ->where('id_kelas', $row['id_kelas'])
                                ->countAllResults();

                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><b><?= $row['nama_kelas']; ?>-<?= $row['tahun_angkatan'] ?></b></td>
                                <td><?= $row['prodi']; ?></td>
                                <td><?= $row['nama_dosen']; ?></td>
                                <td><?= $row['tahun_angkatan']; ?></td>
                                <td class="text-center">
                                    <p class="label bg-green"><?= $jumlah ?></p><br>
                                    <a href="<?= base_url('kelas/rincian_kelas/' . $row['id_kelas']) ?>">Mahasiswa</a>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $row['id_kelas']; ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $row['id_kelas']; ?>"><i class="fa fa-trash"></i></button>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add <?= $title ?></h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kelas/add');
                ?>

                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan Nama Kelas" required>
                </div>
                <div class="form-group">
                    <label for="">Program Studi</label>
                    <select name="id_prodi" class="form-control" id="">
                        <option value="">--Pilih Program Studi--</option>
                        <?php foreach ($prodi as $row) { ?>
                            <option value="<?= $row['id_prodi'] ?>"><?= $row['prodi'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Dosen PA</label>
                    <select name="id_dosen" class="form-control" id="">
                        <option value="">--Pilih Dosen TA--</option>
                        <?php foreach ($dosen as $row) { ?>
                            <option value="<?= $row['id_dosen'] ?>"><?= $row['nama_dosen'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tahun Angkatan</label>
                    <select name="tahun_angkatan" class="form-control" id="">
                        <option value="">--Pilih Tahun--</option>
                        <?php for ($i = date('Y'); $i >= date('Y') - 7; $i--) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
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

<?php foreach ($kelas as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $row['id_kelas']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title ?></h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Kelas <b><?= $row['nama_kelas']; ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kelas/delete/' . $row['id_kelas']); ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>