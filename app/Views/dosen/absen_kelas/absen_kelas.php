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
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Dosen</th>
            <th class="text-center">Absensi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($absen as $row) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['mata_kuliah'] ?></td>
                <td><?= $row['sks'] ?></td>
                <td><?= $row['nama_kelas'] ?>, <?= $row['tahun_angkatan'] ?></td>
                <td><?= $row['nama_dosen'] ?></td>
                <td class="text-center">
                    <a href="<?= base_url('dsn/absensi/' . $row['id_jadwal']) ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-calendar"></i> Absensi</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>