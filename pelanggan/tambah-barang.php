<?php
session_start();
$id= $_POST['id'];
$jumlah = $_POST['jumlah'];
 

if (isset($_SESSION['keranjang'][$id]))
{
	if ($jumlah >= 1) {
		$_SESSION['keranjang'][$id]=$jumlah;
	}
	else {
		unset($_SESSION["keranjang"][$id]);
	}
}

echo "<script>location='keranjang.php';</script>";
 ?>