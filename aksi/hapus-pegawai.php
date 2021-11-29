<?php
include 'dir.php';
include '../koneksi.php';

$kode = $_GET['kode'];
$nama = $_GET['nama'];
$jabatan = $_GET['jabatan'];

if ($jabatan =='Pimpinan') {

	echo "<script>alert('Data Pimpinan Tidak Boleh dihapus !!!! ');</script>";
    echo "<script>location='../$dir/data-pegawai';</script>";
}
else {

	$koneksi->query("DELETE FROM pegawai WHERE kode_pegawai = '$kode'");
	echo "<script>alert('Data $nama Berhasil dihapus');</script>";
    echo "<script>location='../$dir/data-pegawai';</script>";
}

 ?>