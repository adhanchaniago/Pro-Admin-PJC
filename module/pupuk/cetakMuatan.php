<?php
$id = $_GET['id'];
include '../../model/Db.php';
$db = new Db();
$dataMuat = $db->getOneDetailPupuk($id);
// error_reporting(0);
// var_dump($db->getOneDetailpupuk($id));
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak Tagihan</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="font-family: Times New Roman; ">
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
                                        <h4 style="font-size: 50px"> <b>CV. Asia Mega</b> </>
                                        </h4>
                                        <p> <b>Jln. Sawahan No. 44 Padang-Sumbar</b> <br>
                                            Telp.(0751)27876, 7865000 Fax. (0751) 34395</p>
                                        <!-- <small class="float-right">Tanggal: <?php echo date('d/m/Y') ?></small> -->
                                    </h4>
                                    <hr>
                                </div>
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">
                                    No : <?php echo date('dmYhis') ?>
                                    <address>
                                        <strong>Hal : Permintaan Muatan</strong><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-2"></div>
                                <div class="col-sm-4 invoice-col">

                                    <address>
                                        Padang, <?php echo date('d F Y') ?>
                                        <p>
                                            Kepada Yth. <br>
                                            <?php echo $dataMuat->perusahaan_nama ?> <br><br>
                                            di Tempat
                                        </p>
                                    </address>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class=" row">

                                <div class="col-12  table-responsive">
                                    <p>
                                        Dengan hormat, <br>
                                        Mohon untuk dapat diberikan muatan Truck:
                                    </p>
                                    <table border="0" class="ml-5" style="font-family: Times New Roman; font-weight: bold">
                                        <tr class=" mt-0 mb-0">
                                            <td>Nomor Polisi</td>
                                            <td>&emsp;:</td>
                                            <td>&emsp; <?php echo $dataMuat->pupuk_detail_no_polisi ?></td>
                                        </tr>
                                        <tr class=" mt-0 mb-0">
                                            <td>Nama Sopir</td>
                                            <td>&emsp;:</td>
                                            <td>
                                                &emsp; <?= $dataMuat->pupuk_detail_nama_supir ?>
                                            </td>
                                        </tr>
                                        <tr class=" mt-0 mb-0">
                                            <td>Nomor SIM</td>
                                            <td>&emsp;:</td>
                                            <td> &emsp; <?= $dataMuat->pupuk_detail_muat_no_sim ?></td>
                                        </tr>
                                        <tr class=" mt-0 mb-0">
                                            <td>Jenis Barang</td>
                                            <td>&emsp;:</td>
                                            <td> &emsp; <?= $dataMuat->pupuk_detail_muat_jenis ?></td>
                                        </tr>
                                        <tr class=" mt-0 mb-0">
                                            <td>Berat</td>
                                            <td>&emsp;:</td>
                                            <td> &emsp; <?= $dataMuat->pupuk_detail_muat_berat ?></td>
                                        </tr>
                                        <tr class=" mt-0 mb-0">
                                            <td>Tujuan</td>
                                            <td>&emsp;:</td>
                                            <td> &emsp; <?= $dataMuat->pupuk_detail_muat_tujuan ?></td>
                                        </tr>
                                        <tr class=" mt-0 mb-0">
                                            <td>Nomor DO</td>
                                            <td>&emsp;:</td>
                                            <td> &emsp; <?= $dataMuat->pupuk_detail_do ?></td>
                                        </tr>
                                        <tr class=" mt-0 mb-0">
                                            <td>Nomor Kontrak</td>
                                            <td>&emsp;:</td>
                                            <td> &emsp; <?= $dataMuat->pupuk_detail_kontrak ?></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            <hr>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-md-6">
                                    <p>
                                        Demikianlah, atas bantuannya kami ucapkan terima kasih
                                    </p>
                                    <p>
                                        <div class="row">
                                            <div class="col-md-1">
                                                CTT:
                                            </div>

                                            <div class="col-md-10">
                                                Pemilik Kontrak tidak bertanggung jawab <br>
                                                a. Apa bila DO tidak ada CAP STEMPEL ASLI <br>
                                                b. Apa bila DO dirubah / Dicoret - Coret
                                            </div>
                                        </div>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="float-right lead">
                                        <b>CV. Asia Mega</b>
                                        <br>
                                        <br>
                                        <br>
                                        <b>(Alman Hamid)</b><br>
                                        <b style=" font-size: 15px">Direktur</b>
                                    </p>
                                </div>
                                <!-- /.col -->
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