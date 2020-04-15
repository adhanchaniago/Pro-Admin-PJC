<?php
$id = $_GET['id'];
if ($db->deletePerusahaan($id) > 0) {
    echo "
    <script>
    alert('Data berhasil di hapus');
    window.location='index.php?page=module/perusahaan/index';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Data gagal di hapus');
    window.location='index.php?page=module/perusahaan/index';
    </script>
    ";
}
