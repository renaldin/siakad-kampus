<section class="content-header">
    <h1>
        <?= $title; ?> Tahun Akademik : <?= $ta['tahun_akademik'] ?>/<?= $ta['semester'] ?>
    </h1>
    <br>
</section>

<div class="row">
    <table class="table table-striped table-bordered table-responsive">
        <tr class="label-success">
            <th>No</th>
            <th>Program Studi</th>
            <th>Hari</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Dosen</th>
        </tr>
        <?php
        $no = 1;
        foreach ($jadwal as $row) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['prodi'] ?></td>
                <td><?= $row['hari'] ?>, <?= $row['waktu'] ?></td>
                <td><?= $row['kode_mata_kuliah'] ?></td>
                <td><?= $row['mata_kuliah'] ?></td>
                <td><?= $row['sks'] ?></td>
                <td><?= $row['nama_kelas'] ?>, <?= $row['tahun_angkatan'] ?></td>
                <td><?= $row['ruangan'] ?></td>
                <td><?= $row['nama_dosen'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>