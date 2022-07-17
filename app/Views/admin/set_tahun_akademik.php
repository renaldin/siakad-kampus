<!-- judul -->
<section class="content-header">
    <h1>
        Setting <?= $title; ?>
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
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tahun_akademik as $ta) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $ta['tahun_akademik']; ?></td>
                                <td><?= $ta['semester']; ?></td>
                                <td>
                                    <?php if ($ta['status'] == 0) {
                                        echo '<p class="label text-center bg-red">Tidak Aktif</p>';
                                    } else {
                                        echo '<p class="label text-center bg-green">Aktif</p>';
                                    } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($ta['status'] == 0) { ?>
                                        <a href="<?= base_url('tahun_akademik/set_status_ta/' . $ta['id_tahun_akademik']) ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-check"></i> Aktifkan</a>
                                    <?php } ?>
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
                echo form_open('tahun_akademik/add');
                ?>

                <div class="form-group">
                    <label for="tahun_akademik">Tahun Akademik</label>
                    <input type="text" class="form-control" name="tahun_akademik" placeholder="Ex: 2020/2021" required>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select class="form-control" name="semester" id="">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
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

<?php foreach ($tahun_akademik as $ta) { ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit<?= $ta['id_tahun_akademik']; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('tahun_akademik/edit/' . $ta['id_tahun_akademik']);
                    ?>

                    <div class="form-group">
                        <label for="tahun_akademik">Tahun Akademik</label>
                        <input type="text" class="form-control" name="tahun_akademik" placeholder="Masukkan Tahun Akademik" required value="<?= $ta['tahun_akademik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" name="semester" id="">
                            <option value="Ganjil" <?php if ($ta['semester'] == 'Ganjilp') {
                                                        echo 'Selected';
                                                    } ?>>Ganjil</option>
                            <option value="Genap" <?php if ($ta['semester'] == 'Genap') {
                                                        echo 'Selected';
                                                    } ?>>Genap</option>
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
<?php } ?>

<?php foreach ($tahun_akademik as $ta) { ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete<?= $ta['id_tahun_akademik']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Tahun Akademik - Semester <b><?= $ta['tahun_akademik']; ?> - <?= $ta['semester']; ?> ?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('tahun_akademik/delete/' . $ta['id_tahun_akademik']); ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>