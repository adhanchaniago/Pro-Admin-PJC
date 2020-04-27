<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                <!-- <div class="row">
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
                </div> -->
                <br>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i>
                                <i id="titles">PT. Permata Jasa Century</i>
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
                                <strong id="title">PT. Permata Jasa Century</strong><br>
                                <p id="alamat">Jln. Sawahan No. 44 RT 002 RW 005 Kel. Sawahan, Kec Padang Timur Kota Padang - Sumatera Barat</p>
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
                                        <!-- <th>No Kontrak</th> -->
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
                                        $tMuat      += $dataDetailParty->party_detail_ton_muat_pabrik;
                                        $tBongkar   += $dataDetailParty->party_detail_ton_bongkar_uip;
                                        $tSelisih   += $dataDetailParty->party_detail_selisih_ton;
                                    ?>
                                        <tr>
                                            <td><?php echo ++$no ?></td>
                                            <td><?php echo $dataDetailParty->party_detail_no_polisi ?></td>
                                            <td><?php echo $dataDetailParty->party_detail_do ?></td>
                                            <!-- <td><?php echo $dataDetailParty->party_detail_kontrak ?></td> -->
                                            <td><?php echo $dataDetailParty->party_detail_sppb ?></td>
                                            <td><?php echo tgl_indo($dataDetailParty->party_detail_tgl_muat_pabrik) ?></td>
                                            <td><?php echo format_angka($dataDetailParty->party_detail_ton_muat_pabrik) ?></td>
                                            <td><?php echo tgl_indo($dataDetailParty->party_detail_tgl_bongkar_uip) ?></td>
                                            <td><?php echo format_angka($dataDetailParty->party_detail_ton_bongkar_uip) ?></td>
                                            <td><?php echo format_angka($dataDetailParty->party_detail_selisih_ton) ?></td>
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
        window.open('module/party/cetakInvoice.php?id=<?php echo $id ?>&pengirim=' + id, '_blank')
    }
</script>