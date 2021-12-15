<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include '../koneksi.php';
$sesi = $_SESSION['username'];
$ambilsesi = $koneksi->query("SELECT * FROM pegawai WHERE username='$sesi'");
$datasesi = $ambilsesi->fetch_assoc();
if (empty($sesi) OR !isset($sesi))
{

echo "<script>alert('Silahkan Login Dulu');</script>";
echo "<script>location='../pelanggan/';</script>";

}

if ($datasesi['jabatan']=='Pimpinan') {
    $dir ='pimpinan';
}
else {
    $dir ='admin';
}

 ?>