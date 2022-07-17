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
                    <a href="<?= base_url('prodi/add'); ?>" class="btn btn-box-tool"><i class="fa fa-plus"> Add</i></a>
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
                            <th>Fakultas</th>
                            <th>Kode Prodi</th>
                            <th>Program Studi</th>
                            <th>Jenjang</th>
                            <th>Ketua Program Studi</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($prodi as $prodi) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><b><?= $prodi['fakultas']; ?></b></td>
                                <td><?= $prodi['kode_prodi']; ?></td>
                                <td><?= $prodi['prodi']; ?></td>
                                <td><?= $prodi['jenjang']; ?></td>
                                <td><?= $prodi['ka_prodi']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('prodi/edit/' . $prodi['id_prodi']); ?>" class="btn btn-info btn-sm btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $prodi['id_prodi']; ?>"><i class="fa fa-trash"></i></button>
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


<!-- Modal Delete -->
<div class="modal fade" id="delete<?= $prodi['id_prodi']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Prodi</h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Prodi <b><?= $prodi['prodi']; ?> ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('prodi/delete/' . $prodi['id_prodi']); ?>" class="btn btn-danger btn-flat">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->