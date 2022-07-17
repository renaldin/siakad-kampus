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
                    <a href="<?= base_url('prodi'); ?>" class="btn btn-box-tool"><i class="fa fa-mail-reply"> Back</i></a>
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
                echo form_open('prodi/insert');
                ?>

                <div class="form-group">
                    <label for="id_fakultas">Fakultas</label>
                    <select name="id_fakultas" id="" class="form-control">
                        <option value="">--Pilih Fakultas--</option>
                        <?php foreach ($fakultas as $fa) { ?>
                            <option value="<?= $fa['id_fakultas']; ?>"><?= $fa['fakultas']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode_prodi">Kode Program Studi</label>
                    <input type="text" class="form-control" name="kode_prodi" placeholder="Masukkan Kode Program Studi">
                </div>
                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <input type="text" class="form-control" name="prodi" placeholder="Masukkan Program Studi">
                </div>
                <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <select name="jenjang" id="" class="form-control">
                        <option value="">--Pilih Jenjang--</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ka_prodi">Ketua Program Studi</label>
                    <select name="ka_prodi" id="" class="form-control">
                        <option value="">--Pilih Pilih Ketua Program Studi--</option>
                        <?php foreach ($dosen as $row) { ?>
                            <option value="<?= $row['nama_dosen'] ?>"><?= $row['nama_dosen'] ?></option>
                        <?php } ?>
                    </select>
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