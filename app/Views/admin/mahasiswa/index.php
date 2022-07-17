<!-- judul -->
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
                    <a href="<?= base_url('mahasiswa/add'); ?>" class="btn btn-box-tool"><i class="fa fa-plus"> Add</i></a>
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
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama Mahasiswa</th>
                            <th class="text-center">Program Studi</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Foto</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mahasiswa as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nim'] ?></td>
                                <td><?= $row['nama_mahasiswa'] ?></td>
                                <td><?= $row['jenjang'] ?>-<?= $row['prodi'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td class="text-center"><img src="<?= base_url('fotomahasiswa/' . $row['fotomahasiswa']); ?>" width="70px" height="70px" alt="User Image" class="img-circle"></td>
                                <td class="text-center">
                                    <a href="<?= base_url('mahasiswa/edit/' . $row['id_mahasiswa']) ?>" class="btn btn-info btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $row['id_mahasiswa']; ?>"><i class="fa fa-trash"></i></button>
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

<?php foreach ($mahasiswa as $row) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $row['id_mahasiswa']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Mahasiswa <b><?= $row['nama_mahasiswa']; ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('mahasiswa/delete/' . $row['id_mahasiswa']); ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>