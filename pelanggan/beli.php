<?php
session_start();
$id= $_GET['id'];
$produk = $_GET['produk'];


if (isset($_SESSION['keranjang'][$id]))
{
	$_SESSION['keranjang'][$id]+=1;
}
else
{
	$_SESSION['keranjang'][$id]=1;
}

$_SESSION['pesan'] = $produk.' '. 'berhasil di tambahkan';
$_SESSION['warna'] = 'bg-primary';
echo "<script>location='keranjang';</script>";
 ?>