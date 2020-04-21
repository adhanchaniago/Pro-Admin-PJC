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
                        <li class="breadcrumb-item active">Invoice</li>
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
                <div class="row">
                    <div class="col-md-4">
                        <select name="perusahaan" class="form-control" id="pengirim_id">
                            <option value="0">Pilih</option>
                            <?php
                            $dataPengirim = $db->getAllPengirim();
                            foreach ($dataPengirim as $data) :
                            ?>
                                <option value="<?php echo $data->pengirim_id ?>"><?php echo $data->pengirim_nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <br>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i>
                                <i id="titles"></i>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <?php
                            ?>
                            From
                            <address>
                                <strong id="title"></strong><br>
                                <p id="alamat"></p>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <!-- To -->
                            <!-- <address>
                                <?php
                                $id = $_GET['id'];
                                $dataPupuk = $db->getOnePupuk($id);
                                // var_dump($dataParty);
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
                                        @$JmlMuatTon     += $data->pupuk_detail_ton_muat_pabrik;
                                        @$JmlBongkarUip  += $data->pupuk_detail_ton_bongkar_uip;
                                        @$JmlSelisih     += $data->pupuk_detail_selisih_ton;
                                        @$JmlTagihan     += $data->pupuk_detail_jum_tagihan;
                                        @$JmlTotal       += $data->pupuk_detail_total_tagihan;
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
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <br><br><br><br><br>
                            <p class="float-right lead">
                                <b>CV. ASIA MEGA</b>
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
                    <div class="row">
                        <div class="col-12">
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
                    <br><br><br>
                    <div class="row no-print">
                        <div class="col-12">
                            <!-- <a href="module/party/cetakInvoice.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a> -->
                            <button type="button" onclick="print()" class="btn btn-info"><i class="fas fa-print"></i> Print</button>
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
    <input type="hidden" id="id">
</div>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pengirim_id').click(function(e) {
            e.preventDefault();
            var id_pengirim = $(this).val();
            $.ajax({
                url: 'ambilTitle.php',
                type: 'POST',
                data: {
                    'id': id_pengirim
                },
                dataType: 'JSON',
                success: function(res) {
                    document.getElementById('title').innerHTML = res.pengirim_nama;
                    document.getElementById('titles').innerHTML = res.pengirim_nama;
                    document.getElementById('alamat').innerHTML = res.pengirim_alamat;
                    document.getElementById('id').value = res.pengirim_id;
                }
            })
        })
    })

    function print() {
        var id = $('#id').val();
        window.open('module/pupuk/cetakInvoice.php?id=<?php echo $id ?>&pengirim=' + id, '_blank')
    }
</script>