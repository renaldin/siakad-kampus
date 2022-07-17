<!-- judul -->
<section class="content-header">
    <h1>
        <?= $title; ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">

            <!-- /.box-header -->
            <div class="box-body">
                <?php 
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    }
                ?>

                <table class="table table-bordered table-striped" id="">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Fakultas</th>
                            <th>Kode Prodi</th>
                            <th>Program Studi</th>
                            <th>Jenjang</th>
                            <th>Mata Kuliah</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $db = \Config\Database::connect();
                        $no = 1; 
                        foreach ($prodi as $prodi) { 
                            $jumlah = $db->table('mata_kuliah')
                                        ->where('id_prodi', $prodi['id_prodi'])
                                        ->countAllResults();
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><b><?= $prodi['fakultas']; ?></b></td>
                            <td><?= $prodi['kode_prodi']; ?></td>
                            <td><?= $prodi['prodi']; ?></td>
                            <td><?= $prodi['jenjang']; ?></td>
                            <td class="text-center">
                                <p class="label bg-green"><?= $jumlah; ?></p>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('mata_kuliah/detail/'.$prodi['id_prodi']); ?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-th-list"> Mata Kuliah</i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>