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
                        <li class="breadcrumb-item active">Tagihan</li>
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
                    <h5><i class="fas fa-info"></i> Note (INVOICE):</h5>
                    Halaman ini bisa di cetak. Klik tombol print di bawah halaman.
                </div>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-6 text-left">
                            <h4> <b>PT. Permata Jasa Century</b> </>
                            </h4>
                            <p> <b>Jln. Sawahan No. 44 Padang-Sumbar</b> <br>
                                Telp.(0751)27876, 7865000 Fax. (0751) 34395</p>
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
                                echo $id = $_GET['id'];
                                // $dataParty = $db->getOneParty($id);
                                ?>
                            </address>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
                        </div>
                        <div class="col-sm-6 invoice-col">
                            <table border="0" style="font-family: Times New Roman" align="right">
                                <tr>
                                    <td>No Invoice</td>
                                    <td>:</td>
                                    <td>&emsp;<?php echo date('dmYhis') ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>
                                        &emsp;<?= date("d F Y") ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No DO</td>
                                    <td>:</td>
                                    <td>&emsp; <?php echo  $dataParty->party_do ?></td>
                                </tr>
                                <tr>
                                    <td>No Kontrak</td>
                                    <td>:</td>
                                    <td>&emsp; <?php echo  $dataParty->party_nokontrak ?></td>
                                </tr>
                                <tr>
                                    <td>No SPK / STO</td>
                                    <td>:</td>
                                    <td>&emsp; <?php echo $dataParty->party_spk ?>
                                </tr>
                                <tr>
                                    <td>No PO</td>
                                    <td>:</td>
                                    <td>&emsp; <?php echo $dataParty->party_po ?>
                                </tr>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <hr>
                    <!-- Table row -->
                    <div class=" row">
                        <div class="col-12 table-responsive">
                            <table border="0" style="font-family: Times New Roman; font-weight: bold">
                                <tr>
                                    <td>Sudah Terima Dari</td>
                                    <td>&emsp;:</td>
                                    <td>&emsp; <?php echo $dataParty->perusahaan_nama ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&emsp;:</td>
                                    <td>
                                        &emsp; <?= $dataParty->perusahaan_alamat ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Untuk Pembayaran</td>
                                    <td>&emsp;:</td>
                                    <td>&emsp; Penagihan Ongkos Angkut Palm Karnel Tujuan <?php echo $dataParty->perusahaan_nama ?></Penagihan>
                                </tr>
                                <tr>

                                    <td>Partai</td>
                                    <td>&emsp;:</td>
                                    <td>&emsp; <?php echo rupiah($JmlTotal) ?>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <hr>
                    <!-- /.row -->
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <table border="0">
                                <tr>
                                    <td> <b>Terbilang</b> </td>
                                    <td>&emsp;:</td>
                                    <td> <i>&emsp;<?= terbilang($JmlTotal) ?></i> </td>
                                <tr>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <br><br><br><br><br>
                            <table border="2" align="center">
                                <tr>

                                    <td style="font-size: 18px; font-family: Times New Roman">
                                        <b>&emsp; A/N. PT. PERMATA JASA CENTURY <br>
                                            &emsp; No. Rek : 0058-01002827304 &emsp;<br>&emsp;
                                            Bank Rakyat Indonesia (BRI) &emsp; <br>&emsp;
                                            Cabang Padang &emsp;
                                        </b>
                                    </td>
                                </tr>
                            </table>
                        </div>
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
                    <hr>
                    <!-- /.row -->
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <br>
                            <a href="module/party/cetaktagihan.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
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