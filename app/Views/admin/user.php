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
                            <th class="text-center">Nama User</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Foto</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($user as $usr) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $usr['nama_user']; ?></td>
                            <td><?= $usr['username']; ?></td>
                            <td><?= $usr['password']; ?></td>
                            <td class="text-center"><img src="<?= base_url('foto/'.$usr['foto']); ?>" width="70px" height="70px" alt="User Image" class="img-circle"></td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $usr['id_user']; ?>"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $usr['id_user']; ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add <?= $title; ?></h4>
            </div>
            <div class="modal-body">
                <?php 
                    echo form_open_multipart('user/add');
                ?>

                <div class="form-group">
                    <label for="nama_user">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama User">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" placeholder="Masukkan Foto">
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

<?php foreach ($user as $usr) {?>
<!-- Modal Edit -->
<div class="modal fade" id="edit<?= $usr['id_user']; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit <?= $title; ?></h4>
            </div>
            <div class="modal-body">
                <?php 
                    echo form_open_multipart('user/edit/'.$usr['id_user']);
                ?>

                <div class="form-group">
                    <label for="nama_user">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Masukkan Nama User" required value="<?= $usr['nama_user']; ?>">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?= $usr['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Masukkan Password" value="<?= $usr['password']; ?>">
                </div>
                <div class="form-group">
                    <label for="foto">Ganti Foto</label>
                    <input type="file" class="form-control" name="foto" placeholder="Masukkan Foto">
                </div>
                <div class="form-group">
                    <img src="<?= base_url('foto/'.$usr['foto']); ?>" alt="Foto" class="image-circle" width="100px" height="100px">
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
<?php } ?>

<?php foreach ($user as $usr) {?>
<!-- Modal Delete -->
<div class="modal fade" id="delete<?= $usr['id_user']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title; ?></h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus User <b><?= $usr['nama_user']; ?> ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('user/delete/'.$usr['id_user']); ?>" class="btn btn-danger btn-flat">Delete</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>