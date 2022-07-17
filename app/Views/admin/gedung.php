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
                            <th>Gedung</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($gedung as $gd) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $gd['gedung']; ?></td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $gd['id_gedung']; ?>"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $gd['id_gedung']; ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add Gedung</h4>
            </div>
            <div class="modal-body">
                <?php 
                    echo form_open('gedung/add');
                ?>

                <div class="form-group">
                    <label for="gedung">Gedung</label>
                    <input type="text" class="form-control" name="gedung" placeholder="Masukkan Nama Gedung" required>
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

<?php foreach ($gedung as $gd) {?>
<!-- Modal Edit -->
<div class="modal fade" id="edit<?= $gd['id_gedung']; ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Gedung</h4>
            </div>
            <div class="modal-body">
                <?php 
                    echo form_open('gedung/edit/'.$gd['id_gedung']);
                ?>

                <div class="form-group">
                    <label for="gedung">gedung</label>
                    <input type="text" class="form-control" name="gedung" placeholder="Masukkan Nama Gedung" required value="<?= $gd['gedung']; ?>">
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

<?php foreach ($gedung as $gd) {?>
<!-- Modal Delete -->
<div class="modal fade" id="delete<?= $gd['id_gedung']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Gedung</h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Gedung <b><?= $gd['gedung']; ?> ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('gedung/delete/'.$gd['id_gedung']); ?>" class="btn btn-danger btn-flat">Delete</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>