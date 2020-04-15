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
                                    <!-- <i class="fas fa-globe"></i> <i><?= $data['pengirim_nama'] ?></i>
                                    <small class="float-right">Tanggal: <?php echo date('d/m/Y') ?></small> -->
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
                                <!-- To
                                <address>
                                    <?php
                                    $id = $_GET['id'];
                                    $dataPupuk = $db->getOnePupuk($id);
                                    // var_dump($dataPupuk);
                                    ?>
                                    <strong><?php echo $dataPupuk->perusahaan_nama ?></strong><br>
                                    <?php echo $dataPupuk->perusahaan_telp ?><br>
                                    <?php echo $dataPupuk->perusahaan_alamat ?><br>
                                </address> -->
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
                                    <td><b><?php echo $dataPupuk->pupuk_do ?></b></td>
                                </tr>  
                                <tr>
                                    <td><b>No. Kontrak</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?php echo $dataPupuk->pupuk_nokontrak ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>No. SPK / STO</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?php echo $dataPupuk->pupuk_spk ?></b></td>
                                </tr>
                               
                              
                                <tr>
                                    <td><b>No. PO</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?php echo $dataPupuk->pupuk_po ?></b></td>
                                </tr>
                            </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table border="0" style="font-family: Times New Roman; font-weight: bold">
                                    <tr>
                                        <td>Sudah Terima Dari</td>
                                        <td>&emsp;:</td>
                                        <td>&emsp; <?php echo $dataPupuk->perusahaan_nama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>&emsp;:</td>
                                        <td>
                                            &emsp; <?= $dataPupuk->perusahaan_alamat ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Untuk Pembayaran</td>
                                        <td>&emsp;:</td>
                                        <td>&emsp; Penagihan Ongkos Angkut Pupuk Tujuan <?php echo $dataPupuk->perusahaan_nama ?></Penagihan>
                                    </tr>
                                    <tr>
                                        <?php
                                        $dataDetailPupuk = $db->getAllDetailPupuk($id);
                                        foreach ($dataDetailPupuk as $no => $data) :
                                            // var_dump($data);
                                            $JmlMuatTon     += $data->pupuk_detail_ton_muat_pabrik;
                                            $JmlBongkarUip  += $data->pupuk_detail_ton_bongkar_uip;
                                            $JmlSelisih     += $data->pupuk_detail_selisih_ton;
                                            $JmlTagihan     += $data->pupuk_detail_jum_tagihan;
                                            $JmlTotal       += $data->pupuk_detail_total_tagihan;
                                        ?>
                                        <?php endforeach ?>
                                        <td>Partai</td>
                                        <td>&emsp;:</td>
                                        <td>&emsp; <?php echo rupiah($JmlTotal) ?>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table style="font-weight: bold">
                                    <!-- <tr>
                                    <td>Keterangan</td>
                                    <td>&emsp;:</td>
                                    <td>&emsp;<?= rupiah($tTotal) ?></td>
                                </tr> -->
                                    <tr>
                                        <td>Terbilang</td>
                                        <td>&emsp;:</td>
                                        <td>&emsp; <i><?= terbilang($JmlTotal) ?></i> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <br><br><br>
                                <table border="2" align="left">
                                    <tr>
                                        <td style="font-size: 18px; font-family: Times New Roman">
                                            <h5>&emsp; Note : </h5>
                                            <h5>&emsp; Mohon Di Transfer Ke Rekening : </h5> <b>&emsp; A/n. Alman Hamid,
                                                No. Rek : 111-0005168717 &emsp;<br>&emsp;
                                                Bank Mandiri &emsp; <br>&emsp;
                                                Cabang Padang &emsp;
                                            </b>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <br><br><br>
                                <p class="float-right lead">
                                    <b>CV. ASIA MEGA</b>
                                    <br>
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