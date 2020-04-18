<?php
$idh = $_GET['idh'];
$id = $_GET['id'];
if ($db->deleteDetailPupuk($idh) > 0) {
    echo "
    <script>
    alert('Data berhasil di hapus');
    window.location='index.php?page=module/pupuk/detail&id=$id';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Data gagal di hapus');
    window.location='index.php?page=module/pupuk/index';
    </script>
    ";
}
