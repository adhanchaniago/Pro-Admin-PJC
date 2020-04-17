<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>DATA PERUSAHAAN</strong> </h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Perusahaan</li>
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
            if ($db->savePerusahaan($_POST) > 0) {
                echo "
                    <script>
                    alert('Data berhasil di simpan');
                    window.location='index.php?page=module/perusahaan/index';
                    </script>
                    ";
            } else {
                echo "
                <script>
                alert('Data gagal di simpan');
                window.location='index.php?page=module/perusahaan/index';
                </script>
                ";
            }
        }
        ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                <div class="col-sm-9">
                                    <input name="nama" type="text" class="form-control" placeholder="Nama Perusahaan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No Telp.</label>
                                <div class="col-sm-9">
                                    <input name="telp" type="text" class="form-control" placeholder="No Telp.">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" class="form-control" cols="30" rows="3" placeholder="Alamat"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button name="simpan" type="submit" class="btn btn-info">Simpan</button>
                            <button type="reset" class="btn btn-warning float-center">Reset</button>
                            <a href="index.php?page=module/perusahaan/index" class="btn btn-success float-right">Kembali</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>