<?php
include '../../model/Db.php';
$db = new Db();
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kwitansi</title>
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
                <div class="container-fluid">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12" align=center>
                                    <h4>
                                        <i class="fas fa-globe float-left">&nbsp;PT Permata Jasa Century</i>
                                        <small class="float-right">Tanggal: <?php echo date('d/m/Y') ?></small>
                                    </h4>
                                    <br><br><br>
                                </div>
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <!-- <div class="col-sm-4 invoice-col">
                            No :
                            <address>
                                <strong>PT. Permata Jasa Century</strong><br>
                                Jln. Sawahan No. 44 RT 002 RW 005<br>
                                Kel. Sawahan, Kec Padang Timur<br>
                                Kota Padang - Sumatera Barat<br>
                            </address>
                        </div> -->
                                <!-- /.col -->
                                <!-- <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <?php
                                $id = $_GET['id'];
                                $dataParty = $db->getOneParty($id);
                                // var_dump($dataParty);
                                ?>
                            </address>
                        </div> -->
                                <!-- /.col -->
                                <div class="col-sm-12 invoice-col">
                                    <table border="0" style="font-family: Times New Roman">
                                        <tr>
                                            <td>No</td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo date('dmYhis') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Telah Terima Dari</td>
                                            <td>:</td>
                                            <td width="940px" align="center" style="font-size: 30px; color: black">
                                                <strong>PT. Usaha Inti Padang (UIP)</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $dataDetailPartys = $db->getAllDetailParty($id);
                                            foreach ($dataDetailPartys as $no => $dataDetailParty) :
                                                // var_dump($dataDetailParty);
                                                @$JmlMuatTon     += $dataDetailParty->party_detail_ton_muat_pabrik;
                                                @$JmlBongkarUip  += $dataDetailParty->party_detail_ton_bongkar_uip;
                                                @$JmlSelisih     += $dataDetailParty->party_detail_selisih_ton;
                                                @$JmlTagihan     += $dataDetailParty->party_detail_jum_tagihan;
                                                @$JmlTotal       += $dataDetailParty->party_detail_total_tagihan;
                                            ?>
                                            <?php endforeach ?>
                                            <td>Uang Sejumlah</td>
                                            <td>:</td>
                                            <td>&emsp; <i> <?php echo  terbilang($JmlTotal) ?></i></td>
                                        </tr>
                                        <tr>
                                            <td>Untuk Pembayaran</td>
                                            <td>:</td>
                                            <td>&emsp; <u>Ongkos Angkut Palm kernel dari PKS <strong><?php echo $dataParty->perusahaan_nama ?></strong></u>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>&emsp; <u>ketangki Timbun PT. Usaha Inti Padang ( UIP ) Sebanyak <?php echo format_angka($JmlBongkarUip)  ?> KG</u> </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>&emsp; <u><b> STO :7786024112</b></u> </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- Table row -->
                            <div class=" row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <table border="0">
                                        <tr>
                                            <td style="font-family: Times New Roman">Dan untuk pembayarannya dapat ditransfer ke rekening :</td>
                                        <tr>
                                    </table>
                                    <table>
                                        </tr>
                                        <td style="font-size: 18px; font-family: Times New Roman"> <b>A/n. PT.PERMATA JASA CENTURY <br>
                                                No. Rek : 0058-01-002827-30-4 <br>
                                                Bank Rakyat Indonesia (BRI) <br>
                                                Cabang Padang
                                            </b> </td>
                                        </tr>
                                    </table>
                                    <br><br><br>
                                    <table border="3">
                                        <tr>
                                            <td style="font-size: 20px; font-family: Times New Roman"> <b> <u><?php echo rupiah($JmlTotal) ?></u> </b> </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.col -->
                                <br><br><br><br><br>
                                <div class="col-6">
                                    <br><br><br><br><br>
                                    <p class="float-right lead">
                                        <b>PT. Permata Jasa Century</b>
                                        <br>
                                        <br>
                                        <br>
                                        <br><br>
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
                                    <a href="module/party/cetakInvoice.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div>

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