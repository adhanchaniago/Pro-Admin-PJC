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
    <title>Cetak Invoice</title>
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
                                    $dataParty = $db->getOneParty($id);
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
                                    <td><b><?php echo $dataParty->party_do ?></b></td>
                                </tr> 
                                <tr>
                                    <td><b>No. Kontrak</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?php echo $dataParty->party_nokontrak ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>No. SPK / STO</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?php echo $dataParty->party_spk ?></b></td>
                                </tr>
                                
                               
                                <tr>
                                    <td><b>No. PO</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?php echo $dataParty->party_po ?></b></td>
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
                                            <th>No</th>
                                            <th>No. Polisi</th>
                                            <th>No D/O</th>
                                            <th>No SPPB</th>
                                            <th>Tanggal Muat</th>
                                            <th>Tonase Muat</th>
                                            <th>Tanggal Bongkar</th>
                                            <th>Tonase Bongkar</th>
                                            <th>Selisih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $dataDetailPartys = $db->getAllDetailParty($id);
                                        foreach ($dataDetailPartys as $no => $dataDetailParty) :
                                            // var_dump($dataDetailParty);
                                            $tMuat += $dataDetailParty->party_detail_ton_muat_pabrik;
                                            $tBongkar += $dataDetailParty->party_detail_ton_bongkar_uip;
                                            $tSelisih += $dataDetailParty->party_detail_selisih_ton;
                                        ?>
                                            <tr>
                                                <td><?php echo ++$no ?></td>
                                                <td><?php echo $dataDetailParty->party_detail_no_polisi ?></td>
                                                <td><?php echo $dataDetailParty->party_detail_do ?></td>
                                                <td><?php echo $dataDetailParty->party_detail_sppb ?></td>
                                                <td><?php echo tgl_indo($dataDetailParty->party_detail_tgl_muat_pabrik) ?></td>
                                                <td><?php echo format_angka($dataDetailParty->party_detail_ton_muat_pabrik) ?></td>
                                                <td><?php echo tgl_indo($dataDetailParty->party_detail_tgl_bongkar_uip) ?></td>
                                                <td><?php echo format_angka($dataDetailParty->party_detail_ton_bongkar_uip) ?></td>
                                                <td><?php echo $dataDetailParty->party_detail_selisih_ton ?></td>
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
                                        <td></td>
                                        <td><?php echo format_angka($tBongkar) ?></td>
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
                    </div>
                    <!-- /.invoice -->
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