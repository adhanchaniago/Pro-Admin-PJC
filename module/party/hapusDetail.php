<?php
$idh = $_GET['idh'];
$id = $_GET['id'];
if ($db->deleteDetailParty($idh) > 0) {
    echo "
    <script>
    alert('Data berhasil di hapus');
    window.location='index.php?page=module/party/detail&id=$id';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Data gagal di hapus');
    window.location='index.php?page=module/party/index';
    </script>
    ";
}
