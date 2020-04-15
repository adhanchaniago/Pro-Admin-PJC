<?php
include 'model/Db.php';
$db = new Db();
if (empty($_SESSION['akun'])) {
  echo "<script>
  window.location='login.php';
  </script>";
}

error_reporting(0); 

?>
<!DOCTYPE html>
<html>

<head>
  <title>PT. Permata Jasa Century</title>
  <?php include 'components/head.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include 'components/top-bar.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'components/side-bar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <?php include 'content.php' ?>
    <!-- /.content-wrapper -->
    <?php include 'components/footer.php' ?>

    <!-- Control Sidebar -->
    <?php include 'components/custome.php' ?>
  </div>
  <!-- ./wrapper -->
  <?php include 'components/scripts.php' ?>
</body>

</html>
<?php
// function terbilang($satuan)
// {
//   $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
//   if ($satuan < 12)
//     return "" . $huruf[$satuan];
//   elseif ($satuan < 20)
//     return terbilang($satuan - 10) . " Belas";
//   elseif ($satuan < 100)
//     return terbilang($satuan / 10) . " Puluh" . terbilang($satuan % 10);
//   elseif ($satuan < 200)
//     return "seratus" . terbilang($satuan - 100);
//   elseif ($satuan < 1000)
//     return terbilang($satuan / 100) . " Ratus" . terbilang($satuan % 100);
//   elseif ($satuan < 2000)
//     return "seribu" . terbilang($satuan - 1000);
//   elseif ($satuan < 1000000)
//     return terbilang($satuan / 1000) . " Ribu" . terbilang($satuan % 1000);
//   elseif ($satuan < 1000000000)
//     return terbilang($satuan / 1000000) . " Juta" . terbilang($satuan % 1000000);
//   elseif ($satuan >= 1000000000)
//     echo "Angka Yang Anda Masukan Terlalu Besar";
// }
?>