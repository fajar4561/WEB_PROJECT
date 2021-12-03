<?php
session_start();
$id= $_POST['id'];
$jumlah = $_POST['jumlah'];
 

if (isset($_SESSION['keranjang'][$id]))
{
	$_SESSION['keranjang'][$id]=$jumlah;
}

echo "<script>location='keranjang.php';</script>";
 ?>