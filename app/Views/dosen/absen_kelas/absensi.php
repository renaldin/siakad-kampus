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
        <a href="<?= base_url('dsn/print_absensi/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-xs btn-flat btn-primary"><i class="fa fa-print"></i> Print Absensi</a>
    </div>
    <div class="col-sm-12">
        <?php
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        ?>
        <?= form_open('dsn/SimpanAbsen/' . $jadwal['id_jadwal']) ?>
        <table class="table table-striped table-bordered table-responsive text-sm">
            <tr class="label-success">
                <th class="text-center" rowspan="2">No</th>
                <th class="text-center" rowspan="2">NIM</th>
                <th class="text-center" rowspan="2">Mahasiswa</th>
                <th class="text-center" colspan="18">Pertemuan</th>
            </tr>
            <tr class="label-success">
                <th class="text-center">1</th>
                <th class="text-center">2</th>
                <th class="text-center">3</th>
                <th class="text-center">4</th>
                <th class="text-center">5</th>
                <th class="text-center">6</th>
                <th class="text-center">7</th>
                <th class="text-center">8</th>
                <th class="text-center">9</th>
                <th class="text-center">10</th>
                <th class="text-center">11</th>
                <th class="text-center">12</th>
                <th class="text-center">13</th>
                <th class="text-center">14</th>
                <th class="text-center">15</th>
                <th class="text-center">16</th>
                <th class="text-center">17</th>
                <th class="text-center">18</th>
            </tr>
            <?php $no = 1;
            foreach ($mhs as $row) {

                echo form_hidden($row['id_krs'] . 'id_krs', $row['id_krs'])
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama_mahasiswa'] ?></td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p1">
                            <option value="0" <?php if ($row['p1'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p1'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p1'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p2">
                            <option value="0" <?php if ($row['p2'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p2'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p2'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p3">
                            <option value="0" <?php if ($row['p3'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p3'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p3'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p4">
                            <option value="0" <?php if ($row['p4'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p4'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p4'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p5">
                            <option value="0" <?php if ($row['p5'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p5'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p5'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p6">
                            <option value="0" <?php if ($row['p6'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p6'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p6'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p7">
                            <option value="0" <?php if ($row['p7'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p7'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p7'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p8">
                            <option value="0" <?php if ($row['p8'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p8'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p8'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p9">
                            <option value="0" <?php if ($row['p9'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p9'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p9'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p10">
                            <option value="0" <?php if ($row['p10'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p10'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p10'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p11">
                            <option value="0" <?php if ($row['p11'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p11'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p11'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p12">
                            <option value="0" <?php if ($row['p12'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p12'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p12'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p13">
                            <option value="0" <?php if ($row['p13'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p13'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p13'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p14">
                            <option value="0" <?php if ($row['p14'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p14'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p14'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p15">
                            <option value="0" <?php if ($row['p15'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p15'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p15'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p16">
                            <option value="0" <?php if ($row['p16'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p16'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p16'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p17">
                            <option value="0" <?php if ($row['p17'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p17'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p17'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                    <td>
                        <select name="<?= $row['id_krs'] ?>p18">
                            <option value="0" <?php if ($row['p18'] == 0) {
                                                    echo 'selected';
                                                } ?>>A</option>
                            <option value="1" <?php if ($row['p18'] == 1) {
                                                    echo 'selected';
                                                } ?>>I</option>
                            <option value="2" <?php if ($row['p18'] == 2) {
                                                    echo 'selected';
                                                } ?>>H</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan Absen</button>
        <?= form_close() ?>
    </div>
</div>