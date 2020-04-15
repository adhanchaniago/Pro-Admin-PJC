<?php
$id = $_GET['id'];
if ($db->deleteSatuan($id) > 0) {
    echo "
    <script>
    alert('Data berhasil di hapus');
    window.location='index.php?page=module/satuan_pupuk/index';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Data gagal di hapus');
    window.location='index.php?page=module/satuan_pupuk/index';
    </script>
    ";
}
