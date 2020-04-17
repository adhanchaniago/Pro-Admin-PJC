<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <br><br>
                <div class="col-sm-12">
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
            if ($db->saveDetailParty($_POST) > 0) {
                echo "
                    <script>
                    alert('Data berhasil di simpan');
                    window.location='index.php?page=module/party/detail&id=$_GET[id]';
                    </script>
                    ";
            } else {
                echo "
                <script>
                alert('Data gagal di simpan');
                window.location='index.php?page=module/party/index';
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
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. Polisi</label>
                                    <div class="col-sm-8">
                                        <input name="idParty" value="<?php echo $_GET['id'] ?>" type="hidden" class="form-control">
                                        <input name="noPolisi" type="text" class="form-control" placeholder="No. Polisi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tgl Muat Pabrik</label>
                                    <div class="col-sm-8">
                                        <input name="tglMuatPabrik" type="date" value="<?php echo date('Y-m-d') ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. D/O</label>
                                    <div class="col-sm-8">
                                        <input name="noDo" type="text" class="form-control" placeholder="No. D/O">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. Kontrak</label>
                                    <div class="col-sm-8">
                                        <input name="nokontrak" type="text" class="form-control" placeholder="No. Kontrak">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. SPPB</label>
                                    <div class="col-sm-8">
                                        <input name="noSppb" type="number" class="form-control" placeholder="No. SPPB">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tonase Muat Parbik</label>
                                    <div class="col-sm-8">
                                        <input name="tonaseMuatPabrik" id="tonaseMuatPabrik" type="number" class="form-control" placeholder="Tonase Muat Parbik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tgl Bongkar UIP</label>
                                    <div class="col-sm-8">
                                        <input name="tglBongkarUip" value="<?php echo date('Y-m-d') ?>" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tonase Bongkar UIP</label>
                                    <div class="col-sm-8">
                                        <input onkeyup="prosesSelisih()" name="tonaseBongkarUip" id="tonaseBongkarUip" type="number" class="form-control" placeholder="Tonase Bongkar UIP">
                                    </div>
                                </div>
                                <script>
                                    function prosesSelisih() {
                                        var muatPabrik = document.getElementById('tonaseMuatPabrik').value;
                                        var BongkarUip = document.getElementById('tonaseBongkarUip').value;
                                        var selisih = BongkarUip - muatPabrik;
                                        document.getElementById('selisih').value = selisih;
                                    }
                                </script>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Selisih</label>
                                    <div class="col-sm-8">
                                        <input readonly name="selisih" id="selisih" type="number" class="form-control" placeholder="Selisih">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Supir</label>
                                    <div class="col-sm-8">
                                        <input name="namaSupir" type="text" class="form-control" placeholder="Nama Supir">
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
                                <script>
                                    function prosesTagihan() {
                                        var bongkarUip = document.getElementById('tonaseBongkarUip').value;
                                        var upah = document.getElementById('upah').value;
                                        var hasil = bongkarUip * upah;
                                        document.getElementById('jumlahTagihan').value = hasil;
                                    }
                                </script>
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
                                        <input name="nagari" id="nagari" value="<?php echo 5000 ?>" type="number" class="form-control" placeholder="Nagari">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Total Tagihan</label>
                                    <div class="col-sm-8">
                                        <input readonly name="totalTagihan" id="totalTagihan" type="number" class="form-control" placeholder="Total Tagihan">
                                    </div>
                                </div>
                                <script>
                                    function prosesTotal() {
                                        var tagihan = document.getElementById('jumlahTagihan').value;
                                        var admin = document.getElementById('adminOfficeFee').value;
                                        var driver = document.getElementById('driverDeposito').value;
                                        var nagari = document.getElementById('nagari').value;
                                        var hasil = tagihan - admin - driver - nagari;
                                        document.getElementById('totalTagihan').value = hasil;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning float-center">Reset</button>
                        <a href="index.php?page=module/party/index" class="btn btn-success float-right">Kembali</a>
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