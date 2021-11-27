<?php
include 'dir.php';
include '../koneksi.php';

# Auto generated kode pegawai
$quer = mysqli_query($koneksi, "SELECT max(kode_pegawai) as kodeTerbesar FROM pegawai ");
$dat = mysqli_fetch_array($quer);
$kodePegawai = $dat['kodeTerbesar'];
$urutan = (int) substr($kodePegawai, 3, 3);
$urutan++;
$huruf='STF';
$kodePegawai = $huruf. sprintf("%03s", $urutan);

# Deklarasi Variable
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$agama = $_POST['agama'];
$tmptlahir = $_POST['tmptlahir'];
$tgl = $_POST['tgllahir'];
$tgllahir = date("Y-m-d",strtotime($tgl));
$alamat = $_POST['alamat'];
// Simpan Foto
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../fotopegawai/".$foto);

$jabatan = $_POST['jabatan'];
$email = $_POST['email'];
$telpon = $_POST['telpon'];
$username = $_POST['username'];
$password = $_POST['password'];



 ?>