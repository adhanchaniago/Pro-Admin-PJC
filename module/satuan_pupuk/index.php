<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>DATA SATUAN PUPUK</strong> </h1>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="index.php?page=module/satuan_pupuk/tambah" class="btn btn-success mb-4">Tambah Data</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama Satuan</th>
                                    <th>Jumlah Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $dataSatuan = $db->getAllSatuan();
                                foreach ($dataSatuan as $no => $data) :
                                ?>
                                    <tr>
                                        <td width="5px"><?= ++$no ?></td>
                                        <td><?= $data->satuan_nama ?></td>
                                        <td align=center><?= $data->satuan_jumlah ?></td>
                                        <td width="150px" align=center>
                                            <a href="index.php?page=module/satuan_pupuk/edit&id=<?= $data->satuan_id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="index.php?page=module/satuan_pupuk/hapus&id=<?= $data->satuan_id ?>" class="btn btn-sm btn-danger">Hapus</a>
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