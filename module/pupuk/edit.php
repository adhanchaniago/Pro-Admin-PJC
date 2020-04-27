<?php
$id = $_GET['id'];

$dataPupuk = $db->getOnePupuk($id);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($db->editPupuk($_POST) > 0) {

        echo "
            <script>
            alert('Data berhasil di edit');
            window.location='index.php?page=module/pupuk/index';
            </script>
            ";
    } else {
        echo "
        <script>
        alert('Data gagal di edit');
        window.location='index.php?page=module/pupuk/index';
        </script>
        ";
    }
}
?>
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
                                    <select id="perusahaan" name="perusahaan" class="form-control">
                                        <option value="0">Pilih</option>
                                        <?php
                                        $dataPerusahaans = $db->getAllPerusahaan();
                                        foreach ($dataPerusahaans as $dataPerusahaan) :
                                        ?>
                                            <option value="<?php echo $dataPerusahaan->perusahaan_id ?>"><?php echo $dataPerusahaan->perusahaan_nama ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <script>
                                        document.getElementById('perusahaan').value = <?php echo $dataPupuk->perusahaan_id ?>
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Diterima</label>
                                <div class="col-sm-9">
                                    <input value="<?php echo $dataPupuk->pupuk_id ?>" name="idPupuk" type="hidden">
                                    <input value="<?php echo $dataPupuk->pupuk_diterima ?>" name="diterima" type="text" class="form-control" placeholder="Diterima">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tujuan</label>
                                <div class="col-sm-9">
                                    <input value="<?php echo $dataPupuk->pupuk_tujuan ?>" name="tujuan" type="text" class="form-control" placeholder="Tujuan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. SPK / STO</label>
                                <div class="col-sm-9">
                                    <input value="<?php echo $dataPupuk->pupuk_spk ?>" name="spk" type="text" class="form-control" placeholder="No. SPK / STO">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. DO</label>
                                <div class="col-sm-9">
                                    <input value="<?php echo $dataPupuk->pupuk_do ?>" name="do" type="text" class="form-control" placeholder="No. DO">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. PO</label>
                                <div class="col-sm-9">
                                    <input value="<?php echo $dataPupuk->pupuk_po ?>" name="po" type="text" class="form-control" placeholder="No. PO">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Kontrak</label>
                                <div class="col-sm-9">
                                    <input value="<?php echo $dataPupuk->pupuk_nokontrak  ?>" name="nokontrak" type="text" class="form-control" placeholder="No. Kontrak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kontrak Tonase</label>
                                <div class="col-sm-9">
                                    <input value="<?php echo $dataPupuk->pupuk_kontrak ?>" name="kontrak" type="number" class="form-control" placeholder="Kontrak Tonase">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning float-center">Reset</button>
                            <a href="index.php?page=module/pupuk/index" class="btn btn-success float-right">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>