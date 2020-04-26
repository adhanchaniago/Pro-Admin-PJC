<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong> DATA PUPUK</strong></h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Pupuk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="index.php?page=module/pupuk/tambah" class="btn btn-success mb-4">Tambah Data Party</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>No SPK / STO</th>
                                    <th>No DO</th>
                                    <th>No PO</th>
                                    <th>No Kontrak</th>
                                    <th>Kontrak Tonase</th>
                                    <th>Jenis Pupuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dataPupuk = $db->getAllPupuk();
                                foreach ($dataPupuk as $no => $data) :
                                    // var_dump($dataParty);
                                ?>
                                    <tr>
                                        <td width="5px"><?= ++$no ?></td>
                                        <td><?= $data->perusahaan_nama ?></td>
                                        <td><?= $data->pupuk_spk ?></td>
                                        <td><?= $data->pupuk_do ?></td>
                                        <td><?= $data->pupuk_po ?></td>
                                        <td><?= $data->pupuk_nokontrak ?></td>
                                        <td><?= format_angka($data->pupuk_kontrak) ?></td>
                                        <td><?= $data->pupuk_jenis ?></td>
                                        <td width="200px">
                                            <a href="index.php?page=module/pupuk/tagihan&id=<?= $data->pupuk_id ?>" class="btn btn-sm btn-info">Invoice</a>
                                            <a href="index.php?page=module/pupuk/invoice&id=<?= $data->pupuk_id ?>" class="btn btn-sm btn-success">Rekapitulasi</a>
                                            <!-- <a href="index.php?page=module/pupuk/rekap&id=<?= $data->pupuk_id ?>" class="btn btn-sm btn-success">Rekap</a> -->

                                            <p class="mt-1 mb-1"></p>
                                            <!-- <a href="index.php?page=module/pupuk/edit&id=<?= $data->pupuk_id ?>" class="btn btn-sm btn-warning">Edit</a> -->
                                            <a align='right' href="index.php?page=module/pupuk/hapus&id=<?= $data->pupuk_id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            <a href="index.php?page=module/pupuk/detail&id=<?= $data->pupuk_id ?>" class="btn btn-sm btn-primary">Transporter</a>

                                            <!-- <a href="index.php?page=module/pupuk/invoice&id=<?php echo $id ?>" class="btn btn-info mb-4"><span class="fa fa-print"></span> Cetak</a> -->
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>