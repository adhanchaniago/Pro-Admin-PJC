<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php
                    $id = $_GET['id'];
                    $dataParty = $db->getOneParty($id);
                    ?>
                    <h1 class="m-0 text-dark">Data Laporan Transporter Palm Kernel</h1>
                    <table>
                        <tr>
                            <td><b>No. SPK / STO</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo $dataParty->party_spk ?></b></td>
                        </tr>
                        <tr>
                            <td><b>No. Do</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo $dataParty->party_do ?></b></td>
                        </tr>
                        <tr>
                            <td><b>No. Kontrak</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo $dataParty->party_nokontrak ?></b></td>
                        </tr>
                        <tr>
                            <td><b>Tonase Kontrak</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo format_angka($dataParty->party_kontrak) ?> Kg</b></td>
                        </tr>
                    </table>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Party</li>
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
                        <a href="index.php?page=module/party/tambah_detail&id=<?php echo $id ?>" class="btn btn-success mb-4">Tambah Permintaan Muatan</a>
                        <a href="index.php?page=module/party/index" class="btn btn-warning mb-4">Kembali</a>
                        <!-- <a href="index.php?page=module/party/invoice&id=<?php echo $id ?>" class="btn btn-info mb-4"><span class="fa fa-print"></span> Cetak</a> -->
                        <table id="example1" class="table-responsive table table-bordered table-striped">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>No Polisi</th>
                                    <th>Tgl Muat Pabrik</th>
                                    <th>No D/O</th>
                                    <!-- <th>No Kontrak</th> -->
                                    <th>No SPPB</th>
                                    <th>Tonase Muat Parbrik</th>
                                    <th>Tgl Bongkar UIP</th>
                                    <th>Tonase Bongkar UIP</th>
                                    <th>Selisih (Kg)</th>
                                    <th>Nama Supir</th>
                                    <th>Upah Kg (Rp)</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Admin Office Fee</th>
                                    <th>Driver Deposito</th>
                                    <th>Nagari</th>
                                    <th>Total Tagihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dataDetailPartys = $db->getAllDetailParty($id);
                                foreach ($dataDetailPartys as $no => $dataDetailParty) :
                                    @$JmlMuatTon     += $dataDetailParty->party_detail_ton_muat_pabrik;
                                    @$JmlBongkarUip  += $dataDetailParty->party_detail_ton_bongkar_uip;
                                    @$JmlSelisih     += $dataDetailParty->party_detail_selisih_ton;
                                    @$JmlTagihan     += $dataDetailParty->party_detail_jum_tagihan;
                                    @$JmlTotal       += $dataDetailParty->party_detail_total_tagihan;

                                    // var_dump($dataDetailParty);
                                ?>
                                    <tr>
                                        <td width="5px"><?= ++$no ?></td>
                                        <td width="160px">
                                            <a href="index.php?page=module/party/update_detail&id=<?= $dataDetailParty->party_detail_id ?>&idParty=<?php echo $dataDetailParty->party_id ?>" class="btn btn-sm btn-warning">Update</a>
                                            <p class="mt-1 mb-1"></p>
                                            <a target="blank" href="module/party/cetakMuatan.php?id=<?= $dataDetailParty->party_detail_id ?>" class="btn btn-sm btn-primary">Cetak Muatan</a>
                                            <p class="mt-1 mb-1"></p>
                                            <a href="index.php?page=module/party/hapusDetail&idh=<?= $dataDetailParty->party_detail_id ?>&id=<?php echo $id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                        <td><?= $dataDetailParty->party_detail_no_polisi ?></td>
                                        <td><?= tgl_indo($dataDetailParty->party_detail_tgl_muat_pabrik) ?></td>
                                        <td><?= $dataDetailParty->party_detail_do ?></td>
                                        <!-- <td><?= $dataDetailParty->party_detail_kontrak ?></td> -->
                                        <td><?= $dataDetailParty->party_detail_sppb ?></td>
                                        <td><?= format_angka($dataDetailParty->party_detail_ton_muat_pabrik) ?></td>
                                        <td><?= tgl_indo($dataDetailParty->party_detail_tgl_bongkar_uip) ?></td>
                                        <td><?= format_angka($dataDetailParty->party_detail_ton_bongkar_uip) ?></td>
                                        <td><?= format_angka($dataDetailParty->party_detail_selisih_ton) ?></td>
                                        <td><?= $dataDetailParty->party_detail_nama_supir ?></td>
                                        <td><?= rupiah($dataDetailParty->party_detail_upah_kg) ?></td>
                                        <td><?= rupiah($dataDetailParty->party_detail_jum_tagihan) ?></td>
                                        <td><?= rupiah($dataDetailParty->party_detail_admin) ?></td>
                                        <td><?= rupiah($dataDetailParty->party_detail_driver_deposito) ?></td>
                                        <td><?= rupiah($dataDetailParty->party_detail_nagari) ?></td>
                                        <td><?= rupiah($dataDetailParty->party_detail_total_tagihan) ?></td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <td><?php echo format_angka($JmlMuatTon) ?></td>
                                    <td></td>
                                    <td><?php echo format_angka($JmlBongkarUip) ?></td>
                                    <td><?php echo format_angka($JmlSelisih) ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo rupiah($JmlTagihan) ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo rupiah($JmlTotal) ?></td>
                                    <td></td>
                                </tr>
                            </tfoot>
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