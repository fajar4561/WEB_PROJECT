<?php
include 'dir.php';
include '../koneksi.php';


# Deklarasi Variable

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$katagori = $_POST['katagori'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

// Simpan Foto
$foto2 = $_POST['foto2'];
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, "../fotoproduk/".$foto);


if (empty($foto) OR !isset($foto)) { // jika form input foto baru kosong maka
    $koneksi->query("UPDATE produk SET
        nama_produk='$nama',
        katagori='$katagori',
        stok='$stok',
        harga='$harga',
        deskripsi='$deskripsi' WHERE kode_produk='$kode' ");

    echo "<script>alert('Data $nama Berhasil diubah');</script>";
    echo "<script>location='../$dir/data-produk';</script>";
}
else {
    $koneksi->query("UPDATE produk SET
        nama_produk='$nama',
        katagori='$katagori',
        stok='$stok',
        harga='$harga',
        deskripsi='$deskripsi',
        foto='$foto'
        WHERE kode_produk='$kode' ");

    echo "<script>alert('Data $nama Berhasil diubah');</script>";
    echo "<script>location='../$dir/data-produk';</script>";

}

 ?>