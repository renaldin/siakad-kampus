<!-- judul -->
<section class="content-header">
    <h1>
        <?= $title; ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-sm-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title; ?></h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('dosen'); ?>" class="btn btn-box-tool"><i class="fa fa-mail-reply"> Back</i></a>
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
                echo form_open_multipart('dosen/insert');
                ?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="kode_dosen">Kode Dosen</label>
                        <input type="text" class="form-control" name="kode_dosen" placeholder="Masukkan Kode Dosen">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" class="form-control" name="nidn" placeholder="Masukkan NIDN">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_dosen">Nama Dosen</label>
                    <input type="text" class="form-control" name="nama_dosen" placeholder="Masukkan Nama Dosen">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Masukkan Password">
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('fotodosen/default.png') ?>" id="gambar_load" width="150" height="" alt="">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="foto_dosen">Foto Dosen</label>
                        <input type="file" class="form-control" id="preview_gambar" name="foto_dosen">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php
            echo form_close();
            ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-3">

    </div>
</div>