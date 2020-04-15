<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=module/party/index">Home</a></li>
                        <li class="breadcrumb-item active">Kwitansi</li>
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
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Halaman ini bisa di cetak. Klik tombol print di bawah halaman.
                </div>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12" align=center>
                            <h4 style="font-size: 50px"> <u> <b>KWITANSI</b> </u>
                                <!-- <small class="float-right">Tanggal: <?php echo date('d/m/Y') ?></small> -->
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
                                        $JmlMuatTon     += $dataDetailParty->party_detail_ton_muat_pabrik;
                                        $JmlBongkarUip  += $dataDetailParty->party_detail_ton_bongkar_uip;
                                        $JmlSelisih     += $dataDetailParty->party_detail_selisih_ton;
                                        $JmlTagihan     += $dataDetailParty->party_detail_jum_tagihan;
                                        $JmlTotal       += $dataDetailParty->party_detail_total_tagihan;
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
                                    <td>&emsp; <u><b> SPK / STO : <?php echo $dataParty->party_spk ?></b></u> </td>
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

                        <div class="col-6">
                            <br><br><br><br><br>
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
                    <br><br><br>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="module/party/cetakkwitansi.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>