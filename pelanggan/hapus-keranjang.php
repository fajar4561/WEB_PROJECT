<?php
session_start();
$id= $_GET['id'];
$produk = $_GET['produk'];
unset($_SESSION["keranjang"][$id]);

$_SESSION['pesan'] = $produk.' '. 'berhasil di hapus';
$_SESSION['warna'] = 'bg-danger';
echo "<script>location='keranjang';</script>";
 ?>