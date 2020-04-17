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
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="index.php?page=module/admin/tambah" class="btn btn-success mb-4">Tambah Data</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dataAdmins = $db->getAllAdmin();
                                foreach ($dataAdmins as $no => $dataAdmin) :
                                ?>
                                    <tr>
                                        <td width="5px"><?= ++$no ?></td>
                                        <td><?= $dataAdmin->admin_username ?></td>
                                        <td><?= $dataAdmin->admin_password ?></td>
                                        <td><?= $dataAdmin->admin_nama ?></td>
                                        <td><?= $dataAdmin->admin_level ?></td>
                                        <td width="100px">
                                            <a href="index.php?page=module/admin/edit&id=<?= $dataAdmin->admin_id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="index.php?page=module/admin/hapus&id=<?= $dataAdmin->admin_id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>