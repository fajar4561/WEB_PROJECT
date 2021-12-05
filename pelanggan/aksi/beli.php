<?php
session_start();
include '../../koneksi.php';

// deklarasi variable
$kode =$_POST['kode'];
$tgl=$_POST['tgl'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$rating = $_POST['rating'];
$komentar = $_POST['komentar'];
$total = $_POST['total'];

// simpan data ke tabel beli
$koneksi->query("INSERT INTO beli (id,kode_transaksi,tgl_beli,nama,alamat,telpon,rating,komentar,total)
	VALUES (null, '$kode',
	'$tgl',
	'$nama',
	'$alamat',
	'$telpon',
	'$rating',
	'$komentar',
	'$total')");

// ambil data session keranjang

foreach ($_SESSION["keranjang"] as $id => $jml) 
	{
		$ambil2 = $koneksi->query("SELECT * FROM produk WHERE id='$id'");
		$pecah2 = $ambil2->fetch_assoc();
		$kode_produk = $pecah2['kode_produk'];     
		$nama_produk = $pecah2['nama_produk'];
		$harga= $pecah2['harga'];
		$total2 = $jml*$harga;

		$koneksi->query("INSERT INTO detail_beli (id,kode_transaksi,tgl_beli,kode_produk,nama_produk,harga,jumlah,total,rating,komentar) 
			VALUES (null,
			 '$kode',
			 '$tgl',
			 '$kode_produk',
			 '$nama_produk',
			 '$harga',			 
			 '$jml',
			 '$total2',
			 '$rating',
			 '$komentar')") ;

		// update stok produk
		$pick = $koneksi->query("SELECT * FROM produk WHERE kode_produk='$kode_produk'");
		$row=$pick->fetch_assoc();

		$stok = $row['stok'];
		$sisa = $stok - $jml; 

		$koneksi->query("UPDATE produk SET stok ='$sisa' WHERE kode_produk='$kode_produk' ");		
	}

unset($_SESSION["beli"]);
echo "<script>alert('Pembelian Telah Berhasil');</script>";
echo "<script>location='cetak-nota?kode=$kode';</script>"; 
	



?>