<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?page=module/pupuk/index">Home</a></li>
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
                            <h4>
                                <h4 style="font-size: 50px"> <u> <b>CV. ASIA MEGA</b> </u>
                                </h4>
                                <p> <b>Jln. Sawahan No. 44 Padang-Sumbar</b> <br>
                                    Telp.(0751)27876, 7865000 Fax. (0751) 34395</p>
                                <small class="float-right">Tanggal: <?php echo date('d/m/Y') ?></small>
                            </h4>
                            <br>
                        </div>
                    </div>
                    <!-- info row -->
                    <?php
                    $id = $_GET['id'];
                    $dataPupuk = $db->getOnePupuk($id);
                    // var_dump($dataParty);
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6" align=right>
                            <table>
                                <tr>
                                    <td> <b>Invoice</b> </td>
                                    <td><b>#</b></td>
                                    <td><b><?php echo date('dmYhis') ?></b></td>
                                </tr>
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
                                    <td><b>Jenis</b></td>
                                    <td><b>:</b></td>
                                    <td><b></b></td>
                                </tr>
                                <!-- <tr>
                                    <td><b>Tonase Kontrak</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?php echo $dataPupuk->pupuk_kontrak ?></b></td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                    <hr>
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
                                
                            </address>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-sm-12 invoice-col">
                            <?php
                            $dataDetailPupuk = $db->getAllDetailPupuk($id);
                            foreach ($dataDetailPupuk as $no => $data) :
                                // var_dump($dataDetailParty);
                                @$tMuat      += $data->pupuk_detail_ton_muat_pabrik;
                                @$zMuat      += $data->pupuk_detail_satuanmuat;
                                @$nMuat      += $data->pupuk_detail_nettomuat;
                                @$tBongkar   += $data->pupuk_detail_ton_bongkar_uip;
                                @$zBongkar      += $data->pupuk_detail_satuanbongkar;
                                @$nBongkar      += $data->pupuk_detail_nettobongkar;
                                @$tSelisih   += $data->pupuk_detail_selisih_ton;
                                @$tTotal   += $data->pupuk_detail_total_tagihan;
                            ?>
                            <?php endforeach ?>
                            <table border="0" style="font-family: Times New Roman">
                                <tr>
                                    <td>Telah Terima Dari</td>
                                    <td>&emsp;:</td>
                                    <td>
                                        <strong> &emsp;<?php echo $dataPupuk->perusahaan_nama ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Untuk Pembayaran</td>
                                    <td>&emsp;:</td>
                                    <td>&emsp; <u>Ongkos Angkut Pupuk <strong><?php echo $dataPupuk->perusahaan_nama ?></strong></u>
                                </tr>
                                <tr>
                                    <td>Terbilang</td>
                                    <td>&emsp;:</td>
                                    <td>&emsp; <i><?php echo terbilang($tTotal) ?></i> </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <hr>
                    <!-- Table row -->
                    <!-- /.row -->
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <br><br><br><br><br><br>
                            <table border="3">
                                <tr>
                                    <td style="font-size: 20px; font-family: Times New Roman"> <b> <u><?php echo rupiah($tTotal) ?></u> </b> </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.col -->

                        <div class="col-6">
                            <br><br>
                            <p class="float-right lead">
                                <b>PT. Permata Jasa Century</b>
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
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table border="2" align="center">
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
                    </div>
                    <br><br>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="module/pupuk/cetakkwitansi.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
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