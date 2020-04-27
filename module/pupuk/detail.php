<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php
                    $id = $_GET['id'];
                    $dataPupuk = $db->getOnePupuk($id);
                    ?>
                    <h1 class="m-0 text-dark">Data Laporan Transporter </h1>
                    <table>
                        <tr>
                            <td><b>No. SPK / STO</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo $dataPupuk->pupuk_spk ?></b></td>
                        </tr>
                        <tr>
                            <td><b>No. Do</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo $dataPupuk->pupuk_do ?></b></td>
                        </tr>
                        <tr>
                            <td><b>No. Kontrak</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo $dataPupuk->pupuk_nokontrak ?></b></td>
                        </tr>
                        <tr>
                            <td><b>Tonase Kontrak</b></td>
                            <td><b>:</b></td>
                            <td><b><?php echo format_angka($dataPupuk->pupuk_kontrak) ?></b></td>
                        </tr>
                    </table>
                </div><!-- /.col -->
                <div class="col-sm-6">
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
                    <!-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="index.php?page=module/pupuk/tambah_detail&id=<?php echo $id ?>" class="btn btn-success mb-4">Tambah Permintaan Muatan</a>
                        <a href="index.php?page=module/pupuk/index" class="btn btn-warning mb-4">Kembali</a>
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead align="center">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Aksi</th>
                                        <th rowspan="2">No. Polisi</th>
                                        <th rowspan="2">No DO</th>
                                        <th rowspan="2">No SPPB</th>
                                        <th rowspan="2">Tanggal Muat Pabrik</th>
                                        <th style="text-align: center" colspan="3">Muat</th>
                                        <th rowspan="2">Tanggal Bongkar UIP</th>
                                        <th style="text-align: center" colspan="3">Bongkar</th>
                                        <th rowspan="2">Selisih (Kg)</th>
                                        <th rowspan="2">Nama Supir</th>
                                        <th rowspan="2">Upah Kg (Rp)</th>
                                        <th rowspan="2">Jumlah Tagihan</th>
                                        <th rowspan="2">Admin Office Fee</th>
                                        <th rowspan="2">Driver Deposito</th>
                                        <th rowspan="2">Nagari</th>
                                        <th rowspan="2">Total Tagihan</th>
                                    </tr>
                                    <tr>

                                        <th>Tonase</th>
                                        <th>Satuan</th>
                                        <th>Netto</th>

                                        <th>Tonase</th>
                                        <th>Satuan</th>
                                        <th>Netto</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dataDetailPupuk = $db->getAllDetailPupuk($id);
                                    foreach ($dataDetailPupuk as $no => $data) :
                                        // var_dump($data);
                                        @$JmlMuatTon     += $data->pupuk_detail_ton_muat_pabrik;
                                        @$JmlBongkarUip  += $data->pupuk_detail_ton_bongkar_uip;
                                        @$JmlSelisih     += $data->pupuk_detail_selisih_ton;
                                        @$JmlTagihan     += $data->pupuk_detail_jum_tagihan;
                                        @$JmlTotal       += $data->pupuk_detail_total_tagihan;
                                    ?>
                                        <tr>
                                            <td width="5px"><?= ++$no ?></td>
                                            <td width="160px">
                                                <a href="index.php?page=module/pupuk/update_detail&id=<?= $data->pupuk_detail_id ?>&idParty=<?php echo $data->pupuk_id ?>" class="btn btn-sm btn-warning">Update</a>
                                                <p class="mt-1 mb-1"></p>
                                                <a target="blank" href="module/pupuk/cetakMuatan.php?id=<?= $data->pupuk_detail_id ?>" class="btn btn-sm btn-primary">Cetak Muatan</a>
                                                <p class="mt-1 mb-1"></p>
                                                <a href="index.php?page=module/pupuk/hapusDetail&idh=<?= $data->pupuk_detail_id ?>&id=<?php echo $id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                            <td><?= $data->pupuk_detail_no_polisi ?></td>
                                            <td><?= $data->pupuk_detail_do ?></td>
                                            <td><?= $data->pupuk_detail_sppb ?></td>
                                            <td><?= tgl_indo($data->pupuk_detail_tgl_muat_pabrik) ?></td>
                                            <td><?= format_angka($data->pupuk_detail_ton_muat_pabrik) ?></td>
                                            <td><?= format_angka($data->pupuk_detail_satuanmuat) ?> <?php echo $data->pupuk_detail_jenis ?></td>
                                            <td><?= format_angka($data->pupuk_detail_nettomuat) ?></td>
                                            <td><?= tgl_indo($data->pupuk_detail_tgl_bongkar_uip) ?></td>
                                            <td><?= format_angka($data->pupuk_detail_ton_bongkar_uip) ?></td>
                                            <td><?= format_angka($data->pupuk_detail_satuanbongkar) ?> <?php echo $data->pupuk_detail_jenis ?></td>
                                            <td><?= format_angka($data->pupuk_detail_nettobongkar) ?></td>
                                            <td><?= format_angka($data->pupuk_detail_selisih_ton) ?></td>
                                            <td><?= $data->pupuk_detail_nama_supir ?></td>
                                            <td><?= format_angka($data->pupuk_detail_upah_kg) ?></td>
                                            <td><?= rupiah($data->pupuk_detail_jum_tagihan) ?></td>
                                            <td><?= rupiah($data->pupuk_detail_admin) ?></td>
                                            <td><?= rupiah($data->pupuk_detail_driver_deposito) ?></td>
                                            <td><?= rupiah($data->pupuk_detail_nagari) ?></td>
                                            <td><?= rupiah($data->pupuk_detail_total_tagihan) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6">Total</th>
                                        <td><?php echo format_angka($JmlMuatTon) ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo format_angka($JmlBongkarUip) ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo format_angka($JmlSelisih) ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo rupiah($JmlTagihan) ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo rupiah($JmlTotal) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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