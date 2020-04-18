<?php
include '../../model/Db.php';
$db = new Db();
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak Rekap</title>
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
                                        <h4 style="font-size: 50px"> <u> <b>PT. Permata Jasa Century</b> </u>
                                        </h4>
                                        <p> <b>Jln. Sawahan No. 44 Padang-Sumbar</b> <br>
                                            Telp.(0751)27876, 7865000 Fax. (0751) 34395</p>
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
                                // $id = $_GET['id'];
                                // $dataParty = $db->getOneParty($id);
                                // var_dump($dataParty);
                                ?>
                            </address>
                        </div> -->
                                <!-- /.col -->

                                <div class="col-sm-12 invoice-col">
                                    <table border="0" style="font-family: Times New Roman">
                                        <tr>
                                            <td>Sub Do No </td>
                                            <td>:</td>
                                            <td>&emsp;<?php echo $dataParty->party_do  ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kepada Yth</td>
                                            <td>:</td>
                                            <td>
                                                <strong>&emsp;<?php echo $dataParty->perusahaan_nama  ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No SPK / STO</td>
                                            <td>:</td>
                                            <td>
                                                <strong>&emsp;<?php echo $dataParty->party_spk  ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&emsp;</td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $dataDetailPartys = $db->getAllDetailParty($id);
                                            foreach ($dataDetailPartys as $no => $data) :
                                                // var_dump($dataDetailParty);
                                                $JmlMuatTon     += $dataDetailParty->party_detail_ton_muat_pabrik;
                                                $JmlBongkarUip  += $dataDetailParty->party_detail_ton_bongkar_uip;
                                                $JmlSelisih     += $dataDetailParty->party_detail_selisih_ton;
                                                $JmlTagihan     += $dataDetailParty->party_detail_jum_tagihan;
                                                $JmlTotal       += $dataDetailParty->party_detail_total_tagihan;
                                            ?>
                                            <?php endforeach ?>
                                            <td>
                                                <p>Dengan Hormat</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&emsp;&emsp;&emsp;&emsp;Mohon Dimuatkan Palm Karnel berdasarkan rincian berikut</td>
                                            <td>:</td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table>
                                        <tr>
                                            <td>No DO / STO</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $data->party_detail_do ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Nama PT / CV</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $dataParty->perusahaan_nama ?> </td>
                                        </tr>
                                        <tr>
                                            <td>No SPPB</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $data->party_detail_sppb ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Party DO</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $dataParty->party_do ?> </td>
                                        </tr>
                                        <tr>
                                            <td>No Polisi</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $data->party_detail_no_polisi ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Tonase</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $dataParty->party_kontrak ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Supir</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $data->party_detail_nama_supir ?> </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- Table row -->
                            <!-- /.row -->
                            <div class=" row">
                                <div class="col-12 table-responsive">
                                </div>
                            </div>
                            <hr>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-12">
                                    <p> &emsp;&emsp;&emsp;&emsp;&emsp;Atas Bantuannya, kami ucapkan terima kasih.</p>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="row col-md-12">
                                    <table border="0" align="center">
                                        <tr>
                                            <th>
                                                <p class="float lead">
                                                    <center> <b>Hormat Kami</b></center>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <b><u>PT. Permata Jasa Century</u></b><br>
                                                    <!-- <b style="font-size: 15px">Direktur</b> -->
                                                </p>
                                            </th>
                                            <th width="500px"></th>
                                            <th>
                                                <p class="float lead">
                                                    <center><b>SOPIR</b></center>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <b><u>(......................)</u></b><br>
                                                    <!-- <b style="font-size: 15px">Direktur</b> -->
                                                </p>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <table border="2" align="center">
                                    <tr>
                                        <td style="font-size: 18px; font-family: Times New Roman">
                                            <h5>&emsp; Note : </h5>
                                            <p>&emsp; Jika mendapat coretan / tip-ex, sub DO dianggap batal<br>&emsp;
                                                Sub DO berlaku 3 hari dari tanggal Sub DO diterbitkan <br>&emsp;
                                                Aplikasi Sub DO tidak ada stempel asli / basah, Sub DO dianggap tidak sah&emsp;</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.row -->
                            <!-- this row will not appear when printing -->
                            <!-- <div class="row no-print">
                                <div class="col-12">
                                    <a href="module/party/cetakInvoice.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
                                </div>
                            </div> -->
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