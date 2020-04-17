<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <br><br>
                    <h1 align=center style="font-family:Tahoma;" class="m-0 text-dark"> <strong>DATA PALM KARNEL</strong> </h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Palm Karnel</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($db->saveParty($_POST) > 0) {
                echo "
                    <script>
                    alert('Data berhasil di simpan');
                    window.location='index.php?page=module/party/index';
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
                                    <select name="perusahaan" class="form-control">
                                        <option value="0">Pilih</option>
                                        <?php
                                        $dataPerusahaans = $db->getAllPerusahaan();
                                        foreach ($dataPerusahaans as $dataPerusahaan) :
                                        ?>
                                            <option value="<?php echo $dataPerusahaan->perusahaan_id ?>"><?php echo $dataPerusahaan->perusahaan_nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. SPK / STO</label>
                                <div class="col-sm-9">
                                    <input name="spk" type="text" class="form-control" placeholder="No. SPK / STO">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. DO</label>
                                <div class="col-sm-9">
                                    <input name="do" type="text" class="form-control" placeholder="No. DO">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. PO</label>
                                <div class="col-sm-9">
                                    <input name="po" type="text" class="form-control" placeholder="No. PO">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Kontrak</label>
                                <div class="col-sm-9">
                                    <input name="nokontrak" type="text" class="form-control" placeholder="No. Kontrak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kontrak Tonase</label>
                                <div class="col-sm-9">
                                    <input name="kontrak" type="number" class="form-control" placeholder="Kontrak Tonase">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning float-center">Reset</button>
                            <a href="index.php?page=module/party/index" class="btn btn-success float-right">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>