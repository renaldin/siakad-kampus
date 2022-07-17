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
                    <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-box-tool"><i class="fa fa-mail-reply"> Back</i></a>
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
                echo form_open_multipart('mahasiswa/update/' . $mahasiswa['id_mahasiswa']);
                ?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="kode_dosen">NIM</label>
                        <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" value="<?= $mahasiswa['nim'] ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa" value="<?= $mahasiswa['nama_mahasiswa'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_prodi">Program Studi</label>
                    <select name="id_prodi" class="form-control" id="">
                        <option value="<?= $mahasiswa['id_prodi'] ?>"><?= $mahasiswa['jenjang'] ?>-<?= $mahasiswa['prodi'] ?></option>
                        <?php foreach ($prodi as $row) { ?>
                            <option value="<?= $row['id_prodi'] ?>"><?= $row['jenjang'] ?>-<?= $row['prodi'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" value="<?= $mahasiswa['password'] ?>" class="form-control" name="password" placeholder="Masukkan Password">
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('fotomahasiswa/' . $mahasiswa['fotomahasiswa']) ?>" id="gambar_load" width="150" height="" alt="">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fotomahasiswa">Foto Mahasiswa</label>
                        <input type="file" class="form-control" id="preview_gambar" name="fotomahasiswa">
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