<?php
session_start();
$id= $_POST['id'];
$jumlah = $_POST['jumlah'];
 

if (isset($_SESSION['keranjang'][$id]))
{
	$_SESSION['keranjang'][$id]+=$jumlah;
}
else
{
	$_SESSION['keranjang'][$id]=$jumlah;
}

echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
 ?>