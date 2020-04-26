<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>Data Transporter</strong> </h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Transporter</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($db->saveDetailPupuk($_POST) > 0) {
                echo "
                    <script>
                    alert('Data berhasil di simpan');
                    window.location='index.php?page=module/pupuk/detail&id=$_GET[id]';
                    </script>
                    ";
            } else {
                echo "
                <script>
                alert('Data gagal di simpan');
                window.location='index.php?page=module/pupuk/index';
                </script>
                ";
            }
        }
        ?>
        <div class="row col-md-12">
            <div class="card card-info" style="width: 100%">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" class="form-horizontal">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <?php
                                $detailPupuk = $db->getOneDetailPupuk($_GET['id']);
                                // var_dump($detailPupuk);
                                ?>
                                <div readonly class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. Polisi</label>
                                    <div class="col-sm-8">
                                        <input name="idPupuk" value="<?php echo $_GET['idParty'] ?>" type="hidden">
                                        <input name="idDetail" value="<?php echo $detailPupuk->pupuk_detail_id ?>" type="hidden">
                                        <input name="noPolisi" value="<?php echo $detailPupuk->pupuk_detail_no_polisi ?>" type="text" class="form-control" placeholder="No. Polisi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. DO</label>
                                    <div class="col-sm-8">
                                        <input readonly name="noDo" value="<?php echo $detailPupuk->pupuk_detail_do ?>" type="text" class="form-control" placeholder="No. Polisi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. Kontrak</label>
                                    <div class="col-sm-8">
                                        <input readonly name="noKontrak" value="<?php echo $detailPupuk->pupuk_detail_kontrak ?>" type="text" class="form-control" placeholder="No. Polisi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tgl Muat Pabrik</label>
                                    <div class="col-sm-8">
                                        <input name="tglMuatPabrik" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. SPPB</label>
                                    <div class="col-sm-8">
                                        <input name="noSppb" type="number" class="form-control" placeholder="No. SPPB">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis</label>
                                    <div class="col-sm-8">
                                        <select name="jenisSatuan" id="JenisSatuan" class="form-control">
                                            <option value="0">Pilih</option>
                                            <?php
                                            $dataSatuan = $db->getAllSatuan();
                                            foreach ($dataSatuan as $data) :
                                            ?>
                                                <option value="<?php echo $data->satuan_nama ?>"><?php echo $data->satuan_nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tonase Muat Parbik</label>
                                    <div class="col-sm-8">
                                        <input name="tonaseMuatPabrik" id="tonaseMuatPabrik" onkeyup="prosesSelisih1()" type="number" class="form-control" placeholder="Tonase Muat Parbik">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Satuan Muat</label>
                                    <div class="col-sm-8">
                                        <input readonly name="satuanMuat" id="satuan" type="number" class="form-control" placeholder="Satuan Muat">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Netto Muat</label>
                                    <div class="col-sm-8">
                                        <input name="nettoMuat" id="satuan" type="number" class="form-control" placeholder="Satuan Muat">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tgl Bongkar UIP</label>
                                    <div class="col-sm-8">
                                        <input name="tglBongkarUip" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tonase Bongkar UIP</label>
                                    <div class="col-sm-8">
                                        <input onkeyup="prosesSelisihBongkar();prosesSelisih45()" name="tonaseBongkarUip" id="tonaseBongkarUip" type="number" class="form-control" placeholder="Tonase Bongkar UIP">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Satuan Bongkar</label>
                                    <div class="col-sm-8">
                                        <input readonly name="satuanBongkar" id="satuanBongkar" type="number" class="form-control" placeholder="Satuan Bongkar UIP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Netto Bongkar</label>
                                    <div class="col-sm-8">
                                        <input name="nettoBongkar" id="satuan" type="number" class="form-control" placeholder="Satuan Muat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Selisih</label>
                                    <div class="col-sm-8">
                                        <input readonly name="selisih" id="selisih" type="number" class="form-control" placeholder="Selisih">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Supir</label>
                                    <div class="col-sm-8">
                                        <input readonly name="namaSupir" value="<?php echo $detailPupuk->pupuk_detail_nama_supir ?>" type="text" class="form-control" placeholder="Nama Supir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Upah Kg (Rp)</label>
                                    <div class="col-sm-8">
                                        <input onkeyup="prosesTagihan()" name="upah" id="upah" type="number" class="form-control" placeholder="Upah Kg (Rp)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jumlah Tagihan</label>
                                    <div class="col-sm-8">
                                        <input readonly name="jumlahTagihan" id="jumlahTagihan" type="number" class="form-control" placeholder="Jumlah Tagihan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Admin Office Fee</label>
                                    <div class="col-sm-8">
                                        <input onkeyup="prosesTotal()" name="adminOfficeFee" id="adminOfficeFee" type="number" class="form-control" placeholder="Admin Office Fee">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Driver Deposito</label>
                                    <div class="col-sm-8">
                                        <input onkeyup="prosesTotal()" name="driverDeposito" id="driverDeposito" type="number" class="form-control" placeholder="Driver Deposito">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nagari</label>
                                    <div class="col-sm-8">
                                        <input onkeyup="prosesTotal()" name="nagari" id="nagari" type="number" class="form-control" placeholder="Nagari">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Total Tagihan</label>
                                    <div class="col-sm-8">
                                        <input readonly name="totalTagihan" id="totalTagihan" type="number" class="form-control" placeholder="Total Tagihan">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning float-center">Reset</button>
                        <a href="index.php?page=module/pupuk/index" class="btn btn-success float-right">Kembali</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
    var data_jenis_keseluruhan = <?= json_encode($db->getAllSatuan()) ?>;
    var data_jenis = null;
    //Muat UIP
    function prosesSelisih1() {
        var data_terpilih = (document.getElementById("JenisSatuan").selectedIndex) - 1;
        var satuan_jumlah = 0;
        if (data_terpilih >= 0) {
            data_jenis = data_jenis_keseluruhan[data_terpilih];
        }
        var muatPabrik = document.getElementById('tonaseMuatPabrik').value;
        var selisih = muatPabrik / data_jenis.satuan_jumlah;
        document.getElementById('satuan').value = selisih;
    }
    //Bongkar UIP
    function prosesSelisihBongkar() {
        // data_jenis = data_jenis_keseluruhan[data_terpilih];
        var bongkarPabrik = document.getElementById('tonaseBongkarUip').value;
        var selisih = bongkarPabrik / data_jenis.satuan_jumlah;
        document.getElementById('satuanBongkar').value = selisih;
    }
    //Mencari selisih 
    function prosesSelisih45() {
        var s1 = document.getElementById('tonaseMuatPabrik').value;
        var s2 = document.getElementById('tonaseBongkarUip').value;

        var hasil = s1 - s2;

        document.getElementById('selisih').value = hasil;

    }
    //Total Tagihan
    function prosesTotal() {
        var tagihan = document.getElementById('jumlahTagihan').value;
        var admin = document.getElementById('adminOfficeFee').value;
        var driver = document.getElementById('driverDeposito').value;
        var nagari = document.getElementById('nagari').value;
        var hasil = tagihan - admin - driver - nagari;
        document.getElementById('totalTagihan').value = hasil;
    }
    //Jumlah Tagihan
    function prosesTagihan() {
        var bongkarUip = document.getElementById('tonaseBongkarUip').value;
        var upah = document.getElementById('upah').value;
        var hasil = bongkarUip * upah;
        document.getElementById('jumlahTagihan').value = hasil;
    }
</script>