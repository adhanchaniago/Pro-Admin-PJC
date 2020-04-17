<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>DATA PERUSAHAAN PENGIRIM</strong> </h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Perusahaan Pengirim</li>
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
                        <!-- <a href="index.php?page=module/pengirim/tambah" class="btn btn-success mb-4">Tambah Data</a> -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = $db->getAllPengirim();
                                foreach ($data as $no => $data) :
                                ?>
                                    <tr>
                                        <td width="5px"><?= ++$no ?></td>
                                        <td><?= $data->pengirim_nama ?></td>
                                        <td><?= $data->pengirim_alamat ?></td>
                                        <td width="60px">
                                            <a href="index.php?page=module/pengirim/edit&id=<?= $data->pengirim_id ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <!-- <a href="index.php?page=module/pengirim/hapus&id=<?= $data->pengirim_id ?>" class="btn btn-sm btn-danger">Hapus</a> -->
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>