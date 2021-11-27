<?php
include 'dir.php';

# Deklarasi Variable
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$agama = $_POST['agama'];
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