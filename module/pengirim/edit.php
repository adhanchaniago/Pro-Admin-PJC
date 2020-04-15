<?php
$id = $_GET['id'];
$dataPengirim = $db->getOnepengirim($id);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($db->editPengirim($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil di edit');
            window.location='index.php?page=module/pengirim/index';
            </script>
            ";
    } else {
        echo "
        <script>
        alert('Data gagal di edit');
        window.location='index.php?page=module/pengirim/index';
        </script>
        ";
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Perusahaan Pengirim</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Perusahaan Pengirim</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-7">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php foreach ($dataPengirim as $dataPerRow) : ?>
                        <form method="POST" class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $dataPerRow->pengirim_id ?>" name="id" type="hidden">
                                        <input value="<?php echo $dataPerRow->pengirim_nama ?>" name="nama" type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="" cols="30" rows="10"><?php echo $dataPerRow->pengirim_alamat ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button name="edit" type="submit" class="btn btn-info">Edit</button>
                                <a href="index.php?page=module/pengirim/index" class="btn btn-success float-right">Kembali</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    <?php endforeach ?>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>