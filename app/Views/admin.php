<!-- judul -->
<section class="content-header">
    <h1>
        <?= $title; ?>
        <small>Control Panel</small>
    </h1>
    <br>
</section>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $jumlah_gedung; ?></h3>

                <p>Gedung</p>
            </div>
            <div class="icon">
                <i class="fa fa-building"></i>
            </div>
            <a href="<?= base_url('gedung') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $jumlah_ruangan ?></h3>

                <p>Ruangan</p>
            </div>
            <div class="icon">
                <i class="fa fa-columns"></i>
            </div>
            <a href="<?= base_url('ruangan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $jumlah_fakultas ?></h3>

                <p>Fakultas</p>
            </div>
            <div class="icon">
                <i class="fa fa-archive"></i>
            </div>
            <a href="<?= base_url('fakultas') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $jumlah_prodi ?></h3>

                <p>Program Studi</p>
            </div>
            <div class="icon">
                <i class="fa fa-rss-square"></i>
            </div>
            <a href="<?= base_url('prodi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
            <div class="inner">
                <h3><?= $jumlah_dosen ?></h3>

                <p>Dosen</p>
            </div>
            <div class="icon">
                <i class="fa fa-male"></i>
            </div>
            <a href="<?= base_url('dosen') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-fuchsia">
            <div class="inner">
                <h3><?= $jumlah_mahasiswa ?></h3>

                <p>Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="<?= base_url('mahasiswa') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-maroon">
            <div class="inner">
                <h3><?= $jumlah_matakuliah ?></h3>

                <p>Mata Kuliah</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <a href="<?= base_url('mata_kuliah') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
            <div class="inner">
                <h3><?= $jumlah_kelas ?></h3>

                <p>Kelas</p>
            </div>
            <div class="icon">
                <i class="fa fa-folder"></i>
            </div>
            <a href="<?= base_url('kelas') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->