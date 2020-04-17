<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>Data Satuan Pupuk</strong> </h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Satuan Pupuk</li>
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
            if ($db->saveSatuan($_POST) > 0) {
                echo "
                    <script>
                    alert('Data berhasil di simpan');
                    window.location='index.php?page=module/satuan_pupuk/index';
                    </script>
                    ";
            } else {
                echo "
                <script>
                alert('Data gagal di simpan');
                window.location='index.php?page=module/satuan_pupuk/index';
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
                                <label class="col-sm-3 col-form-label">Nama Satuan</label>
                                <div class="col-sm-9">
                                    <input name="namaSatuan" type="text" class="form-control" placeholder="Nama Satuan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input name="jumlah" type="number" class="form-control" placeholder="Jumlah Satuan">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button name="simpan" type="submit" class="btn btn-info">Simpan</button>
                            <button type="reset" class="btn btn-warning float-center">Reset</button>
                            <a href="index.php?page=module/satuan_pupuk/index" class="btn btn-success float-right">Kembali</a>
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