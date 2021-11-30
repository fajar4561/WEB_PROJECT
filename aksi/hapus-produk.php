<?php
include 'dir.php';
include '../koneksi.php';

$kode = $_GET['kode'];
$nama = $_GET['nama'];


$koneksi->query("DELETE FROM produk WHERE kode_produk = '$kode'");
echo "<script>alert('Data $nama Berhasil dihapus');</script>";
echo "<script>location='../$dir/data-produk';</script>";

 ?>