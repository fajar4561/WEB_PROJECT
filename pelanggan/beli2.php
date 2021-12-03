<?php
session_start();
$id= $_POST['id'];
$jumlah = $_POST['jumlah'];
$produk = $_POST['produk'];
 

if (isset($_SESSION['keranjang'][$id]))
{
	$_SESSION['keranjang'][$id]+=$jumlah;
}
else
{
	$_SESSION['keranjang'][$id]=$jumlah;
}

$_SESSION['pesan'] = $produk.' '. 'berhasil di tambahkan';
$_SESSION['warna'] = 'bg-primary';
echo "<script>location='keranjang';</script>";
 ?>