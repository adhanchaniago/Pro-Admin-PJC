<?php
$id = $_GET['id'];
$dataAdmin = $db->getOneAdmin($id);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($db->editAdmin($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil di edit');
            window.location='index.php?page=module/admin/index';
            </script>
            ";
    } else {
        echo "
        <script>
        alert('Data gagal di edit');
        window.location='index.php?page=module/admin/index';
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
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>DATA ADMIN</strong> </h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-8">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php foreach ($dataAdmin as $dataPerRow) : ?>
                        <form method="POST" class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $dataPerRow->admin_id ?>" name="id" type="hidden">
                                        <input value="<?php echo $dataPerRow->admin_username ?>" name="username" type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $dataPerRow->admin_password ?>" name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $dataPerRow->admin_nama ?>" name="nama" type="text" class="form-control" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Level</label>
                                    <div class="col-sm-10">
                                        <select id="level" name="level" class="form-control">
                                            <option value="Admin">Admin</option>
                                            <option value="Pimpinan">Pimpinan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button name="edit" type="submit" class="btn btn-info">Edit</button>
                                <button type="reset" class="btn btn-warning float-center">Reset</button>
                                <a href="index.php?page=module/admin/index" class="btn btn-success float-right">Kembali</a>
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