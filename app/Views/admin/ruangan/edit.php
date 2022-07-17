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
                    <a href="<?= base_url('ruangan'); ?>" class="btn btn-box-tool"><i class="fa fa-mail-reply"> Back</i></a>
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
                echo form_open('ruangan/update/'.$ruangan['id_ruangan']);
            ?>

                <div class="form-group">
                    <label for="gedung">Gedung</label>
                    <select name="id_gedung" id="" class="form-control">
                        <option value="<?= $ruangan['id_gedung']; ?>"><?= $ruangan['gedung']; ?></option>
                        <?php foreach($gedung as $gd) { ?>
                            <option value="<?= $gd['id_gedung']; ?>"><?= $gd['gedung']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gedung">Ruangan</label>
                    <input type="text" class="form-control" name="ruangan" value="<?= $ruangan['ruangan']; ?>" placeholder="Masukkan Nama Ruangan" required>
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