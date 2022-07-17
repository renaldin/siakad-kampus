<!-- judul -->
<section class="content-header">
    <h1>
        <a class="btn btn-success" href="<?= base_url('mata_kuliah')?>"><?= $title; ?></a>
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
                            <th class="text-center">Kode</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Semester</th>
                            <th width="50px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($mata_kuliah as $matkul) {
                        ?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td class="text-center"><?= $matkul['kode_mata_kuliah']; ?></td>
                            <td><?= $matkul['mata_kuliah']; ?></td>
                            <td class="text-center"><?= $matkul['sks']; ?></td>
                            <td class="text-center"><?= $matkul['kategori']; ?></td>
                            <td class="text-center"><?= $matkul['smt']; ?> (<?= $matkul['semester']; ?>)</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $matkul['id_mata_kuliah']; ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
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
                    echo form_open('mata_kuliah/add/'.$prodi['id_prodi']);
                ?>

                <div class="form-group">
                    <label for="kode_mata_kuliah">Kode</label>
                    <input type="text" class="form-control" name="kode_mata_kuliah" placeholder="Masukkan Kode Mata Kuliah">
                </div>
                <div class="form-group">
                    <label for="mata_kuliah">Mata Kuliah</label>
                    <input type="text" class="form-control" name="mata_kuliah" placeholder="Masukkan Mata Kuliah">
                </div>
                <div class="form-group">
                    <label for="sks">SKS</label>
                    <select name="sks" id="" class="form-control">
                        <option value="">--Pilih SKS--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <option value="Wajib">Wajib</option>
                        <option value="Pilihan">Pilihan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="smt">Semester</label>
                    <select name="smt" id="" class="form-control">
                        <option value="">--Pilih Semester--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
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

<?php foreach ($mata_kuliah as $mk) {?>
<!-- Modal Delete -->
<div class="modal fade" id="delete<?= $mk['id_mata_kuliah']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete <?= $title; ?></h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Mata Kuliah <b><?= $mk['mata_kuliah']; ?> ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <a href="<?= base_url('mata_kuliah/delete/'.$prodi['id_prodi'].'/'.$mk['id_mata_kuliah']); ?>" class="btn btn-danger btn-flat">Delete</a>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>