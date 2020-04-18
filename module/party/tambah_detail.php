<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <br><br>
                <div class="col-sm-12">
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>Permintaan Muatan</strong> </h1>
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
            if ($db->saveDetailPartyMuat($_POST) > 0) {
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
                                    <label class="col-sm-4 col-form-label">Nama Supir</label>
                                    <div class="col-sm-8">
                                        <input name="namaSupir" type="text" class="form-control" placeholder="Nama Supir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. SIM</label>
                                    <div class="col-sm-8">
                                        <input name="noSim" type="text" class="form-control" placeholder="No. SIM">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-8">
                                        <input name="jenis" type="text" class="form-control" placeholder="Jenis Barang">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Berat</label>
                                    <div class="col-sm-8">
                                        <input name="berat" type="number" class="form-control" placeholder="Berat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tujuan</label>
                                    <div class="col-sm-8">
                                        <input name="tujuan" type="text" class="form-control" placeholder="Tujuan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. DO</label>
                                    <div class="col-sm-8">
                                        <input name="noDo" type="text" class="form-control" placeholder="No. DO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">No. Kontrak</label>
                                    <div class="col-sm-8">
                                        <input name="nokontrak" type="text" class="form-control" placeholder="No. Kontrak">
                                    </div>
                                </div>
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