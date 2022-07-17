<section class="content-header">
    <h1>
        <?= $title; ?> Kelas : <?= $jadwal['nama_kelas'] ?>-<?= $jadwal['tahun_angkatan'] ?> Tahun Akademik : <?= $ta['tahun_akademik'] ?>/<?= $ta['semester'] ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-6">
        <table class="table-striped table-responsive">
            <tr>
                <td width="100px">Fakultas</td>
                <td class="text-center" width="30px">:</td>
                <td><?= $jadwal['fakultas'] ?></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td><?= $jadwal['prodi'] ?></td>
            </tr>
            <tr>
                <td>Kode</td>
                <td>:</td>
                <td><?= $jadwal['kode_mata_kuliah'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-6">
        <table class="table-striped table-responsive">
            <tr>
                <td width="100px">Mata Kuliah</td>
                <td class="text-center" width="30px">:</td>
                <td><?= $jadwal['mata_kuliah'] ?></td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
            </tr>
            <tr>
                <td>Dosen</td>
                <td>:</td>
                <td><?= $jadwal['nama_dosen'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-12" style="margin-top: 5px; margin-bottom: 5px;">
        <a href="<?= base_url('dsn/PrintNilai/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-print"></i> Print Nilai</a>
    </div>
    <div class="col-sm-12">
        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <?= form_open('dsn/SimpanNilai/' . $jadwal['id_jadwal']) ?>
        <table class="table table-striped table-bordered table-responsive text-sm">
            <tr class="label-success">
                <th class="text-center" rowspan="2" width="20">No</th>
                <th class="text-center" rowspan="2" width="40">NIM</th>
                <th class="text-center" rowspan="2">Mahasiswa</th>
                <th class="text-center" colspan="6">Nilai</th>
            </tr>
            <tr class="label-success">
                <th class="text-center" width="100px">Absensi (15%)</th>
                <th class="text-center" width="90px">Tugas (15%)</th>
                <th class="text-center" width="90px">UTS (30%)</th>
                <th class="text-center" width="90px">UAS (40%)</th>
                <th class="text-center" width="90px">Akhir</th>
                <th class="text-center" width="90px">Huruf</th>
            </tr>
            <?php $no = 1;
            foreach ($mhs as $row) {
                echo form_hidden($row['id_krs'] . 'id_krs', $row['id_krs'])
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama_mahasiswa'] ?></td>
                    <td class="text-center">
                        <?php
                        $absensi = ($row['p1'] +
                            $row['p2'] +
                            $row['p3'] +
                            $row['p4'] +
                            $row['p5'] +
                            $row['p6'] +
                            $row['p7'] +
                            $row['p8'] +
                            $row['p9'] +
                            $row['p10'] +
                            $row['p11'] +
                            $row['p12'] +
                            $row['p13'] +
                            $row['p14'] +
                            $row['p15'] +
                            $row['p16'] +
                            $row['p17'] +
                            $row['p18']
                        ) / 36 * 100;
                        echo number_format($absensi, 0);
                        echo form_hidden($row['id_krs'] . 'absen', number_format($absensi, 0))
                        ?>
                    </td>
                    <td class="text-center"><input name="<?= $row['id_krs'] ?>nilai_tugas" value="<?= $row['nilai_tugas'] ?>" class="form-control"></td>
                    <td class="text-center"><input name="<?= $row['id_krs'] ?>nilai_uts" value="<?= $row['nilai_uts'] ?>" class="form-control"></td>
                    <td class="text-center"><input name="<?= $row['id_krs'] ?>nilai_uas" value="<?= $row['nilai_uas'] ?>" class="form-control"></td>
                    <td class="text-center"><?= $row['nilai_akhir'] ?></td>
                    <td class="text-center"><?= $row['nilai_huruf'] ?></td>
                </tr>
            <?php } ?>
        </table>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan Dan Proses</button>
        <?= form_close() ?>
    </div>
</div>