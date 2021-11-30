<?php
include 'dir.php';
include '../koneksi.php';

# Deklarasi Variable
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$katagori = $_POST['katagori'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$harga0 = $_POST['harga'];
$harga1 =  preg_replace("/[^0-9]/", "", $harga0);
$harga = (int) $harga1;
// Simpan Foto
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../fotoproduk/".$foto);

// simpan data produk

$koneksi->query("INSERT INTO produk 
    (id,kode_produk,nama_produk,katagori,deskripsi,stok,harga,foto)
        VALUES (null,
        '$kode',
        '$nama',
        '$katagori',
        '$deskripsi',
        '$stok',
        '$harga',
        '$foto')");

    echo "<script>alert('Produk $nama Berhasil ditambahkan');</script>";
    echo "<script>location='../$dir/data-produk';</script>";

 ?>s