<?php
$id = $_GET['id'];

$dataParty = $db->getOneParty($id);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($db->editParty($_POST) > 0) {

        echo "
            <script>
            alert('Data berhasil di edit');
            window.location='index.php?page=module/party/index';
            </script>
            ";
    } else {
        echo "
        <script>
        alert('Data gagal di edit');
        window.location='index.php?page=module/party/index';
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
                    <h1 class="m-0 text-dark">Data Palm Karnel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Palm Karnel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-7">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <?php foreach ($dataParty as $dataPerRow) : ?>
                    <form method="POST" class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $dataPerRow->party_id ?>" name="id" type="hidden">
                                    <select name="perusahaan" class="form-control" required>
                                        <option value="<?php echo $dataPerRow->perusahaan_id ?>">Pilih</option>
                                        <?php
                                        $dataPerusahaans = $db->getAllPerusahaan();
                                        foreach ($dataPerusahaans as $dataPerusahaan) :
                                        ?>
                                        <option value="<?php echo $dataPerusahaan->perusahaan_id ?>">
                                            <?php echo $dataPerusahaan->perusahaan_nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <p> <i>&nbsp; kososngkan jika tidak ingin mengganti</i> </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. SPK / STO</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $dataPerRow->party_spk ?>" name="spk" type="text"
                                        class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. DO</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $dataPerRow->party_do ?>" name="do" type="text"
                                        class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. PO</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $dataPerRow->party_po ?>" name="po" type="text"
                                        class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Kontrak</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $dataPerRow->party_nokontrak ?>" name="nokontrak"
                                        type="text" class="form-control" placeholder="No Kontrak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kontrak</label>
                                <div class="col-sm-10">
                                    <input value="<?php echo $dataPerRow->party_kontrak ?>" name="kontrak" type="text"
                                        class="form-control" placeholder="Nama">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button name="edit" type="submit" class="btn btn-info">Edit</button>
                            <button type="reset" class="btn btn-warning float-center">Reset</button>
                            <a href="index.php?page=module/party/index" class="btn btn-success float-right">Kembali</a>
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
