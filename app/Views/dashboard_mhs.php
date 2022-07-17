<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-success">
            <div class="box-body">
                <div class="text-center">
                    <img class="" src="<?= base_url('fotomahasiswa/' . $mhs['fotomahasiswa']) ?>" width="85%" height="220px">
                </div>

                <h3 class="profile-username text-center"><?= $mhs['nim'] ?></h3>
                <h3 class="profile-username text-center"><?= $mhs['nama_mahasiswa'] ?></h3>

                <p class="text-muted text-center"><?= $mhs['prodi'] ?></p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Biodata</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-responsive">
                    <tr>
                        <th>Tahun Akademik</th>
                        <th>:</th>
                        <td><?= $ta['tahun_akademik'] ?>/<?= $ta['semester'] ?></td>
                    </tr>
                    <tr>
                        <th>Fakultas</th>
                        <th>:</th>
                        <td><?= $mhs['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <th>:</th>
                        <td><?= $mhs['prodi'] ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <td><?= $mhs['nama_kelas'] ?>-<?= $mhs['tahun_angkatan'] ?></td>
                    </tr>
                    <tr>
                        <th>Dosen PA</th>
                        <th>:</th>
                        <td><?= $mhs['nama_dosen'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td>Subang</td>
                    </tr>
                    <tr>
                        <th>No. Telp</th>
                        <th>:</th>
                        <td>083845405765</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <th>:</th>
                        <td>renaldinoviandi9@gmail.com</td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->