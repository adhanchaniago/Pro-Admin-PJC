<?php
include '../../model/Db.php';
$db = new Db();
error_reporting(0);
?>
<?php
$data = $conn->query("SELECT * FROM tb_pengirim WHERE pengirim_id='$_GET[pengirim]'")->fetch_array();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> <i><?= $data['pengirim_nama'] ?></i>
                                    <!-- <small class="float-right">Tanggal: <?php echo date('d/m/Y') ?></small> -->
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong><?= $data['pengirim_nama'] ?></strong><br>
                                    <p><?= $data['pengirim_alamat'] ?></p>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <?php
                                    $id = $_GET['id'];
                                    $dataParty = $db->getOnePupuk($id);
                                    // var_dump($dataParty);
                                    ?>
                                    <strong><?php echo $dataParty->perusahaan_nama ?></strong><br>
                                    <?php echo $dataParty->perusahaan_telp ?><br>
                                    <?php echo $dataParty->perusahaan_alamat ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <table>
                                    <tr>
                                        <td> <b>Invoice</b> </td>
                                        <td><b>#</b></td>
                                        <td><b><?php echo date('dmYhis') ?></b></td>
                                    </tr>
                                    <tr>
                                        <td> <b>Tanggal</b> </td>
                                        <td><b>:</b></td>
                                        <td><b><?php echo date('d/m/Y') ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>No. Do</b></td>
                                        <td><b>:</b></td>
                                        <td><b><?php echo $dataParty->pupuk_do ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>No. Kontrak</b></td>
                                        <td><b>:</b></td>
                                        <td><b><?php echo $dataParty->pupuk_nokontrak ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>No. SPK / STO</b></td>
                                        <td><b>:</b></td>
                                        <td><b><?php echo $dataParty->pupuk_spk ?></b></td>
                                    </tr>


                                    <tr>
                                        <td><b>No. PO</b></td>
                                        <td><b>:</b></td>
                                        <td><b><?php echo $dataParty->pupuk_po ?></b></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">No. Polisi</th>
                                            <th rowspan="2">No DO</th>
                                            <th rowspan="2">No SPPB</th>
                                            <th rowspan="2">Tanggal Muat</th>
                                            <th style="text-align: center" colspan="3">Muat</th>
                                            <th rowspan="2">Tanggal Bongkar</th>
                                            <th style="text-align: center" colspan="3">Bongkar</th>
                                            <th rowspan="2">Selisih</th>
                                        </tr>
                                        <tr>
                                            <th>Tonase</th>
                                            <th>Zak</th>
                                            <th>Netto</th>
                                            <th>Tonase</th>
                                            <th>Zak</th>
                                            <th>Netto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dataDetailPupuks = $db->getAllDetailPupuk($id);
                                        foreach ($dataDetailPupuks as $no => $dataDetailPupuk) :
                                            // var_dump($dataDetailPupuk);
                                            $tMuat      += $dataDetailPupuk->pupuk_detail_ton_muat_pabrik;
                                            $tBongkar   += $dataDetailPupuk->pupuk_detail_ton_bongkar_uip;
                                            $satMuat   += $dataDetailPupuk->pupuk_detail_satuanmuat;
                                            $netMuat   += $dataDetailPupuk->pupuk_detail_nettomuat;
                                            $satBongkar   += $dataDetailPupuk->pupuk_detail_satuanbongkar;
                                            $netBongkar   += $dataDetailPupuk->pupuk_detail_nettobongkar;
                                            $tSelisih   += $dataDetailPupuk->pupuk_detail_selisih_ton;
                                        ?>
                                            <tr>
                                                <td><?php echo ++$no ?></td>
                                                <td><?php echo $dataDetailPupuk->pupuk_detail_no_polisi ?></td>
                                                <td><?php echo $dataDetailPupuk->pupuk_detail_do ?></td>
                                                <td><?php echo $dataDetailPupuk->pupuk_detail_sppb ?></td>
                                                <td><?php echo tgl_indo($dataDetailPupuk->pupuk_detail_tgl_muat_pabrik) ?></td>
                                                <td><?php echo format_angka($dataDetailPupuk->pupuk_detail_ton_muat_pabrik) ?></td>
                                                <td><?php echo format_angka($dataDetailPupuk->pupuk_detail_satuanmuat) ?></td>
                                                <td><?php echo format_angka($dataDetailPupuk->pupuk_detail_nettomuat) ?></td>
                                                <td><?php echo tgl_indo($dataDetailPupuk->pupuk_detail_tgl_bongkar_uip) ?></td>
                                                <td><?php echo format_angka($dataDetailPupuk->pupuk_detail_ton_bongkar_uip) ?></td>
                                                <td><?php echo format_angka($dataDetailPupuk->pupuk_detail_satuanbongkar) ?></td>
                                                <td><?php echo format_angka($dataDetailPupuk->pupuk_detail_nettobongkar) ?></td>
                                                <td><?php echo format_angka($dataDetailPupuk->pupuk_detail_selisih_ton) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Total</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo format_angka($tMuat) ?></td>
                                        <td><?php echo format_angka($satMuat) ?></td>
                                        <td><?php echo format_angka($netMuat) ?></td>
                                        <td></td>
                                        <td><?php echo format_angka($tBongkar) ?></td>
                                        <td><?php echo format_angka($satBongkar) ?></td>
                                        <td><?php echo format_angka($netBongkar) ?></td>
                                        <td><?php echo format_angka($tSelisih) ?></td>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="float-right lead">
                                    <b>PT. Permata Jasa Century</b>
                                    <br>
                                    <br>
                                    <br>
                                    <b><u>Alman Hamid</u></b><br>
                                    <b style="font-size: 15px">Direktur</b>
                                </p>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <!-- <a href="module/party/cetakInvoice.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a> -->
                                <button type="button" onclick="print()" class="btn btn-info"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>