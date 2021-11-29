<?php
include 'dir.php';
include '../koneksi.php';


# Deklarasi Variable

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$agama = $_POST['agama'];
$tmptlahir = $_POST['tmptlahir'];
$tgl = $_POST['tgllahir'];
$tgllahir = date("Y-m-d",strtotime($tgl));
$alamat = $_POST['alamat'];
// Simpan Foto
$foto2 = $_POST['foto2'];
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../fotopegawai/".$foto);

$email = $_POST['email'];
$telpon = $_POST['telpon'];
$username = $_POST['username'];
$password = $_POST['password'];


if (empty($foto) OR !isset($foto)) { // jika form input foto baru kosong maka
    $koneksi->query("UPDATE pegawai SET
        nama='$nama',
        kelamin ='$kelamin',
        agama = '$agama',
        tmptlahir = '$tmptlahir',
        tgllahir = '$tgllahir',
        alamat = '$alamat',
        email = '$email',
        username = '$username',
        password = '$password' 
        WHERE kode_pegawai ='$kode' ");

    echo "<script>alert('Data $nama Berhasil diubah');</script>";
    echo "<script>location='../$dir/data-pegawai';</script>";
}
else {
    $koneksi->query("UPDATE pegawai SET
        nama='$nama',
        kelamin ='$kelamin',
        agama = '$agama',
        tmptlahir = '$tmptlahir',
        tgllahir = '$tgllahir',
        alamat = '$alamat',
        email = '$email',
        username = '$username',
        password = '$password',
        foto = '$foto' 
        WHERE kode_pegawai ='$kode' ");

    echo "<script>alert('Data $nama Berhasil diubah');</script>";
    echo "<script>location='../$dir/data-pegawai';</script>";

}

 ?>