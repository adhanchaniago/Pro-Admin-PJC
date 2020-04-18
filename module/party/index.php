<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>DATA PALM KARNEL</strong> </h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Palm Karnel</li>
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
                    <!-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="index.php?page=module/party/tambah" class="btn btn-success mb-4">Tambah Data Party</a>

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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dataPartys = $db->getAllParty();
                                foreach ($dataPartys as $no => $dataParty) :
                                    // var_dump($dataParty);
                                ?>
                                    <tr>
                                        <td width="5px"><?= ++$no ?></td>
                                        <td><?= $dataParty->perusahaan_nama ?></td>
                                        <td><?= $dataParty->party_spk ?></td>
                                        <td><?= $dataParty->party_do ?></td>
                                        <td><?= $dataParty->party_po ?></td>
                                        <td><?= $dataParty->party_nokontrak ?></td>
                                        <td><?= format_angka($dataParty->party_kontrak) ?></td>
                                        <td width="200px">
                                            <a href="index.php?page=module/party/tagihan&id=<?= $dataParty->party_id ?>" class="btn btn-sm btn-info">Invoice</a>
                                            <a href="index.php?page=module/party/invoice&id=<?= $dataParty->party_id ?>" class="btn btn-sm btn-success">Rekapitulasi</a>
                                            <!-- <a href="index.php?page=module/party/rekap&id=<?= $dataParty->party_id ?>" class="btn btn-sm btn-success">Rekap</a> -->

                                            <p class="mt-1 mb-1"></p>
                                            <!-- <a href="index.php?page=module/party/edit&id=<?= $dataParty->party_id ?>" class="btn btn-sm btn-warning">Edit</a> -->
                                            <a align='right' href="index.php?page=module/party/hapus&id=<?= $dataParty->party_id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            <a href="index.php?page=module/party/detail&id=<?= $dataParty->party_id ?>" class="btn btn-sm btn-primary">Transporter</a>

                                            <!-- <a href="index.php?page=module/party/invoice&id=<?php echo $id ?>" class="btn btn-info mb-4"><span class="fa fa-print"></span> Cetak</a> -->
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