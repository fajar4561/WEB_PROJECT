<?php
session_start();
$id= $_POST['id'];
$jumlah = $_POST['jumlah'];
 

if (isset($_SESSION['keranjang'][$id]))
{
	
	$_SESSION['keranjang'][$id]=$jumlah;
	
}
$_SESSION['pesan'] = 'Barang berhasil di tambahkan';
$_SESSION['warna'] = 'bg-primary';

echo "<script>location='keranjang';</script>";
 ?>