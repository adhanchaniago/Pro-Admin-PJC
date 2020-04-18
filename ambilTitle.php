<?php
include "model/conn.php";
$id = $_POST['id'];

$data = $conn->query("SELECT * FROM tb_pengirim WHERE pengirim_id='$id'")->fetch_assoc();
echo json_encode($data);
